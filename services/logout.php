<?php 
     session_start();
     $_SESSION['login'] = false;
     header("refresh:0,url=../index.php");
?>