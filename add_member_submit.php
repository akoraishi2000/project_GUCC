<?php

    if (isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] == UPLOAD_ERR_OK) {
        // Get the file contents
        $csv_data = file_get_contents($_FILES['csv_file']['tmp_name']);

        // Parse the CSV data
        $rows = str_getcsv($csv_data, "\n"); // split rows by newline character
        $header = str_getcsv(array_shift($rows)); // extract header row
        $data = array();
        foreach ($rows as $row) {
            $data[] = array_combine($header, str_getcsv($row)); // combine header with each row
        }

        // Connect to the database
        $conn = mysqli_connect('localhost', 'root', '', 'gucc');

        // Insert each row into the database
        foreach ($data as $row) {
            $sql = "INSERT IGNORE INTO member (Student_ID, Name, Blood_Group, Phone, Email, Address, Password, Donor) VALUES ('" . mysqli_real_escape_string($conn, $row['Student_ID']) . "', '" . mysqli_real_escape_string($conn, $row['Name']) . "', '" .
                mysqli_real_escape_string($conn, $row['Blood_Group']) . "', '" .
                mysqli_real_escape_string($conn, $row['Phone']) . "', '" .
                mysqli_real_escape_string($conn, $row['Email']) . "', '" .
                mysqli_real_escape_string($conn, $row['Address']) . "', '" .
                mysqli_real_escape_string($conn, $row['Password']) . "', '" .
                mysqli_real_escape_string($conn, $row['Donor']) . "')";
                mysqli_query($conn, $sql);
        }

        // Close the database connection
        mysqli_close($conn);
        //echo "<script>alert('New Members Added Succefully');</script>";
    }

    //header("location: add_member.php");
    echo '<script type="text/javascript">';
    echo 'alert("New Members Added Successfully");';
    echo 'window.location.href = "add_member.php";';
    echo '</script>';

?>