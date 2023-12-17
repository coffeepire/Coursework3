<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myappdb";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_POST['id'];

    
    $sql = "DELETE FROM documents WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Document deleted successfully";
    } else {
        echo "Error deleting document: " . $conn->error;
    }

    $conn->close();
}
?>
