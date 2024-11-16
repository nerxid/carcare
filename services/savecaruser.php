<?php 

        session_start();
        include '../db/connectDB.php';

        //print_r($_POST);
        if($_SESSION['mode'] == 'add'){
            $number = $_POST['number'];
            $idtype = $_POST['idtype'];
            $iduser = $_SESSION['iduser'];
            $color_car = $_POST['color_car'];
            $status = 10;

        //     echo $name;
        //     echo $sername;
        //     echo $username;
        //     echo $password;
        //     echo $phone;
        //     echo $status;

            $sql = "INSERT INTO tbcaruser (number, idtype, iduser, color,status)
                    VALUES ('$number','$idtype','$iduser','$color_car','$status');";
           if($conn->query($sql)){
            header("refresh:0,url=http://localhost/MIS/mycar/index.php");
           }
        }

        if($_SESSION['mode'] == 'edit'){
            $id = $_POST['id'];
            $number = $_POST['number'];
            $idtype = $_POST['idtype'];
            $iduser = $_SESSION['iduser'];
            $color_car = $_POST['color_car'];
            $status = 10;

        //     echo $name;
        //     echo $sername;
        //     echo $username;
        //     echo $password;
        //     echo $phone;
        //     echo $status;

            $sql = "UPDATE tbcaruser 
           SET idtype='$idtype', iduser='$iduser', color='$color_car', status='$status' 
           WHERE idcar='$id';";
           if($conn->query($sql)){
            header("refresh:0,url=http://localhost/MIS/mycar/index.php");
           }
        }

?>