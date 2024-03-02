<?php
session_start();
require 'dbcon.php';


if(isset($_POST['eventbtnsave'])){
    $date = $_POST['date'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Format the date from 'Y-m-d\TH:i' to 'Y-m-d h:i A'
    $formattedDate = date("Y-m-d h:i A", strtotime($date));

    // Check if a record with the same date and title exists
    $check_query = "SELECT * FROM event WHERE start_datetime = '$formattedDate' AND title = '$title'";
    $check_query_run = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_query_run) > 0) {
        // A record with the same date and title already exists
        $_SESSION['status'] = "Duplicate entry";
        $_SESSION['icon'] = "warning";
        header("location: ../eventlayout.php");
        exit(0);
    } else {
        // No duplicate entry found, proceed to insert
        $insert_query = "INSERT INTO event(start_datetime, title, description) VALUES ('$formattedDate', '$title', '$description')";
        $insert_query_run = mysqli_query($con, $insert_query);

        if($insert_query_run)
        {
            $_SESSION['status'] = "Success";
            $_SESSION['icon'] = "success";
            header("location: ../eventlayout.php");
            exit(0);
        }
        else
        {
            $_SESSION['status'] = "Failed";
            $_SESSION['icon'] = "warning";
            header("location: ../eventlayout.php");
            exit(0);
        }
    }
}





    if(isset($_POST['editeventbtnsave']))
{
    $id = $_POST['editid'];
    $date = $_POST['editdate'];
    $title = $_POST['edittitle'];
    $description = $_POST['editdescription'];

    $query = "UPDATE event SET start_datetime='$date', title='$title', description='$description' WHERE id='$id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Success";
        $_SESSION['icon'] = "success";
        header("location: ../eventlayout.php");
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Failed";
        $_SESSION['icon'] = "warning";
        header("location: ../eventlayout.php");
        exit(0);
    }

}

?>