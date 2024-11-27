<?php
require_once('command/conn.php');

// ตรวจสอบการรับค่า plan_id
if (isset($_GET['plan_id'])) {
    $plan_id = $_GET['plan_id'];

    // ดึงข้อมูลจากฐานข้อมูล
    $query = $conn->prepare("SELECT * FROM tb_plan WHERE plan_id = :plan_id");
    $query->execute([':plan_id' => $plan_id]);
    $row = $query->fetch(PDO::FETCH_ASSOC);

    // ตรวจสอบว่าพบข้อมูลหรือไม่
    if (!$row) {
        echo "<script>alert('ไม่พบข้อมูลที่ต้องการแก้ไข'); window.location.href='table.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('ไม่มีการระบุ plan_id'); window.location.href='table.php';</script>";
    exit;
}


    

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // ค่าที่สามารถแก้ไขได้จากฟอร์ม
$term = isset($_POST['term']) && !empty($_POST['term']) ? $_POST['term'] : $row['term'];
$subject_code = isset($_POST['subject_code']) && !empty($_POST['subject_code']) ? $_POST['subject_code'] : $row['subject_code'];
$subject_name = isset($_POST['subject_name']) && !empty($_POST['subject_name']) ? $_POST['subject_name'] : $row['subject_name'];
$type = isset($_POST['type']) && !empty($_POST['type']) ? $_POST['type'] : $row['type'];
$level = isset($_POST['level']) && !empty($_POST['level']) ? $_POST['level'] : $row['level'];
$year = isset($_POST['year']) && !empty($_POST['year']) ? $_POST['year'] : $row['year'];
$category = isset($_POST['category']) && !empty($_POST['category']) ? $_POST['category'] : $row['category'];
$plan_group = isset($_POST['plan_group']) && !empty($_POST['plan_group']) ? $_POST['plan_group'] : $row['plan_group'];
$theory = isset($_POST['theory']) && !empty($_POST['theory']) ? $_POST['theory'] : $row['theory'];
$practice = isset($_POST['practice']) && !empty($_POST['practice']) ? $_POST['practice'] : $row['practice'];
$credits = isset($_POST['credits']) && !empty($_POST['credits']) ? $_POST['credits'] : $row['credits'];
$group = isset($_POST['group']) && !empty($_POST['group']) ? $_POST['group'] : $row['group'];




$teacher_id = isset($_POST['teacher_id']) && !empty($_POST['teacher_id']) ? $_POST['teacher_id'] : $row['teacher_id'];

try {
    // เตรียมคำสั่ง SQL
    $update_query = $conn->prepare("UPDATE tb_plan SET 
        subject_name = :subject_name,
        subject_code = :subject_code,
        type = :type,
        level = :level,
        year = :year,
        term = :term,
        category = :category,
        plan_group = :plan_group,
        theory = :theory,
        practice = :practice,
        credits = :credits,
        `group` = :group,
        teacher_id = :teacher_id
        WHERE plan_id = :plan_id");

    $update_query->execute([
        ':plan_id' => $plan_id,
        ':subject_name' => $subject_name,
        ':subject_code' => $subject_code,
        ':type' => $type,
        ':level' => $level,
        ':year' => $year,
        ':term' => $term,
        ':category' => $category,
        ':plan_group' => $plan_group,
        ':theory' => $theory,
        ':practice' => $practice,
        ':credits' => $credits,
        ':group' => $group,
        ':teacher_id' => $teacher_id
    ]);

    // ตรวจสอบผลลัพธ์
    if ($update_query->rowCount() > 0) {
        echo "<script>alert('แก้ไขข้อมูลเรียบร้อยแล้ว');</script>";
        echo "<script>window.location.href='index.php';</script>";
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
        <h2>แก้ไข แผนการเรียน</h2>

        <form method="POST">
            <!-- ภาคเรียน -->
            <!-- ภาคเรียน -->
<div class="form-group">
    <label for="semester">ภาคเรียน *</label>
    <select name="term">
        <option value=""><?php echo isset($row['term']) ? $row['term'] : ''; ?></option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
    </select>
</div>

<!-- ปีการศึกษา -->
<div class="form-group">
    <label for="semester">ปีการศึกษา *</label>
    <input type="text" name="year" maxlength="4" value="<?php echo isset($row['year']) ? $row['year'] : ''; ?>" required>
</div>

<!-- ระดับชั้น -->
<div class="form-group">
    <label for="semester">ระดับชั้น *</label>
    <select id="yearSelect" name="level">
        <option value=""><?php echo isset($row['level']) ? $row['level'] : ''; ?></option>
        <option value="ปวช.">ปวช.</option>
        <option value="ปวส.">ปวส.</option>
        <option value="ปวส. ม.6">ปวส. ม.6</option>
    </select>
</div>

<div class="form-group">
                <label for="code_group">กลุ่ม *</label>
                <select id="codeGroupSelect" name="group">
                    <option value=""><?php echo isset($row['group']) ? $row['group'] : ''; ?></option>
                    <option value="1-2">1-2</option>
                    <option value="3">3</option>
                </select>
</div>

<!-- รหัสวิชา -->
<div class="form-group">
    <label for="course-code">รหัสวิชา *</label>
    <input name="subject_code" type="text" value="<?php echo isset($row['subject_code']) ? $row['subject_code'] : ''; ?>"oninput="validateCourseCode(this)">
</div>

<!-- ชื่อวิชา -->
<div class="form-group">
    <label for="course-code">ชื่อวิชา *</label>
    <input name="subject_name" type="text" value="<?php echo isset($row['subject_name']) ? $row['subject_name'] : ''; ?>">
</div>

<div class="form-group">
    <label for="type">ประเภท *</label>
    <select id="type" name="type">
        <option value=""><?php echo isset($row['type']) ? $row['type'] : ''; ?></option>
        <option value="ทฤษฎี">ทฤษฎี</option>
        <option value="ปฏิบัติ">ปฏิบัติ</option>
    </select>
</div>

            <!-- ท-ป-น -->
<div class="form-group flex-row">
    <div class="yoyo">
        <label style="width: 33%;">ท *</label>
        <label style="width: 33%;">ป *</label>
        <label style="width: 33%;">น *</label>
    </div>

    <div class="yoyo">
        <input name="theory" type="text" class="short-input" oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="1"
            value="<?php echo isset($row['theory']) ? $row['theory'] : ''; ?>">
        <input name="practice" type="text" class="short-input" oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="1"
            value="<?php echo isset($row['practice']) ? $row['practice'] : ''; ?>">
        <input name="credits" type="text" class="short-input" oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="1"
            value="<?php echo isset($row['credits']) ? $row['credits'] : ''; ?>">
    </div>
</div>

<!-- หมวด -->
<div class="form-group">
    <label for="category">หมวด *</label>
    <select id="category" name="category">
        <option value=""><?php echo isset($row['category']) ? $row['category'] : ''; ?></option>
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
        <option value=""><?php echo isset($row['plan_group']) ? $row['plan_group'] : ''; ?></option>
        <option value="กลุ่มสมรรถนะภาษาและการสื่อสาร">กลุ่มสมรรถนะภาษาและการสื่อสาร</option>
        <option value="กลุ่มสมรรถนะการคิดและการแก้ปัญหา">กลุ่มสมรรถนะการคิดและการแก้ปัญหา</option>
        <option value="กลุ่มสมรรถนะทางสังคมและการดำรงชีวิต">กลุ่มสมรรถนะทางสังคมและการดำรงชีวิต</option>
        <option value="กลุ่มสมรรถนะวิชาชีพพื้นฐาน">กลุ่มสมรรถนะวิชาชีพพื้นฐาน</option>
        <option value="กลุ่มสมรรถนะวิชาชีพเฉพาะ">กลุ่มสมรรถนะวิชาชีพเฉพาะ</option>
        <option value="กลุ่มวิชาสำหรับผู้จบ ปวช.ต่างประเภทวิชา">กลุ่มวิชาสำหรับผู้จบ ปวช.ต่างประเภทวิชา</option>
    </select>
</div>
<div class="form-group">
    <label for="teacher_id">ครูผู้สอน:</label>
    <select id="teacher_id" name="teacher_id" required>
        <option value="">เลือกครู</option>
        <?php
        $stmt = $conn->prepare("SELECT teacher_id, teacher_name FROM teacherinfo");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='{$row['teacher_id']}'" . ($row['teacher_id'] == $row['teacher_id'] ? ' selected' : '') . ">{$row['teacher_name']}</option>";
        }
        ?>
    </select>
</div>



            <!-- ปุ่มบันทึก/ยกเลิก -->
            <div class="form-actions flex-row">
                
                <button type="submit" name="submit" class="btn-primary">บันทึก</button>

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
