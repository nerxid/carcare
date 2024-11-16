<?php
    @session_start();
    $_SESSION['mode'] = "edit";

    include '../db/connectDB.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT menuid,menuname,status,price
                FROM tbmenu
                    WHERE menuid = '$id'";
        // echo $sql; exit ();

        $query = $conn->query($sql);
        if($query->num_rows > 0){
            $rs = $query->fetch_assoc();
            $menuname = $rs['menuname'];
            $status = $rs['status'];
            $price= $rs['price'];
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
    <link rel="stylesheet" href="../center/style.css">
</head>

<body>
    <div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class class="col-12">
                <?php include '../center/nav.php'; ?>
            </div>
        </div>
    </div>
    <h1 class="text-center">แก้ไขข้อมูล</h1>

    <form action="savemenu.php" method="post" class="text-center">
    <div class="row">
            <div class="col-4 offset-4">
                <div class="input-group mt-3">
                    <label class="input-group-text" for="menuid">รหัสสถานะ</label>
                    <input class="form-control" type="text" name="menuid" id="menuid" value="<?php echo $id;?>" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-4">
                <div class="input-group mt-3">
                    <label class="input-group-text"  for="menuname">ชื่อสถานะ</label>
                    <input class="form-control" type="text" name="menuname" id="menuname" value="<?php echo $menuname;?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-4">
                <div class="input-group mt-3">
                    <label class="input-group-text" for="statusname">สถานะ</label>
                    <input class="form-control" type="text" name="status" id="status" value="<?php echo $status;?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-4">
                <div class="input-group mt-3">
                    <label class="input-group-text" for="statusname">ราคา</label>
                    <input class="form-control" type="text" name="price" id="price" value="<?php echo $price;?>">
                </div>
            </div>
        </div>
        <br>
        <input type="submit" value="บันทึกข้อมูล" class="btn btn-success">
        <a href="managestatus.php" class="btn btn-primary">ย้อนกลับ</a>


    </form>
    </div>
    <?php include '../center/linkjs.php';?>
</body>

</html>