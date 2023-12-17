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
$newDepartmentID = $_POST['newDepartmentID'];
$departmentName = $_POST['departmentName'];

$sql = "UPDATE Department SET DepartmentID='$newDepartmentID', DepartmentName='$departmentName' WHERE DepartmentID='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Department updated successfully";
} else {
    echo "Error updating department: " . $conn->error;
}

$conn->close();
?>
