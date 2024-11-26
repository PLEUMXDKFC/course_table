<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $items = $_POST['items'] ?? []; // รับค่าจาก AJAX
    $output = '';

    if (!empty($items)) {
        foreach ($items as $index => $item) {
            $output .= "<tr>";
            $output .= "<td>" . ($index + 1) . "</td>"; // ลำดับการกด
            $output .= "<td>" . htmlspecialchars($item) . "</td>"; // ชื่อรายการ
            $output .= "</tr>";
        }
    } else {
        $output = "<tr><td colspan='2'>คุณไม่ได้เลือกอะไรเลย</td></tr>";
    }

    echo $output;
}
?>