<?php
    require_once('command/conn.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


    <link rel="stylesheet" href="dash.css">
    <link rel="stylesheet" href="css/index1.css">
    <link rel="stylesheet" href="css/ตารางแผนการเรียน2.css">
    <link rel="stylesheet" href="checktest.css">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="bi bi-house"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">แผนการเรียน</a>
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
            <main class="content px-3 py-4">

            <label>ชั้นปี</label>
                <select id="yearSelect" style="margin-right: 20px;" onchange="filterData()">
                    <option value="">ทั้งหมด</option>
                    <option value="ปวช.">ปวช.</option>
                    <option value="ปวส.">ปวส.</option>
                    <option value="ปวส. ม.6">ปวส. ม.6</option>
                </select>

                <label>ภาคเรียน:</label>
                <select id="semesterSelect" style="margin-right: 20px;" onchange="filterData()">
                    <option value="">ทั้งหมด</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>

                <label>ปีการศึกษา:</label>
                <?php
                    require_once('command/conn.php');
                    $query = "SELECT DISTINCT year FROM tb_plan";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();

                    echo '<select style="margin-bottom: 20px;" id="year" name="year" onchange="filterData()">';
                    echo '<option value="">ทั้งหมด</option>';
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $year = $row['year'];
                        echo "<option value='$year'>$year</option>";
                    }
                    echo '</select>';
                ?>
                <label for="category">หมวด:</label>
                <select id="category" name="category" onchange="filterData()">
                    <option value="">ทั้งหมด</option>
                    <option value="หมวดวิชาสมรรถนะแกนกลาง">หมวดวิชาสมรรถนะแกนกลาง</option>
                    <option value="หมวดวิชาสมรรถนะวิชาชีพ">หมวดวิชาสมรรถนะวิชาชีพ</option>
                    <option value="หมวดวิชาเลือกเสรี">หมวดวิชาเลือกเสรี</option>
                    <option value="กิจกรรมเสริมหลักสูตร">กิจกรรมเสริมหลักสูตร</option>
                    <option value="รายวิชาปรับพื้นฐาน">รายวิชาปรับพื้นฐาน</option>
                </select>

                <label for="group">กลุ่ม:</label>
                <select id="groupSelect" name="group" onchange="filterData()" style="margin-right: 20px;">
                    <option value="">ทั้งหมด</option>
                    <option value="1-2">1-2</option>
                    <option value="3">3</option>
                </select>



                <a href="addข้อมูลตารางแผนการเรียน.php" class="add"><i class="fa-solid fa-plus" style="margin-right: 5px;"></i>Add</a>

                <table class="table2">
                    <thead>
                        <tr>
                            <th>ภาคเรียนที่</th>
                            <th>ชั้นปี</th>
                            <th>กลุ่ม</th>
                      
                            <th>กลุ่มแผน</th>
                            <th>รหัสวิชา</th>
                            <th>ปีหลักสูตรรายวิชา</th>
                            <th>ชื่อวิชา</th>
                            <th>ประเภท</th>
                            <th>หน่วยกิต</th>
                            <th>การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody id="filteredData">
                        <!-- ผลลัพธ์จะแสดงที่นี่ -->
                    </tbody>
                </table><br>
                

                <button class="print" onclick="printPage()">พิมพ์</button>

                <div id="print-content">

                    <table class="table-container">
                        <thead>
                            <tr>
                                <th colspan="15">
                                    <div id="result1"></div>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="5" id="semester-info1">ภาคเรียนที่ 1 ปีการศึกษา</th>
                                <th colspan="5" id="semester-info2">ภาคเรียนที่ 2 ปีการศึกษา</th>
                            </tr>
                            <tr>
                                <th style="text-align: center;" colspan="5" contenteditable="true">ลักษณะงาน :&nbsp;</th>
                                <!-- ตาราง 2 -->
                                <th style="text-align: center;" colspan="5" contenteditable="true">ลักษณะงาน :&nbsp;</th>
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
            

                <script>
