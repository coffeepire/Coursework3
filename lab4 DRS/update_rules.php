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
$ruleName = $_POST['ruleName'];
$criteria = $_POST['criteria'];
$action = $_POST['action'];

$sql = "UPDATE RoutingRules SET RuleName=?, Criteria=?, Action=? WHERE RuleID=?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}

$stmt->bind_param("sssi", $ruleName, $criteria, $action, $id);

if ($stmt->execute()) {
    echo "Routing rule updated successfully";
} else {
    echo "Error updating routing rule: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
