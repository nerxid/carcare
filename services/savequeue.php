<?php 

session_start();
include '../db/connectDB.php';

$time = $_POST['idtime'];
$date = date("Y-m-d");

$Lastid = "SELECT queue
            FROM queue
            ORDER BY queue * 1 DESC LIMIT 1";

$resultLastid = $conn->query($Lastid);   
if ($resultLastid->num_rows > 0) {     
    foreach ($resultLastid as $rowL) {
        echo $rowL['queue'];
        $id = $rowL['queue'];
        $queue = $id + 1;
        echo $queue;
    }           
} else {
    $queue = 1;
}

// เตรียมค่าที่จำเป็นสำหรับการแทรก
$number = $_POST['number']; // เพิ่มการเก็บค่าจาก POST
$menu = json_encode($_SESSION['cart']); // แปลงอาร์เรย์เป็น JSON
$totalprice = $_POST['totalprice'];
$iduser = $_SESSION['iduser'];

// คำสั่ง SQL สำหรับแทรกข้อมูล
$sql = "INSERT INTO queue (queue, number, menu, totalprice, time, iduser, date) VALUES (?, ?, ?, ?, ?, ?, ?)";

// เตรียมคำสั่ง
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $queue, $number, $menu, $totalprice, $time, $iduser, $date);

// ตรวจสอบการดำเนินการ
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error; // เปลี่ยนให้แสดงข้อผิดพลาดจาก statement
}

// ปิดการเชื่อมต่อ
$stmt->close();
$conn->close();
$_SESSION['cart'] = '';
$_SESSION['cart'] = [];
// เปลี่ยนเส้นทางผู้ใช้
header("Location: http://localhost/MIS/queue/queue.php?id=" . urlencode($queue));
exit(); // ควรใช้ exit() หลัง header
?>
