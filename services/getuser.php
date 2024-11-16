<?php 
include_once('../db/connectDB.php');
include('../center/linkcss.php');

@session_start(); //@หน้า session เอาไว้เช็คว่า session ยังอยู่ไหม

$sql = "SELECT iduser , name
              FROM tbuser
              WHERE status = 'ใช้'";
$result = $conn->query($sql);
//echo $sql;exit(); //ใช้ดีบัค sql
$opt = '<option value="">---เลือกเจ้าของ---</option>';
foreach ($result as $row) {
    //ทำตัวเเปรฝากข้อมูล
    $opt .='<option value="'. $row['iduser'] .'">'.  $row['name'] .'</option>';
  }
echo $opt;
?>