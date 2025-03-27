<?php
session_start();
include('config.php');

if (!isset($_SESSION['email'])) {
    header('Location: forget-password.php');
    exit();
}

$email = $_SESSION['email'];

$stmt = $con->prepare("SELECT * FROM f_password WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $otp = trim($_POST['otp']);

    if ($row) {
        if ($row['otp_locked'] !== NULL && strtotime($row['otp_locked']) > time()) {
            echo "<script>alert('Your account is locked due to multiple failed attempts. Please try again after 24 hours.');</script>";
        } elseif ($row['otp_attempts'] >= 3) {
            $lockTime = date('Y-m-d H:i:s', strtotime('+24 hours'));
            $stmt = $con->prepare("UPDATE f_password SET otp_locked=? WHERE email=?");
            $stmt->bind_param("ss", $lockTime, $email);
            $stmt->execute();
            echo "<script>alert('Too many failed attempts. Try again after 24 hours.');</script>";
        } elseif ($row['otp'] == $otp) {
            if (strtotime($row['otp_expires']) > time()) {
                $_SESSION['verified_email'] = $email;
                header('Location: reset-password.php');
                exit();
            } else {
                echo "<script>alert('OTP has expired. Request a new OTP.');</script>";
            }
        } else {
            $newAttempts = $row['otp_attempts'] + 1;
            $stmt = $con->prepare("UPDATE f_password SET otp_attempts=? WHERE email=?");
            $stmt->bind_param("is", $newAttempts, $email);
            $stmt->execute();
            echo "<script>alert('Invalid OTP. Attempt $newAttempts/3.');</script>";
        }
    }
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<body>
    <div class="container mt-5">
        <h2 class="text-center">Enter OTP</h2>
        <form method="post" action="verify-otp.php">
            <div class="mb-3">
                <label for="otp" class="form-label">Enter the OTP sent to your email</label>
                <input type="text" name="otp" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-secondary mt-3 ">Verify OTP</button>
        </form>
    </div>
</body>