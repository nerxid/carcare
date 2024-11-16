<?php 

    include '../db/connectDB.php';
    $name = $_POST['name'];
    $Lastname = $_POST['Lastname'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = 10;
    // echo $name;
    // echo $Lastname;
    // echo $phone;
    // echo $username;
    // echo $password;
    $sql = "INSERT INTO tbuser (name, sername, username, password,phone,status)
    VALUES ('$name','$sername','$username','$password','$phone','$status');";
    $conn->query($sql);
    header("refresh:0,url=signin.php");


?>