<!DOCTYPE html>
<html>
<head>
    <title>Checkbox to Table with PHP (Order by Click)</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h3>เลือกสิ่งที่ต้องการ:</h3>
    <form id="checkboxForm">
        <input type="checkbox" name="items[]" value="Apple"> Apple<br>
        <input type="checkbox" name="items[]" value="Banana"> Banana<br>
        <input type="checkbox" name="items[]" value="Cherry"> Cherry<br>
        <input type="checkbox" name="items[]" value="Date"> Date<br>
    </form>

    <h3>รายการที่เลือก:</h3>
    <table border="1" id="resultTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Item</th>
            </tr>
        </thead>
        <tbody>
            <!-- ผลลัพธ์จะแสดงที่นี่ -->
        </tbody>
    </table>

    <script>
        $(document).ready(function () {
            // เก็บรายการที่เลือกในลำดับการกด
            let selectedItems = [];

            // ฟังก์ชันอัปเดตตาราง
            function updateTable() {
                // ส่งข้อมูลไปยัง PHP ผ่าน AJAX
                $.ajax({
                    url: "test2.php",
                    method: "POST",
                    data: { items: selectedItems },
                    success: function (response) {
                        // แสดงผลลัพธ์ในตาราง
                        $("#resultTable tbody").html(response);
                    },
                });
            }

            // เมื่อคลิกเช็คบ็อกซ์
            $('input[name="items[]"]').on("change", function () {
                const value = $(this).val();
                if ($(this).is(":checked")) {
                    // เพิ่มค่าไปยังลำดับสุดท้าย
                    selectedItems.push(value);
                } else {
                    // เอาค่าออกจากรายการ
                    selectedItems = selectedItems.filter(item => item !== value);
                }
                // อัปเดตตาราง
                updateTable();
            });

            // อัปเดตตารางเริ่มต้น
            updateTable();
        });
    </script>
</body>
</html>