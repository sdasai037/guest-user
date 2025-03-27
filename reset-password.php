<?php
session_start();
include('config.php');

if (!isset($_SESSION['email'])) {
    header('Location: forget-password.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_SESSION['email'];
    $password = $_POST['password'];

    $sql = "UPDATE signup SET password='$password' WHERE email='$email'";
    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Password reset successful. Please login.'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Error updating password. Try again later.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Reset Password</h2>
        <form method="post" action="">
            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-secondary mt-3 ">Update Password</button>
        </form>
    </div>
</body>

</html>