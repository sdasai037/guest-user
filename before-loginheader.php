<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <link href="css/bootstrap-icons.css">
    <script src="js/additional-methods.min.js"></script>
    <script src="js/velidaction.js"></script>
</head>
<?php
session_start();
ob_start();
?>
<style>
    .nav-bar {
        padding: 20px;
        background-color: #f8f8f8;
        border-bottom: 1px solid #ddd;
    }

    .logo {
        font-weight: bold;
    }

    .login {
        text-decoration: none;
        color: black;
    }

    /*  */
    /* this is of login.php */
    /* this is of login page */
    body {
        margin: 0;
        padding: 0;
        /* background: url('images/w2.webp') no-repeat center center/cover; */
    }

    .containerr {
        margin: 64px 9.3vw 92px;
        min-height: calc(100vh - 236px);
    }

    h2 {
        font-size: 35px;
        font-weight: 500;
        color: #000;
        margin-bottom: 16px;
        font-family: system-ui;
    }

    .text,
    .info-box ul li {
        font-size: 15px;
        font-family: system-ui;
        line-height: 1.8;
        padding-bottom: 13%;
    }

    .required {
        font-size: 15px;
        font-family: system-ui;
        text-align: right;
    }

    .forget_text {
        cursor: pointer;
        color: #19110b;
        text-decoration: underline;
    }

    .btn-custom {
        border: 1px solid #19110b;
        font-size: 16px;
        font-weight: 400;
        line-height: 20px;
        text-align: center;
        color: #fff;
        background-color: #000;
        padding: 14px 122px;
        border-radius: 24px;
    }

    .btn-custom:hover {
        background-color: #fff;
        color: #000;
        font-size: larger;
    }

    .info-box {
        background-color: #f6f5f3;
        padding: 32px;
    }

    .tital {
        text-transform: uppercase;
        font-family: system-ui;
        color: #19110b;
    }

    .itam {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .itam span {
        font-size: 24px;
        color: black;
    }

    .text-danger {
        font-size: 14px;
    }

    /*  */
    /* this is of forget password */
    body {
        margin: 0;
        padding: 0;
        /* background: url('images/w2.webp') no-repeat center center/cover; */
    }

    .containerr {
        margin: 64px 9.3vw 92px;
        min-height: calc(100vh - 236px);
    }

    h2 {
        font-size: 35px;
        font-weight: 500;
        color: #000;
        margin-bottom: 16px;
        font-family: system-ui;
    }

    .text,
    .info-box ul li {
        font-size: 15px;
        font-family: system-ui;
        line-height: 1.8;
        padding-bottom: 13%;
    }

    .required {
        font-size: 15px;
        font-family: system-ui;
        text-align: right;
    }

    .forget_text {
        cursor: pointer;
        color: #19110b;
        text-decoration: underline;
    }

    .btn-custom {
        border: 1px solid #19110b;
        font-size: 16px;
        font-weight: 400;
        line-height: 20px;
        text-align: center;
        color: #fff;
        background-color: #000;
        padding: 14px 122px;
        border-radius: 24px;
    }

    .btn-custom:hover {
        background-color: #fff;
        color: #000;
        font-size: larger;
    }

    .info-box {
        background-color: #f6f5f3;
        padding: 32px;
    }

    .tital {
        text-transform: uppercase;
        font-family: system-ui;
        color: #19110b;
    }

    .itam {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .itam span {
        font-size: 24px;
        color: black;
    }

    .text-danger {
        font-size: 14px;
    }

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

    /*  */
</style>

<body>
    <header>
        <div class="nav-bar d-flex justify-content-between align-items-center">
            <a href="index.php" class="login "><span class="logo">LOUIS VUITTON</span></a>
            <a href="login.php" class="login">LOG IN TO MYLV</a>
        </div>
    </header>
    <?php
    include "config.php"
    ?>
    <div class="container">
        <?php
        if (isset($_COOKIE['success'])) {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> <?php echo $_COOKIE['success']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        if (isset($_COOKIE['error'])) {
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong><?php echo $_COOKIE['error']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        ?>
    </div>