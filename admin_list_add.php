<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>


    <section class="vh-100 bg-image">
        <div class="mask d-flex align-items-center h-100 ">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">ADD NEW ADMIN</h2>

                                <?php
                                    
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

                                // Check if form is submitted
                                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                    // Assuming you have already established a database connection

                                    // Retrieve form data
                                    $adminId = $_POST['admin_id'];
                                    $adminName = $_POST['admin_name'];
                                    $adminEmail = $_POST['admin_email'];
                                    $adminPassword = $_POST['admin_password'];

                                    // Perform SQL query to insert data into the database
                                    $sql = "INSERT INTO admin (A_ID, Name, Email, Password) VALUES ('$adminId', '$adminName', '$adminEmail', '$adminPassword')";

                                    if (mysqli_query($conn, $sql)) {
                                        // Alert box for successful insertion
                                        echo "<script>
                                            Swal.fire({
                                                title: 'New Admin Added Successfully',
                                                icon: 'success',
                                                confirmButtonText: 'OK'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.href = 'admin_list.php';
                                                }
                                            });
                                        </script>";
                                    } else {
                                        // Alert box for error
                                        echo "<script>
                                            Swal.fire({
                                                title: 'Error',
                                                text: 'Failed to add new admin',
                                                icon: 'error',
                                                confirmButtonText: 'OK'
                                            });
                                        </script>";
                                    }

                                    // Close the database connection
                                    mysqli_close($conn);
                                }
                                ?>

                                <form method="POST">

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1cg">ADMIN ID</label>
                                        <input type="text" name="admin_id" id="form3Example1cg" class="form-control form-control-lg" required>

                                    </div>


                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1cg">ADMIN NAME</label>
                                        <input type="text" name="admin_name" id="form3Example1cg" class="form-control form-control-lg" required>

                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3cg">ADMIN EMAIL</label>
                                        <input type="email" name="admin_email" id="form3Example3cg" class="form-control form-control-lg" required>

                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">PASSWORD</label>
                                        <input type="password" name="admin_password" id="form3Example4cg" class="form-control form-control-lg" required>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-success btn-block btn-lg  text-body" style="background:##161743" onclick="confirmAddAdmin()">ADD ADMIN</button>
                                    </div>


                                </form>

                                <script>
                                    function confirmAddAdmin() {
                                        Swal.fire({
                                            title: 'Are you sure you want to add a new admin?',
                                            icon: 'question',
                                            showCancelButton: true,
                                            confirmButtonText: 'OK',
                                            cancelButtonText: 'Cancel'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                document.querySelector('form').submit();
                                            }
                                        });
                                    }
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
