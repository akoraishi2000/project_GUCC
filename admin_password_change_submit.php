<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION["id"]) || !isset($_SESSION["password"])) {
  // User is not logged in, redirect to login page
  header("location: admin_logout.php");
  exit();
}

// Establish database connection
$conn = mysqli_connect("localhost", "root", "", "gucc");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the session variables
$id = $_SESSION["id"];
$password = $_SESSION["password"];

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Get the form inputs
  $current_password = $_POST["current_password"];
  $new_password = $_POST["new_password"];
  $retype_new_password = $_POST["retype_new_password"];

  // Check if the current password matches the session password
  if ($current_password != $password) {
    //echo "<script>alert('Current password is incorrect');</script>";
    echo '<script type="text/javascript">';
    echo 'alert("Current password is incorrect");';
    echo 'window.location.href = "admin_password_change.php";';
    echo '</script>';
  }

  // Check if the new password meets strength criteria
  if (strlen($new_password) < 8 || !preg_match("#[0-9]+#", $new_password) || !preg_match("#[a-z]+#", $new_password) || !preg_match("#[A-Z]+#", $new_password)) {
    //echo "<script>alert('New Password should be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one digit');</script>";
    echo '<script type="text/javascript">';
    echo 'alert("New Password should be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one digit");';
    echo 'window.location.href = "admin_password_change.php";';
    echo '</script>';
  }


  // Check if the new password and retype new password match
  elseif ($new_password != $retype_new_password) {
    //echo "<script>alert('New Password and Retyped New Passwords Don\'t Match');</script>";
    echo '<script type="text/javascript">';
    echo 'alert("New Password and Retyped New Passwords Dont Match");';
    echo 'window.location.href = "admin_password_change.php";';
    echo '</script>';
  }

  // Update the password in the database
  else {
    //$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $query = "UPDATE admin SET Password='$new_password' WHERE A_ID='$id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
      //echo "<script>alert('Password updated successfully.');</script>";
      $_SESSION["password"] = $new_password; // Update the session variable
      echo '<script type="text/javascript">';
      echo 'alert("Password updated successfully.");';
      echo 'window.location.href = "admin_password_change.php";';
      echo '</script>';

    } else {
      echo "Error updating password: " . mysqli_error($conn);
    }
  }

}


mysqli_close($conn);
?>
