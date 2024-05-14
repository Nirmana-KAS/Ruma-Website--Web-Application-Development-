<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin_panel";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	$jCode = "<script>alert("hkj")</script>";
    echo $jCode;
    die("Connection failed: " . $conn->connect_error);

}
else{
	$jsCode = "<script>alert("jbj")</script>";
       echo $jsCode;
}
?>
<?php
// ... (previous code for database connection)

// Endpoint to add a new advertisement
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $title = $data['title'];
    $description = $data['description'];
    $imageUrl = $data['imageUrl'];

    $sql = "INSERT INTO advertisements (title, description, image_url) VALUES ('$title', '$description', '$imageUrl')";
    if ($conn->query($sql) === true) {
        $advertisementId = $conn->insert_id;
        $response = array("id" => $advertisementId, "title" => $title, "description" => $description, "imageUrl" => $imageUrl);
        echo json_encode($response);
    } else {
        echo json_encode(array("error" => "Failed to add advertisement"));
    }
}

// Endpoint to fetch all advertisements
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM advertisements";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $advertisements = array();
        while ($row = $result->fetch_assoc()) {
            $advertisements[] = $row;
        }
        echo json_encode($advertisements);
    } else {
        echo json_encode(array());
    }
}

// Endpoint to remove an advertisement by ID
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $data);
    $advertisementId = $data['id'];

    $sql = "DELETE FROM advertisements WHERE id = '$advertisementId'";
    if ($conn->query($sql) === true) {
        echo json_encode(array("message" => "Advertisement deleted successfully"));
    } else {
        echo json_encode(array("error" => "Failed to delete advertisement"));
    }
}

// ... (previous code for database connection)
?>
<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin_pane";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
