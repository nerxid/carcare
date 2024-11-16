<?php

@session_start();
include '../db/connectDB.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <?php include '../center/linkcss.php'; ?>
    <link rel="stylesheet" href="../center/style.css">

</head>

<body>
    <div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php include '../center/nav.php'; ?>
                <h1 class="text-center">จัดการลูกค้า</h1>
                <div class="d-grid justify-content-md-end">
                    <a href="adduser.php" class="btn btn-primary">เพิ่มข้อมูล</a>

                </div>
                <table class="table table-striped">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>#</th>
                            <th>รหัส</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>username</th>
                            <th>password</th>
                            <th>เบอร์โทรศัพท์</th>
                            <th>สถานะ</th>
                            <th>แก้ไข</th>
                            <th>ลบข้อมูล</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php 
                            $sql = "SELECT u.name,u.sername,u.username,u.password,s.status,u.phone,u.iduser,s.status
                                    FROM tbuser as u
                                    INNER JOIN tbstatus as s
                                    ON u.status = s.idstatus
                                    where s.idstatus in ('10')
                                    ";
                                    $result = $conn->query($sql);
                                    $item = 1;

                                    if($result->num_rows > 0 ){
                                foreach($result as $row){
                                    
                        ?>
                        <tr>
                            <td><?php echo $item; ?></td>
                            <td><?php echo $row['iduser']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['sername']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <a class="btn btn-warning" href="edituser.php? id=<?php echo $row['iduser']; ?>">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                            </td>

                            <td>
                                <a class="btn btn-danger" href="cancel.php? id=<?php echo $row['iduser']; ?>">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>

                            </td>
                            <?php $item++; }}else{?>
                                <td colspan="7" class="text-center">ไม่มีข้อมูล</td>
                                <?php } ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    </div>


    <?php include '../center/linkjs.php'; ?>
</body>

</html>