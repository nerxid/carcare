<?php 
    
    @session_start();
    include '../db/connectDB.php';
    $id = $_GET['id'];
    $sql = "UPDATE tbtypecar
               SET status = 'ยกเลิก'
               WHERE typeid = '$id' ";

    if($conn->query($sql)){
        header("refresh:0,url=managetypecar.php");
    }else{
    echo 'error';
    }
?>