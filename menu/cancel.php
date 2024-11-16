<?php 
    
    @session_start();
    include '../db/connectDB.php';
    $id = $_GET['id'];
    $sql = "UPDATE tbmenu
               SET status = 'ยกเลิก'
               WHERE menuid = '$id' ";

    if($conn->query($sql)){
        header("refresh:0,url=managestatus.php");
    }else{
    echo 'error';
    }
?>