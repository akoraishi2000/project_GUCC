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
    $dbpassword = ""; // Updated variable name to avoid conflict
    $dbname = "gucc";

    $conn = mysqli_connect($servername, $username, $dbpassword, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve the event_id from the URL
    $event_id = $_GET['event_id'];


    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the event_id from the URL
        $event_id = $_GET['event_id'];

        // Retrieve form data
        $title = $_POST["title"];
        $description = $_POST["description"];
        $semester = $_POST["semester"];
        $link = $_POST["link"];
        $category = $_POST["category"];

        // Check if a banner image is uploaded
        if (isset($_FILES["banner"]) && $_FILES["banner"]["error"] == 0) {
            // Retrieve the banner image data
            $banner = file_get_contents($_FILES["banner"]["tmp_name"]);
            $banner = mysqli_real_escape_string($conn, $banner);

            // Update the event data in the database
            $sql = "UPDATE events SET
            title = '$title',
            description = '$description',
            banner = '$banner',
            semester = '$semester',
            link = '$link',
            category = '$category'
            WHERE E_ID = $event_id";


            if (mysqli_query($conn, $sql)) {
                // Event updated successfully
                header("Location: admin_add_event.php?success=true");
                exit();
            } else {
                // Failed to update event
                header("Location: admin_add_event.php?success=false");
                exit();
            }
        } else {
            // No banner image uploaded
            // Update the event data in the database without modifying the banner field
            $sql = "UPDATE events SET
                    title = '$title',
                    description = '$description',
                    semester = '$semester',
                    link = '$link',
                    category = '$category'
                    WHERE E_ID = $e_id";

            if (mysqli_query($conn, $sql)) {
                // Event updated successfully
                header("Location: admin_add_event.php?success=true");
                exit();
            } else {
                // Failed to update event
                header("Location: admin_add_event.php?success=false");
                exit();
            }
        }
    }

    mysqli_close($conn);
} else {
    // User is not logged in, redirect to login page
    header("location: admin_login.php");
    exit();
}
?>
