<?php
    // Connect to the MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gucc";

    $conn = new mysqli($servername, $username, $password, $dbname);
    $n = 1; //calculating the C_ID to perform sql queries

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Document</title>
    <style>
    body {
        background-color: white;
    }

    .head {
        margin-top: 10vh;
        height: 10vh;
        padding: 2vh;
        background-color: #161743;
        color: white;
        font-size: 4vh;
        text-align: justify;
    }

    .wrapper{
        align-items: center;
        justify-content: center;
    }

    .profile-container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        margin-top: 2vh;
    }

    .profile {
    position: relative;
    width: 200px;
    height: 250px;
    margin: 10px;
    background-size: cover;
    cursor: pointer;
    border: 12px;
    border-top-right-radius: 35px !important;
    border-radius: 6px;
  }

    .profile .overlay {
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        border-radius: 12px;
        cursor: pointer;
        opacity: 0;
        transition: all 1s;
        border-top-right-radius: 35px !important;
        border-radius: 6px;
    }

    .profile:hover .overlay {
        opacity: 1;
    }

    .profile .social-icons {
        display: flex;
        list-style: none;
        bottom: 10px;
        position: absolute;
        text-align: center;
        justify-content: center;
        left: 22px;
    }

    .profile .social-icons li {
        width: 25px;
        height: 25px;
        border: 1px solid #eee;
        padding: 10px;
        margin-right: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        border-radius: 5px;
        transition: all 1s;
    }

    .profile .social-icons li:hover {
        background: #fff;
        color: #000;
    }

    .profile .overlay .about {
        position: relative;
        justify-content: center;
        align-items: center;
        display: flex;
        top: 40%;
        color: #fff;
        flex: column;
    }
</style>

