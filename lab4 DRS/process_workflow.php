<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "myappdb"; 

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $workflowName = $_POST['workflowName'];
    $currentStage = $_POST['currentStage'];
    $nextStage = $_POST['nextStage'];

    
    $sql = "INSERT INTO Workflow (WorkflowName, CurrentStage, NextStage)
            VALUES ('$workflowName', '$currentStage', '$nextStage')";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("Location: department.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Form not submitted.";
}
?>
