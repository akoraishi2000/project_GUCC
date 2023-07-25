<?php

//experiment number 1
// // Database configuration
// $dbHost     = 'localhost';
// $dbUsername = 'root';
// $dbPassword = '';
// $dbName     = 'pdf_example';

// // Create a new database connection
// $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// // Check the connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Get the PDF file from the database
// $pdfId = $_GET['id'];
// $sql = "SELECT name, file FROM pdf_files WHERE id = $pdfId";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     $row = $result->fetch_assoc();
//     $pdfName = $row['name'];
//     $pdfData = $row['file'];

//     // Send the appropriate headers for PDF file download
//     header('Content-Description: File Transfer');
//     header('Content-Type: application/pdf');
//     header("Content-Disposition: attachment; filename=\"$pdfName\"");
//     header('Expires: 0');
//     header('Cache-Control: must-revalidate');
//     header('Pragma: public');
//     header('Content-Length: ' . strlen($pdfData));
//     ob_clean();
//     flush();
//     echo $pdfData;
//     exit;
// } else {
//     echo "PDF not found.";
// }

// // Close the database connection
// $conn->close();




//experiment number 2
// Database configuration
$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName     = 'gucc'; // Updated to match the database name in code number 1

// Create a new database connection
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the PDF file from the database
$pdfId = $_GET['id'];
$sql = "SELECT * FROM notices WHERE N_ID = $pdfId"; // Updated table name to match code number 1
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $pdfName = $row['title'];
    $pdfData = $row['pdf']; // Update this variable based on the location or data of the PDF file in your database

    // Send the appropriate headers for PDF file download
    header('Content-Description: File Transfer');
    header('Content-Type: application/pdf');
    header("Content-Disposition: attachment; filename=\"$pdfName.pdf\"");
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . strlen($pdfData));
    ob_clean();
    flush();
    echo $pdfData;
    exit;
} else {
    echo "PDF not found.";
}

// Close the database connection
mysqli_close($conn);
?>

