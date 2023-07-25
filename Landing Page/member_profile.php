<?php
  // Start the session
  session_start();

  // Check if the user is logged in
  if (isset($_SESSION["id"])) {

    // Retrieve the session variables
    $id = $_SESSION["id"];
    //$password = $_SESSION["password"];

    // Establish database connection
    $conn = mysqli_connect("localhost", "root", "", "gucc");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $query = "SELECT * FROM member WHERE Student_ID = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $query1 = "SELECT SUBSTR(Student_ID, 1, 3) AS ID FROM member WHERE Student_ID = '$id'" ;
    $result1 = mysqli_query($conn, $query1);
    $row1 = mysqli_fetch_array($result1);
    // $batch = $row1["ID"];
    
  } else {
    // User is not logged in, redirect to login page
    header("location: member_login.php");
    exit();
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="member_profile.css">
    <title>GUCC :: Profile</title>
</head>
<body>
    
           
    
    <div class="box1" style="margin-top: 30px;">
        <div class="box1-text">MEMBER PROFILE</div>
    </div>

    <div class="row">
        <div class="col">
            <div class="leftside">
                <ul>
                    <li id="special"><a  href="#home">MEMBER INFORMATION</a></li>
                    <li class="active"><a href="member_password_change.php">CHANGE PASSWORD</a></li>
                </ul>
            </div>
        </div>
        <div class="col">
            <?php
                echo"
                <table id='info'>
                <caption>MEMBER INFORMATION</caption>
                <tr>
                  <td>NAME</td>
                  <td>".$row['Name']."</td>
                </tr>
                <tr>
                  <td>GUCC ID</td>
                  <td>".$row['Student_ID']."</td>
                </tr>
                <tr>
                  <td>EMAIL</td>
                  <td>".$row['Email']."</td>
                </tr>
                <tr>
                    <td>BATCH</td>
                    <td>".$row1["ID"]."</td>
                  </tr>
                  <tr>
                    <td>CONTACT NO</td>
                    <td>".$row['Phone']."</td>
                  </tr>
                  <tr>
                    <td>ADDRESS</td>
                    <td>".$row['Address']."</td>
                  </tr>
                  <tr>
                    <td>BLOOD GROUP</td>
                    <td>".$row['Blood_Group']."</td>
                  </tr>
                  
              </table>
                ";
            ?>
        </div>
    </div>
    
</body>
</html>