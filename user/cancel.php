<?php 
    
    @session_start();
    include '../db/connectDB.php';
    $id = $_GET['id'];
    $sql = "UPDATE tbuser
               SET status = 'ยกเลิก'
               WHERE iduser = '$id' ";

    if($conn->query($sql)){
        $sql = "UPDATE tbcaruser
        SET status = 'ยกเลิก'
        WHERE iduser = '$id' ";
        $conn->query($sql);
        header("refresh:0,url=manageuser.php");
    }else{
    echo 'error';
    }
?>