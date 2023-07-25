<?php
// // Connect to the database
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "gucc";

// $conn = new mysqli($servername, $username, $password, $database);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Retrieve the adminId sent via POST
// $adminId = $_POST['adminId'];

// // Perform the deletion
// $sql = "DELETE FROM admin WHERE A_ID = $adminId";
// if ($conn->query($sql) === TRUE) {
//     echo "success";
// } else {
//     echo "error";
// }

// // Close the database connection
// $conn->close();

        // Connect to the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "gucc";

        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve the adminId sent via POST
        $adminId = $_POST['adminId'];

        // Perform the deletion
        $sql = "DELETE FROM admin WHERE A_ID = $adminId";
        if ($conn->query($sql) === TRUE) {
            echo "success";
        } else {
            echo "error";
        }

        // Close the database connection
        $conn->close();





?>
