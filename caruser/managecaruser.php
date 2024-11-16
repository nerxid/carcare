<?php

@session_start();
include '../db/connectDB.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>car</title>
    <?php include '../center/linkcss.php'; ?>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php include '../center/nav.php'; ?>
                <h1 class="text-center">จัดการรถลูกค้า</h1>
                <div class="d-grid justify-content-md-end">
                    <a href="addcar.php" class="btn btn-primary">เพิ่มข้อมูล</a>

                </div>
                <table class="table table-striped">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>#</th>
                            <th>รหัส</th>
                            <th>ทะเบียนรถ</th>
                            <th>ประเภท</th>
                            <th>สี</th>
                            <th>ชื่อลูกค้า</th>
                            <th>สถานะ</th>
                            <th>แก้ไข</th>
                            <th>ลบข้อมูล</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT cu.idcar, cu.number, t.typename, s.status, cu.color, u.name
                                FROM tbcaruser AS cu
                                LEFT JOIN tbstatus AS s ON cu.status = s.idstatus
                                LEFT JOIN tbuser AS u ON cu.iduser = u.iduser
                                LEFT JOIN tbtypecar AS t ON cu.idtype = t.typeid
                                WHERE  s.idstatus = 10;
                                ";
                        $result = $conn->query($sql);
                        $item = 1;
                        if ($result->num_rows) {
                            foreach ($result as $row) {

                        ?>
                                <tr>
                                    <td><?php echo $item; ?></td>
                                    <td><?php echo $row['idcar']; ?></td>
                                    <td><?php echo $row['number']; ?></td>
                                    <td><?php echo $row['typename']; ?></td>
                                    <td><?php echo $row['color']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td>
                                        <a class="btn btn-warning" href="editcar.php? id=<?php echo $row['idcar']; ?>">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                    </td>

                                    <td>
                                        <a class="btn btn-danger" href="delete.php? id=<?php echo $row['idcar']; ?>">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>

                                    </td>
                                </tr>

                            <?php $item++;
                            }
                        } else { ?>
                            <tr>
                                <td colspan="10" class="text-center">ไม่มีข้อมูล</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>



    <?php include '../center/linkjs.php'; ?>
</body>

</html>