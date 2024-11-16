<?php 
    @session_start();
    $_SESSION['mode'] = "edit";
    include '../db/connectDB.php';
    $id = $_GET['id'];
    $sql = "SELECT u.name, u.sername, u.username, u.password, s.status, u.phone, u.iduser
            FROM tbuser AS u
            INNER JOIN tbstatus AS s
            ON u.status = s.idstatus
            WHERE u.iduser  = '$id' ";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
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
    <h1 class="text-center">เเก้ไขข้อมูล</h1>

    <form action="saveuser.php" method="post" class="text-center">

        <div class="row">
                <div class="col-4 offset-4">
                    <div class="input-group mt-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" placeholder="รหัสลูกค้า" name="iduser" id="iduser" readonly value="<?php echo $id; ?>">
                    </div>
                </div>
            </div>
            <?php 
                foreach($result as $row){

                
            ?>
            <div class="row">
                <div class="col-4 offset-4">
                    <div class="input-group mt-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" placeholder="ชื่อ" name="name" id="name" value="<?php echo $row['name']; ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4 offset-4">
                    <div class="input-group mt-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" placeholder="นามสกุล" name="sername" id="sername" value="<?php echo $row['sername']; ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4 offset-4">
                    <div class="input-group mt-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" placeholder="username" name="username" id="username" value="<?php echo $row['username']; ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4 offset-4">
                    <div class="input-group mt-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" placeholder="password" name="password" id="password" value="<?php echo $row['password']; ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4 offset-4">
                    <div class="input-group mt-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" placeholder="เบอร์โทรศัพท์" name="phone" id="phone" value="<?php echo $row['phone']; ?>">
                    </div>
                </div>
            </div>
                <?php } ?>
            <div class="row">
            <div class="col-4 offset-4">
                <div class="input-group mt-3 btn btn-center">


                    <input type="submit" value="บันทึกข้อมูล" class="btn btn-success">
                    &nbsp;
                    <a href="manageuser.php" class="btn btn-primary">ย้อนกลับ</a>

                </div>
            </div>
        </div>
    </form>
   </div>
    <?php include '../center/linkjs.php';?>
</body>

</html>
