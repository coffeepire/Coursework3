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
$document_id = $_POST['document_id'];
$title = $_POST['title'];
$content = $_POST['content'];
$date_created = $_POST['dateCreated'];


$sql = "UPDATE documents SET document_id=?, title=?, content=?, date_created=? WHERE id=?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}


$stmt->bind_param("isssi", $document_id, $title, $content, $date_created, $id);


if ($stmt->execute()) {
    echo "Document updated successfully";
} else {
    echo "Error updating document: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
