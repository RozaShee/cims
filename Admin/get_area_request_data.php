<?php
$db = mysqli_connect('localhost', 'root', '', 'cimsdb');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "SELECT send_location AS area_name, COUNT(*) as request_count FROM request GROUP BY send_location";
$result = $db->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'area_name' => $row['area_name'],
            'request_count' => $row['request_count'],
        ];
    }
}

echo json_encode($data);
$db->close();
?>
