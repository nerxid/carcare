<?php
session_start();
include 'db/connectDB.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $menu_id = $_POST['menu_id'];

    // Ensure $_SESSION['cart'] is an array
    if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
        $_SESSION['cart'] = []; // Initialize as an array if not set
    }

    // Add menu_id to cart
    $_SESSION['cart'][] = $menu_id;

    // Return the count of items in the cart
    echo count($_SESSION['cart']);
    exit; // Ensure no further output is sent
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarCare | Menu</title>

    <!-- Include CSS Files -->
    <?php include 'center/linkcss.php'; ?>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," />

    <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
</head>

<body>
    <style>
        /* Hover Effect for Cards */
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 8px;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        #cart-count {
            position: absolute;
            /* Change to absolute positioning */
            top: -5px;
            /* Adjust top position */
            right: -10px;
            /* Adjust right position */
            background-color: red;
            /* Ensure it has a visible background */
            color: white;
            /* Text color for better contrast */
            border-radius: 50%;
            /* Make it round */
            padding: 2px 5px;
            /* Add some padding */
            font-size: 12px;
            /* Adjust font size if necessary */
        }
    </style>

    <div class="relative flex min-h-screen flex-col bg-white overflow-x-hidden" style='font-family: Inter, "Noto Sans", sans-serif;'>
        <div class="layout-container flex h-full flex-col">
            <header class="flex items-center justify-between border-b border-solid border-b-[#f2f2f2] px-10 py-3">
                <div class="flex items-center gap-4 text-[#141414]">
                    <h2 class="text-lg font-bold tracking-tight text-[#141414]">CarCare</h2>
                </div>
                <div class="flex flex-1 justify-end gap-8">
                    <div class="flex items-center gap-9">
                        <?php if (isset($_SESSION['login']) && $_SESSION['login'] == true) { ?>
                            <a class="text-sm font-medium text-[#141414]" href="menupage.php">Package</a>
                            <a class="text-sm font-medium text-[#141414]" href="queue/Servicehistory.php">Service history</a>
                            <a class="text-sm font-medium text-[#141414]" href="mycar/index.php">Mycar</a>
                            <p>User: <?php echo htmlspecialchars($_SESSION['username']); ?></p>
                            <a href="queue/cart.php" class="text-sm font-medium text-[#141414] relative">
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

            <main class="container mx-auto px-4 py-6">
                <section>
                    <h2 class="mt-5 font-bold">Car wash service package</h2>
                    <hr>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <img src="img/menu1.png" alt="Good package" class="img-fluid">
                            <h5 class="mt-2">Good</h5>
                        </div>
                        <div class="col-md-4">
                            <img src="img/menu2.png" alt="Better package" class="img-fluid">
                            <h5 class="mt-2">Better</h5>
                        </div>
                        <div class="col-md-4">
                            <img src="img/menu3.png" alt="Best package" class="img-fluid">
                            <h5 class="mt-2">Best</h5>
                        </div>
                    </div>
                </section>

                <section>
                    <h2 class="mt-5">Good</h2>
                    <hr>
                    <br>
                    <div class="row">
                        <?php
                        $sql = "SELECT m.menuid, m.menuname, m.price FROM tbmenu AS m WHERE m.status = '10';";
                        $result = $conn->query($sql);
                        foreach ($result as $row) {
                        ?>
                            <a href="#" class="col-4" onclick="addcart(<?php echo $row['menuid']; ?>)">
                                <div class="card h-100">
                                    <h4 class="ms-5"><?php echo htmlspecialchars($row['menuname']); ?></h4>
                                    <div class="card-body">
                                        <h1 class="card-title pricing-card-title">฿<?php echo htmlspecialchars($row['price']); ?> <small class="text-muted">/ car</small></h1>
                                        <ul class="list-unstyled mt-3 mb-4">
                                            <li><i class="fa-solid fa-check me-2"></i>Wash & Dry</li>
                                            <li><i class="fa-solid fa-check me-2"></i>Tire Shine</li>
                                            <li><i class="fa-solid fa-check me-2"></i>Windows Cleaned</li>
                                        </ul>
                                    </div>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <!-- Include JavaScript Files -->
    <?php include 'center/linkjs.php'; ?>
    <script>
        function addcart(menu_Id) {
            console.log("Adding item to cart with ID:", menu_Id);

            // Use jQuery AJAX to send request to menupage.php
            $.ajax({
                url: 'menupage.php',
                method: 'POST',
                data: {
                    menu_id: menu_Id
                },
                success: function(response) {
                    console.log("Response from server:", response); // Log server response
                    $('#cart-count').text(response); // Update cart count
                },
                error: function(error) {
                    console.error("Error:", error);
                }
            });
        }
    </script>
</body>

</html>