</head>
<body>
    <div class="head">
        <p>EXECUTIVE COMMITTEE</p>
    </div>

    <div class="profile-container">
        <?php //fetching the first row from database
            // Prepare the SQL query
            $query = "SELECT * FROM committee WHERE C_ID = '$n'";
            $n = $n+1;

            // Execute the query
            $result = $conn->query($query);
            if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $name = strtoupper($row["Name"]);
                $designation = strtoupper($row["Designation"]);
                $facebook = $row['Facebook'];
                $linkedin = $row['LinkedIn'];
                $email = $row["Email"];
                $photo = $row['Photo'];
                $imageSrc = 'data:image/jpeg;base64,' . base64_encode($photo);
        echo '<div class="profile" style="background-image: url(\'' . $imageSrc . '\');">';
        ?>
            <div class="overlay">
                <div class="about d-flex flex-column">
                    <h4 style="font-size:3vh"><?php echo $name;?></h4>
                    <span style="font-size:2vh"><?php echo $designation;?></span>
                </div>
                <ul class="social-icons">
                    <li> <a href="<?php echo $facebook;?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li> <a href="<?php echo $linkedin;?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    <li> <a href="#" onclick="copyToClipboard('<?php echo $email; }}?>'); showMessage(); return false;"><i class="fa fa-envelope"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="profile-container">
        <?php //fetching the second row from database
            // Prepare the SQL query
            $query = "SELECT * FROM committee WHERE C_ID = '$n'";
            $n = $n+1;

            // Execute the query
            $result = $conn->query($query);
            if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $name = strtoupper($row["Name"]);
                $designation = strtoupper($row["Designation"]);
                $facebook = $row['Facebook'];
                $linkedin = $row['LinkedIn'];
                $email = $row["Email"];
                $photo = $row['Photo'];
                $imageSrc = 'data:image/jpeg;base64,' . base64_encode($photo);
        echo '<div class="profile" style="background-image: url(\'' . $imageSrc . '\');">';
        ?>
            <div class="overlay">
                <div class="about d-flex flex-column">
                    <h4 style="font-size:3vh"><?php echo $name;?></h4>
                    <span style="font-size:2vh"><?php echo $designation;?></span>
                </div>
                <ul class="social-icons">
                    <li> <a href="<?php echo $facebook;?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li> <a href="<?php echo $linkedin;?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    <li> <a href="#" onclick="copyToClipboard('<?php echo $email; }}?>'); showMessage(); return false;"><i class="fa fa-envelope"></i></a></li>
                </ul>
            </div>
        </div>

        <?php //fetching the first row from database
            // Prepare the SQL query
            $query = "SELECT * FROM committee WHERE C_ID = '$n'";
            $n = $n+1;

            // Execute the query
            $result = $conn->query($query);
            if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $name = strtoupper($row["Name"]);
                $designation = strtoupper($row["Designation"]);
                $facebook = $row['Facebook'];
                $linkedin = $row['LinkedIn'];
                $email = $row["Email"];
                $photo = $row['Photo'];
                $imageSrc = 'data:image/jpeg;base64,' . base64_encode($photo);
        echo '<div class="profile" style="background-image: url(\'' . $imageSrc . '\');">';
        ?>
            <div class="overlay">
                <div class="about d-flex flex-column">
                    <h4 style="font-size:3vh"><?php echo $name;?></h4>
                    <span style="font-size:2vh"><?php echo $designation;?></span>
                </div>
                <ul class="social-icons">
                    <li> <a href="<?php echo $facebook;?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li> <a href="<?php echo $linkedin;?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    <li> <a href="#" onclick="copyToClipboard('<?php echo $email; }}?>'); showMessage(); return false;"><i class="fa fa-envelope"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="profile-container">
        <div class="profile" style="background-image: url('/bootstrap table/JAHID.jpg');">
            <div class="overlay">
                <div class="about d-flex flex-column">
                    <h4 style="font-size:3vh">MD JAHID HASSAN</h4>
                    <span style="font-size:2vh">JOINT TREASURER</span>
                </div>
                <ul class="social-icons">
                    <li><i class="fa fa-facebook"></i></li>
                    <li><i class="fa fa-linkedin"></i></li>
                    <li><i class="fa fa-envelope"></i></li>
                    
                </ul>
            </div>
        </div>

        <div class="profile" style="background-image: url('/bootstrap table/JAHID.jpg');">
            <div class="overlay">
                <div class="about d-flex flex-column">
                    <h4 style="font-size:3vh">MD JAHID HASSAN</h4>
                    <span style="font-size:2vh">JOINT TREASURER</span>
                </div>
                <ul class="social-icons">
                    <li><i class="fa fa-facebook"></i></li>
                    <li><i class="fa fa-linkedin"></i></li>
                    <li><i class="fa fa-envelope"></i></li>
                    
                </ul>
            </div>
        </div>

        <div class="profile" style="background-image: url('/bootstrap table/JAHID.jpg');">
            <div class="overlay">
                <div class="about d-flex flex-column">
                    <h4 style="font-size:3vh">MD JAHID HASSAN</h4>
                    <span style="font-size:2vh">JOINT TREASURER</span>
                </div>
                <ul class="social-icons">
                    <li><i class="fa fa-facebook"></i></li>
                    <li><i class="fa fa-linkedin"></i></li>
                    <li><i class="fa fa-envelope"></i></li>
                    
                </ul>
            </div>
        </div>

        <div class="profile" style="background-image: url('/bootstrap table/JAHID.jpg');">
            <div class="overlay">
                <div class="about d-flex flex-column">
                    <h4 style="font-size:3vh">MD JAHID HASSAN</h4>
                    <span style="font-size:2vh">JOINT TREASURER</span>
                </div>
                <ul class="social-icons">
                    <li><i class="fa fa-facebook"></i></li>
                    <li><i class="fa fa-linkedin"></i></li>
                    <li><i class="fa fa-envelope"></i></li>
                    
                </ul>
            </div>
        </div>

        <div class="profile" style="background-image: url('/bootstrap table/JAHID.jpg');">
            <div class="overlay">
                <div class="about d-flex flex-column">
                    <h4 style="font-size:3vh">MD JAHID HASSAN</h4>
                    <span style="font-size:2vh">JOINT TREASURER</span>
                </div>
                <ul class="social-icons">
                    <li><i class="fa fa-facebook"></i></li>
                    <li><i class="fa fa-linkedin"></i></li>
                    <li><i class="fa fa-envelope"></i></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="profile-container">
        <div class="profile" style="background-image: url('/bootstrap table/JAHID.jpg');">
            <div class="overlay">
                <div class="about d-flex flex-column">
                    <h4 style="font-size:3vh">MD JAHID HASSAN</h4>
                    <span style="font-size:2vh">JOINT TREASURER</span>
                </div>
                <ul class="social-icons">
                    <li><i class="fa fa-facebook"></i></li>
                    <li><i class="fa fa-linkedin"></i></li>
                    <li><i class="fa fa-envelope"></i></li>
                    
                </ul>
            </div>
        </div>

        <div class="profile" style="background-image: url('/bootstrap table/JAHID.jpg');">
            <div class="overlay">
                <div class="about d-flex flex-column">
                    <h4 style="font-size:3vh">MD JAHID HASSAN</h4>
                    <span style="font-size:2vh">JOINT TREASURER</span>
                </div>
                <ul class="social-icons">
                    <li><i class="fa fa-facebook"></i></li>
                    <li><i class="fa fa-linkedin"></i></li>
                    <li><i class="fa fa-envelope"></i></li>
                    
                </ul>
            </div>
        </div>

        <div class="profile" style="background-image: url('/bootstrap table/JAHID.jpg');">
            <div class="overlay">
                <div class="about d-flex flex-column">
                    <h4 style="font-size:3vh">MD JAHID HASSAN</h4>
                    <span style="font-size:2vh">JOINT TREASURER</span>
                </div>
                <ul class="social-icons">
                    <li><i class="fa fa-facebook"></i></li>
                    <li><i class="fa fa-linkedin"></i></li>
                    <li><i class="fa fa-envelope"></i></li>
                    
                </ul>
            </div>
        </div>

        <div class="profile" style="background-image: url('/bootstrap table/JAHID.jpg');">
            <div class="overlay">
                <div class="about d-flex flex-column">
                    <h4 style="font-size:3vh">MD JAHID HASSAN</h4>
                    <span style="font-size:2vh">JOINT TREASURER</span>
                </div>
                <ul class="social-icons">
                    <li><i class="fa fa-facebook"></i></li>
                    <li><i class="fa fa-linkedin"></i></li>
                    <li><i class="fa fa-envelope"></i></li>
                    
                </ul>
            </div>
        </div>

        <div class="profile" style="background-image: url('/bootstrap table/JAHID.jpg');">
            <div class="overlay">
                <div class="about d-flex flex-column">
                    <h4 style="font-size:3vh">MD JAHID HASSAN</h4>
                    <span style="font-size:2vh">JOINT TREASURER</span>
                </div>
                <ul class="social-icons">
                    <li><i class="fa fa-facebook"></i></li>
                    <li><i class="fa fa-linkedin"></i></li>
                    <li><i class="fa fa-envelope"></i></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="profile-container">
        <div class="profile" style="background-image: url('/bootstrap table/JAHID.jpg');">
            <div class="overlay">
                <div class="about d-flex flex-column">
                    <h4 style="font-size:3vh">MD JAHID HASSAN</h4>
                    <span style="font-size:2vh">JOINT TREASURER</span>
                </div>
                <ul class="social-icons">
                    <li><i class="fa fa-facebook"></i></li>
                    <li><i class="fa fa-linkedin"></i></li>
                    <li><i class="fa fa-envelope"></i></li>
                    
                </ul>
            </div>
        </div>

        <div class="profile" style="background-image: url('/bootstrap table/JAHID.jpg');">
            <div class="overlay">
                <div class="about d-flex flex-column">
                    <h4 style="font-size:3vh">MD JAHID HASSAN</h4>
                    <span style="font-size:2vh">JOINT TREASURER</span>
                </div>
                <ul class="social-icons">
                    <li><i class="fa fa-facebook"></i></li>
                    <li><i class="fa fa-linkedin"></i></li>
                    <li><i class="fa fa-envelope"></i></li>
                    
                </ul>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard(text) {
          // Create a temporary textarea element
          var tempTextarea = document.createElement('textarea');
          tempTextarea.value = text;
          
          // Append the textarea element to the DOM
          document.body.appendChild(tempTextarea);
          
          // Select and copy the text
          tempTextarea.select();
          document.execCommand('copy');
          
          // Remove the textarea element from the DOM
          document.body.removeChild(tempTextarea);
        }

        function showMessage() {
          alert('The address is copied');
        }
    </script>

</body>
</html>