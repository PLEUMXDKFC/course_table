<?php
require_once('command/conn.php'); // เชื่อมต่อฐานข้อมูล

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับข้อมูลจากฟอร์ม
    $teacher_name = $_POST['teacher_name'] ?? ''; // ชื่อครูผู้สอน
    $qualification = $_POST['qualification'] ?? ''; // วุฒิการศึกษา
    $role = $_POST['role'] ?? ''; // หน้าที่พิเศษ
    $prefix = $_POST['prefix'] ?? '';

    // ตรวจสอบฟิลด์ที่จำเป็นต้องกรอก
    if ($teacher_name && $qualification && $role) {
        try {
            // เตรียมคำสั่ง SQL
            $stmt = $conn->prepare("INSERT INTO teacherinfo (prefix, teacher_name, qualification, role) 
                                    VALUES (:prefix, :teacher_name, :qualification, :role)");

            // ผูกค่ากับพารามิเตอร์
            $stmt->bindParam(':prefix', $prefix);
            $stmt->bindParam(':teacher_name', $teacher_name);
            $stmt->bindParam(':qualification', $qualification);
            $stmt->bindParam(':role', $role);

            // ดำเนินการบันทึกข้อมูล
            if ($stmt->execute()) {
                echo "<script>alert('เพิ่มข้อมูลสำเร็จ'); window.location.href='index2.php';</script>";
            } else {
                echo "<script>alert('เกิดข้อผิดพลาดในการบันทึกข้อมูล');</script>";
            }
        } catch (PDOException $e) {
            echo "<script>alert('เกิดข้อผิดพลาด: " . $e->getMessage() . "');</script>";
        }
    } else {
        echo "<script>alert('กรุณากรอกข้อมูลในฟิลด์ที่จำเป็นทั้งหมด');</script>";
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
