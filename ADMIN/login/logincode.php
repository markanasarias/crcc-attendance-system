<?php
$con = mysqli_connect("localhost", "root", "", "blog");
session_start();

if (isset($_POST['email']) && isset($_POST['password'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);

    if (empty($email)) {
        header("Location: login-index.php?error=User Name is required");
        exit();
    } elseif (empty($pass)) {
        header("Location: login-index.php?error=Password is required");
        exit();
    } else {
        // Hash the entered password using MD5
        $hashedPassword = md5($pass);

        $sql = "SELECT * FROM qrcode WHERE email='$email' AND password='$hashedPassword'";

        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $hashedPassword) {
                if ($row['status'] === '0') {
                    if ($row['role'] === 'Admin') {
                        // Admin is active and has the 'admin' role, allow login
                        $_SESSION['alogin'] = $row['id'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['status'] = "Successfully Log In!";
                        $_SESSION['icon'] = "success";
                        header("Location: ../index.php");
                        exit();
                    } else {
                        // User is not an admin, prevent login
                        $_SESSION['status'] = "You're not allowed to log in!";
                        $_SESSION['icon'] = "warning";
                        header("Location: /crcc-attendance-system/index.php");
                        exit();
                    }
                } else {
                    // Admin is inactive, prevent login
                    $_SESSION['status'] = "Your account is inactive!";
                    $_SESSION['icon'] = "warning";
                    header("Location: /crcc-attendance-system/index.php");
                    exit();
                }
            } else {
                $_SESSION['status'] = "Incorrect Email or Password!";
                $_SESSION['icon'] = "warning";
                header("Location: /crcc-attendance-system/index.php");
                exit();
            }
        } else {
            $_SESSION['status'] = "Incorrect Email or Password!";
            $_SESSION['icon'] = "warning";
            header("Location: /crcc-attendance-system/index.php");
            exit();
        }
    }
} else {
    $_SESSION['status'] = "Incorrect Email or Password!";
    $_SESSION['icon'] = "warning";
    header("Location: /crcc-attendance-system/index.php");
    exit();
}
?>
