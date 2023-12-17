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
$workflowName = $_POST['workflowName'];
$currentStage = $_POST['currentStage'];
$nextStage = $_POST['nextStage'];

$sql = "UPDATE Workflow SET WorkflowName='$workflowName', CurrentStage='$currentStage', NextStage='$nextStage' WHERE WorkflowID='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Workflow updated successfully";
} else {
    echo "Error updating workflow: " . $conn->error;
}

$conn->close();
?>
