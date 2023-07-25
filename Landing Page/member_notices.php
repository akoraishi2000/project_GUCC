<!-- 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="robots" content="noindex">
    <title>Document</title>
    <style>
        .head{
            margin-top: 10vh;
            height: 10vh;
            background-color: #161743;
            color: white;
            font-size: 18px;
            text-align: justify;
            
        }
        .space{
            height: 10vh;
        }
        .head p{
            padding: 2vh;
            color: white;
            text-decoration: bold;
            font-size: 4vh;
        }
    </style>
    
</head>

<body>
    <div class="head">
        <p>NOTICES</p> 
    </div>
    <div class="space">

    </div>
    <div class="container">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
            <thead>
                <tr>
                    <th class="orderable">Title</th>
                    <th>Semester</th>
                    <th>Category</th>
                    <th class="orderable">Download</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Intra University Contest</td>
                    <td>Spring 2022</td>
                    <td>Contest</td>
                    <td>.pdf</td>
                </tr>
                <tr>
                    <td>ICPC</td>
                    <td>Fall 2022</td>
                    <td>Contest</td>
                    <td>.pdf</td>
                </tr>
                <tr>
                    <td>Payment For Midterm of Spring 2022</td>
                    <td>Spring 2022</td>
                    <td>Payment</td>
                    <td>.pdf</td>
                </tr>
                <tr>
                    <td>Payment For Midterm of Spring 2022</td>
                    <td>Spring 2022</td>
                    <td>Payment</td>
                    <td>.pdf</td>
                </tr>
                <tr>
                    <td>Payment For Midterm of Spring 2022</td>
                    <td>Spring 2022</td>
                    <td>Payment</td>
                    <td>.pdf</td>
                </tr>
                
                
            </tbody>
        </table>
    </div>
    <link href="https://static.geekinsta.com/demo/table-with-search-and-sort/assets/bootstrap.min.css" rel="stylesheet">

    <link href="https://static.geekinsta.com/demo/table-with-search-and-sort/assets/datatables.bootstrap4.min.css" rel="stylesheet"> -->

    <!-- Bootstrap core JavaScript-->
    <!-- <script src="https://static.geekinsta.com/demo/table-with-search-and-sort/assets/jquery.min.js"></script> -->

    <!-- Page level plugin JavaScript-->
    <!-- <script src="https://static.geekinsta.com/demo/table-with-search-and-sort/assets/jquery.datatables.min.js"></script>

    <script src="https://static.geekinsta.com/demo/table-with-search-and-sort/assets/datatables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                "lengthChange": false,
                "lengthMenu": [5],
                "columnDefs": [
                    { "orderable": false, "targets": 0 }
                ]
            });
        });
    </script>
</body>

</html> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex">
    <title>Document</title>
    <style>
        .head{
            margin-top: 10vh;
            height: 10vh;
            background-color: #161743;
            color: white;
            font-size: 18px;
            text-align: justify;
        }
        .space{
            height: 10vh;
        }
        .head p{
            padding: 2vh;
            color: white;
            text-decoration: bold;
            font-size: 4vh;
        }
    </style>
    
</head>

<body>
    <div class="head">
        <p>NOTICES</p> 
    </div>
    <div class="space"></div>
    <div class="container">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th class="orderable">Title</th>
                    <th>Date</th>
                    <th>Semester</th>
                    <th>Category</th>
                    <th class="orderable">Download</th>
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
                $sql = "SELECT * FROM notices ORDER BY date DESC";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $row["title"] . '</td>';
                        echo '<td>' . $row["date"] . '</td>';
                        echo '<td>' . $row["semester"] . '</td>';
                        echo '<td>' . $row["category"] . '</td>';
                        echo '<td><a href="member_notice_download.php?id=' . $row["N_ID"] . '">Download PDF</a></td>';
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



    <link href="https://static.geekinsta.com/demo/table-with-search-and-sort/assets/bootstrap.min.css" rel="stylesheet">

    <link href="https://static.geekinsta.com/demo/table-with-search-and-sort/assets/datatables.bootstrap4.min.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="https://static.geekinsta.com/demo/table-with-search-and-sort/assets/jquery.min.js"></script>


    

    <!-- Page level plugin JavaScript-->
    <script src="https://static.geekinsta.com/demo/table-with-search-and-sort/assets/jquery.datatables.min.js"></script>

    <script src="https://static.geekinsta.com/demo/table-with-search-and-sort/assets/datatables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                "lengthChange": false,
                "lengthMenu": [5],
                "columnDefs": [
                    { "orderable": false, "targets": 0 }
                ]
            });
        });
    </script>
</body>

</html>
