<?php
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION["id"]) || isset($_SESSION["password"])  ) {

  // Retrieve the session variables
  $id = $_SESSION["id"];
  $password = $_SESSION["password"];

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
  <link rel="stylesheet" href="admin_add_notice.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
  <img src="admin_home_top.png" alt="">
  <div class="image"></div>

  <div class="row">
    <div class="col">
      <ul>
        <li><a class="active" href="admin_home.php">ADMIN PANEL</a></li>
        <li><a href="admin_notice_list.php">NOTICES</a></li>
        <li><a href="admin_event_list.php">EVENTS</a></li>
        <li><a href="admin_member_list.php">MEMBER DETAILS</a></li>
        <li><a href="admin_committee.php">COMMITTEE</a></li>
      </ul>
    </div>
    <div class="col">
      <ul>
        <li><a class="active">NOTICE UPLOAD</a></li>
      </ul>
      <form action="admin_add_notice_submit.php" method="POST" enctype="multipart/form-data">
        <div class="wrapper">
          <h3>TITLE :</h2>
            <textarea spellcheck="true" placeholder="ENTER YOUR TITLE HERE" name="title" required></textarea>
        </div>
          <script>
            const textarea = document.querySelector("textarea");
            textarea.addEventListener("keyup", e => {
              textarea.style.height = "63px";
              let scHeight = e.target.scrollHeight;
              textarea.style.height = `${scHeight}px`;
            });
          </script>
          <h3>UPLOAD YOUR PDF FILE :</h2>
          <div class="inner-box1">
            <input type="file" name="pdf">
          </div>
          <h3>SEMESTER :</h2>
          <div class="inner-box2">
            <input type="text" placeholder="e.g. Spring 2023" name="semester" required>
          </div>
          <h3>CATEGORY :</h2>
          <div class="inner-box3">
            <!-- <input type="text" placeholder="CATEGORY" name="category" required> -->
            <select name="category">
              <option value="">Select a Category</option>
              <option value="exam">Exam</option>
              <option value="tuition fee">Tuition Fee</option>
              <option value="registration">Registration</option>
              <option value="vacation">Vacation</option>
              <option value="teachers_evaluation">Teachers Evaluation</option>
              <option value="result">Result</option>
            </select>
          </div>
          <div class="inner-box4">
            <button class="login-button" onclick="return confirm('Are you sure you want to proceed?')">
              UPLOAD
            </button>
          </div>
            
          
      </form>

    </div>
  </div>


</body>

</html>