<?php
// Establish database connection
$conn = mysqli_connect("localhost", "root", "", "gucc");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

    // Start a new session
    session_start();

    // Get user input from form
    $id = $_POST['Student_ID'];
    $password = $_POST['password'];

    // Query database to find user with matching ID
    $query = "SELECT Student_ID, Password FROM member WHERE Student_ID = '$id'";
    $result = mysqli_query($conn, $query);

    // If ID exists, verify password
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row["Password"];
        if ($password == $hashed_password) {
            // Password is correct, store data in session variables
            $_SESSION["id"] = $id;
            $_SESSION["password"] = $password;
            $_SESSION["loggedin"] = true;

            // Redirect to home page
            header("location: member_profile.php");
            exit;
        } else {
            // Display an error message if password is not valid
            echo "Invalid password!";
        }
    } else {
        // Display an error message if ID doesn't exist
        echo "User with that ID does not exist!";
    }

    // Free result set
    mysqli_free_result($result);

// Close connection
mysqli_close($conn);
?>
