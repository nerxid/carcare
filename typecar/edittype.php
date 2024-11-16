<?php
    @session_start();
    $_SESSION['mode'] = "edit";

    include '../db/connectDB.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT typeid,typename,status,size 
                FROM tbtypecar
                    WHERE typeid = '$id'";
        // echo $sql; exit ();

        $query = $conn->query($sql);
        if($query->num_rows > 0){
            $rs = $query->fetch_assoc();
            $typename = $rs['typename'];
            $status = $rs['status'];
            $size = $rs['size'];
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
    <h1 class="text-center">แก้ไขข้อมูล</h1>

    <form action="savetypecar.php" method="post" class="text-center">

        <label for="typeid">รหัสสถานะ</label>
        <input type="text" name="typeid" id="typeid" value="<?php echo $id;?>" readonly>

        <label for="typename">ชื่อสถานะ</label>
        <input type="text" name="typename" id="typename" value="<?php echo $typename;?>">

        <label for="statusname">สถานะ</label>
        <input type="text" name="status" id="status" value="<?php echo $status;?>">

        <label for="statusname">ขนาด</label>
        <input type="text" name="size" id="size" value="<?php echo $size;?>">

        <input type="submit" value="บันทึกข้อมูล" class="btn btn-success">
        <a href="managetypecar.php" class="btn btn-primary">ย้อนกลับ</a>


    </form>
    <?php include '../center/linkjs.php';?>
</body>

</html>