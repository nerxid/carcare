<?php 
    @session_start();
    $_SESSION['mode'] = "edit";
    $id = $_GET['id'];
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
    <h1 class="text-center">เเก้ไขข้อมูล</h1>

    <form action="savecaruser.php" method="post" class="text-center">
            <?php 

                $sql = "SELECT  cu.idcar, cu.number, t.typename, s.status, cu.color, u.name,cu.idtype,cu.iduser
                        FROM tbcaruser AS cu
                                LEFT JOIN tbstatus AS s ON cu.status = s.idstatus
                                LEFT JOIN tbuser AS u ON cu.iduser = u.iduser
                                LEFT JOIN tbtypecar AS t ON cu.idtype = t.typeid
                        WHERE cu.idcar = '$id'";
                $result = $conn->query($sql);

                foreach ($result as $row) {
                    $idtype = $row['idtype'];
                    $iduser = $row['iduser'];
            ?>
            <div class="row">
                <div class="col-4 offset-4">
                    <div class="input-group mt-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" placeholder="รหัส" name="id" id="id" value="<?php echo $row['idcar']; ?>" readonly >
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4 offset-4">
                    <div class="input-group mt-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" placeholder="ทะเบียน" name="number" id="number" value="<?php echo $row['number']; ?>" >
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
                        <input type="text" class="form-control" placeholder="สีรถ" name="color_car" id="color_car" value="<?php echo $row['color']; ?>" >
                    </div>
                </div>
            </div>

            <div class="row">
            <div class="col-4 offset-4">
                <div class="input-group mt-3 btn btn-center">


                    <input type="submit" value="บันทึกข้อมูล" class="btn btn-success">
                    &nbsp;
                    <a href="manageuser.php" class="btn btn-primary">ย้อนกลับ</a>

                </div>
            </div>
        </div>
<?php }  ?>
    </form>
    <?php include '../center/linkjs.php';?>
    <script>
        $(document).ready(function() {
                    var idtype = '<?php echo isset($idtype) ? $idtype : ''; ?>';
                    console.log('ID Type from PHP:', idtype); // ทดสอบแสดงค่าก่อนส่ง
                    $.ajax({
                        url: 'gettype.php',
                        method: 'POST',
                        data: {
                            idtype: idtype
                        },
                        success: function(result) {
                            console.log('Result from PHP:', result); // ตรวจสอบผลลัพธ์ที่ได้รับ
                            $("#idtype").html(result);
                        },
                        error: function(xhr, status, error) {
                            console.log('Error: ' + error); // เพิ่มการตรวจสอบข้อผิดพลาด
                        }
                    });
                });
                $(document).ready(function() {
                    var iduser = '<?php echo isset($iduser) ? $iduser : ''; ?>';
                    console.log('ID Type from PHP:', iduser); // ทดสอบแสดงค่าก่อนส่ง
                    $.ajax({
                        url: 'getuser.php',
                        method: 'POST',
                        data: {
                            iduser: iduser
                        },
                        success: function(result) {
                            console.log('Result from PHP:', result); // ตรวจสอบผลลัพธ์ที่ได้รับ
                            $("#iduser").html(result);
                        },
                        error: function(xhr, status, error) {
                            console.log('Error: ' + error); // เพิ่มการตรวจสอบข้อผิดพลาด
                        }
                    });
                });
    </script>
</body>

</html>