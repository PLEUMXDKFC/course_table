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
    <link rel="stylesheet" href="css/ตารางแผนการเรียน.css">
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
                        <li class="sidebar-item"><a href="#" class="sidebar-link">พิมพ์แผนการเรียน</a></li>
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

                    <table class="table-container">
                        <thead>
                            <tr>
                                <th colspan="15">
    
                                    แผนการเรียน
                                    <select id="yearSelect" name="level" required onchange="filterData()">
                                        <option value="ปวช.">ประกาศนียบัตรวิชาชีพ(ปวช.)</option>
                                        <option value="ปวส.">ประกาศนียบัตรวิชาชีพชั้นสูง(ปวส.)</option>
                                        <option value="ปวส. ม.6">ประกาศนียบัตรวิชาชีพชั้นสูง(ปวส. ม.6)</option>
                                    </select>
                                    ชั้นปีที่
                                    <select id="semesterSelect" name="term" required onchange="filterData()">
                                        <option value="1,2">1</option>
                                        <option value="3,4">2</option>
                                        <option value="5,6">3</option>
                                    </select>
    
                                    รหัส
                                    <?php
                                    require_once('command/conn.php');
                                    $query = "SELECT DISTINCT year FROM tb_plan";
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute();
    
                                    echo '<select id="year" name="year" required onchange="filterData()">';
                                    echo '<option value="">ปี</option>';
    
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        $year = $row['year'];
                                        $shortYear = substr($year, -2); // ปี 2 หลักสุดท้ายที่จะแสดง
    
                                        // ใช้ปีเต็มเป็น value และแสดงปี 2 หลักสุดท้ายในตัวเลือก
                                        echo "<option value='$year'>$shortYear</option>";
                                    }
                                    echo '</select>';
                                    ?>
    
                                    ก.
                                    <select id="group" name="group" required onchange="filterData()">
                                        <option value="1-2">1-2</option>
                                        <option value="3">3</option>
                                    </select>
    
                                </th>
                            </tr>
                            <tr>
                                <th colspan="5" id="semester-info1">ภาคเรียนที่ 1 ปีการศึกษา</th>
                                <th colspan="5" id="semester-info2">ภาคเรียนที่ 2 ปีการศึกษา</th>
                            </tr>
                            <tr>
                                <th style="text-align: center;" colspan="5" contenteditable="true">ลักษณะงาน : </th>
                                <!-- ตาราง 2 -->
                                <th style="text-align: center;" colspan="5" contenteditable="true">ลักษณะงาน : </th>
                            </tr>
                            <tr>
                                <th style="width: 8%;">รหัสวิชา</th>
                                <th>ชื่อวิชา</th>
                                <th style="width: 4%;">ท</th>
                                <th style="width: 4%;">ป</th>
                                <th style="width: 4%;">น</th>
                                <!-- ตาราง 2 -->
                                <th style="width: 8%;">รหัสวิชา</th>
                                <th>ชื่อวิชา</th>
                                <th style="width: 4%;">ท</th>
                                <th style="width: 4%;">ป</th>
                                <th style="width: 4%;">น</th>
                            </tr>
                        </thead>
            
                        <tbody id="table_result">
                            <!-- Data will be dynamically loaded here -->
                        </tbody>
                    </table>
                                    
                    <script>  
                        function filterData() {
                            var level = $('#yearSelect').val();  // ค่าระดับการศึกษา
                            var term = $('#semesterSelect').val();  // ค่าภาคเรียนที่เลือก
                            var year = $('#year').val();  // ค่าปีที่เลือก
                            var group = $('#group').val();  // ค่ากลุ่มแผนที่เลือก
                            
                            // ตรวจสอบว่า term เป็น array หรือไม่
                            if (Array.isArray(term)) {
                                term = term.join(',');  // แปลงเป็น string "1,2"
                            }

                            // ส่งข้อมูลผ่าน AJAX ไปที่ไฟล์ filterData.php
                            $.ajax({
                                url: 'filterData.php',  // ไฟล์ PHP ที่จะใช้ดึงข้อมูล
                                type: 'POST',
                                data: {
                                    level: level,
                                    term: term,  // ส่งค่า term แบบ string
                                    year: year,
                                    group: group
                                },
                                success: function(data) {
                                    // อัปเดตตารางผลลัพธ์ที่แสดงใน #table_result
                                    $('#table_result').html(data);
                                }
                            });

                            // อัปเดตข้อความใน th ของภาคเรียนที่ 1 และ 2
                            if (year) {
                                // ถ้ามีปีที่เลือก
                                $('#semester-info1').text('ภาคเรียนที่ 1 ปีการศึกษา ' + year);
                                $('#semester-info2').text('ภาคเรียนที่ 2 ปีการศึกษา ' + year);
                            } else {
                                // ถ้าไม่ได้เลือกปี
                                $('#semester-info1').text('ภาคเรียนที่ 1 ปีการศึกษา');
                                $('#semester-info2').text('ภาคเรียนที่ 2 ปีการศึกษา');
                            }
                        }
    
                    </script>
                    <div class="footer">
                        <div class="space">
                            <p>-----------------------------------------</p>
                            <p contenteditable="true" id="editable1" onfocus="clearPlaceholder('editable1')" onblur="setPlaceholder('editable1')"></p>
                            <p contenteditable="true" id="editable2" onfocus="clearPlaceholder('editable2')" onblur="setPlaceholder('editable2')"></p>
                            </div>
                        <div class="space">
                            <p>-----------------------------------------</p>
                            <p>(นายนพดล ฟุ่มเฟื่อย)</p>
                            <p>หัวหน้างานพัฒนาหลักสูตรการเรียนการสอน</p>
                        </div>
                        <div class="space">
                            <p>-----------------------------------------</p>
                            <p>(นายสมเกียรติ สถิตย์)</p>
                            <p>รองผู้อำนวยการฝ่ายวิชาการ</p>
                        </div>
                        <div class="space">
                            <p>-----------------------------------------</p>
                            <p>(นายอัศวิน ข่มอาวุธ)</p>
                            <p>ผู้อำนวยการวิทยาลัยเทคนิคแพร่</p>
                        </div>
                    </div>
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
        function printPage() {
            var content = document.getElementById("print-content").innerHTML; // เลือกส่วนที่ต้องการพิมพ์
            var originalContent = document.body.innerHTML;  // เก็บเนื้อหาต้นฉบับ
            document.body.innerHTML = content;  // เปลี่ยนเนื้อหาของหน้าให้แสดงเฉพาะที่ต้องการพิมพ์
            window.print();  // เรียกใช้หน้าต่างพิมพ์
            document.body.innerHTML = originalContent;  // คืนค่าหน้าเดิมหลังจากพิมพ์เสร็จ
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