<?php
// Establish database connection
$conn = mysqli_connect("localhost", "root", "", "gucc");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the event_id parameter is provided
if (isset($_GET['event_id'])) {
    $eventID = $_GET['event_id'];

    // Delete the event from the database
    $sql = "DELETE FROM events WHERE E_ID = $eventID";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Deletion successful
        mysqli_close($conn);
        header("Location: admin_event_list.php?success=true");
        exit;
    } else {
        // Deletion failed
        mysqli_close($conn);
        header("Location: admin_event_list.php?success=false");
        exit;
    }
} else {
    // Invalid event_id parameter
    mysqli_close($conn);
    header("Location: admin_event_list.php");
    exit;
}
