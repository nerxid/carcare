<?php

@session_start();
include '../db/connectDB.php';
$sql = "SELECT m.menuid, m.menuname, m.status, m.price, t.typename
FROM tbmenu AS m
INNER JOIN tbtypecar AS t ON m.typeid = t.typeid
WHERE m.status = '10';
";

$query = $conn->query($sql);
//echo $sql; exit();        
$menuidList = $menunameList = $statusList = $priceList = $typenameList = array();
if ($query->num_rows > 0) {
    while ($rs = $query->fetch_assoc()) {
        array_push($menuidList, $rs['menuid']);
        array_push($menunameList, $rs['menuname']);
        array_push($statusList, $rs['status']);
        array_push($priceList, $rs['price']);
        array_push($typenameList, $rs['typename']);
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu</title>
    <link rel="stylesheet" href="../center/style.css">
    <?php include '../center/linkcss.php'; ?>

</head>

<body>
    <div class="container">
        <?php include '../center/nav.php'; ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">จัดการเมนู</h1>
                    <div class="d-grid justify-content-md-end">
                        <a href="addmenu.php" class="btn btn-primary">เพิ่มข้อมูล</a>

                    </div>
                    <table class="table table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>#</th>
                                <th>รหัสเมนู</th>
                                <th>ชื่อเมนู</th>
                                <th>สถานะ</th>
                                <th>ราคา</th>
                                <th>ประเภทรถ</th>
                                <th>แก้ไข</th>
                                <th>ลบข้อมูล</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            if (count($menuidList) > 0) {
                                for ($i = 0; $i < count($menuidList); $i++) {
                                    $item = $i + 1;
                                    $menuid = $menuidList[$i];
                                    $menuname = $menunameList[$i];
                                    $status = $statusList[$i];
                                    $price = $priceList[$i];
                                    $typename = $typenameList[$i];

                            ?>
                                    <tr>
                                        <td><?php echo $item; ?></td>
                                        <td><?php echo $menuid; ?></td>
                                        <td><?php echo $menuname; ?></td>
                                        <td><?php echo $status; ?></td>
                                        <td><?php echo $price; ?></td>
                                        <td><?php echo $typename; ?></td>
                                        <td>
                                            <a class="btn btn-warning" href="editmenu.php? id=<?php echo $menuid; ?>">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                        </td>

                                        <td>
                                            <a class="btn btn-danger" href="cancel.php? id=<?php echo $menuid; ?>">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>

                                        </td>
                                    </tr>
                                <?php }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="8" class="text-center">ไม่มีข้อมูล</td>
                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>


    <?php include '../center/linkjs.php'; ?>
</body>

</html>