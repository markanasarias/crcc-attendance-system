<?php
session_start();
include 'dbcon.php';
// Check if a POST request with scan data was made
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Parse the scan data from the POST request
    $content = $_POST['scanResult'];

    // Additional data for name, date, and time // You can change this to the desired name
    $date = date('Y-m-d'); // Get the current date in the format 'YYYY-MM-DD'

    // Check if a record for this name already exists in a separate table (replace 'qrcode' with your table name)
    $stmt = $con->prepare("SELECT COUNT(*) FROM qrcode WHERE qrtext = ?");
    $stmt->bind_param('s', $content);
    $stmt->execute();
    $stmt->bind_result($nameCount);
    $stmt->fetch();
    $stmt->close();

    if ($nameCount == 1) {
        // Check if a record for this name and date already exists in the "logs" table
        $stmt = $con->prepare("SELECT COUNT(*) FROM logs WHERE name = ? AND date = ?");
        $stmt->bind_param('ss', $content, $date);
        $stmt->execute();
        $stmt->bind_result($existingCount);
        $stmt->fetch();
        $stmt->close();

        if ($existingCount == 0) {
            // Prepare the SQL statement to insert data into the "logs" table
            $insertStmt = $con->prepare("INSERT INTO logs (name, date, time) VALUES (?, ?, NOW())");
            $insertStmt->bind_param('ss', $content, $date);
            $insertStmt->execute();

            // Send a response (you can customize the response as needed)
            $_SESSION['attendance'] = "Attendance has been securely recorded.";
            $_SESSION['icon'] = "success";

            // Additional code for updating member statuses
            // Calculate the date one month ago
            $oneMonthAgo = date('Y-m-d', strtotime('-1 month'));

            // Query to update member statuses based on attendance
            $query = "UPDATE qrcode m
                      SET m.status = 0
                      WHERE EXISTS (
                          SELECT 1
                          FROM logs l
                          WHERE l.name = m.qrtext
                          AND l.date >= '$oneMonthAgo'
                      )";

            // Execute the query to update active members 
            $result = mysqli_query($con, $query);

            // Update inactive members
            $query = "UPDATE qrcode
                      SET status = 1
                      WHERE qrtext NOT IN (
                          SELECT name
                          FROM logs
                          WHERE date >= '$oneMonthAgo'
                      )";

            // Execute the query to update inactive members
            $result2 = mysqli_query($con, $query);

            if ($result && $result2) {
                echo "Member statuses updated successfully.";
            } else {
                echo "Error updating member statuses: " . mysqli_error($con);
            }
        } else {
            // Send a response for duplicate entry
            $_SESSION['attendance'] = "Attendance logged for the day!";
            $_SESSION['icon'] = "error";
        }
    } else {
        // Send a response for member not found
        $_SESSION['attendance'] = "Member not found!";
        $_SESSION['icon'] = "error";
    }

    // Close the database connection
    mysqli_close($con);

    // Redirect to index.php regardless of success or error
    header("Location: index.php");
} else {
    // Handle other HTTP request methods or direct URL access
    echo "Invalid request.";
}
?>
