<?php

    @session_start();
    include '../db/connectDB.php';
    $sql = "SELECT typeid,typename,status,size 
                FROM tbtypecar
                where status in ('ใช้')
                ORDER BY typeid*1 DESC";

    $query = $conn->query($sql);
    //echo $sql; exit();        
   $typeidList=$typenameList=$status=$size = array(); 
   if($query->num_rows > 0){
        while($rs = $query->fetch_assoc()){
            array_push($typeidList,$rs['typeid']);
            array_push($typenameList,$rs['typename']);
            array_push($status,$rs['status']);
            array_push($size,$rs['size']);
        }
   } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>type</title>
    <link rel="stylesheet" href="../center/style.css">
    <?php include '../center/linkcss.php'; ?>
    
</head>
<body>
    <div class="container">
    <?php include '../center/nav.php';?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">จัดการประเภทรถ</h1>
                    <div class="d-grid justify-content-md-end">
                        <a href="addtype.php" class="btn btn-primary">เพิ่มข้อมูล</a>
    
                    </div>
                    <table class="table table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>#</th>
                                <th>รหัสประเภทรถ</th>
                                <th>ชื่อประเภทรถ</th>
                                <th>สถานะ</th>
                                <th>ขนาด</th>
                                <th>แก้ไข</th>
                                
                                <th>ลบข้อมูล</th>
                                </tr>
                                
                        </thead>
                        <tbody>
    <?php
        if (count($typeidList) > 0) {
            for ($i = 0; $i < count($typeidList); $i++) {
                $item = $i + 1;
                $typeid = $typeidList[$i];
                $typename = isset($typenameList[$i]) ? $typenameList[$i] : 'N/A'; // Default value
                $statusVal = isset($status[$i]) ? $status[$i] : 'N/A'; // Default value
                $sizeVal = isset($size[$i]) ? $size[$i] : 'N/A'; // Default value

                ?>
                <tr>
                    <td><?php echo $item; ?></td>
                    <td><?php echo $typeid; ?></td>
                    <td><?php echo $typename; ?></td>
                    <td><?php echo $statusVal; ?></td>
                    <td><?php echo $sizeVal; ?></td>
                    <td>
                        <a class="btn btn-warning" href="edittype.php?id=<?php echo $typeid; ?>">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="cancel.php?id=<?php echo $typeid; ?>">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>
                    </td>
                </tr>
            <?php }
        } else {
            ?>
            <tr>
                <td colspan="7" class="text-center">ไม่มีข้อมูล</td>
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



    <?php include '../center/linkjs.php';?>
</body>
</html>