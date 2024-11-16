<?php 
include_once('../db/connectDB.php');
include('../center/linkcss.php');

session_start(); // เริ่ม session

// ตรวจสอบว่ามีการรับค่า idtype ผ่าน POST มาหรือไม่
$idtype = isset($_POST['idtype']) ? $_POST['idtype'] : '';

$sql = "SELECT typeid, typename 
        FROM tbtypecar
        WHERE status = 'ใช้'";
$result = $conn->query($sql);

$opt = '<option value="">---Select Type Car---</option>';

if ($result->num_rows > 0) {
    foreach ($result as $row) {
        // เพิ่มการตรวจสอบว่าค่า typeid ตรงกับ idtype ที่ส่งมาหรือไม่ เพื่อเลือกค่าอัตโนมัติ
        $selected = ($row['typeid'] == $idtype) ? 'selected' : '';
        $opt .= '<option value="'. $row['typeid'] .'" '. $selected .'>'. $row['typename'] .'</option>';
    }
} else {
    $opt .= '<option value="">ไม่พบข้อมูล</option>';
}

echo $opt;
?>
