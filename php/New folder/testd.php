<?php
function getPublicIP() {
    $url = 'https://ipinfo.io/ip';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

    $publicIP = curl_exec($ch);

    if (curl_errno($ch)) {

        $publicIP = 'Error: ' . curl_error($ch);
    }

    curl_close($ch);

   return trim(strval($publicIP));
}


$publicIP = getPublicIP();


$host = 'localhost';
$username = 'root';
$password = 'Softwaremaker@123';
$dbname = 'id20894189_localhost';


$connection = new mysqli($host, $username, $password, $dbname);


if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "INSERT INTO visitor_ips (ip_address) VALUES ('$publicIP')";


if ($connection->query($sql) === TRUE) {
    echo "Record added successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

$connection->close();
?>
