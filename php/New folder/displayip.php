<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ip";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT *, (SELECT COUNT(*) FROM visitor_ips) AS count  FROM visitor_ips";
$result = $conn->query($sql);

$rows = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
}

$conn->close();


header('Content-Type: application/json');
echo json_encode($rows);
?>
