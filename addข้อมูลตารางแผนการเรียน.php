<?php
require_once('command/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับข้อมูลจากฟอร์ม
    $term = $_POST['term'] ?? '';
    $year = $_POST['year'] ?? '';
    $level = $_POST['level'] ?? '';
    $subject_code = $_POST['subject_code'] ?? '';
    $subject_name = $_POST['subject_name'] ?? '';
    $type = $_POST['type'] ?? '';
    $theory = $_POST['theory'] ?? 0;
    $practice = $_POST['practice'] ?? 0;
    $credits = $_POST['credits'] ?? 0;
    $category = $_POST['category'] ?? '';
    $plan_group = $_POST['plan_group'] ?? '';
    $group = $_POST['group'] ?? '';  // Corrected group parameter

    // ตรวจสอบฟิลด์ที่จำเป็นต้องกรอก
    if ($term && $year && $level && $subject_code && $subject_name && $category) {
        // เตรียมคำสั่ง SQL
        $stmt = $conn->prepare("INSERT INTO tb_plan (term, year, level, subject_code, subject_name, type, theory, practice, credits, category, plan_group, `group`) 
                               VALUES (:term, :year, :level, :subject_code, :subject_name, :type, :theory, :practice, :credits, :category, :plan_group, :group)");

        // ผูกค่ากับพารามิเตอร์
        $stmt->bindParam(':term', $term);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':level', $level);
        $stmt->bindParam(':subject_code', $subject_code);
        $stmt->bindParam(':subject_name', $subject_name);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':theory', $theory, PDO::PARAM_INT);
        $stmt->bindParam(':practice', $practice, PDO::PARAM_INT);
        $stmt->bindParam(':credits', $credits, PDO::PARAM_INT);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':plan_group', $plan_group);
        $stmt->bindParam(':group', $group);  // Corrected group parameter

        // ดำเนินการบันทึกข้อมูล
        if ($stmt->execute()) {
            echo "<script>alert('เพิ่มข้อมูลสำเร็จ');</script>";
        } else {
            echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล.";
        }
    } else {
        echo "กรุณากรอกข้อมูลในฟิลด์ที่จำเป็นทั้งหมด.";
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
            <!-- ภาคเรียน -->
            <div class="form-group">
                <label for="semester">ภาคเรียน *</label>
                <select id="semesterSelect" name="term">
                    <option value="">-- เลือกข้อมูล --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>

            <div class="form-group">
                <label for="semester">ปีการศึกษา *</label>
                <input type="text" name="year" maxlength="4" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                
                
            </div>

            <div class="form-group">
                <label for="semester">ระดับชั้น *</label>
                <select id="yearSelect" name="level">
                    <option value="">-- โปรดเลือกระดับชั้น --</option>
                    <option value="ปวช.">ปวช.</option>
                    <option value="ปวส.">ปวส.</option>
                    <option value="ปวส. ม.6">ปวส. ม.6</option>
                </select>
            </div>

            <div class="form-group">
                <label for="code_group">กลุ่ม *</label>
                <select id="codeGroupSelect" name="group">
                    <option value="">-- โปรดเลือกกลุ่ม --</option>
                    <option value="1-2">1-2</option>
                    <option value="3">3</option>
                </select>
            </div>

            

            
            <!-- รหัสวิชา/ชื่อวิชา -->
            <div class="form-group">
                <label for="course-code" >รหัสวิชา *</label>
                <input name="subject_code" type="text" id="course-code" placeholder="ระบุรหัส" oninput="validateCourseCode(this)">
            </div>
            <div class="form-group">
                <label for="course-code">ชื่อวิชา *</label>
                <input name="subject_name" type="text" id="course-code" placeholder="ระบุชื่อวิชา">
            </div>

            <div class="form-group">
                <label for="type">ประเภท *</label>
                <select id="type" name="type">
                    <option value="">-- เลือกข้อมูล --</option>
                    <option value="ทฤษฎี">ทฤษฎี</option>
                    <option value="ปฏิบัติ">ปฏิบัติ</option>
                    
                </select>
            </div>

            <!-- ท-ป-น -->
            <div class="form-group flex-row">
                <div class="yoyo">
                <label style=" width: 33%;">ท *</label><label style=" width: 33%;">ป *</label><label style=" width: 33%;">น *</label></div>

                <div class="yoyo">
                <input name="theory" type="text" class="short-input" oninput="this.value = this.value.replace(/[^0-9]/g, '')"  maxlength="1">
                <input name="practice" type="text" class="short-input"  oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="1">
                <input name="credits" type="text" class="short-input" oninput="this.value = this.value.replace(/[^0-9]/g, '')"  maxlength="1"></div>
            </div>

            <!-- หมวด -->
            <div class="form-group">
                <label for="category">หมวด *</label>
                <select id="category" name="category">
                    <option value="">-- เลือกข้อมูล --</option>
                    <option value="หมวดวิชาสมรรถนะแกนกลาง">หมวดวิชาสมรรถนะแกนกลาง</option>
                    <option value="หมวดวิชาสมรรถนะวิชาชีพ">หมวดวิชาสมรรถนะวิชาชีพ</option>
                    <option value="หมวดวิชาเลือกเสรี">หมวดวิชาเลือกเสรี</option>
                    <option value="กิจกรรมเสริมหลักสูตร">กิจกรรมเสริมหลักสูตร</option>
                    <option value="รายวิชาปรับพื้นฐาน">รายวิชาปรับพื้นฐาน</option>
                    
                </select>
            </div>

           

            <!-- กลุ่มแผน -->
            <div class="form-group flex-row">
                <label for="plan-group">กลุ่มแผน</label>
                <select id="plan-group" name="plan_group">
                    <option value="">ไม่ระบุ</option>
                    <option value="กลุ่มสมรรถนะภาษาและการสื่อสาร">กลุ่มสมรรถนะภาษาและการสื่อสาร</option>
                    <option value="กลุ่มสมรรถนะการคิดและการแก้ปัญหา">กลุ่มสมรรถนะการคิดและการแก้ปัญหา</option>
                    <option value="กลุ่มสมรรถนะทางสังคมและการดำรงชีวิต">กลุ่มสมรรถนะทางสังคมและการดำรงชีวิต</option>
                    <option value="กลุ่มสมรรถนะวิชาชีพพื้นฐาน">กลุ่มสมรรถนะวิชาชีพพื้นฐาน</option>
                    <option value="กลุ่มสมรรถนะวิชาชีพเฉพาะ">กลุ่มสมรรถนะวิชาชีพเฉพาะ</option>
                    <option value="กลุ่มวิชาสำหรับผู้จบ ปวช.ต่างประเภทวิชา">กลุ่มวิชาสำหรับผู้จบ ปวช.ต่างประเภทวิชา</option>
                </select>
                
            </div>

            <!-- ปุ่มบันทึก/ยกเลิก -->
            <div class="form-actions flex-row">
                <button type="submit" class="btn-primary">บันทึก</button>
                <a href="index.php" class="btn-secondary">ยกเลิก</a>
            </div>

            <!-- หมายเหตุ -->
            <p class="note">สำหรับวิชาที่หน่วยกิตเป็น * ให้สถานศึกษาแก้ไขให้เรียบร้อยก่อนบันทึกข้อมูล</p>

        </form>
    </div>

    <script>

        function validateCourseCode(input) {
                let value = input.value;

                // ลบทุกอย่างที่ไม่ใช่ตัวเลขหรือขีด
                value = value.replace(/[^0-9\-]/g, '');

                // ถ้ามีขีดมากกว่าหนึ่งตัวที่ตำแหน่งที่ถูกต้อง (หลัง 5 ตัวแรก)
                if (value.indexOf('-') !== value.lastIndexOf('-')) {
                    // ลบขีดที่เกิดขึ้นซ้ำ
                    value = value.replace(/-/g, '').slice(0, 5) + '-' + value.slice(5, 10);
                }

                // ตรวจสอบว่ามีขีดที่ตำแหน่งที่ 6 หรือไม่ (ตำแหน่งหลังตัวเลข 5 ตัว)
                if (value.length > 5 && value.charAt(5) !== '-') {
                    value = value.slice(0, 5) + '-' + value.slice(5);
                }

                // ตรวจสอบให้ไม่เกิน 10 ตัว
                if (value.length > 10) {
                    value = value.slice(0, 10);
                }

                // อัปเดตค่าของ input
                input.value = value;
            }

    document.getElementById('yearSelect').addEventListener('change', function() {
        var year = this.value;
        var semesterSelect = document.getElementById('semesterSelect');
        var options = semesterSelect.getElementsByTagName('option');
        
        // Reset all options visibility to show 5 and 6
        for (var i = 0; i < options.length; i++) {
            options[i].style.display = 'block';
        }
        
        // If 'ปวส.' or 'ปวส. ม.6' is selected, hide options 5 and 6
        if (year === 'ปวส.' || year === 'ปวส. ม.6') {
            options[5].style.display = 'none'; // Hide option 5
            options[6].style.display = 'none'; // Hide option 6
        }
    });
    </script>
</body>
</html>
