<?php include 'center/linkcss.php'; ?>
<?php include 'center/linkjs.php'; ?>
<?php include 'db/connectDB.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <nav class="navbar border border-[#e0e0e0]">
        <div class="container-fluid">
            <div class="flex items-center gap-4 text-[#141414]">
                <div class="size-4"></div>
                <h5 class="text-[#141414] text-lg font-bold leading-tight tracking-[-0.015em]">CarCare</h5>
            </div>
            <div class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link px-3" href="signin.php">Sign in</a>
                    </li>
                </ul>
                <a href="index.php" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </nav>

    <div class="container d-flex justify-content-center align-items-center">
    <div class="w-100" style="max-width: 400px;">
        <br>
        <h2 class="text-center">Sign up</h2>
        <br>
        <div class="row">
            <form action="services/signin.php" method="post">
            <div class="col">
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">First name *</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="name" id="name" require>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Last name *</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="Lastname" id="name"  require>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Phone *</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="phone" id="phone" require>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Uername *</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="username" id="username" require>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Password *</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="password" id="password"  require>
                </div>
                <div class="mb-3">
                    <button type="submit" name="submit" class="btn btn-secondary" style="width: 400px;">Create account</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>



</body>

</html>