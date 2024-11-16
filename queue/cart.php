<?php
session_start();
$_SESSION['mode'] = "add";
include '../center/linkcss.php';
include '../db/connectDB.php';
if (!isset($_SESSION['login'])) {
    $_SESSION['login'] = false;
}
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
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
</head>

<body>
    <div class="relative flex min-h-screen flex-col bg-white overflow-x-hidden" style='font-family: Inter, "Noto Sans", sans-serif;'>
        <div class="layout-container flex h-full flex-col">
            <header class="flex items-center justify-between border-b border-solid border-b-[#f2f2f2] px-10 py-3">
                <div class="flex items-center gap-4 text-[#141414]">
                    <h2 class="text-lg font-bold tracking-tight text-[#141414]">CarCare</h2>
                </div>
                <div class="flex flex-1 justify-end gap-8">
                    <div class="flex items-center gap-9">
                        <?php if (isset($_SESSION['login']) && $_SESSION['login'] == true) { ?>
                            <a class="text-sm font-medium text-[#141414]" href="../menupage.php">Package</a>
                            <a class="text-sm font-medium text-[#141414]" href="Servicehistory.php">Service history</a>
                            <a class="text-sm font-medium text-[#141414]" href="../mycar/index.php">Mycar</a>
                            <p>User: <?php echo htmlspecialchars($_SESSION['username']); ?></p>
                            <a href="#" class="text-sm font-medium text-[#141414] relative">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                                </svg>
                                <span id="cart-count" class="absolute top-0 right-0 text-white bg-red-600 rounded-full text-xs px-2 py-0.5" style="transform: translate(50%, -50%);">
                                    <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>
                                </span>
                            </a>


                            <a class="flex h-10 px-4 bg-[#FF0000] text-white text-sm font-bold items-center justify-center rounded-xl min-w-[84px] cursor-pointer" href="services/logout.php">
                                Logout
                            </a>
                        <?php } else { ?>
                            <a class="text-sm font-medium text-[#141414]" href="index.php">Home</a>
                            <a class="text-sm font-medium text-[#141414]" href="menupage.php">Package</a>
                            <a class="text-sm font-medium text-[#141414]" href="signup.php">Sign up</a>
                            <a class="flex h-10 px-4 bg-[#808080] text-white text-sm font-bold items-center justify-center rounded-xl min-w-[84px] cursor-pointer" href="signin.php">Sign in</a>
                        <?php } ?>
                    </div>
                </div>
            </header>
            <br>
            <br>
            <br>
            <div class="container text-center">
                <div class="row">
                    <div class="col">
                        <h1 class="text-center" style="font-size: 30px;">Cart</h1>
                    </div>
                </div>
            </div>
            <div class="container">
            </div>
            <br>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Menu</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $cart = $_SESSION['cart'];
                            $price = 0;
                            for ($item = 0; $item < count($cart); $item++) {
                                //echo $cart[$item];
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
                                        <td data-label="No."><?php echo $item+1; ?></td>
                                        <td data-label="Menu"><?php echo $row['menuname']; ?></td>
                                        <td data-label="Price"><?php echo $row['price']; ?></td>
                                        <td data-label="Actions">
                                            <a href="delete-cart.php?id=<?php echo $row['menuid']; ?>" class="btn btn-danger">
                                            <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </td>
                        </tr>
                    <?php }
                                } else { ?>
                    <tr>
                        <td colspan="10" class="text-center">ไม่มีข้อมูล</td>

                    </tr>
            <?php }
                            } ?>
                            <tr>
                            <td data-label="No."></td>
                            <td data-label="No.">Total Price :</td>
                            <td data-label="No."><?php echo $price; ?></td>
                            <td data-label="No."></td>
                            </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="col-4 offset-4">
                        <div class="mb-3 text-center">
                        <a href="select-car.php" type="button" class="btn btn-secondary w-60">NEXT</a>
                        </div>
                    </div>
        </div>
    </div>

    <?php include '../center/linkjs.php'; ?>
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