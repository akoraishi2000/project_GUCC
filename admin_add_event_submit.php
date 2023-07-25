<?php
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION["id"]) && isset($_SESSION["password"])) {
    // Retrieve the session variables
    $id = $_SESSION["id"];
    $password = $_SESSION["password"];

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gucc";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $title = $_POST["title"];
        $semester = $_POST["semester"];
        $link = $_POST["link"];
        $category = $_POST["category"];

        // Check if a banner image is uploaded
        if (isset($_FILES["banner"]) && $_FILES["banner"]["error"] == 0) {
            // Retrieve the banner image data
            $banner = file_get_contents($_FILES["banner"]["tmp_name"]);
            $banner = mysqli_real_escape_string($conn, $banner);

            // Insert the data into the database
            $sql = "INSERT INTO events (title, description, banner, semester, link, category)
                    VALUES ('$title', '$link', '$banner', '$semester', '$link', '$category')";

            if (mysqli_query($conn, $sql)) {
                // Event inserted successfully
                header("Location: admin_add_event.php?success=true");
                exit();
            } else {
                // Failed to insert event
                header("Location: admin_add_event.php?success=false");
                exit();
            }
        } else {
            // No banner image uploaded
            header("Location: admin_add_event.php?success=false");
            exit();
        }
    }

    mysqli_close($conn);
} else {
    // User is not logged in, redirect to login page
    header("location: admin_login.php");
    exit();
}
?>
