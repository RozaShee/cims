<?php
$db = mysqli_connect('localhost', 'root', '', 'cimsdb');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "SELECT * FROM customer";
$result = $db->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $gender = $row['gender']; // Assuming 'gender' is the column representing gender in the 'customer' table

        $data[] = [
            'gender' => $gender,
        ];
    }
}

echo json_encode($data);
$db->close();
?>
