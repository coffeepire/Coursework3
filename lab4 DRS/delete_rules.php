<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myappdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];

$sql = "DELETE FROM RoutingRules WHERE RuleID='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Routing rule deleted successfully";
} else {
    echo "Error deleting routing rule: " . $conn->error;
}

$conn->close();
?>
