<?php
require_once 'conn.php'; 

if (isset($_GET['del'])) {
    $plan_id = $_GET['del'];

    // คำสั่ง SQL สำหรับลบข้อมูล
    $delete_query = $conn->prepare("DELETE FROM tb_plan WHERE plan_id=:plan_id");
    $delete_result = $delete_query->execute([':plan_id' => $plan_id]);

    // ตรวจสอบผลลัพธ์การลบ
    if ($delete_query->rowCount() > 0) {
        echo "<script>alert('ลบข้อมูลสำเร็จ');</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการลบข้อมูล');</script>";
    }

    // รีเฟรชหน้าใหม่เพื่อลบค่าใน URL
    echo "<script>window.location.href='../index.php';</script>";
}
?>
