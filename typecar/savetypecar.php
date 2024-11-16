<?php 

    @session_start();
    $mode = $_SESSION['mode'];

    include_once('../db/connectDB.php');

    // echo '<pre>',print_r($_POST),'</pre>';  



    // mode add

    if($mode == "add"){

        
        $typeid = $_POST['typeid'];
        $typename = $_POST['typename'];
        $status = 'ใช้';
        $size = $_POST['size'];
    
    
        $sql = "INSERT INTO tbtypecar(typeid,typename,status,size)
        VALUE('$typeid','$typename','$status','$size')";
    
        $query = $conn->query($sql);
        header("refresh:0,url=managetypecar.php");

    //  mode edit
    }
    
    if($mode == "edit"){

        $typeid = $_POST['typeid'];
        $typename = $_POST['typename'];
        $status = $_POST['status'];
        $size = $_POST['size'];
    
    
        $sql = "UPDATE tbtypecar SET
                   typename = '$typename',
                   status= '$status',
                   size = '$size'
                   WHERE typeid = '$typeid'";
    
        $query = $conn->query($sql);
         header("refresh:0,url=managetypecar.php");
    }


?>