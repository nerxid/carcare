<?php 
    session_start();
    include '../db/connectDB.php';
    $_SESSION['login']='';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = 10;
  
    $sql = "SELECT username,iduser,password,status FROM tbuser WHERE username = '$username' AND status = '$status'";
    $result = $conn->query($sql);

    foreach($result as $row){
        if($password == $row['password']){
            //echo 'pass';
            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['iduser'] = $row['iduser'];
            if ($username == 'admin') {
                header("refresh:0,url=../manages.php");
            }else{
                header("refresh:0,url=../index.php");
            }
        }
        else{
            echo'Error';
        }
    }

    //header("refresh:0,url=signin.php");

?>