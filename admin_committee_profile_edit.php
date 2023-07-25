<?php
    // Connect to the MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gucc";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $C_ID = $_GET['C_ID'];
    // Assuming you have a database connection established

    // Prepare the SQL query
    $query = "SELECT * FROM committee WHERE C_ID = '$C_ID'";

    // Execute the query
    $result = $conn->query($query);

    // Check if the query was successful
    if ($result && $result->num_rows > 0) {
        // Fetch the row from the result set
        $row = $result->fetch_assoc();

        // Extract the designation from the fetched row
        $name = strtoupper($row["Name"]);
        $designation = strtoupper($row["Designation"]);
        $photo = $row["Photo"];
        $phone = $row["Phone"];
        $birthday = $row["Birthday"];
        $linkedin = $row["LinkedIn"];
        $facebook = $row["Facebook"];
        $address = $row["Address"];
        $email = $row["Email"];
        $blood_group = $row["Blood_Group"];
    } else {
        // Handle the case when the record is not found
        echo "Record not found.";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      height: 100vh;
      width: 100%;
    }

    h1 {
      font-family: sans-serif;
      text-align: center;
      font-size: 30px;
      color: #222;
    }

    .profile-pic-div {
      height: 200px;
      width: 200px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      border-radius: 50%;
      overflow: hidden;
      border: 1px solid grey;
    }

    #photo {
      height: 100%;
      width: 100%;
    }

    #file {
      display: none;
    }
    .btn{
        background: #161743;
    }
    .card-body{
        height: 50vh;
    }
    </style>
</head>
<body>
 <form action="admin_committee_profile_edit_save.php" method="POST" enctype="multipart/form-data">    
<div class="container-xl px-4 mt-4">
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <div class="profile-pic-div">
                        <img src="image.jpg" id="photo">
                        <!-- <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($photo) . '" id="photo">'; ?> -->
                        <input type="file" id="file" name="inputPhoto">
                    </div>   
                </div>
                <label for="file" id="uploadBtn" class="btn btn-primary">Choose Photo</label>
                
            </div>
        </div>
        <div class="col-xl-8">
            
            <div class="card mb-4">
                <div class="card-header">Committee Member Details</div>
                <div class="card-body">
                       
                        <div class="mb-3">
                            <label class="small mb-1" for="inputMembername">Name </label>
                            <input class="form-control" name="inputUsername" id="inputUsername" type="text" placeholder="Enter Name" value="<?php echo $name; ?>" required>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputDesignation">Designation</label>
                                <input class="form-control" name="inputFirstName" id="inputFirstName" type="text" placeholder="Enter Designation" value="<?php echo $designation; ?>" readonly required>

                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBloodGroup">Select Blood Group</label>
                                <select class="form-control" name="inputBloodGroup" id="inputBloodGroup" required>
                                    <option> 🩸</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFbLink">Facebook Profile Link</label>
                                <input class="form-control" name="inputOrgName" id="inputOrgName" type="text" placeholder="Enter Facebook Profile Link" value="<?php echo $facebook; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputAdress">Address</label>
                                <input class="form-control" name="inputAddress" id="inputAddress" type="text" placeholder="Enter Address" value="<?php echo $address; ?>" required>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control" name="inputEmailAddress" id="inputEmailAddress" type="email" placeholder="Enter email address"  value="<?php echo $email; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLinkedIn">LinkedIn Profile Link</label>
                                <input class="form-control" name="inputLinkedIn" id="inputLinkedIn" type="text" placeholder="Enter LinkedIn Profile Link" value="<?php echo $linkedin; ?>" required>
                            </div>
                        </div> 
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                <input class="form-control" name="inputPhone" id="inputPhone" type="tel" placeholder="Enter phone number" value="<?php echo $phone; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Birthday</label>
                                <input class="form-control" name="inputBirthday" id="inputBirthday" type="date" name="birthday" value="<?php echo $birthday; ?>" required>
                            </div>
                        </div>
                        <input type="hidden" name="C_ID" value="<?php echo $C_ID; ?>">
                        <button class="btn btn-primary" type="submit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        const img = document.querySelector('#photo');
        const file = document.querySelector('#file');
        const uploadBtn = document.querySelector('#uploadBtn');

        file.addEventListener('change', function () {
        const choosedFile = this.files[0];
        if (choosedFile) {
            const reader = new FileReader();
            reader.addEventListener('load', function () {
            img.setAttribute('src', reader.result);
            });
            reader.readAsDataURL(choosedFile);
        }
        });
    </script>
</body>
</html>
