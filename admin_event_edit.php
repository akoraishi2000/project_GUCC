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

// Check if the E_ID parameter is set
if (isset($_GET["event_id"])) {
  // Get the E_ID value from the URL parameter
  $event_id = $_GET["event_id"];

  // Establish database connection
  $conn = mysqli_connect("localhost", "root", "", "gucc");

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Fetch the event details from the database based on the E_ID
  $sql = "SELECT * FROM events WHERE E_ID = '$event_id'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // Fetch the event details
    $row = mysqli_fetch_assoc($result);
    $title = $row["title"];
    $description = $row["description"];
    $semester = $row["semester"];
    $link = $row["link"];
    $category = $row["category"];
  } else {
    // Event not found, handle the error or redirect to an error page
    mysqli_close($conn);
    header("location: error.php");
    exit();
  }

  // Close the database connection
  mysqli_close($conn);
} else {
  // E_ID parameter not set, handle the error or redirect to an error page
  header("location: error.php");
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
        <li><a href="#news">NOTICES</a></li>
        <li><a href="#contact">BLOGS</a></li>
        <li><a href="#about">EVENTS</a></li>
        <li><a href="#home">BLOOD DONATION</a></li>
        <li><a href="admin_add_member.php">MEMBER DETAILS</a></li>
        <li><a href="#contact">COMMITTEE</a></li>
      </ul>
    </div>
    <div class="col">
      <ul>
        <li><a class="active">EVENT UPDATE</a></li>
      </ul>
      <form action="admin_event_edit_update.php?event_id=<?php echo $event_id; ?>" method="POST" enctype="multipart/form-data">
        <div class="wrapper">
          <h3>TITLE :</h3>
          <textarea spellcheck="true" placeholder="ENTER YOUR TITLE HERE" name="title" required><?php echo $title; ?></textarea>
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
          <input type="text" placeholder="e.g. Spring 2023" name="semester" required value="<?php echo $semester; ?>">
        </div><br>
        <h3>GOOGLE FORM LINK :</h3>
        <div class="inner-box5">
          <input type="text" name="link" required value="<?php echo $link; ?>">
        </div>
        <h3>CATEGORY :</h3>
        <div class="inner-box3">
          <select name="category">
            <option value="">Select a Category</option>
            <option value="programming contest" <?php if ($category == "programming contest") echo "selected"; ?>>PROGRAMMING CONTEST</option>
            <option value="cultural program" <?php if ($category == "cultural program") echo "selected"; ?>>CULTURAL PROGRAM</option>
            <option value="seminar" <?php if ($category == "seminar") echo "selected"; ?>>SEMINAR</option>
            <option value="workshop" <?php if ($category == "workshop") echo "selected"; ?>>WORKSHOP</option>
            <option value="prize giving ceremony" <?php if ($category == "prize giving ceremony") echo "selected"; ?>>PRIZE GIVING CEREMONY</option>
            <option value="carnival" <?php if ($category == "carnival") echo "selected"; ?>>CARNIVAL</option>
            <option value="others" <?php if ($category == "others") echo "selected"; ?>>OTHERS</option>
          </select>
        </div>
        <div class="inner-box4">
          <button type="button" class="login-button" onclick="confirmUpload()">
            UPDATE
          </button>
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
