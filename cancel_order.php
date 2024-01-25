<?php
$con =  mysqli_connect("localhost", "root", "" , "cimsdb") or die("Database Connection Fail");
if (isset($_GET['request_id'])) {
    $request_id = $_GET['request_id'];

    // Perform the update query to set tracking_status to 5 (canceled)
    $updateQuery = "UPDATE request SET tracking_status = 5 WHERE request_id = $request_id";

    // Execute the query
    if (mysqli_query($con, $updateQuery)) {
        echo "Order canceled successfully.";
        header("refresh:1;url=tracking.php");
    } else {
        echo "Error updating order status: " . mysqli_error($con);
    }

    // Close the database connection if needed
    mysqli_close($con);
} else {
    echo "Invalid request.";
}
?>
