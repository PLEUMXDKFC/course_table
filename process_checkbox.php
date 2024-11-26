<?php
require_once('command/conn.php');

// ตรวจสอบว่าได้รับข้อมูลผ่าน POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $plan_id = isset($_POST['plan_id']) ? $_POST['plan_id'] : null;
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    if ($plan_id && $action) {
        if ($action === 'add') {
            // เพิ่มข้อมูลลงในตารางเป้าหมาย
            $sql = "INSERT INTO tb_selected_plan (plan_id) VALUES (?)";
        } elseif ($action === 'remove') {
            // ลบข้อมูลออกจากตารางเป้าหมาย
            $sql = "DELETE FROM tb_selected_plan WHERE plan_id = ?";
        }

        $stmt = $conn->prepare($sql);
        if ($stmt->execute([$plan_id])) {
            echo 'อัปเดตข้อมูลสำเร็จ';
        } else {
            echo 'เกิดข้อผิดพลาดในการอัปเดตข้อมูล';
        }
    } else {
        echo 'ข้อมูลไม่สมบูรณ์';
    }
}
?>
