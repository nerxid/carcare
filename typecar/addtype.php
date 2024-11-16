<?php
@session_start();
$_SESSION['mode'] = "add";


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประเภทรถ</title>
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
    <h1 class="mt-5 text-center">เพิ่มข้อมูล</h1>

    <form action="savetypecar.php" method="post" class="text-center">

        <div class="row">
            <div class="col-4 offset-4">
                <div class="input-group mt-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" class="form-control" placeholder="รหัสประเภทรถ" name="typeid" id="typeid" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-4">
                <div class="input-group mt-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" class="form-control" placeholder="ชื่อประเภทรถ" name="typename" id="typename">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-4">
                <div class="input-group mt-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" class="form-control" placeholder="ขนาด" name="size" id="size">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4 offset-4">
                <div class="input-group mt-3 btn btn-center">


                    <input type="submit" value="บันทึกข้อมูล" class="btn btn-success">
                    &nbsp;
                    <a href="managetypecar.php" class="btn btn-primary">ย้อนกลับ</a>

                </div>
            </div>
        </div>
    </form>
    <?php include '../center/linkjs.php'; ?>
    </div>
</body>

</html>