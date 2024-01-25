<?php
// your_delete_endpoint.php

// Assuming you're using POST method to receive data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Decode JSON data
    $data = json_decode(file_get_contents('php://input'), true);

    // Extract variables
    $customerId = $data['customerId'];

    // Connect to the database
    $host = 'localhost';
    $dbname = 'cimsdb';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Perform your deletion logic here
        $stmt = $pdo->prepare("DELETE FROM customer WHERE customer_id = :customerId");
        $stmt->bindParam(':customerId', $customerId);
        $stmt->execute();

        // Send a response (you can customize this based on your needs)
        echo json_encode(['success' => true, 'message' => 'Data deleted successfully']);
    } catch (PDOException $e) {
        // Handle database errors
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    // Invalid request method
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Invalid request method']);
}
?>
