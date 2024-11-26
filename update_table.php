<?php
require_once('command/conn.php');

// รับข้อมูล JSON
$data = json_decode(file_get_contents('php://input'), true);
$subjectIds = $data['subjectIds'] ?? [];

// ตรวจสอบว่ามี checkbox ถูกเลือกหรือไม่
if (empty($subjectIds)) {
    echo json_encode(['html' => "<tr><td colspan='10'>ไม่มีข้อมูลที่ตรงกับเงื่อนไข</td></tr>"]);
    exit;
}

// ดึงข้อมูลจากฐานข้อมูลตาม ID หลายรายการ
$placeholders = rtrim(str_repeat('?,', count($subjectIds)), ',');
$query = "SELECT subject_code, subject_name, theory, practice, credits, term, category, plan_group
          FROM tb_plan WHERE subject_code IN ($placeholders)";
$stmt = $conn->prepare($query);
$stmt->execute($subjectIds);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($results) {
    // แยกผลลัพธ์ตามภาคเรียน
    $semester1 = [];
    $semester2 = [];
    $totalCredits1 = 0;
    $totalTheory1 = 0;
    $totalPractice1 = 0;
    $totalCredits2 = 0;
    $totalTheory2 = 0;
    $totalPractice2 = 0;

    foreach ($results as $row) {
        if ($row['term'] == 1) {
            $semester1[] = $row;
            $totalCredits1 += $row['credits'];
            $totalTheory1 += $row['theory'];
            $totalPractice1 += $row['practice'];
        } elseif ($row['term'] == 2) {
            $semester2[] = $row;
            $totalCredits2 += $row['credits'];
            $totalTheory2 += $row['theory'];
            $totalPractice2 += $row['practice'];
        }
    }

    // จัดการแสดงผล
    $categories1 = array_unique(array_column($semester1, 'category'));
    $categories2 = array_unique(array_column($semester2, 'category'));

    ob_start();

    // รวมหมวด (category) ทั้ง 2 ฝั่ง
    $allCategories = array_unique(array_merge($categories1, $categories2));

    foreach ($allCategories as $category) {
        echo "<tr>";
        // แสดงหมวด (category)
        echo "<td></td>";
        echo "<td style='text-align: left;'><strong>{$category}</strong></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        // --------------------\\
        echo "<td></td>";
        echo "<td style='text-align: left;'><strong>{$category}</strong></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "</tr>";

        // ดึงข้อมูลจากหมวด (category) นั้น
        $filteredSemester1 = array_filter($semester1, fn($row) => $row['category'] === $category);
        $filteredSemester2 = array_filter($semester2, fn($row) => $row['category'] === $category);

        $planGroups = array_unique(array_merge(
            array_column($filteredSemester1, 'plan_group'),
            array_column($filteredSemester2, 'plan_group')
        ));

        foreach ($planGroups as $planGroup) {
            echo "<tr>";
            // แสดงกลุ่มแผน (plan_group)
            echo "<td></td>";
            echo "<td style='text-align: left;'>{$planGroup}</td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            // --------------------\\
            echo "<td></td>";
            echo "<td style='text-align: left;'>{$planGroup}</td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "</tr>";

            $groupSemester1 = array_filter($filteredSemester1, fn($row) => $row['plan_group'] === $planGroup);
            $groupSemester2 = array_filter($filteredSemester2, fn($row) => $row['plan_group'] === $planGroup);

            $maxRows = max(count($groupSemester1), count($groupSemester2));
            $groupSemester1 = array_values($groupSemester1);
            $groupSemester2 = array_values($groupSemester2);

            for ($i = 0; $i < $maxRows; $i++) {
                $row1 = $groupSemester1[$i] ?? null;
                $row2 = $groupSemester2[$i] ?? null;

                echo "<tr>";

                // ภาคเรียนที่ 1
                if ($row1) {
                    echo "<td>{$row1['subject_code']}</td>
                          <td style='text-align: left;'>{$row1['subject_name']}</td>
                          <td>{$row1['theory']}</td>
                          <td>{$row1['practice']}</td>
                          <td>{$row1['credits']}</td>";
                } else {
                    echo "<td colspan='5'></td>";
                }

                // ภาคเรียนที่ 2
                if ($row2) {
                    echo "<td>{$row2['subject_code']}</td>
                          <td style='text-align: left;'>{$row2['subject_name']}</td>
                          <td>{$row2['theory']}</td>
                          <td>{$row2['practice']}</td>
                          <td>{$row2['credits']}</td>";
                } else {
                    echo "<td colspan='5'></td>";
                }

                echo "</tr>";
            }
        }
    }

    // แสดงผลรวมในแถวเดียวล่างสุด
    echo "<tr>
            <td colspan='2'><strong>รวมทั้งหมด</strong></td>
            <td>{$totalTheory1}</td>
            <td>{$totalPractice1}</td>
            <td>{$totalCredits1}</td>
            <td colspan='2'><strong>รวมทั้งหมด</strong></td>
            <td>{$totalTheory2}</td>
            <td>{$totalPractice2}</td>
            <td>{$totalCredits2}</td>
          </tr>";

    $html = ob_get_clean();
} else {
    $html = "<tr>
                <td colspan='10'>ไม่มีข้อมูลที่ตรงกับเงื่อนไข</td>
             </tr>";
}

// ส่งผลลัพธ์กลับไปยัง JavaScript
echo json_encode(['html' => $html]);
?>
