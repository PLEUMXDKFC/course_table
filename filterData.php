<?php
require_once('command/conn.php');

// รับค่าจากฟอร์ม
$level = isset($_POST['level']) ? $_POST['level'] : '';
$term = isset($_POST['term']) ? $_POST['term'] : [];
$year = isset($_POST['year']) ? $_POST['year'] : '';  // แก้ไขจาก $_POST['level'] เป็น $_POST['year']
$group = isset($_POST['group']) ? $_POST['group'] : '';

// ตรวจสอบว่า term เป็น string หรือ array
if (is_string($term)) {
    $term = explode(',', $term); // แปลง string "1,2" เป็น array ["1", "2"]
}

// สร้างคำสั่ง SQL ตามเงื่อนไข
$sql = "SELECT subject_code, subject_name, theory, practice, credits, term, category, plan_group 
        FROM tb_plan WHERE 1=1";

$params = []; // เก็บค่า parameters สำหรับการ bind

// เพิ่มเงื่อนไขในการกรองข้อมูลตามที่เลือกจากฟอร์ม
if ($level != '') {
    $sql .= " AND `level` = ?";
    $params[] = $level;
}
if (!empty($term)) {
    $sql .= " AND `term` IN (" . implode(",", array_fill(0, count($term), '?')) . ")";
    foreach ($term as $t) {
        $params[] = $t;
    }
}
if ($year != '') {
    $sql .= " AND `year` = ?";  // เพิ่มเงื่อนไขปี
    $params[] = $year;
}
if ($group != '') {
    $sql .= " AND `group` = ?";
    $params[] = $group;
}

// เตรียมคำสั่ง SQL
$stmt = $conn->prepare($sql);

// ผูกค่าตัวแปร positional parameters
$stmt->execute($params);

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// ตรวจสอบว่ามีข้อมูลที่ตรงกับเงื่อนไขหรือไม่
if (empty($results)) {
    echo "<tr>
            <td colspan='5'>ไม่มีข้อมูลที่ตรงกับเงื่อนไข</td>
            <td colspan='5'>ไม่มีข้อมูลที่ตรงกับเงื่อนไข</td>
        </tr>
        ";

    echo "<tr>
            <td></td>
            <td>รวม(ไม่เกิน 22 นก.)</td>
            <td class='sum-column-1'>{$total_theory1}</td>
            <td class='sum-column-2'>{$total_practice1}</td>
            <td class='sum-column-3'>{$total_credits1}</td>
            <td></td>
            <td>รวม(ไม่เกิน 22 นก.)</td>
            <td class='sum-column-4'>{$total_theory2}</td>
            <td class='sum-column-5'>{$total_practice2}</td>
            <td class='sum-column-6'>{$total_credits2}</td>
          </tr>";
} else {
    // แยกผลลัพธ์ตามภาคเรียน
    $semester1 = [];
    $semester2 = [];

    foreach ($results as $row) {
        if ($row['term'] == 1) {
            $semester1[] = $row;  // เก็บข้อมูลภาคเรียนที่ 1
        } elseif ($row['term'] == 2) {
            $semester2[] = $row;  // เก็บข้อมูลภาคเรียนที่ 2
        }
    }

    // แสดงผลลัพธ์ในตาราง
    $prevCategory = '';
    $prevGroup = '';

    $total_theory1 = 0;
    $total_practice1 = 0;
    $total_credits1 = 0;

    $total_theory2 = 0;
    $total_practice2 = 0;
    $total_credits2 = 0;

    foreach ($semester1 as $index => $row1) {
        // เช็คหมวดใหม่ (category)
        if ($prevCategory != $row1['category']) {
            if ($prevCategory != '') {
                echo "</tr>"; // ปิดแถวก่อนหน้า
            }

            // แสดงหมวดของ semester1 และ semester2 ในแถวเดียวกัน
            echo "<tr>
                    <td></td>
                    <td>{$row1['category']}</td>
                    <td></td>
                    <td></td>
                    <td></td>";

            if (isset($semester2[$index])) {
                $row2 = $semester2[$index];
                echo "  <td></td>
                        <td>{$row2['category']}</td>
                        <td></td>
                        <td></td>
                        <td></td>";
            } else {
                echo "<td></td>
                        <td>{$row2['category']}</td>
                        <td></td>
                        <td></td>
                        <td></td>";
            }

            echo "</tr>";
            $prevCategory = $row1['category'];
        }

        // เช็คกลุ่มแผนใหม่ (plan_group)
        if ($prevGroup != $row1['plan_group']) {
            echo "<tr>
                    <td></td>
                    <td>{$row1['plan_group']}</td>
                    <td></td>
                    <td></td>
                    <td></td>";

            if (isset($semester2[$index])) {
                $row2 = $semester2[$index];
                echo "  <td></td>
                        <td>{$row2['plan_group']}</td>
                        <td></td>
                        <td></td>
                        <td></td>";
            }
            else {
                echo "<td></td>
                        <td>{$row2['category']}</td>
                        <td></td>
                        <td></td>
                        <td></td>";
            }

            echo "</tr>";
            $prevGroup = $row1['plan_group'];
        }

        // ข้อมูลภาคเรียนที่ 1
        echo "<tr>";
        echo "<td>{$row1['subject_code']}</td>";
        echo "<td>{$row1['subject_name']}</td>";
        echo "<td>{$row1['theory']}</td>";
        echo "<td>{$row1['practice']}</td>";
        echo "<td>{$row1['credits']}</td>";

        // ข้อมูลภาคเรียนที่ 2
        if (isset($semester2[$index])) {
            $row2 = $semester2[$index];
            echo "<td>{$row2['subject_code']}</td>";
            echo "<td>{$row2['subject_name']}</td>";
            echo "<td>{$row2['theory']}</td>";
            echo "<td>{$row2['practice']}</td>";
            echo "<td>{$row2['credits']}</td>";
        } else {
            echo "<td></td><td></td><td></td><td></td><td></td>";
        }

        echo "</tr>";

        $total_theory1 += $row1['theory'];
        $total_practice1 += $row1['practice'];
        $total_credits1 += $row1['credits'];

        if (isset($semester2[$index])) {
            $row2 = $semester2[$index];
            $total_theory2 += $row2['theory'];
            $total_practice2 += $row2['practice'];
            $total_credits2 += $row2['credits'];
        }
    }

    // แสดงผลรวม
    echo "<tr>
            <td></td>
            <td>รวม(ไม่เกิน 22 นก.)</td>
            <td class='sum-column-1'>{$total_theory1}</td>
            <td class='sum-column-2'>{$total_practice1}</td>
            <td class='sum-column-3'>{$total_credits1}</td>
            <td></td>
            <td>รวม(ไม่เกิน 22 นก.)</td>
            <td class='sum-column-4'>{$total_theory2}</td>
            <td class='sum-column-5'>{$total_practice2}</td>
            <td class='sum-column-6'>{$total_credits2}</td>
          </tr>";
}
?>