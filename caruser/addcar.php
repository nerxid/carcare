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
    <title>User</title>
    <?php include '../center/linkcss.php'; ?>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class class="col-12">
                <?php include '../center/nav.php'; ?>
            </div>
        </div>
    </div>
    <h1 class="text-center">เพิ่มข้อมูล</h1>

    <form action="savecaruser.php" method="POST" class="text-center">

            <div class="row">
                <div class="col-4 offset-4">
                    <div class="input-group mt-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" placeholder="ทะเบียน" name="number" id="number" >
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-4 offset-4">
                    <div class="input-group mt-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <select class="form-control" name="idtype" id="idtype">
            
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4 offset-4">
                    <div class="input-group mt-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <select class="form-control" name="iduser" id="iduser">
            
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4 offset-4">
                    <div class="input-group mt-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" placeholder="สีรถ" name="color_car" id="color_car" >
                    </div>
                </div>
            </div>

            <div class="row">
            <div class="col-4 offset-4">
                <div class="input-group mt-3 btn btn-center">


                    <input type="submit" name="submit" value="บันทึกข้อมูล" class="btn btn-success">
                    &nbsp;
                    <a href="managecaruser.php" class="btn btn-primary">ย้อนกลับ</a>

                </div>
            </div>
        </div>

    </form>
    <?php include '../center/linkjs.php';?>
    <script>
        $(document).ready(function name(params) {
           $.ajax({
                url:'gettype.php',
                method:'post',
                data: '',
                success: function(result){
                    $("#idtype").html(result)
                }
           });
        });
        $(document).ready(function name(params) {
           $.ajax({
                url:'getuser.php',
                method:'post',
                data: '',
                success: function(result){
                    $("#iduser").html(result)
                }
           });
        });
    </script>
</body>

</html>