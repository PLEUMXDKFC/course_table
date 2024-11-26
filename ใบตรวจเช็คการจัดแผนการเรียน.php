<?php
    require_once('command/conn.php');


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมทบCTN</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <!-- Bootstrap Icons CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="dash.css">
    <link rel="stylesheet" href="ใบตรวจเช็คการจัดแผนการเรียน.css">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="bi bi-house"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="index.php">แผนการเรียน</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <!-- Profile Section -->
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#profile" aria-expanded="false">
                        <i class="lni lni-users"></i>
                        <span>จัดทำข้อมูล</span>
                    </a>
                    <ul id="profile" class="sidebar-dropdown list-unstyled collapse">
                        <li class="sidebar-item"><a href="#" class="sidebar-link">รายชื่อนักเรียน</a></li>
                        <li class="sidebar-item"><a href="#" class="sidebar-link">รายชื่อครูผู้สอน</a></li>
                        <li class="sidebar-item"><a href="index.php" class="sidebar-link">ข้อมูลรายวิชา</a></li>
                    </ul>
                </li>
            
                <!-- Task Section -->
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#task" aria-expanded="false">
                        <i class="lni lni-calendar"></i>
                        <span>จัดตารางเรียน</span>
                    </a>
                    <ul id="task" class="sidebar-dropdown list-unstyled collapse">
                        <li class="sidebar-item"><a href="#" class="sidebar-link">รายวิชา</a></li>
                        <li class="sidebar-item"><a href="#" class="sidebar-link">ห้องเรียน</a></li>
                        <li class="sidebar-item"><a href="#" class="sidebar-link">ช่วงเวลา</a></li>
                    </ul>
                </li>
            
                <!-- Auth Section -->
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="false">
                        <i class="lni lni-briefcase"></i>
                        <span>ตารางบุคลากร</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse">
                        <li class="sidebar-item"><a href="#" class="sidebar-link">ครู</a></li>
                        <li class="sidebar-item"><a href="#" class="sidebar-link">นักเรียน</a></li>
                    </ul>
                </li>
            
                <!-- Notification Section -->
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#notification" aria-expanded="false">
                        <i class="lni lni-book"></i> <!-- ใช้ไอคอนที่เกี่ยวกับหนังสือ -->
                        <span>บัญชีห้องเรียน</span>
                    </a>
                    <ul id="notification" class="sidebar-dropdown list-unstyled collapse">
                        <li class="sidebar-item"><a href="#" class="sidebar-link">tc. 2/4</a></li>
                        <li class="sidebar-item"><a href="#" class="sidebar-link">tc. 2/3</a></li>
                        <li class="sidebar-item"><a href="#" class="sidebar-link">tc. 3/1</a></li>
                        <li class="sidebar-item"><a href="#" class="sidebar-link">tc. 3/2</a></li>
                        <li class="sidebar-item"><a href="#" class="sidebar-link">tc. 4/1</a></li>
                        <li class="sidebar-item"><a href="#" class="sidebar-link">tc. 4/2</a></li>
                    </ul>
                </li>
            
                <!-- Setting Section -->
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#settings" aria-expanded="false">
                        <i class="lni lni-timer"></i>
                        <span>บัญชีชั่วโมง</span>
                    </a>
                    <ul id="settings" class="sidebar-dropdown list-unstyled collapse">
                        <li class="sidebar-item"><a href="#" class="sidebar-link">General Settings</a></li>
                        <li class="sidebar-item"><a href="#" class="sidebar-link">Privacy Settings</a></li>
                        <li class="sidebar-item"><a href="#" class="sidebar-link">Account Settings</a></li>
                    </ul>
                </li>
            
                <!-- Print Section -->
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#print" aria-expanded="false">
                        <i class="lni lni-printer"></i>
                        <span>พิมพ์</span>
                    </a>
                    <ul id="print" class="sidebar-dropdown list-unstyled collapse">
                        <li class="sidebar-item"><a href="ตารางแผนการเรียน.php" class="sidebar-link">พิมพ์แผนการเรียน</a></li>
                        <li class="sidebar-item"><a href="ใบตรวจเช็คการจัดแผนการเรียน.php" class="sidebar-link">พิมพ์ใบตรวจเช็คการจัดแผนการเรียน</a></li>
                        <li class="sidebar-item"><a href="#" class="sidebar-link">พิมพ์ตารางเรียน</a></li>
                        <li class="sidebar-item"><a href="#" class="sidebar-link">พิมพ์ตารางบุคลากร</a></li>
                        <li class="sidebar-item"><a href="#" class="sidebar-link">พิมพ์ตารางห้องเรียน</a></li>
                        <li class="sidebar-item"><a href="#" class="sidebar-link">พิมพ์บัญชี</a></li>
                    </ul>
                </li>
            </ul>
            
            </ul>
            <div class="sidebar-footer">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>ออกจากระบบ</span>
                </a>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-4 py-3">
                <form action="#" class="d-none d-sm-inline-block">

                </form>
            </nav>
            <main class="content px-3">

                <button class="print" onclick="printPage()">พิมพ์</button>

                <div id="print-content">

                <p style="font-size: 18px; text-align: center;"><b>ใบตรวจเช็คการจัดการแผนการเรียน</b></p>
                <table class="schedule-table">
                    <thead >
                        <tr >
                            <td colspan="8" style="width: 85%;">
                                <p>แผนการจัดการเรียน</p>
                                <p>
                                    หลักสูตร 
                                    <select style="width: 55px;" id="yearSelect" name="level" required onchange="filterData()">
                                        <option value="ปวช.">ปวช.</option>
                                        <option value="ปวส.">ปวส.</option>
                                        <option value="ปวส. ม.6">ปวส. ม.6</option>
                                    </select>
                                    <?php
                                    require_once('command/conn.php');
                                    $query = "SELECT DISTINCT year FROM tb_plan";
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute();
    
                                    echo '<select id="year" name="year" required onchange="filterData()">';
                                    echo '<option value="">ปี</option>';
    
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        $year = $row['year'];
    
                                        // ใช้ปีเต็มเป็น value และแสดงปี 2 หลักสุดท้ายในตัวเลือก
                                        echo "<option value='$year'>$year</option>";
                                    }
                                    echo '</select>';
                                    ?>
                                    <label id="semester-info1">สำหรับนักเรียนรหัส</label>
    
                                    ก.
                                    <select id="group" name="group" required onchange="filterData()">
                                        <option value="1-2">1-2</option>
                                        <option value="3">3</option>
                                    </select>

                                </p>
                                <p>ประเภทวิชา อุตสาหกรรมดิจิทัลและเทคโนโลยีสารสนเทศ</p>
                                <p>กลุ่มอาชีพ ฮาร์ดแวร์</p>
                                <p>สาขาวิชา ช่างเทคนิคคอมพิวเตอร์</p>
                                <p>วิทยาลัยเทคนิคแพร่</p>
                                <p id="semester-info2">ปีการศึกษา</p>
                            </td>
                            <td style="width: 15%; vertical-align: top;">
                                
                                    <P>โครงสร้างหลักสูตร</P>
                                    <p id="semester-info3"></p>
                                    <p>สำนักงานคณะกรรมการ</p>
                                    <p>การอาชีวศึกษา</p>
                                    <p>กำหนดไว้</p>
                                
                            </td>

                        </tr>
                        <tr>
                            <td rowspan="2" style="width: 40%;">หมวดวิชา</td>
                            <td colspan="7" style="width: 45%;">แผนการเรียน</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>ภ.1</td>
                            <td>ภ.2</td>
                            <td>ภ.3</td>
                            <td>ภ.4</td>
                            <td>ภ.5</td>
                            <td>ภ.6</td>
                            <td>รวม</td>
                            <td></td>


                        </tr>
                    </thead>
                    <tbody id="table_result">
                        <tr>
                            <td style="width: 40%; text-align: left; border-top: 0; border-bottom: 0;" >1. หมวดวิชาสมรรถนะแกนกลาง</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>ไม่น้อยกว่า 20 นก.</td>
                        
                        </tr>
                        <tr>
                            <td style="width: 40%; text-align: left; border-top: 0; border-bottom: 0;">1.1 กลุ่มสมรรถนะภาษาและการสื่อสาร</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align: left;">ไม่น้อยกว่า 9</td>
                        
                        </tr>
                        <tr>
                            <td style="width: 40%; text-align: left; border-top: 0; border-bottom: 0;">1.2 กลุ่มสมรรถนะการคิดและการแก้ปัญหา</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align: left;">ไม่น้อยกว่า 6</td>
                        
                        </tr>
                        <tr>
                            <td style="width: 40%; text-align: left; border-top: 0; border-bottom: 0;">1.3 กลุ่มสมรรถนะทางสังคมและการดำรงชีวิต</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align: left;"> ไม่น้อยกว่า 5</td>
                        
                        </tr>
                        <tr>
                            <td style="width: 40%; text-align: left; border-top: 0; border-bottom: 0;">2. หมวดวิชาสมรรถนะวิชาชีพ</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>ไม่น้อยกว่า 70 นก.</td>
                        
                        </tr>
                        <tr>
                            <td style="width: 40%; text-align: left; border-top: 0; border-bottom: 0;">2.1 กลุ่มสมรรถนะวิชาชีพพื้นฐาน</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align: left;">ไม่น้อยกว่า 34</td>
                        
                        </tr>
                        <tr>
                            <td style="width: 40%; text-align: left; border-top: 0; border-bottom: 0;">2.2 กลุ่มสมรรถนะวิชาชีพเฉพาะ</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align: left;">ไม่น้อยกว่า 36</td>
                        
                        </tr>
                        <tr>
                            <td style="width: 40%; text-align: left; border-top: 0; border-bottom: 0;">3. หมวดวิชาเลือกเสรี</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td >ไม่น้อยกว่า 10</td>
                        
                        </tr>
                        <tr>
                            <td style="width: 40%; text-align: left; border-top: 0; border-bottom: 0;">4. กิจกรรมเสริมหลักสูตร</td>
                            <td></td>   
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align: left; ">2 ชั่วโมงต่อสัปดาห์</td>
                        
                        </tr>
                        <tr >
                            <td style="width: 40%; text-align: center;">รวมหน่วยกิต</td>
                            <td style="background-color: rgb(216, 249, 249);"></td>
                            <td style="background-color: rgb(216, 249, 249);"></td>
                            <td style="background-color: rgb(216, 249, 249);"></td>
                            <td style="background-color: rgb(216, 249, 249);"></td>
                            <td style="background-color: rgb(216, 249, 249);"></td>
                            <td style="background-color: rgb(216, 249, 249);"></td>
                            <td style="background-color: rgb(216, 249, 249);"></td>
                            <td style="text-align: left;">ไม่น้อยกว่า 100 นก.</td>
                        
                        </tr>
                    </tbody>
                </table>
                <script>
                    // ฟังก์ชัน adjustSelectWidth เพื่อปรับขนาดของ select แบบ manual
                    function adjustSelectWidth(selectElement, increaseWidth = false) {
                        if (increaseWidth) {
                            // เพิ่มขนาดให้ select เมื่อเลือก ปวส. ม.6
                            selectElement.style.width = "80px";  // กำหนดขนาดตามที่ต้องการ (สามารถปรับขนาดที่นี่ได้)
                        } else {
                            // ปรับขนาดเป็นปกติ
                            selectElement.style.width = "55px";  // รีเซ็ตเป็นขนาดปกติ
                        }
                    }

                    // ฟังก์ชัน filterData ที่จะใช้เพื่อกรองข้อมูลและอัปเดต select
                    function filterData() {
                        var level = $('#yearSelect').val();  // ค่าระดับการศึกษา
                        var year = $('#year').val();  // ค่าปีที่เลือก
                        var group = $('#group').val();  // ค่ากลุ่มแผนที่เลือก

                        // ส่งข้อมูลผ่าน AJAX ไปที่ไฟล์ filterData.php
                        $.ajax({
                            url: 'ใบตรวจfilter.php',  // ไฟล์ PHP ที่จะใช้ดึงข้อมูล
                            type: 'POST',
                            data: {
                                level: level,
                                year: year,
                                group: group
                            },
                            success: function (data) {
                                // อัปเดตตารางผลลัพธ์ที่แสดงใน #table_result
                                $('#table_result').html(data);
                            }
                        });

                        // อัปเดตข้อความใน th ของภาคเรียนที่ 1 และ 2
                        if (year) {
                            $('#semester-info1').text('สำหรับนักเรียนรหัส ' + year);
                            $('#semester-info2').text('ปีการศึกษา ' + year);
                            $('#semester-info3').text(level + ' ' + year);
                        } else {
                            $('#semester-info1').text('สำหรับนักเรียนรหัส');
                            $('#semester-info2').text('ปีการศึกษา');
                            $('#semester-info3').text(level + year);
                        }

                        // ปรับขนาด select ในกรณีที่เลือก "ปวส. ม.6"
                        const yearSelect = document.getElementById("yearSelect");

                        if (yearSelect) {
                            // ตรวจสอบว่าค่า level เป็น "ปวส. ม.6" หรือไม่
                            if (level === "ปวส. ม.6") {
                                adjustSelectWidth(yearSelect, true);  // ปรับขนาด
                            } else {
                                adjustSelectWidth(yearSelect, false);  // รีเซ็ตขนาด
                            }
                        }
                        if (yearFieldSelect) adjustSelectWidth(yearFieldSelect, false);
                        if (groupSelect) adjustSelectWidth(groupSelect, false);
                    }

                    // เรียกฟังก์ชันปรับขนาดเมื่อหน้าโหลด
                    $(document).ready(function () {
                        const yearSelect = document.getElementById("yearSelect");

                        if (yearSelect) adjustSelectWidth(yearSelect, false);  // ตรวจสอบและปรับขนาดเริ่มต้น
                    });
                </script>


    <table  class="schedule-table">
        <tr >
            <td style="border: 0; width: 50%;" >.................................................</td>
            <td style="border: 0; width: 50%;">.................................................</td>
        </tr>
        <tr >
            <td style="border: 0; width: 50%;" >หัวหน้าแผนกเทคนิคคอมพิวเตอร์</td>
            <td style="border: 0; width: 50%;">หัวหน้างานพัฒนาหลักสูตรการเรียนการสอน</td>
        </tr>
        <tr >
            <td style="border: 0; width: 50%;" >วันที่.............................</td>
            <td style="border: 0; width: 50%;">วันที่.............................</td>
        </tr>
    </table>
                </div>
            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-body-secondary">
                        <div class="col-6 text-start ">
                            <a class="text-body-secondary" href=" #">
                                <strong></strong>
                            </a>
                        </div>
                        <div class="col-6 text-end text-body-secondary d-none d-md-block">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <a class="text-body-secondary" href="#"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-body-secondary" href="#"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-body-secondary" href="#"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script>
            function prepareForPrint() {
                var selects = document.querySelectorAll("select");
                selects.forEach(function(select) {
                    var selectedOption = select.options[select.selectedIndex]?.text || ""; // ข้อความที่เลือก
                    var span = document.createElement("span"); // แปลงเป็น <span>
                    span.textContent = selectedOption;
                    span.classList.add("print-value"); // กำหนดคลาสเผื่อใช้ CSS
                    select.style.display = "none"; // ซ่อน select (ถ้าต้องการ)
                    select.parentNode.insertBefore(span, select.nextSibling); // ใส่ <span> หลัง select
                });
            }



            function printPage() {
                prepareForPrint(); // เรียกฟังก์ชันเตรียมข้อมูลสำหรับพิมพ์

                var content = document.getElementById("print-content").innerHTML; 
                var originalContent = document.body.innerHTML;

                document.body.innerHTML = content; // แสดงเฉพาะเนื้อหาที่ต้องการ
                window.print();
                document.body.innerHTML = originalContent; // คืนค่าหน้าปกติหลังพิมพ์
            }
        
        //<----------------------------------------->

        function setPlaceholder(id) {
        const editableElement = document.getElementById(id);
        
        // ตรวจสอบว่า content ว่างหรือไม่ ถ้าว่างให้ตั้งค่า placeholder
        if (editableElement.textContent.trim() === '') {
            if (id === 'editable1') {
                editableElement.textContent = '(กรุณากรอกชื่อบุคคล)';  // ข้อความ placeholder สำหรับ editable1
            } else if (id === 'editable2') {
                editableElement.textContent = 'กรุณากรอกตำแหน่ง';  // ข้อความ placeholder สำหรับ editable2
            }
        }
    }

    // ฟังก์ชันลบ placeholder เมื่อเริ่มพิมพ์
    function clearPlaceholder(id) {
        const editableElement = document.getElementById(id);
        
        // ถ้าผู้ใช้เริ่มพิมพ์หรือคลิกให้ลบ placeholder
        if ((id === 'editable1' && editableElement.textContent === '(กรุณากรอกชื่อบุคคล)') ||
            (id === 'editable2' && editableElement.textContent === 'กรุณากรอกตำแหน่ง')) {
            editableElement.textContent = '';
        }
    }

    // เริ่มต้นตั้งค่า placeholder เมื่อโหลดหน้า
    window.onload = function() {
        setPlaceholder('editable1');
        setPlaceholder('editable2');
    };



    document.getElementById('yearSelect').addEventListener('change', function() {
        var year = this.value;
        var semesterSelect = document.getElementById('semesterSelect');
        var options = semesterSelect.getElementsByTagName('option');
        
        // รีเซ็ตการแสดงผลของตัวเลือกทั้งหมดให้แสดง
        for (var i = 0; i < options.length; i++) {
            options[i].style.display = 'block';
        }
        
        // ถ้าเลือก 'ปวส.' หรือ 'ปวส. ม.6' ให้ซ่อนตัวเลือกที่ 5 และ 6
        if (year === 'ปวส.' || year === 'ปวส. ม.6') {
            options[2].style.display = 'none';  // ซ่อนตัวเลือกที่ 3 (5,6)
        }
    });
    </script>

    <script src="js/ตารางแผนการเรียน.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="js/dashhh.js"></script>
</body>

</html>