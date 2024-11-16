<?php

session_start();
include '../db/connectDB.php';


if ($_SESSION['mode'] == 'add') {
        $name = $_POST['name'];
        $sername = $_POST['sername'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $status = 10;

        // echo $name;
        // echo $sername;
        // echo $username;
        // echo $password;
        // echo $phone;
        // echo $status;

        $sql = "INSERT INTO tbuser (name, sername, username, password,phone,status)
                    VALUES ('$name','$sername','$username','$password','$phone','$status');";
        $conn->query($sql);
        header("refresh:0,url=manageuser.php");
}

if ($_SESSION['mode'] == 'edit') {
        $id = $_POST['iduser'];
        $name = $_POST['name'];
        $sername = $_POST['sername'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $status = 10;

        // echo $name;
        // echo $sername;
        // echo $username;
        // echo $password;
        // echo $phone;
        // echo $status;

        $sql = "UPDATE tbuser 
                SET name = '$name', 
                sername = '$sername', 
                username = '$username', 
                password = '$password', 
                phone = '$phone', 
                status = '$status' 
                WHERE iduser = '$id';
                ";
        $conn->query($sql);
        header("refresh:0,url=manageuser.php");
}
