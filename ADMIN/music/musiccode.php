<?php
session_start();
require 'dbcon.php';


if(isset($_POST['musicbtnsave'])){
    $name = $_POST['name'];
    $role = $_POST['role'];

    // Check if a record with the same name exists
    $check_query = "SELECT * FROM music WHERE name = '$name'";
    $check_query_run = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_query_run) > 0) {
        // A record with the same name already exists
        $_SESSION['status'] = "Name Already Exists";
        $_SESSION['icon'] = "warning";
        header("location: ../musiclayout.php");
        exit(0);
    } else {
        // No duplicate entry found, proceed to insert
        $insert_query = "INSERT INTO music(name, role) VALUES ('$name', '$role')";
        $insert_query_run = mysqli_query($con, $insert_query);

        if($insert_query_run)
        {
            $_SESSION['status'] = "Success";
            $_SESSION['icon'] = "success";
            header("location: ../musiclayout.php");
            exit(0);
        }
        else
        {
            $_SESSION['status'] = "Failed";
            $_SESSION['icon'] = "warning";
            header("location: ../musiclayout.php");
            exit(0);
        }
    }
}


    if(isset($_POST['editmusicbtnsave']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $role = $_POST['role'];

    $query = "UPDATE music SET name='$name', role='$role' WHERE id='$id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Success";
        $_SESSION['icon'] = "success";
        header("location: ../musiclayout.php");
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Failed";
        $_SESSION['icon'] = "warning";
        header("location: ../musiclayout.php");
        exit(0);
    }

}

?>