<?php
require_once('command/conn.php');

// ตรวจสอบการรับค่า teacher_id
if (isset($_GET['teacher_id'])) {
    $teacher_id = $_GET['teacher_id'];

    // ดึงข้อมูลจากฐานข้อมูล
    $query = $conn->prepare("SELECT * FROM teacherinfo WHERE teacher_id = :teacher_id");
    $query->execute([':teacher_id' => $teacher_id]);
    $row = $query->fetch(PDO::FETCH_ASSOC);

    // ตรวจสอบว่าพบข้อมูลหรือไม่
    if (!$row) {
        echo "<script>alert('ไม่พบข้อมูลที่ต้องการแก้ไข'); window.location.href='table.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('ไม่มีการระบุ teacher_id'); window.location.href='table.php';</script>";
    exit;
}

// หากมีการส่งข้อมูลแบบ POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $teacher_name = isset($_POST['teacher_name']) ? $_POST['teacher_name'] : $row['teacher_name'];
    $qualification = isset($_POST['qualification']) ? $_POST['qualification'] : $row['qualification'];
    $role = isset($_POST['role']) ? $_POST['role'] : $row['role'];
    $prefix = isset($_POST['prefix']) ? $_POST['prefix'] : $row['prefix'];

    try {
        // เตรียมคำสั่ง SQL
        $update_query = $conn->prepare("UPDATE teacherinfo SET 
            prefix = :prefix,
            teacher_name = :teacher_name,
            qualification = :qualification,
            role = :role
            WHERE teacher_id = :teacher_id");

        // ส่งค่าตัวแปร
        $update_query->execute([
            ':prefix' => $prefix,
            ':teacher_name' => $teacher_name,
            ':qualification' => $qualification,
            ':role' => $role,
            ':teacher_id' => $teacher_id // ส่งค่า teacher_id
        ]);

        // ตรวจสอบผลลัพธ์
        if ($update_query->rowCount() > 0) {
            echo "<script>alert('แก้ไขข้อมูลเรียบร้อยแล้ว');</script>";
            echo "<script>window.location.href='index2.php';</script>";
        } else {
            echo "<script>alert('ไม่มีการเปลี่ยนแปลงข้อมูล');</script>";
        }
    } catch (PDOException $e) {
        echo "<script>alert('เกิดข้อผิดพลาด: " . $e->getMessage() . "');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่ม/แก้ไข แผนการเรียน</title>
    <link rel="stylesheet" href="css/addข้อมูลตารางแผนการเรียน.css">
</head>
<body>
    <div class="form-container">
        <h2>เพิ่ม แผนการเรียน</h2>
        

        <form method="POST">

        <div class="form-group">
                <label for="prefix">คำนำหน้า *</label>
                <select id="prefix" name="prefix">
                    <option value=""><?php echo isset($row['prefix']) ? $row['prefix'] : ''; ?></option>
                    <option value="นาย">นาย</option>
                    <option value="นางสาว">นางสาว</option>
                    <option value="นาง">นาง</option>
                </select>
            </div>

            <!-- ชื่อครูผู้สอน -->           
            <div class="form-group">
                <label for="teacher_name">ชื่อครูผู้สอน *</label>
                <input name="teacher_name" type="text" id="teacher_name" placeholder="ชื่อครูผู้สอน" required>
            </div>                   

            <!-- วุฒิการศึกษา -->
            <div class="form-group">
                <label for="qualification">วุฒิการศึกษา *</label>
                <input name="qualification" type="text" id="qualification" placeholder="วุฒิการศึกษา" required>
            </div>

            <!-- หน้าที่พิเศษ -->
            <div class="form-group">
                <label for="role">หน้าที่พิเศษ *</label>
                <input name="role" type="text" id="role" placeholder="หน้าที่พิเศษ" required>
            </div>

            <!-- ปุ่มบันทึก/ยกเลิก -->
            <div class="form-actions flex-row">
                <button type="submit" class="btn-primary">บันทึก</button>
                <a href="index2.php" class="btn-secondary">ยกเลิก</a>
            </div>

            <!-- หมายเหตุ -->
            <p class="note">สำหรับข้อมูลที่จำเป็นต้องกรอก กรุณากรอกข้อมูลให้ครบถ้วนก่อนกดบันทึก</p>
        </form>
    </div>
</body>
</html>