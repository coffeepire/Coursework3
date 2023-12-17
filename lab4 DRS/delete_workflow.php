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


$sql = "DELETE FROM Workflow WHERE WorkflowID='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Workflow deleted successfully";
} else {
    echo "Error deleting workflow: " . $conn->error;
}

$conn->close();
?>
