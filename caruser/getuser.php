<?php 
include_once('../db/connectDB.php');
include('../center/linkcss.php');

session_start(); // เริ่ม session

// ตรวจสอบว่ามีการรับค่า iduser ผ่าน POST มาหรือไม่
$iduser = isset($_POST['iduser']) ? $_POST['iduser'] : '';

$sql = "SELECT iduser, name ,status
        FROM tbuser
        WHERE status = '10'";
$result = $conn->query($sql);

$opt = '<option value="">---Select Type Car---</option>';

if ($result->num_rows > 0) {
    foreach ($result as $row) {
        // เพิ่มการตรวจสอบว่าค่า typeid ตรงกับ iduser ที่ส่งมาหรือไม่ เพื่อเลือกค่าอัตโนมัติ
        $selected = ($row['iduser'] == $iduser) ? 'selected' : '';
        $opt .= '<option value="'. $row['iduser'] .'" '. $selected .'>'. $row['name'] .'</option>';
    }
} else {
    $opt .= '<option value="">ไม่พบข้อมูล</option>';
}

echo $opt;
?>
