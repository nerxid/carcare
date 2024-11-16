<?php
session_start();
$_SESSION['mode'] = "add";
include '../center/linkcss.php';
include '../center/linkjs.php';
include '../db/connectDB.php';
if (!isset($_SESSION['login'])) {
    $_SESSION['login'] = false;
}
$id = $_GET['id'];
$sql="SELECT * 
     FROM queue as q
     LEFT JOIN tbtime as t
     ON q.time = t.id
     LEFT JOIN tbuser as u
     ON q.iduser = u.iduser
     WHERE queue = '$id'";
$result = $conn->query($sql);
?>

<html>

<head>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
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

                            <a class="text-[#141414] text-sm font-medium leading-normal" href="../menupage.php">Package</a>
                            <a class="text-[#141414] text-sm font-medium leading-normal" href="Servicehistory.php">Service history</a>
                            <a class="text-[#141414] text-sm font-medium leading-normal" href="../mycar/index.php">Mycar</a>
                            <p>User:<?php echo $_SESSION['username'] ?></p>
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
            <form action="../services/savecaruser.php" method="POST" class="container">
                <h1 class="text-center"  style="font-size:30px;">Queue</h1>
                <div class="row">
                    <div class="col-4 offset-4">
                        <?php 
                            
                            foreach($result as $row){

                                $menu = $row['menu'];
                                $menuArray = json_decode($menu, true);
                        ?>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">License Plate: <?php echo $row['number'] ?></label>
                        </div>
                    </div>
                    <?php 
                                for ($i=0; $i < count($menuArray) ; $i++) { 
                                    $sqlmenu = "SELECT * FROM tbmenu WHERE menuid = '$menuArray[$i]'; ";
                                    $resultmenu = $conn->query($sqlmenu);
                                    foreach($resultmenu as $rowm){
                            ?>
                    <div class="col-4 offset-4">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Package <?php echo $i+1 ?>: <?php echo $rowm['menuname']; ?></label>
                        </div>
                    </div>
                    <?php      }
                                } ?>
                    <div class="col-4 offset-4">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Total price: <?php echo $row['totalprice']; ?></label>
                        </div>
                    </div>
                    <div class="col-4 offset-4">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Time: <?php echo $row['time']; ?></label>
                        </div>
                    </div>
                    <div class="col-4 offset-4">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Phone: <?php echo $row['phone']; ?> </label>
                        </div>
                    </div>
                    <div class="col-4 offset-4">
                        <h1 class="text-center" style="font-size:50px;" ><?php echo $row['queue']; ?></h1>
                    </div>
                <?php } ?>
                    <br>
                    <div class="col-4 offset-4">
                        <div class="mb-3">
                            <a href="Servicehistory.php"class="btn btn-secondary w-100">Success</a>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <script>
        $(document).ready(function name(params) {
            $.ajax({
                url: '../services/gettype.php',
                method: 'post',
                data: '',
                success: function(result) {
                    $("#idtype").html(result)
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