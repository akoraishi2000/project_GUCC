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
    $query = "SELECT A_ID, Email FROM admin WHERE A_ID = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

  } else {
    // User is not logged in, redirect to login page
    header("location: admin_login.php");
    exit();
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>GUCC :: ADMIN</title>
  <link rel="stylesheet" type="text/css" href="admin_home.css">
</head>
<body>
  <img src="admin_home_top.png" alt="">
  <div class="image"></div>
  
  <div class="row">
    <div class="col">
      <div class="leftside">
        <?php
          echo "<table id='info' style='padding: 0; margin: 0;'>
                  <tr>
                    <td colspan='2' style='text-align: center;background-color: #161743;color: white;'>PROFILE</td>
                  </tr>
                  <tr>
                    <td>ID</td>
                    <td>".$row['A_ID']."</td>
                  </tr>
                  <tr>
                    <td>EMAIL</td>
                    <td>".$row['Email']."</td>
                  </tr>
                  <tr>
                    <td style='top: 10px;'>
                      <a href='admin_logout.php' class='edit-button'>LOGOUT</a>
                    </td>
                    <td>
                      <a href='admin_password_change.php' class='pass-button'>CHANGE PASSWORD</a>
                    </td>
                  </tr>
                </table>";
        ?>
      </div>
    </div>
    <div class="col">
      <ul>
        <li><a class="active" href="#home">ADMIN PANEL</a></li>
        <li><a href="admin_notice_list.php">NOTICES</a></li>
        <li><a href="admin_event_list.php">EVENTS</a></li>
        <li><a href="admin_member_list.php">MEMBER DETAILS</a></li>
        <li><a href="admin_committee.php">COMMITTEE</a></li>
        <li><a href="admin_list.php">ADMIN LIST</a></li>
      </ul>
    </div>
  </div>
</body>
</html>
