<?php 
    include '../db/connectDB.php';
    $id = $_GET['id'];

    $sql = "UPDATE tbcaruser 
    SET status = 'ยกเลิก'
    WHERE idcar='$id';";
    if($conn->query($sql)){
     header("refresh:0,url=managecaruser.php");
    }

?>