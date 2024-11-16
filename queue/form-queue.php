<?php
session_start();
$_SESSION['mode'] = "add";
include '../center/linkcss.php';
include '../center/linkjs.php';
include '../db/connectDB.php';
if (!isset($_SESSION['login'])) {
    $_SESSION['login'] = false;
}
$idcar = $_POST['selectedcar'];

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

                            <a class="text-[#141414] text-sm font-medium leading-normal" style="text-decoration: none;" href="menupage.php">Package</a>
                            <a class="text-[#141414] text-sm font-medium leading-normal" style="text-decoration: none;" href="Servicehistory.php">Service history</a>
                            <a class="text-[#141414] text-sm font-medium leading-normal" style="text-decoration: none;" href="../mycar/index.php">Mycar</a>
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
            <form action="../services/savequeue.php" method="POST" class="container">
                <h1 class="text-center">Queue</h1>
                <div class="row">
                    <div class="col-4 offset-4">
                        <div class="mb-3">
                            <?php
                            $sql = "SELECT * FROM tbcaruser WHERE idcar = '$idcar';";
                            $result = $conn->query($sql);
                            foreach ($result as $row) {
                            ?>
                            <label for="exampleFormControlInput1" class="form-label">License Plate</label>
                            <input type="text" class="form-control" name='number' id="exampleFormControlInput1" value="<?php echo $row['number']; ?>" readonly>
                            <?php }?>
                        </div>
                    </div>
                    <?php 
                                 $cart = $_SESSION['cart'];
                                 $price = 0;
                                 for ($item = 0; $item < count($cart); $item++) {
                                    
                                    $id = $cart[$item];
                                    $sql = " SELECT m.menuid, m.menuname, m.status, m.price, t.typename
                                                FROM tbmenu AS m
                                                INNER JOIN tbtypecar AS t ON m.typeid = t.typeid
                                                WHERE m.status = '10' AND  m.menuid = '$id'
                                        ";
                                          $result = $conn->query($sql);
                                          if ($result->num_rows > 0) {
                                            foreach ($result as $row) {
                                                $price = $row['price'] +$price;
                            
                            ?>
                    <div class="col-4 offset-4">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Package <?php echo $item+1 ?></label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $row['menuname'] ?>" readonly>
                        </div>
                    </div>
                    <?php                 }
                                          }
                                 } ?>
                    <div class="col-4 offset-4">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Total price</label>
                            <input type="text" class="form-control" name='totalprice' id="exampleFormControlInput1" value="<?php echo $price; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-4 offset-4">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Time</label>
                            <select class="form-control" name="idtime" id="idtime">

                            </select>
                        </div>
                    </div>
                    <div class="col-4 offset-4">
                        <div class="mb-3">
                            <button type="submit" name='submit' class="btn btn-secondary w-100">Confirm</button>
                        </div>
                    </div>
                    <div class="col-4 offset-4">
                        <div class="mb-3">
                            <a href="select-car.php" type="button" class="btn btn-dark w-100">Back</a>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <script>
        $(document).ready(function name(params) {
            $.ajax({
                url: '../services/gettime.php',
                method: 'post',
                data: '',
                success: function(result) {
                    $("#idtime").html(result)
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