<?php 
    // Start the session
    session_start();

    // Check if the user is logged in
    if (isset($_SESSION["id"]) || isset($_SESSION["password"])) {
      // Retrieve the session variables
      $id = $_SESSION["id"];
      $password = $_SESSION["password"];
      
      // Your session related code is kept here
      
    } else {
      // User is not logged in, redirect to login page
      header("location: admin_login.php");
      exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex">
    <title>Document</title>
    <style>
        .space {
            height: 10vh;
        }

        .head {
            margin-top: 10vh;
            height: 10vh;
            background-color: #161743;
            color: white;
            font-size: 18px;
            text-align: justify;
        }

        .head p {
            padding: 2vh;
            color: white;
            text-decoration: bold;
            font-size: 4vh;
        }

        .add-event {
            display: inline-block;
            padding: 10px 20px;
            background-color: navy;
            color: white;
            border-radius: 30px;
            font-family: Arial, sans-serif;
            font-size: 16px;
            text-decoration: none;
            float: right;
            margin-top: -1vh;
            margin-right: 15vh;
        }

        .delete-event {
            display: inline-block;
            padding: 10px 20px;
            background-color: red;
            color: white;
            border-radius: 30px;
            font-family: Arial, sans-serif;
            font-size: 16px;
            text-decoration: none;
            margin-right: 10px;
        }

        .container {
            position: relative;
        }

    </style>

</head>

<body>
    <div class="head">
        <p>EVENT LIST</p>
        <a href="admin_add_event.php" class="add-event">ADD Event</a>
    </div>
    <div class="space"></div>
    <div class="container">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Event ID</th>
                    <th>Event Name</th>
                    <th>Banner</th>
                    <th>Description</th>
                    <th>Semester</th>
                    <th>Google Form Link</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Establish database connection
                $conn = mysqli_connect("localhost", "root", "", "gucc");

                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Fetch the events from the database
                $sql = "SELECT * FROM events"; // Replace 'events' with the actual name of your table
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $row["E_ID"] . '</td>';
                        echo '<td>' . $row["title"] . '</td>';
                        echo '<td><img src="data:image/jpeg;base64,' . base64_encode($row["banner"]) . '" style="max-width: 100px; height: auto;"/></td>';
                        echo '<td><a href="' . $row["link"] . '" target="_blank" rel="noopener noreferrer">Event Description</a></td>';
                        echo '<td>' . $row["semester"] . '</td>';
                        echo '<td><a href="' . $row["link"] . '" target="_blank" rel="noopener noreferrer">Register</a></td>';
                        echo '<td><a href="admin_event_edit.php?event_id=' . $row["E_ID"] . '" class="edit-event">Edit</a></td>';
                        echo '<td><a href="#" class="delete-event" onclick="deleteEvent(' . $row["E_ID"] . ')">Delete</a></td>';
                        echo '</tr>';
                    }
                } else {
                    echo "<tr><td colspan='8'>No events found.</td></tr>";
                }

                // Close the database connection
                mysqli_close($conn);
                ?>

            </tbody>
        </table>
    </div>
    <link href="https://static.geekinsta.com/demo/table-with-search-and-sort/assets/bootstrap.min.css"
        rel="stylesheet">

    <link href="https://static.geekinsta.com/demo/table-with-search-and-sort/assets/datatables.bootstrap4.min.css"
        rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="https://static.geekinsta.com/demo/table-with-search-and-sort/assets/jquery.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="https://static.geekinsta.com/demo/table-with-search-and-sort/assets/jquery.datatables.min.js"></script>

    <script src="https://static.geekinsta.com/demo/table-with-search-and-sort/assets/datatables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                "lengthChange": false,
                "lengthMenu": [5],
            });
            $('.add-event').css('display', 'inline-block');
        });

        function deleteEvent(eventId) {
            Swal.fire({
                title: "Are you sure to delete this event?",
                icon: "warning",
                text: "This action cannot be undone.",
                showCancelButton: true,
                confirmButtonColor: "red",
                cancelButtonColor: "#161743",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "admin_event_delete.php?event_id=" + eventId;
                }
            });
        }

        // Check if deletion success parameter is passed
        const urlParams = new URLSearchParams(window.location.search);
        const success = urlParams.get('success');
        
        if (success === "true") {
            Swal.fire({
                title: "Event Deleted",
                icon: "success",
                confirmButtonColor: "#161743",
            });
        } else if (success === "false") {
            Swal.fire({
                title: "Couldn't Delete",
                icon: "error",
                confirmButtonColor: "#161743",
            });
        }
    </script>
</body>

</html>
