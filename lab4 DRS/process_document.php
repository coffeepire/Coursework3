<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $title = $_POST['title'];
    $content = $_POST['content'];
    $dateCreated = $_POST['dateCreated'];
    $documentId = $_POST['documentId']; // Updated variable name

    // Include Document.php only if necessary
    // include 'Document.php'; 
    
    // Assuming Document.php contains a Document class definition

    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "myappdb"; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statements to prevent SQL injection
    $sql = "INSERT INTO documents (document_id, title, content, date_created)
            VALUES (?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $documentId, $title, $content, $dateCreated);
    
    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("Location: routing.php");
        exit(); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Form not submitted.";
}
?>
