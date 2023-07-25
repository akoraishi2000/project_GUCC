<?php
// Retrieve the form inputs
$name = $_POST['inputUsername'];
$designation = $_POST['inputFirstName'];
$email = $_POST['inputEmailAddress'];
$photo = $_FILES['inputPhoto']['tmp_name'];
$address = $_POST['inputAddress'];
$facebook = $_POST['inputOrgName'];
$linkedin = $_POST['inputLinkedIn'];
$birthday = $_POST['inputBirthday'];
$phone = $_POST['inputPhone'];
$C_ID = $_POST['C_ID'];

// Database connection details
$servername = "localhost";
$username = "root"; // Replace with your own username
$password = ""; // Replace with your own password
$dbname = "gucc";

// Create a new MySQL connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare the photo for insertion
$photoData = addslashes(file_get_contents($photo));

// Create the SQL query
$sql = "UPDATE committee SET 
            Name = '$name',
            Designation = '$designation',
            Email = '$email',
            Photo = '$photoData',
            Address = '$address',
            Facebook = '$facebook',
            LinkedIn = '$linkedin',
            Birthday = '$birthday',
            Phone = '$phone'
            WHERE C_ID = '$C_ID'";

// Execute the query
if (mysqli_query($conn, $sql)) {
    echo "Data has been successfully inserted into the database.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
?>
