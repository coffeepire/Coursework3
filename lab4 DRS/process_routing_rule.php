<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ruleId = $_POST['ruleId'];
    $ruleName = $_POST['ruleName'];
    $criteria = $_POST['criteria'];
    $action = $_POST['action'];

    
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "myappdb"; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "INSERT INTO RoutingRules ( RuleName, Criteria, Action)
            VALUES ( '$ruleName', '$criteria', '$action')";

   if ($conn->query($sql) === TRUE) {
    
    $conn->close();
    header("Location: add_workflow.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

    $conn->close();
} else {
    echo "Form not submitted.";
}
?>
