<?php
// Include your database connection code here
$con =  mysqli_connect("localhost", "root", "" , "cimsdb") or die("Database Connection Fail"); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $delivery_process_rating = $_POST['delivery_process_rating'];
    $service_satisfaction_rating = $_POST['service_satisfaction_rating'];
    $package_condition_rating = $_POST['package_condition_rating'];
    $suggestions = $_POST['suggestions'];

    // Insert the feedback into the database
    $insertQuery = "INSERT INTO feedback (username, delivery_process_rating, service_satisfaction_rating, package_condition_rating, suggestions) VALUES ('$username', '$delivery_process_rating', '$service_satisfaction_rating', '$package_condition_rating', '$suggestions')";
    if (mysqli_query($con, $insertQuery)) {
        echo "Feedback submitted successfully.";
        header("refresh:1;url=admin/display_feedback.php");
    } else {
        echo "Error submitting feedback: " . mysqli_error($con);
    }

    // Close the database connection if needed
    mysqli_close($con);
}