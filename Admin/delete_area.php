<?php
// delete_area.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $areaId = $data['areaId'];

    $host = 'localhost';
    $dbname = 'cimsdb';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Perform your deletion logic for the area here
        $stmt = $pdo->prepare("DELETE FROM area WHERE area_id = :areaId");
        $stmt->bindParam(':areaId', $areaId);
        $stmt->execute();

        // Send a response
        echo json_encode(['success' => true, 'message' => 'Area deleted successfully']);
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
