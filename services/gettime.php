<?php 
include_once('../db/connectDB.php');
include('../center/linkcss.php');

session_start(); // เริ่ม session

$sql = "SELECT * FROM `tbtime`";
$result = $conn->query($sql);

$opt = '<option value="">--- Select Time ---</option>';

if ($result->num_rows > 0) {
    foreach ($result as $row) {
        // เพิ่มการตรวจสอบว่าค่า id ตรงกับ idtype ที่ส่งมาหรือไม่ เพื่อเลือกค่าอัตโนมัติ
        $opt .= '<option value="'. $row['id'] .'" '. $selected .'>'. $row['time'] .'</option>';
    }
} else {
    $opt .= '<option value="">ไม่พบข้อมูล</option>';
}

echo $opt;
?>
