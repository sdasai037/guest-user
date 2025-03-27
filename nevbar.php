<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Louis Vuitton Navbar</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/velidaction.js"></script>
    <style>
        /* webkith */
        /* Width of the scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        /* Track (background of the scrollbar) */
        ::-webkit-scrollbar-track {
            /* background: #1e1e1e; */
            /* Dark background */
            border-radius: 10px;
        }

        /* Handle (draggable part of the scrollbar) */
        ::-webkit-scrollbar-thumb {
            background: rgb(198, 198, 47);
            /* Green color */
            border-radius: 10px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: rgb(145, 160, 69);
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            padding: 10px;
        }

        .navbar a {
            color: black;
            text-decoration: none;
            padding: 10px;
        }

        .navbar .navbar-brand {
            color: black;
            text-transform: uppercase;
        }

        .navbar-brand:hover {
            color: black;
        }

        /* Center the navbar items */
        .navbar-nav {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .navbar a:hover,
        .dropdown:hover .dropbtn {
            color: black;
        }

        .dropdown-content a {
            color: black;
        }

        .dropdown:hover .dropdown-content a {
            color: black;
        }

        /* Search Section */
        .search-container {
            display: flex;
            align-items: center;
            font-size: 18px;
            font-family: Arial, sans-serif;
            cursor: pointer;
        }

        .search-icon {
            font-size: 22px;
            margin-right: 5px;
        }

        .search-text {
            color: black;
        }

        .navbar-nav .nav-item i {
            font-size: 20px;
            padding-right: 5px;
        }

        .navbar-nav .nav-item {
            padding-left: 10px;
            padding-right: 10px;
        }

        /* this is of index */
        .images {
            background: linear-gradient(0deg, rgb(196 196 196), rgb(255 255 255));
            height: aout;
            border-radius: 10px;
            transition: transform 0.3s ease;
            width: 100%;
            object-fit: cover;
        }

        .images:hover {
            transform: scale(1.05);
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
            background: linear-gradient(0deg, rgb(126 126 126), rgb(255 255 255));
        }

        .section-title {
            text-align: center;
            margin-top: 12px;
        }

        .section-heading {
            text-align: center;
        }

        .hover-inside-border {
            display: block;
            margin-left: auto;
            margin-right: auto;
            padding: 12px 24px;
            background-color: rgb(164, 173, 183);
            color: white;
            border: 1px solidrgb(110, 114, 118);
            border-radius: 5px;
            text-align: center;
            font-size: 16px;
            cursor: pointer;
        }

        .hover-inside-border:hover {
            background-color: white;
            color: rgb(0, 0, 0);
        }

        /*  */
        /* search bar */
        .product-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .product-card:hover {
            transform: scale(1.03);
            background: linear-gradient(0deg, rgb(126 126 126), rgb(255 255 255));
        }

        .product-info {
            text-align: center;
            padding: 10px;
        }

        .product-price {
            color: #555;
            font-weight: bold;
        }

        .product-img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 8px;
        }

        .im {
            width: 100%;
        }

        .color {
            background: linear-gradient(0deg, rgb(223, 223, 223), rgb(255, 255, 255))
        }

        .order-btn {
            margin-top: 10px;
            width: 55%;
            font-weight: bold;
        }

        .heart-icon {
            position: absolute;
            top: 30px;
            right: 30px;
        }

        /*  */
        /* men women cloth bag shoes galss */
        .product-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .product-card:hover {
            transform: scale(1.03);
            background: linear-gradient(0deg, rgb(126 126 126), rgb(255 255 255));
        }

        .product-info {
            text-align: center;
            padding: 10px;
        }

        .product-price {
            color: #555;
            font-weight: bold;
        }

        .product-img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 8px;
        }

        .im {
            width: 100%;
        }

        .color {
            background: linear-gradient(0deg, rgb(223, 223, 223), rgb(255, 255, 255))
        }

        .order-btn {
            margin-top: 10px;
            width: 55%;
            font-weight: bold;
        }
    </style>

</head>

<body>
    <?php
    include 'config.php';

    // Fetch Site Settings
    $settings_query = "SELECT * FROM settings LIMIT 1";
    $settings_result = $con->query($settings_query);
    $settings = $settings_result->fetch_assoc();

    // Fetch Only Active Categ  ories
    $category_query = "SELECT * FROM categories WHERE status = 'active'";
    $category_result = $con->query($category_query);
    ?>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f0f0f0">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="<?= $settings['home_link']; ?>">
                <span style="font-family: cursive;"><?= $settings['site_name']; ?></span>
                <img src="<?= $settings['logo_path']; ?>" style="width: 50px; height: auto;">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="<?= $settings['home_link']; ?>">Home</a></li>

                    <?php while ($category = $category_result->fetch_assoc()) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown<?= $category['id']; ?>" data-bs-toggle="dropdown">
                                <?= $category['category_name']; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown<?= $category['id']; ?>">
                                <?php
                                $sub_query = "SELECT * FROM subcategories WHERE category_id = " . $category['id'] . " AND status = 'active'";
                                $sub_result = $con->query($sub_query);

                                if (!$sub_result) {
                                    die("Query Failed: " . $con->error);
                                }

                                while ($sub = $sub_result->fetch_assoc()) {
                                    echo '<li><a class="dropdown-item" href="' . $sub['subcategory_link'] . '">' . $sub['subcategory_name'] . '</a></li>';
                                }
                                ?>
                            </ul>
                        </li>
                    <?php } ?>

                    <li class="nav-item"><a class="nav-link" href="search-page.php">Search</a></li>

                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                    <?php } else { ?>
                        <li class="nav-item"><a class="nav-link" href="signup.php">Sign-up</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <script src="js/bootstrap.bundle.min.js"></script>