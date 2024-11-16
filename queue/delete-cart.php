<?php 
session_start();
$id = $_GET['id'];
$cart = $_SESSION['cart'];

// ตรวจสอบว่า $_SESSION['cart'] เป็นอาร์เรย์
for ($i=0; $i < count($cart) ; $i++) { 
    if ($cart[$i] == $id) {
        unset($cart[$i]);
        $_SESSION['cart'] = $cart;
    }
}

// ลบคอมเมนต์ด้านล่างเมื่อโค้ดทำงานถูกต้อง
 header("refresh:0; url=http://localhost/MIS/queue/cart.php");
?>
