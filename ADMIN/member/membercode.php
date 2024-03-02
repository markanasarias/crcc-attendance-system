<?php
session_start();
require 'dbcon.php';
require_once 'phpqrcode/qrlib.php';

// Specify the path directory for profile images
$path = 'images/';
$qrcode = $path.time().".jpg";
$qrimage = time().".jpg";

// Function to generate a password based on qrtext and birthday
function generatePassword($qrtext, $birthday) {
    // Remove spaces from the qrtext and convert it to lowercase
    $qrtext = strtolower(str_replace(' ', '', $qrtext));
    
    // Format the date of birth in "ymd" format without hyphens
    $formattedBirthday = date("mdy", strtotime($birthday));

    // You can choose your own logic to generate the password.
    // Here's a simple example using concatenation:
    $password = $qrtext . $formattedBirthday;

    $hashedPassword = md5($password);

    // Return the hashed password
    return $hashedPassword;
}

$qrtext = $address = $birthday = $gender = $profile = '';

if(isset($_REQUEST['pastor-btn'])) {
    $qrtext = $_REQUEST['qrtext'];
    $birthday = $_REQUEST['birthday'];
    $gender = $_REQUEST['gender'];
    $role = $_REQUEST['role'];
    $address = $_REQUEST['address'];
    $contact = $_REQUEST['contact'];
    $email = $_REQUEST['email'];
    $ecname = $_REQUEST['ecname'];
    $eccontact = $_REQUEST['eccontact'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "images/" . $filename;

    // Check if a record with the same 'adminqrtext' exists
    $check_query_qrtext = "SELECT * FROM qrcode WHERE qrtext = '$qrtext'";
    $check_query_email = "SELECT * FROM qrcode WHERE email = '$email'";
    $check_query_contact = "SELECT * FROM qrcode WHERE contact = '$contact'";
    
    $check_query_run_qrtext = mysqli_query($con, $check_query_qrtext);
    $check_query_run_email = mysqli_query($con, $check_query_email);
    $check_query_run_contact = mysqli_query($con, $check_query_contact);

    if (mysqli_num_rows($check_query_run_qrtext) > 0) {
        // A record with the same 'qrtext' already exists
        $_SESSION['status'] = "Member Already Exists!";
        $_SESSION['icon'] = "warning";
        header("Location: ../pastoraddlayout.php");
        exit(0);
    } elseif (mysqli_num_rows($check_query_run_email) > 0) {
        // A record with the same 'email' already exists
        $_SESSION['status'] = "Email Already Exists!";
        $_SESSION['icon'] = "warning";
        header("Location: ../pastoraddlayout.php");
        exit(0);
    } elseif (mysqli_num_rows($check_query_run_contact) > 0) {
        // A record with the same 'contact' already exists
        $_SESSION['status'] = "Contact Already Exists!";
        $_SESSION['icon'] = "warning";
        header("Location: ../pastoraddlayout.php");
        exit(0);
    } else {
        $password = generatePassword($qrtext, $birthday);

        $query = "INSERT INTO qrcode (qrtext, birthday, gender, address, contact, email, ecname, eccontact, role, password, image_path1, qrimage) VALUES ('$qrtext', '$birthday', '$gender', '$address', '$contact', '$email', '$ecname', '$eccontact', '$role', '$password', '$filename', '$qrimage')";
        $query_run = mysqli_query($con, $query);

        if (move_uploaded_file($tempname, $folder)) {
            $_SESSION['status'] = "Success";
            $_SESSION['icon'] = "success";
            QRcode::png($qrtext, $qrcode, 'H', 20, 0);
            echo "<img src='".$qrcode."'>";
            header("Location: ../pastorlayout.php");
        } else {
            $_SESSION['status'] = "Failed";
            $_SESSION['icon'] = "warning";
            header("Location: ../pastorlayout.php");
            exit(0);
        }
    }
}

//pastor

if(isset($_REQUEST['sbt-btn'])) {
    $qrtext = $_REQUEST['qrtext'];
    $birthday = $_REQUEST['birthday'];
    $gender = $_REQUEST['gender'];
    $role = $_REQUEST['role'];
    $address = $_REQUEST['address'];
    $contact = $_REQUEST['contact'];
    $email = $_REQUEST['email'];
    $ecname = $_REQUEST['ecname'];
    $eccontact = $_REQUEST['eccontact'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "images/" . $filename;

    // Check if a record with the same 'adminqrtext' exists
    $check_query_qrtext = "SELECT * FROM qrcode WHERE qrtext = '$qrtext'";
    $check_query_email = "SELECT * FROM qrcode WHERE email = '$email'";
    $check_query_contact = "SELECT * FROM qrcode WHERE contact = '$contact'";
    
    $check_query_run_qrtext = mysqli_query($con, $check_query_qrtext);
    $check_query_run_email = mysqli_query($con, $check_query_email);
    $check_query_run_contact = mysqli_query($con, $check_query_contact);

    if (mysqli_num_rows($check_query_run_qrtext) > 0) {
        // A record with the same 'qrtext' already exists
        $_SESSION['status'] = "Member Already Exists!";
        $_SESSION['icon'] = "warning";
        header("Location: ../memberaddlayout.php");
        exit(0);
    } elseif (mysqli_num_rows($check_query_run_email) > 0) {
        // A record with the same 'email' already exists
        $_SESSION['status'] = "Email Already Exists!";
        $_SESSION['icon'] = "warning";
        header("Location: ../memberaddlayout.php");
        exit(0);
    } elseif (mysqli_num_rows($check_query_run_contact) > 0) {
        // A record with the same 'contact' already exists
        $_SESSION['status'] = "Contact Already Exists!";
        $_SESSION['icon'] = "warning";
        header("Location: ../memberaddlayout.php");
        exit(0);
    } else {
        $password = generatePassword($qrtext, $birthday);

        $query = "INSERT INTO qrcode (qrtext, birthday, gender, address, contact, email, ecname, eccontact, role, password, image_path1, qrimage) VALUES ('$qrtext', '$birthday', '$gender', '$address', '$contact', '$email', '$ecname', '$eccontact', '$role', '$password', '$filename', '$qrimage')";
        $query_run = mysqli_query($con, $query);

        if (move_uploaded_file($tempname, $folder)) {
            $_SESSION['status'] = "Success";
            $_SESSION['icon'] = "success";
            QRcode::png($qrtext, $qrcode, 'H', 20, 0);
            echo "<img src='".$qrcode."'>";
            header("Location: ../memberlayout.php");
        } else {
            $_SESSION['status'] = "Failed";
            $_SESSION['icon'] = "warning";
            header("Location: ../memberlayout.php");
            exit(0);
        }
    }
}



if(isset($_REQUEST['editmember_btn'])) {
    $id = $_REQUEST['editmember_id'];
    $qrtext = $_REQUEST['editmember_qrtext'];
    $birthday = $_REQUEST['editmember_birthday'];
    $gender = $_REQUEST['editmember_gender'];
    $role = $_REQUEST['editmember_role'];
    $address = $_REQUEST['editmember_address'];
    $contact = $_REQUEST['editmember_contact'];
    $email = $_REQUEST['editmember_email'];
    $ecname = $_REQUEST['editmember_ecname'];
    $eccontact = $_REQUEST['editmember_eccontact'];
    $new_image = $_FILES['editmember_uploadfile']['name'];
    $old_image = $_REQUEST['editmember_uploadfile_old'];

    if($new_image !='')
    {
        $update_filename = $new_image;
        if(file_exists("images/".$_FILES['editmember_uploadfile']['name']))
        {
            $filename = $_FILES['editmember_uploadfile']['name'];
            header("Location: ../memberlayout.php");
        }
    }
    else{
        $update_filename = $old_image;
    }
    $query = "UPDATE qrcode SET qrtext='$qrtext', birthday='$birthday', gender='$gender', address='$address', contact='$contact', email='$email', ecname='$ecname', eccontact='$eccontact', role='$role', image_path1='$update_filename' WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        if($_FILES['editmember_uploadfile']['name'] !='')
        {
            move_uploaded_file($_FILES["editmember_uploadfile"]["tmp_name"], "images/".$_FILES["editmember_uploadfile"]["name"]);
            unlink("images/".$old_image);
        }
        $_SESSION['status'] = "Success";
        $_SESSION['icon'] = "success";
        header('Location: ../memberlayout.php');
    }
    else{
        $_SESSION['status'] = "Failed";
        $_SESSION['icon'] = "warning";
        header('Location: ../memberlayout.php');
    }
    }

    //edit pastor

    if(isset($_REQUEST['editpastor_btn'])) {
        $id = $_REQUEST['editmember_id'];
        $qrtext = $_REQUEST['editmember_qrtext'];
        $birthday = $_REQUEST['editmember_birthday'];
        $gender = $_REQUEST['editmember_gender'];
        $role = $_REQUEST['editmember_role'];
        $address = $_REQUEST['editmember_address'];
        $contact = $_REQUEST['editmember_contact'];
        $email = $_REQUEST['editmember_email'];
        $ecname = $_REQUEST['editmember_ecname'];
        $eccontact = $_REQUEST['editmember_eccontact'];
        $new_image = $_FILES['editmember_uploadfile']['name'];
        $old_image = $_REQUEST['editmember_uploadfile_old'];
    
        if($new_image !='')
        {
            $update_filename = $new_image;
            if(file_exists("images/".$_FILES['editmember_uploadfile']['name']))
            {
                $filename = $_FILES['editmember_uploadfile']['name'];
                header("Location: ../pastorlayout.php");
            }
        }
        else{
            $update_filename = $old_image;
        }
        $query = "UPDATE qrcode SET qrtext='$qrtext', birthday='$birthday', gender='$gender', address='$address', contact='$contact', email='$email', ecname='$ecname', eccontact='$eccontact', role='$role', image_path1='$update_filename' WHERE id='$id' ";
        $query_run = mysqli_query($con, $query);
    
        if($query_run)
        {
            if($_FILES['editmember_uploadfile']['name'] !='')
            {
                move_uploaded_file($_FILES["editmember_uploadfile"]["tmp_name"], "images/".$_FILES["editmember_uploadfile"]["name"]);
                unlink("images/".$old_image);
            }
            $_SESSION['status'] = "Success";
            $_SESSION['icon'] = "success";
            header('Location: ../pastorlayout.php');
        }
        else{
            $_SESSION['status'] = "Failed";
            $_SESSION['icon'] = "warning";
            header('Location: ../pastorlayout.php');
        }
        }
?> 