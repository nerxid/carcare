<?php 

    @session_start();
    $mode = $_SESSION['mode'];

    include_once('../db/connectDB.php');

    // echo '<pre>',print_r($_POST),'</pre>';  



    // mode add

    if($mode == "add"){

        
        $menuid = $_POST['menuid'];
        $menuname = $_POST['menuname'];
        $status = '10';
        $price = $_POST['price'];
        $typeid = $_POST['typeid'];
    
    
        $sql = "INSERT INTO tbmenu(menuid,menuname,status,price,typeid)
        VALUE('$menuid','$menuname','$status','$price', '$typeid')";
    
        $query = $conn->query($sql);
        header("refresh:0,url=managestatus.php");

    //  mode edit
    }
    
    if($mode == "edit"){

        $menuid = $_POST['menuid'];
        $menuname = $_POST['menuname'];
        $status = $_POST['status'];
        $price = $_POST['price'];
    
    
        $sql = "UPDATE tbmenu SET
                   menuname = '$menuname',
                   status= '$status',
                   price = '$price'
                   WHERE menuid = '$menuid'";
    
        $query = $conn->query($sql);
         header("refresh:0,url=managestatus.php");
    }


?>