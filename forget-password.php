<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

session_start();
include('config.php'); // Database Connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim(htmlspecialchars($_POST['email']));

    // Check if email exists in `signup`
    $stmt = $con->prepare("SELECT * FROM signup WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $otp = rand(100000, 999999);
        $otp_expires = date('Y-m-d H:i:s', strtotime('+10 minutes'));

        // Check if OTP entry exists
        $stmt = $con->prepare("SELECT * FROM f_password WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $otpResult = $stmt->get_result();

        if ($otpResult->num_rows > 0) {
            // Update OTP
            $stmt = $con->prepare("UPDATE f_password SET otp = ?, otp_attempts = 0, otp_expires = ?, otp_locked = NULL WHERE email = ?");
            $stmt->bind_param("sss", $otp, $otp_expires, $email);
        } else {
            // Insert new OTP
            $stmt = $con->prepare("INSERT INTO f_password (email, otp, otp_attempts, otp_expires) VALUES (?, ?, 0, ?)");
            $stmt->bind_param("sss", $email, $otp, $otp_expires);
        }
        $stmt->execute();

        // Send OTP via email
        if (sendOTP($email, $otp)) {
            $_SESSION['email'] = $email;
            header("Location: verify-otp.php");
            // exit();
        } else {
            echo "<script>alert('Error sending OTP. Please try again later.');</script>";
        }
    }

    // Generic message to prevent email enumeration
    echo "<script>alert('If your email is registered, you will receive an OTP shortly.');</script>";
}

// Function to send OTP via email
function sendOTP($email, $otp)
{
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'bhaiphp@gmail.com'; // Store securely
        $mail->Password = 'tqnp vikw vnqb mdrb';   // Use App Password, NEVER real password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('bhaiphp@gmail.com', 'Support Team');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Your OTP for Password Reset';
        $mail->Body = "Your OTP is: <b>$otp</b>. This OTP will expire in 10 minutes.";

        return $mail->send();
    } catch (Exception $e) {
        error_log("Mailer Error: " . $mail->ErrorInfo);
        return false;
    }
}
?>


<?php
include_once "before-loginheader.php";
?>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Forgot Password</h2>
        <form method="post" action="">
            <div class="mb-3">
                <label for="email" class="form-label">Enter your registered email</label>
                <input type="email" name="email" class="form-control" data-validation="required email">
                <div class="error" id="emailError"></div>
            </div>
            <button type="submit" class="btn btn-secondary mt-3 ">Send OTP</button>
        </form>
    </div>
</body>

</html>