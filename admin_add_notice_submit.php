<?php
//experiment number 1
// // Start the session
// session_start();

// // Check if the user is logged in
// if (!isset($_SESSION["id"]) || !isset($_SESSION["password"])) {
//   // User is not logged in, redirect to login page
//   header("location: admin_login.php");
//   exit();
// }

// // Retrieve the session variables
// $id = $_SESSION["id"];
// $password = $_SESSION["password"];

// // Establish database connection
// $conn = mysqli_connect("localhost", "root", "", "gucc");

// // Check connection
// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   // Validate and sanitize input data
//   $title = mysqli_real_escape_string($conn, $_POST["title"]);
//   $semester = mysqli_real_escape_string($conn, $_POST["semester"]);
//   $category = mysqli_real_escape_string($conn, $_POST["category"]);

//   // Upload file
//   if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
//     $pdf = file_get_contents($_FILES["file"]["tmp_name"]);
//   } else {
//     die("Error: PDF file not uploaded");
//   }

//   // Insert notice into database
//   $query = "INSERT INTO notices (title, semester, category, pdf) VALUES ('$title', '$semester', '$category', '$pdf')";
//   if (mysqli_query($conn, $query)) {
//     echo '<script type="text/javascript">';
//     echo 'alert("Notice uploaded successfully!");';
//     echo 'window.location.href = "admin_home.php";';
//     echo '</script>';
//   } else {
//     echo "Error: " . mysqli_error($conn);
//   }
// }

// mysqli_close($conn);






//experiment number 2
// Start the session
// session_start();

// // Check if the user is logged in
// if (!isset($_SESSION["id"]) || !isset($_SESSION["password"])) {
//   // User is not logged in, redirect to login page
//   header("location: admin_login.php");
//   exit();
// }

// // Retrieve the session variables
// $id = $_SESSION["id"];
// $password = $_SESSION["password"];

// // Establish database connection
// $conn = mysqli_connect("localhost", "root", "", "gucc");

// // Check connection
// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   // Validate and sanitize input data
//   $title = mysqli_real_escape_string($conn, $_POST["title"]);
//   $semester = mysqli_real_escape_string($conn, $_POST["semester"]);
//   $category = mysqli_real_escape_string($conn, $_POST["category"]);

//   // Upload file
//   if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
//     $pdf = mysqli_real_escape_string($conn, file_get_contents($_FILES["file"]["tmp_name"]));
//   } else {
//     die("Error: PDF file not uploaded");
//   }

//   // Insert notice into database
//   $query = "INSERT INTO notices (title, semester, category, pdf) VALUES ('$title', '$semester', '$category', '$pdf')";
//   if (mysqli_query($conn, $query)) {
//     echo '<script type="text/javascript">';
//     echo 'alert("Notice uploaded successfully!");';
//     echo 'window.location.href = "admin_add_notice.php";';
//     echo '</script>';
//   } else {
//     echo "Error: " . mysqli_error($conn);
//   }
// }

// mysqli_close($conn);






//experiment number 3
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION["id"]) || !isset($_SESSION["password"])) {
  // User is not logged in, redirect to login page
  header("location: admin_login.php");
  exit();
}

// Retrieve the session variables
$id = $_SESSION["id"];
$password = $_SESSION["password"];

// Establish database connection
$conn = mysqli_connect("localhost", "root", "", "gucc");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate and sanitize input data
  $title = mysqli_real_escape_string($conn, $_POST["title"]);
  $semester = mysqli_real_escape_string($conn, $_POST["semester"]);
  $category = mysqli_real_escape_string($conn, $_POST["category"]);

  // Upload file
  if (isset($_FILES["pdf"]) && $_FILES["pdf"]["error"] == 0) {
    //$pdf = mysqli_real_escape_string($conn, file_get_contents($_FILES["file"]["tmp_name"]));

    // Insert the PDF file into the database
    $pdfName = $_FILES["pdf"]["name"];
    $pdfData = file_get_contents($_FILES['pdf']['tmp_name']);
    $pdfData = $conn->real_escape_string($pdfData);

    // Insert the PDF file into the database
    $query = "INSERT INTO notices (title, semester, category, pdf) VALUES ('$title', '$semester', '$category', '$pdfData')";
    if (mysqli_query($conn, $query)) {
      echo '<script type="text/javascript">';
      echo 'alert("Notice uploaded successfully!");';
      echo 'window.location.href = "admin_add_notice.php";';
      echo '</script>';
    } else {
      echo "Error: " . $query . "<br>" . $conn->error;
    }
  }else {
    echo "Error: " . mysqli_error($conn);
  }
}

mysqli_close($conn);
?>



?>