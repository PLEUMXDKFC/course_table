<?php
require_once('command/conn.php');

// รับค่าจาก GET
$prefix = isset($_GET['prefix']) ? $_GET['prefix'] : '';
$teacher = isset($_GET['teacher_name']) ? $_GET['teacher_name'] : '';
$qualification = isset($_GET['qualification']) ? $_GET['qualification'] : '';
$role = isset($_GET['role']) ? $_GET['role'] : '';
$teacher_id = isset($_GET['teacher_id']) ? $_GET['teacher_id'] : '';

// สร้าง SQL ตามเงื่อนไขที่เลือก
$sql = "SELECT teacher_id, prefix, teacher_name, qualification, role FROM teacherinfo WHERE 1=1";
$params = [];

if ($prefix != '' && $prefix != 'ทั้งหมด') {
    $sql .= " AND prefix = ?";
    $params[] = $prefix;
}
    
// เตรียมคำสั่ง SQL
$stmt = $conn->prepare($sql);
$stmt->execute($params);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// แสดงผลข้อมูลในรูปแบบแถวตาราง
if (!empty($results)) {
    foreach ($results as $row) {
        echo "<tr>
                <td>{$row['prefix']}</td>
                <td>{$row['teacher_name']}</td>
                <td>{$row['qualification']}</td>
                <td>{$row['role']}</td>
                <td>
                    <a class='edit-btn' href='edit2.php?teacher_id={$row['teacher_id']}'><i class='fa-solid fa-pen-to-square' style='margin-right: 5px;'></i></a>
                    <a class='delete-btn' href='command/del2.php?del={$row['teacher_id']}' onclick=\"return confirm('คุณแน่ใจว่าต้องการลบข้อมูลนี้หรือไม่?');\"><i class='fa-solid fa-trash' style='margin-right: 5px;'></i></a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='11'>ไม่พบข้อมูลที่ตรงกับเงื่อนไขที่เลือก</td></tr>";
}
?>
