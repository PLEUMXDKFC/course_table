<?php
require_once('command/conn.php');

// รับค่าจาก GET
$level = isset($_GET['level']) ? $_GET['level'] : ''; // ชั้นปี
$term = isset($_GET['term']) ? $_GET['term'] : '';  // ภาคเรียน
$year = isset($_GET['year']) ? $_GET['year'] : '';  // ปีการศึกษา
$category = isset($_GET['category']) ? $_GET['category'] : ''; // หมวด
$group = isset($_GET['group']) ? $_GET['group'] : ''; // กลุ่ม

// สร้าง SQL ตามเงื่อนไขที่เลือก
$sql = "SELECT plan_id, term, year, level, `group`, category, plan_group, subject_code, subject_name, type, theory, practice, credits FROM tb_plan WHERE 1=1";
$params = [];

// กรองตามตัวเลือกที่เลือก
if ($level != '' && $level != 'ทั้งหมด') {
    $sql .= " AND level = ?";
    $params[] = $level;
}
if ($term != '' && $term != 'ทั้งหมด') {
    $sql .= " AND term = ?";
    $params[] = $term;
}
if ($year != '' && $year != 'ทั้งหมด') {
    $sql .= " AND year = ?";
    $params[] = $year;
}
if ($category != '' && $category != 'ทั้งหมด') {
    $sql .= " AND category = ?";
    $params[] = $category;
}

if ($group != '' && $group != 'ทั้งหมด') {
    $sql .= " AND `group` = ?";
    $params[] = $group;
}

// เตรียมคำสั่ง SQL
$stmt = $conn->prepare($sql);
$stmt->execute($params);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// แสดงผลข้อมูลในรูปแบบแถวตาราง
if (!empty($results)) {
    foreach ($results as $row) {
        echo "<tr>
                <td>{$row['term']}</td>
                <td>{$row['level']}</td>
                <td>{$row['group']}</td>
                <td>{$row['plan_group']}</td>
                <td>{$row['subject_code']}</td>
                <td>{$row['year']}</td>
                <td>{$row['subject_name']}</td>
                <td>{$row['type']}</td>
                <td>{$row['theory']}-{$row['practice']}-{$row['credits']}</td>
                <td>
                <form id='checkboxForm' style='display: flex; justify-content: center; align-items: center;'>
                    <a style='margin-right: 5px;' class='edit-btn' href='editข้อมูลตารางแผนการเรียน.php?plan_id={$row['plan_id']}'><i class='fa-solid fa-pen-to-square' style='margin-right: 5px;'></i></a>
                    <a style='margin-right: 5px;' class='delete-btn' href='command/del.php?del={$row['plan_id']}' onclick=\"return confirm('คุณแน่ใจว่าต้องการลบข้อมูลนี้หรือไม่?');\"><i class='fa-solid fa-trash' style='margin-right: 5px;'></i></a>
                            <label class='custom-checkbox'>
                            <input type='checkbox' class='data-checkbox' data-id='{$row['subject_code']}' data-term='{$row['term']}' onchange='updateTable(this)'>
                            <span class='checkmark'></span>
                        </label>
                        </form>                
                    </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='10'>ไม่พบข้อมูลที่ตรงกับเงื่อนไขที่เลือก</td></tr>";
}
?>
