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
<html>
<head>
  <title>GUCC :: ADMIN</title>
  <link rel="stylesheet" href="admin_add_event.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
  <style>
    textarea {
      resize: vertical;
    }
  </style>
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
        <li><a class="active">EVENT UPLOAD</a></li>
      </ul>
      <form action="admin_add_event_submit.php" method="POST" enctype="multipart/form-data">
        <div class="wrapper">
          <h3>TITLE :</h3>
          <textarea spellcheck="true" placeholder="ENTER YOUR TITLE HERE" name="title" required></textarea>
        </div>
        <script>
          const textareas = document.querySelectorAll("textarea");
          textareas.forEach(textarea => {
            textarea.addEventListener("input", e => {
              textarea.style.height = "63px";
              let scHeight = e.target.scrollHeight;
              textarea.style.height = `${scHeight}px`;
            });
          });
        </script>
        <h3>UPLOAD BANNER :</h3>
        <div class="inner-box1">
          <input type="file" name="banner" accept=".png, .jpg">
        </div>
        <h3>SEMESTER :</h3>
        <div class="inner-box2">
          <input type="text" placeholder="e.g. Spring 2023" name="semester" required>
        </div><br>
        <h3>GOOGLE FORM LINK :</h3>
        <div class="inner-box5">
          <input type="text" name="link" required>
        </div>
        <h3>CATEGORY :</h3>
        <div class="inner-box3">
          <select name="category">
            <option value="">Select a Category</option>
            <option value="programming contest">PROGRAMMING CONTEST</option>
            <option value="cultural program">CULTURAL PROGRAM</option>
            <option value="seminar">SEMINAR</option>
            <option value="workshop">WORKSHOP</option>
            <option value="prize giving ceremony">PRIZE GIVING CEREMONY</option>
            <option value="carnival">CARNIVAL</option>
            <option value="others">OTHERS</option>
          </select>
        </div>
        <div class="inner-box4">
          <button type="button" class="login-button" onclick="confirmUpload()">
            UPLOAD
          </button>
        </div>
        </div>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
  <script>
    function confirmUpload() {
      const fileInput = document.querySelector('input[name="banner"]');
      const file = fileInput.files[0];
      
      if (file && !['image/jpeg', 'image/png'].includes(file.type)) {
        Swal.fire({
          title: 'Please upload only .jpg or .png file',
          icon: 'error',
          confirmButtonText: 'OK'
        });
        return;
      }
      
      Swal.fire({
        title: 'Are you sure you want to proceed?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'OK',
        cancelButtonText: 'Cancel'
      }).then((result) => {
        if (result.isConfirmed) {
          // Proceed with the form submission
          document.querySelector('form').submit();
        }
      });
    }
    
    // Retrieve the value of the success parameter from the URL
    const urlParams = new URLSearchParams(window.location.search);
    const successParam = urlParams.get('success');

    // Display Swal.fire based on the success parameter
    if (successParam === 'true') {
        Swal.fire({
            title: 'Event Posted..!',
            icon: 'success'
        });
    } else if (successParam === 'false') {
        Swal.fire({
            title: "Couldn't Post",
            text: "Failed to post the event. Please try again.",
            icon: 'error'
        });
    }
  </script>
</body>
</html>
