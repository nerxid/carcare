<?php
@session_start();
$_SESSION['mode'] = "add";
include '../db/connectDB.php';


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status</title>
    <link rel="stylesheet" href="../center/style.css">
    <?php include '../center/linkcss.php'; ?>
</head>

<body>
    <div class="container">
        <?php include '../center/nav.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <div class class="col-12">
            </div>
        </div>
    </div>
    <h1 class="text-center">เพิ่มข้อมูล</h1>

    <form action="savemenu.php" method="post" class="text-center">
        <div class="row">
            <div class="col-4 offset-4">
                <div class="input-group mt-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" class="form-control" placeholder="รหัสเมนู" name="menuid" id="menuid" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-4">
                <div class="input-group mt-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" class="form-control" placeholder="ชื่อเมนู" name="menuname" id="menuname">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-4">
                <div class="input-group mt-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" class="form-control" placeholder="ราคา" name="price" id="price">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-4">
                <div class="input-group mt-3">
                    <span class="input-group-text" id="basic-addon1">ประเภท</span>

                    <select name="typeid" id="" class="form-control">
                        <?php
                        $SQL = "select * from tbtypecar";
                        $result = $conn->query($SQL);
                        foreach ($result as $row) {



                        ?>
                            <option value="<?php echo $row['typeid'] ?>"><?php echo $row['typename'] ?></option>
                        <?php } ?>
                    </select>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4 offset-4">
                <div class="input-group mt-3 btn btn-center">


                    <input type="submit" value="บันทึกข้อมูล" class="btn btn-success">
                    &nbsp;
                    <a href="managestatus.php" class="btn btn-primary">ย้อนกลับ</a>

                </div>
            </div>
        </div>

    </form>
    </div>
    <?php include '../center/linkjs.php'; ?>
</body>

</html>