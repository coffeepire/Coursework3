<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE TABLE Workflow (
    WorkflowID INT AUTO_INCREMENT PRIMARY KEY,
    WorkflowName VARCHAR(255) NOT NULL,
    CurrentStage VARCHAR(255) NOT NULL,
    NextStage VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Workflow table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
