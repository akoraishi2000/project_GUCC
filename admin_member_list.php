<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex">
    <title>Document</title>
    <style>
        .head {
            margin-top: 10vh;
            height: 10vh;
            background-color: #161743;
            color: white;
            font-size: 18px;
            text-align: justify;
        }

        .space {
            height: 10vh;
        }

        .head p {
            padding: 2vh;
            color: white;
            text-decoration: bold;
            font-size: 4vh;
        }

        .add-member {
            display: inline-block;
            padding: 10px 20px;
            background-color: navy;
            color: white;
            border-radius: 30px;
            font-family: Arial, sans-serif;
            font-size: 16px;
            text-decoration: none;
            float: right; /* Added */
            margin-top: -1vh; /* Added */
            margin-right: 15vh; /* Added */
        }

        #dataTable {
            margin-top: 10px;
        }
    </style>

</head>

<body>
    <div class="head">
        <p>MEMBER LIST</p>
        <a href="add_member.php" class="add-member">ADD MEMBER</a>
    </div>
    <div class="space"></div>
    <div class="container">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Blood Group</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Donor</th>
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

                // Fetch the notices from the database
                $sql = "SELECT Student_ID,Name,Blood_Group,Phone,Email,Address,Donor FROM member ORDER BY Student_ID DESC";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $row["Student_ID"] . '</td>';
                        echo '<td>' . $row["Name"] . '</td>';
                        echo '<td>' . $row["Blood_Group"] . '</td>';
                        echo '<td>' . $row["Phone"] . '</td>';
                        echo '<td>' . $row["Email"] . '</td>';
                        echo '<td>' . $row["Address"] . '</td>';
                        echo '<td>' . $row["Donor"] . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo "<tr><td colspan='4'>No notices found.</td></tr>";
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap and DataTables scripts and stylesheets -->
    <link href="https://static.geekinsta.com/demo/table-with-search-and-sort/assets/bootstrap.min.css" rel="stylesheet">
    <link href="https://static.geekinsta.com/demo/table-with-search-and-sort/assets/datatables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://static.geekinsta.com/demo/table-with-search-and-sort/assets/jquery.min.js"></script>
    <script src="https://static.geekinsta.com/demo/table-with-search-and-sort/assets/jquery.datatables.min.js"></script>
    <script src="https://static.geekinsta.com/demo/table-with-search-and-sort/assets/datatables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                "lengthChange": false,
                "lengthMenu": [5],
            });
        });
    </script>
</body>

</html>
