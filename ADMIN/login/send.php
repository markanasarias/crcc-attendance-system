<?php
session_start();
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include PHPMailer
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Your email settings
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';  // Replace with your SMTP server
$mail->SMTPAuth = true;
$mail->Username = 'markanasarias6@gmail.com';  // Replace with your email
$mail->Password = 'voxl hkmv afke ncfn';  // Replace with your email password
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Database connection settings
$con = mysqli_connect("localhost", "root", "", "blog");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Other mail settings
$mail->setFrom('markanasarias6@gmail.com', 'CRCC');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    // Get the submitted email
    $email = $_POST['email'];

    // Check if the email exists in the qrcode table
    $sql = "SELECT * FROM qrcode WHERE email = '$email'";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Email exists, generate a unique token (for simplicity, a random string in this example)
        $token = bin2hex(random_bytes(32));

        // Send the reset link to the user's email
        $mail->addAddress($email);
        $mail->Subject = 'Password Reset Link';
        $mail->isHTML(true);
        $mail->Body = 'Click the following link to reset your password: <a href="http://localhost/crcc-attendance-system/ADMIN/login/resetpass.php?token=' . $token . '">Reset Password</a>';

        // Enable debugging
        $mail->SMTPDebug = 2; // Enable verbose debug output
        $mail->Debugoutput = 'html'; // Format debug output as HTML

        try {
            // Try to send the email
            if ($mail->send()) {
                $_SESSION['status'] = "Please check youre email!";
                $_SESSION['icon'] = "success";
                // Redirect to the appropriate page
                header("Location: forgotpass.php");
                exit(); // Ensure that no further code is executed after the redirect
            } else {
                throw new Exception('Error sending email: ' . $mail->ErrorInfo);
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            // Redirect to the appropriate page
            header("Location: ../memberaddlayout.php");
            exit(); // Ensure that no further code is executed after the redirect
        }
    } else {
        $_SESSION['status'] = "Your Email not registered!";
        $_SESSION['icon'] = "warning";
        header("Location: forgotpass.php");

    }

    // Close the database connection
    mysqli_close($con);
}
?>
