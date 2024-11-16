<?php

@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../center/style.css">
    <?php include 'center/linkcss.php'; ?>

</head>

<body>
    <div class="container">
    <nav class="navbar border border-[#e0e0e0]">
        <div class="container-fluid">
            <div class="flex items-center gap-4 text-[#141414]">
                <div class="size-4"></div>
                <h5 class="text-[#141414] text-lg font-bold leading-tight tracking-[-0.015em]">CarCare</h5>
            </div>
            <div class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link px-3" href="caruser/managecaruser.php">จัดการรถ</a>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link px-3" href="typecar/managetypecar.php">จัดการประเภทรถ</a>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link px-3" href="user/manageuser.php">จัดการผู้ใช้</a>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link px-3" href="menu/managestatus.php">จัดการเมนู</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
       

    </div>
    <?php include 'center/linkjs.php'; ?>
</body>

</html>