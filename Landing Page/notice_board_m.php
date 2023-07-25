<?php
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

    // Establish database connection
    $conn = mysqli_connect("localhost", "root", "", "gucc");

    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch the latest 3 notices from the database
    $sql = "SELECT * FROM notices ORDER BY date DESC LIMIT 3";
    $result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
    <link rel="stylesheet" href="notice_board_m.css">
    
    <title>RECENT NOTICE</title>
</head>
<body class="full-box">

    <div class="notice-box">

      <div class="recent-notic">
        <div class="recent-title">
          <h1>Recent Notices</h1>
        </div>
        <div class="news-box">
          <div class="news-1">
            <?php
            // Display the latest 3 notices in the page
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                //echo '<div class="news-1"><div>' . $row["pdf"] . '</div></div>';
                //$ID = $row["N_ID"];
                echo '<a href="notice_download.php?id=' . $row["N_ID"] . '">' . $row["title"] . '</a>';

              }
            } else {
              echo "No notices found.";
            }
            ?>
          </div>
            
        </div>
    </div>


    <div>
      <!-- Gap -->
    </div>
    

    <div class="all-notice">
      <div class="all-title">
        <h1>All Notices</h1>
      </div>
      <div class="recent-notice">
        <div class="news-box">
          <div class="news-2">
          <div>News 4</div>
        </div>
        <div class="news-2">
          <div>News 5</div>
        </div>
        <div class="news-2">
          <div>News 6</div>
        </div>
        </div>
    </div>
    </div>
    </div>

    <div class="blue-box">See More...</div>
</body>
</html>
