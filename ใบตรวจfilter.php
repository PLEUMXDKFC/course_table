<?php
require_once('command/conn.php');

// รับค่าจากฟอร์ม
$level = isset($_POST['level']) ? $_POST['level'] : '';
$year = isset($_POST['year']) ? $_POST['year'] : '';
$group = isset($_POST['group']) ? $_POST['group'] : '';

// สร้างคำสั่ง SQL ตามเงื่อนไข
$sql = "SELECT category, plan_group, practice, term, credits 
        FROM tb_plan 
        WHERE 1=1";

$params = [];
if ($level != '') {
    $sql .= " AND `level` = ?";
    $params[] = $level;
}
if ($year != '') {
    $sql .= " AND `year` = ?";
    $params[] = $year;
}
if ($group != '') {
    $sql .= " AND `group` = ?";
    $params[] = $group;
}

$stmt = $conn->prepare($sql);
$stmt->execute($params);

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($results)) {
    echo "<tr>
            <td colspan='9' style='text-align: center;'>ไม่มีข้อมูลที่ตรงกับเงื่อนไข</td>
        </tr>";
} else {
    // แยกข้อมูลตามหมวด
    $categories = [
        "หมวดวิชาสมรรถนะแกนกลาง" => [
            "กลุ่มสมรรถนะภาษาและการสื่อสาร",
            "กลุ่มสมรรถนะการคิดและการแก้ปัญหา",
            "กลุ่มสมรรถนะทางสังคมและการดำรงชีวิต",
        ],
        "หมวดวิชาสมรรถนะวิชาชีพ" => [
            "กลุ่มสมรรถนะวิชาชีพพื้นฐาน",
            "กลุ่มสมรรถนะวิชาชีพเฉพาะ",
        ],
        "หมวดวิชาเลือกเสรี" => [],
    ];

    function getPracticeByTerm($results, $term) {
        $total = 0;
        foreach ($results as $row) {
            if ($row['category'] == "กิจกรรมเสริมหลักสูตร" && $row['term'] == $term) {
                $total += $row['practice'];
            }
        }
        return $total;
    }

    function getCreditsByTerm($results, $planGroup, $term) {
        foreach ($results as $row) {
            if ($row['plan_group'] == $planGroup && $row['term'] == $term) {
                return $row['credits'] ?? null;
            }
        }
        return null;
    }

    $totalPracticeByTerm = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0];
    $grandTotal = 0;

    // แสดงหมวดหมู่ปกติ
    $categoryIndex = 1;
    foreach ($categories as $category => $planGroups) {
        $minTextCategory = '';
        if ($category == "หมวดวิชาสมรรถนะแกนกลาง") {
            $minTextCategory = "ไม่น้อยกว่า 20 นก.";
        } elseif ($category == "หมวดวิชาสมรรถนะวิชาชีพ") {
            $minTextCategory = "ไม่น้อยกว่า 70 นก.";
        } elseif ($category == "หมวดวิชาเลือกเสรี") {
            $minTextCategory = "ไม่น้อยกว่า 10";
        }

        echo "<tr>
                <td style='font-weight: bold; text-align: left; border-top: 0; border-bottom: 0;'>{$categoryIndex}. $category</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>$minTextCategory</td>
            </tr>";

        $planGroupIndex = 1;
        foreach ($planGroups as $planGroup) {
            $rowTotal = 0;
            echo "<tr>
                    <td style='font-weight: normal; text-align: left; border-top: 0; border-bottom: 0;'>{$categoryIndex}.{$planGroupIndex} $planGroup</td>";

            for ($term = 1; $term <= 6; $term++) {
                $credits = getCreditsByTerm($results, $planGroup, $term);
                if ($credits !== null) {
                    echo "<td>$credits</td>";
                    $rowTotal += $credits;
                    $totalPracticeByTerm[$term] += $credits;
                } else {
                    echo "<td></td>";
                }
            }

            echo "<td>$rowTotal</td>
                  <td style='text-align: left;'></td>
                </tr>";

            $grandTotal += $rowTotal;
            $planGroupIndex++;
        }

        $categoryIndex++;
    }

    // แสดงกิจกรรมเสริมหลักสูตรแยกต่างหาก
    echo "<tr>
            <td style='font-weight: bold; text-align: left;'>กิจกรรมเสริมหลักสูตร (2 ชั่วโมงต่อสัปดาห์)</td>";
    for ($term = 1; $term <= 6; $term++) {
        $practice = getPracticeByTerm($results,$category, $term);
        echo "<td>$practice</td>";
        $totalPracticeByTerm[$term] += $practice;
    }
    echo "<td></td>
          <td></td>
        </tr>";

    // รวมหน่วยกิตทั้งหมด
    echo "<tr style='font-weight: bold;'>
            <td>รวมหน่วยกิต</td>";
    $rowTotalSum = 0;
    foreach ($totalPracticeByTerm as $term => $sum) {
        echo "<td style='background-color: rgb(216, 249, 249);'>$sum</td>";
        $rowTotalSum += $sum;
    }
    echo "<td style='background-color: rgb(216, 249, 249);'>$rowTotalSum</td>
          <td>ไม่น้อยกว่า 100 นก.</td>
        </tr>";
}
?>
