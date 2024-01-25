<?php
$db = mysqli_connect('localhost', 'root', '', 'cimsdb');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "SELECT price_id, price FROM price_table WHERE is_deleted = 0";
$result = $db->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'price_id' => $row['price_id'],
            'price' => $row['price'],
        ];
    }
}

echo json_encode($data);
$db->close();
?>
