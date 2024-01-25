<?php
// delete_branch.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $branchId = $data['branchId'];

    $host = 'localhost';
    $dbname = 'cimsdb';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Perform your deletion logic for the branch here
        $stmt = $pdo->prepare("DELETE FROM branch WHERE branch_id = :branchId");
        $stmt->bindParam(':branchId', $branchId);
        $stmt->execute();

        // Send a response
        echo json_encode(['success' => true, 'message' => 'Branch deleted successfully']);
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
