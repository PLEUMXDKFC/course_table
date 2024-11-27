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

    <link rel="stylesheet" href="css/dash.css">
    <link rel="stylesheet" href="css/add_table.css">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-protection"></i>
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
                        <li class="sidebar-item"><a href="index2.php" class="sidebar-link">รายชื่อครูผู้สอน</a></li>
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

                <a href="add2.php" class="add" style="margin-top: 15px;"><i class="fa-solid fa-plus" style="margin-right: 5px; margin-top"></i>Add</a>

                <table>
                    <thead>
                        <tr>
                            <th>คำนำหน้า</th>
                            <th>ชื่อครูผู้สอน</th>
                            <th>วุฒิ</th>
                            <th>หน้าที่พิเศษ</th>
                            <th>การจัดการ</th>
                            
                        </tr>
                    </thead>
                    <tbody id="filteredData">
                        <!-- ผลลัพธ์จะแสดงที่นี่ -->                       
                    </tbody>
                </table>
               
                <script>
                    function filterData() {
                        const level = $('#yearSelect').val(); // ชั้นปี
                        const term = $('#semesterSelect').val(); // ภาคเรียน
                        const year = $('#year').val(); // ปีการศึกษา

                        $.ajax({
                            url: 'filterData-add_table2.php', // URL ที่จะไปดึงข้อมูล
                            type: 'GET',
                            data: {
                                level: level, // ส่งค่าชั้นปี
                                term: term,   // ส่งค่าภาคเรียน
                                year: year    // ส่งค่าปีการศึกษา
                            },
                            success: function(data) {
                                $('#filteredData').html(data); // แสดงผลในตาราง
                            },
                            error: function() {
                                $('#filteredData').html('<p>ไม่สามารถดึงข้อมูลได้</p>');
                            }
                        });
                    }

                    // เรียกใช้ฟังก์ชัน filterData อัตโนมัติเมื่อโหลดหน้า
                    $(document).ready(function() {
                        filterData();
                    });
                </script>
            </main>
            <footer class="footer">
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="dashhh.js"></script>

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