<?php
session_start();
$_SESSION['mode'] = "edit";
$id = $_GET['id'];
include '../center/linkcss.php';
include '../db/connectDB.php';
if (!isset($_SESSION['login'])) {
    $_SESSION['login'] = false;
}
?>

<html>

<head>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link rel="stylesheet" href="style.css">
    <link
        rel="stylesheet"
        as="style"
        onload="this.rel='stylesheet'"
        href="https://fonts.googleapis.com/css2?display=swap&amp;family=Inter%3Awght%40400%3B500%3B700%3B900&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900" />

    <title>Galileo Design</title>
    <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," />

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
</head>

<body>
    <div class="relative flex size-full min-h-screen flex-col bg-white group/design-root overflow-x-hidden" style='font-family: Inter, "Noto Sans", sans-serif;'>
        <div class="layout-container flex h-full grow flex-col">
            <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#f2f2f2] px-10 py-3">
                <div class="flex items-center gap-4 text-[#141414]">
                    <div class="size-4">
                        <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <!-- SVG Content -->
                        </svg>
                    </div>
                    <h2 class="text-[#141414] text-lg font-bold leading-tight tracking-[-0.015em]">CarCare</h2>
                </div>
                <div class="flex flex-1 justify-end gap-8">
                    <div class="flex items-center gap-9">

                        <?php if ($_SESSION['login'] == true) { ?>

                            <a class="text-[#141414] text-sm font-medium leading-normal" style="text-decoration: none;" href="menupage.php">Package</a>
                            <a class="text-[#141414] text-sm font-medium leading-normal" style="text-decoration: none;" href="signup.php">Service history</a>
                            <a class="text-[#141414] text-sm font-medium leading-normal" style="text-decoration: none;" href="mycar/index.php">Mycar</a>
                            <a class="text-[#141414] text-sm font-medium leading-normal" style="text-decoration: none;">User:<?php echo $_SESSION['username'] ?></a>
                    </div>
                    <div class="flex gap-2">
                        <a class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 bg-[#FF0000] text-white text-sm font-bold leading-normal tracking-[0.015em]" href="../services/logout.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                            </svg>
                        </a>

                    <?php } else { ?>
                        <a class="text-[#141414] text-sm font-medium leading-normal" href="menupage.php">Package</a>
                        <a class="text-[#141414] text-sm font-medium leading-normal" href="signup.php">Sign up</a>
                    </div>
                    <div class="flex gap-2">
                        <a class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 bg-[#808080] text-white text-sm font-bold leading-normal tracking-[0.015em]" href="signin.php">Sign in</a>

                    <?php } ?>
                    </div>
                </div>
            </header>
            <br>
            <br>
            <br>
            <form action="../services/savecaruser.php" method="post" class="text-center">
                <h1>Edit Data</h1>
                <?php

                $sql = "SELECT idcar ,idtype,color ,number
                        FROM tbcaruser
                        WHERE idcar = '$id'";
                $result = $conn->query($sql);

                foreach ($result as $row) {
                    $idtype = $row['idtype'];
                ?>
                 <div class="row">
                        <div class="col-4 offset-4">
                            <div class="input-group mt-3">
                                <span class="input-group-text" id="basic-addon1">ID</span>
                                <input type="text" class="form-control" placeholder="License Plate" name="id" id="id" value="<?php echo $id; ?>" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4 offset-4">
                            <div class="input-group mt-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" class="form-control" placeholder="License Plate" name="number" id="number" value="<?php echo $row['number']; ?>">
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
                                <input type="text" class="form-control" placeholder="สีรถ" name="color_car" id="color_car" value="<?php echo $row['color']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4 offset-4">
                            <div class="input-group mt-3 btn btn-center">


                                <input type="submit" value="SAVE" class="btn btn-success">
                                &nbsp;
                                <a href="index.php" class="btn btn-primary">BACK</a>

                            </div>
                        </div>
                    </div>
                <?php }  ?>
            </form>
            <?php include '../center/linkjs.php'; ?>
            <script>
                $(document).ready(function() {
                    var idtype = '<?php echo isset($idtype) ? $idtype : ''; ?>';
                    console.log('ID Type from PHP:', idtype); // ทดสอบแสดงค่าก่อนส่ง
                    $.ajax({
                        url: '../services/gettype.php',
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


                $(document).ready(function name(params) {
                    $.ajax({
                        url: 'getuser.php',
                        method: 'post',
                        data: '',
                        success: function(result) {
                            $("#iduser").html(result)
                        }
                    });
                });
            </script>
</body>

</html>