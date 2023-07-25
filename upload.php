<?php
// Database configuration
$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName     = 'pdf_example';

// Create a new database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the uploaded PDF file
if ($_FILES['pdf']['error'] === UPLOAD_ERR_OK) {
    $pdfName = $_FILES['pdf']['name'];
    $pdfData = file_get_contents($_FILES['pdf']['tmp_name']);
    $pdfData = $conn->real_escape_string($pdfData);

    // Insert the PDF file into the database
    $sql = "INSERT INTO pdf_files (name, file) VALUES ('$pdfName', '$pdfData')";
    if ($conn->query($sql) === TRUE) {
        echo "PDF uploaded successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error uploading the PDF file.";
}

// Close the database connection
$conn->close();
?>
