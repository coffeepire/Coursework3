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

    
    $departmentId = intval($_POST['departmentId']);
    $departmentName = $_POST['departmentName'];

    
    $sql = "INSERT INTO Department (DepartmentID, DepartmentName) VALUES ('$departmentId', '$departmentName')";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("Location: home.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Form not submitted.";
}
?>
