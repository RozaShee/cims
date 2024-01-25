<?php
// delete_price.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $priceId = $data['priceId'];

    $host = 'localhost';
    $dbname = 'cimsdb';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Perform your deletion logic for the price entry here
        $stmt = $pdo->prepare("DELETE FROM price_table WHERE price_id = :priceId");
        $stmt->bindParam(':priceId', $priceId);
        $stmt->execute();

        // Send a response
        echo json_encode(['success' => true, 'message' => 'Price entry deleted successfully']);
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
