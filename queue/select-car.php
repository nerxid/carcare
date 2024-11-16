<?php
session_start();
include '../center/linkcss.php';
include '../center/linkjs.php';
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
      <div class="container text-center">
        <div class="row">
          <div class="col">
            <h1 style="font-size: 30px;">Select Car</h1>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="col-6 offset-3 d-flex justify-content-end">
          <a href="../mycar/from-add-car.php" class="btn btn-primary">ADD CAR</a>
        </div>
      </div>
      <br>
      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>License Plate</th>
              <th>Type</th>
              <th>Color</th>
              <th>Status</th>
              <th>Actions</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
              $id = $_SESSION['iduser'];
              $sql = "SELECT cu.idcar, cu.number, t.typename, s.status, cu.color, cu.iduser
          FROM tbcaruser as cu
          LEFT JOIN tbstatus as s
              ON cu.status = s.idstatus
          LEFT JOIN tbuser as u
              ON cu.iduser = u.iduser
          LEFT JOIN tbtypecar as t
              ON cu.idtype = t.typeid
               WHERE cu.status in ('10') AND cu.iduser = '$id'
          ";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                foreach ($result as $row) {
              ?>
                  <td data-label="ID"><?php echo $row['idcar']; ?></td>
                  <td data-label="License Plate"><?php echo $row['number']; ?></td>
                  <td data-label="Type"><?php echo $row['typename']; ?></td>
                  <td data-label="Color"><?php echo $row['color']; ?></td>
                  <td data-label="Status"><?php echo $row['status']; ?></td>
                  <form action="form-queue.php" method="post">
                    <td data-label="Actions">
                    <input type="radio" id="vehicle_<?php echo $row['idcar']; ?>" name="selectedcar" value="<?php echo $row['idcar']; ?>">
                    </td>
                    <td data-label="Status"></td>
            </tr>
          <?php }
              } else { ?>
          <tr>
            <td colspan="10" class="text-center">ไม่มีข้อมูล</td>

          </tr>
        <?php } ?>
          </tbody>
        </table>
      </div>
      <br>
      <div class="col-4 offset-4">
        <div class="mb-3 text-center">
          <button type="submit" name="submit" class="btn btn-secondary w-60">Confirm</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</body>

</html>