function filterData() {
    const level = $('#yearSelect').val() || "ทั้งหมด"; // ชั้นปี
    const term = $('#semesterSelect').val() || "ทั้งหมด"; // ภาคเรียน
    const year = $('#year').val() || "ทั้งหมด"; // ปีการศึกษา
    const category = $('#category').val() || "ทั้งหมด"; // หมวด
    const group = $('#groupSelect').val() || "ทั้งหมด"; // กลุ่ม

    // กำหนดชั้นปีจากภาคเรียน
    let gradeLevel = "";
    if (term === "1" || term === "2") {
        gradeLevel = "ชั้นปีที่ 1";
    } else if (term === "3" || term === "4") {
        gradeLevel = "ชั้นปีที่ 2";
    } else if (term === "5" || term === "6") {
        gradeLevel = "ชั้นปีที่ 3";
    }

    // อัปเดตแสดงชั้นปีในหน้าเว็บ
    $('#gradeLevelDisplay').html(`ระดับชั้น: ${gradeLevel || "ทั้งหมด"}`);

    // เรียก prepareForPrint โดยส่งค่าตัวแปรทั้งหมด
    prepareForPrint({
        level: level,
        term: term,
        year: year,
        category: category,
        group: group,
        gradeLevel: gradeLevel,
    });

    // ส่งข้อมูลไปยัง PHP
    $.ajax({
        url: 'filterData-add_table.php', // URL ที่จะไปดึงข้อมูล
        type: 'GET',
        data: {
            level: level,
            term: term,
            year: year,
            category: category,
            group: group
        },
        success: function(data) {
            $('#filteredData').html(data); // แสดงผลในตาราง
        },
        error: function() {
            $('#filteredData').html('<p>ไม่สามารถดึงข้อมูลได้</p>');
        }
    });
}

function prepareForPrint(data) {
    // ใช้ค่าที่ส่งมาจาก filterData
    const { level, term, year, group, gradeLevel } = data;

    let yearlevel = "";
    if (level === "ปวช.") {
        yearlevel = "ประกาศนียบัตรวิชาชีพ (ปวช.)";
    } else if (level === "ปวส.") {
        yearlevel = "ประกาศนียบัตรวิชาชีพชั้นสูง (ปวส.)";
    } else if (level === "ปวส. ม.6") {
        yearlevel = "ประกาศนียบัตรวิชาชีพชั้นสูง (ปวส. ม.6)";
    }

    const shortYear = year ? year.slice(-2) : "ทั้งหมด";

    const semesterInfo1 = document.getElementById('semester-info1');
    const semesterInfo2 = document.getElementById('semester-info2');
    semesterInfo1.innerHTML = `ภาคเรียนที่ 1 ปีการศึกษา ${year || "ทั้งหมด"}`;
    semesterInfo2.innerHTML = `ภาคเรียนที่ 2 ปีการศึกษา ${year || "ทั้งหมด"}`;

    // แสดงข้อมูลที่เลือก
    const resultContainer = document.getElementById('result1');
    resultContainer.innerHTML = `
        <p style="margin: 0; padding: 0; justify-content: center; align-items: center;">
            แผนการเรียน${yearlevel || "ทั้งหมด"}
            ${gradeLevel || "ทั้งหมด"}
            รหัส ${shortYear || "ทั้งหมด"}
            ก. ${group || "ทั้งหมด"}
        </p>
    `;
}

// เรียกใช้ฟังก์ชัน filterData อัตโนมัติเมื่อโหลดหน้า
$(document).ready(function() {
    filterData();
});



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

    function updateTable(checkbox) {
    const checkboxes = document.querySelectorAll('.data-checkbox:checked');
    const subjectIds = [];
    const terms = [];

    checkboxes.forEach(cb => {
        subjectIds.push(cb.getAttribute('data-id'));
        terms.push(cb.getAttribute('data-term'));
    });

    fetch('update_table.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ subjectIds, terms }),
    })
        .then(response => response.json())
        .then(data => {
            if (data && data.html !== undefined) {
                document.getElementById('table_result').innerHTML = data.html;
            } else {
                console.error('Error: Invalid response format.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('เกิดข้อผิดพลาดในการโหลดข้อมูล กรุณาลองใหม่อีกครั้ง');
        });
}




                </script>
            </main>
            <footer class="footer">
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="js/dashhh.js"></script>
    <script src="js/ตารางแผนการเรียน.js"></script>

    <script>
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