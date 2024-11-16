<?php
    @session_start();
    $_SESSION['mode'] = "view";

    include '../db/connectDB.php';
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT statusid,statusname
                    FROM tbstatus
                    WHERE statusid = '$id'";
        // echo $sql; exit ();

        $query = $conn->query($sql);
        if($query->num_rows > 0){
            $rs = $query->fetch_assoc();
            $statusname = $rs['statusname'];
        }            
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status</title>
    <?php include '../center/linkcss.php'; ?>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class class="col-12">
                <?php include '../center/menu.php'; ?>
            </div>
        </div>
    </div>
    <h1 class="text-center">แสดงข้อมูล</h1>

        <div class="text-center">
            <label for="statusid" >รหัสสถานะ</label>
            <input type="text" name="statusid" id="statusid" value="<?php echo $id?>" readonly>
    
            <label for="statusname" >ชื่อสถานะ</label>
            <input type="text" name="statusname" id="statusname" value="<?php echo $statusname?>" readonly>
    
            
            <a href="managestatus.php" class="btn btn-primary">ย้อนกลับ</a>

        </div>
    



   
    <?php include '../center/linkjs.php';?>
</body>

</html>