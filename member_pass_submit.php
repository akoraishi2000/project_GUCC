<?php
  session_start();

  // Check if the user is logged in
  if (!isset($_SESSION["id"])) {
    // User is not logged in, redirect to login page
    header("location: member_login.php");
    exit();
  }

  // Show success message
  echo "<script>alert('Password Updated Successfully');</script>";

  // Redirect to member profile
  header("location: member_profile.php");
  exit();
?>
