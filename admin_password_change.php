<?php
  // Start the session
  session_start();

  // Check if the user is logged in
  if (isset($_SESSION["id"])) {

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
  <link rel="stylesheet" type="text/css" href="admin_password_change.css">
  <style>
    ul {
      position: relative;
      width: 400px;
      background: #FFFFFF;
      left: 15%;
      right: 80%;
      top: 10px;
      bottom: 351px;
      list-style: none;
      padding: 0;
      margin-right: 70px;
      font-size: 16px;
      color: #161743;
      font-size: 18px;
    }
    li.valid {
      color: green;
    }
    li.invalid {
      color: red;
    }
  </style>

  <!-- <script>
    function checkPasswordStrength() {
      var password = document.getElementById("new_password").value;
      var strength = document.getElementById("password_strength");

      // Check length
      if (password.length < 8) {
        strength.innerHTML = "Password must be at least 8 characters long";
        return;
      }

      // Check uppercase letter
      if (!/[A-Z]/.test(password)) {
        strength.innerHTML = "Password must contain at least one uppercase letter";
        return;
      }

      // Check lowercase letter
      if (!/[a-z]/.test(password)) {
        strength.innerHTML = "Password must contain at least one lowercase letter";
        return;
      }

      // Check number
      if (!/\d/.test(password)) {
        strength.innerHTML = "Password must contain at least one number";
        return;
      }


      // Password is strong
      strength.innerHTML = "Password is strong!";
    }
  </script> -->


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
        <form action="admin_password_change_submit.php" method="POST" >
            <div class="main-box">
                <div class="login-text">PASSWORD UPDATE</div>
                <div class="inner-box1">
                    <input type="password" placeholder="CURRENT PASSWORD" name="current_password" required>
                </div>
                <div class="inner-box2">
                    <input type="password" placeholder="NEW Password" name="new_password" onkeyup="checkPasswordStrength()" id="new_password" required>
                </div>
                <div class="inner-box3">
                    <input type="password" placeholder="RE-TYPE NEW Password" name="retype_new_password" required>
                </div>
                <input type="submit" name="save" value="UPDATE" class="login-button">
            </div>
            <br><br><br>
            <!-- <p id="password_strength"></p> -->
            <ul id="password_strength">
              <li id="length">At least 8 characters long</li>
              <li id="uppercase">Contains at least one uppercase letter</li>
              <li id="lowercase">Contains at least one lowercase letter</li>
              <li id="number">Contains at least one number</li>
            </ul>
        </form>
    </div>
  </div>

  <script>
    const passwordInput = document.getElementById('new_password');
    const lengthItem = document.getElementById('length');
    const uppercaseItem = document.getElementById('uppercase');
    const lowercaseItem = document.getElementById('lowercase');
    const numberItem = document.getElementById('number');
   

    passwordInput.addEventListener('input', function() {
      const password = passwordInput.value;

      // Check length
      if (password.length >= 8) {
        lengthItem.classList.remove('invalid');
        lengthItem.classList.add('valid');
      } else {
        lengthItem.classList.remove('valid');
        lengthItem.classList.add('invalid');
      }

      // Check uppercase
      if (/[A-Z]/.test(password)) {
        uppercaseItem.classList.remove('invalid');
        uppercaseItem.classList.add('valid');
      } else {
        uppercaseItem.classList.remove('valid');
        uppercaseItem.classList.add('invalid');
      }

      // Check lowercase
      if (/[a-z]/.test(password)) {
        lowercaseItem.classList.remove('invalid');
        lowercaseItem.classList.add('valid');
      } else {
        lowercaseItem.classList.remove('valid');
        lowercaseItem.classList.add('invalid');
      }

      // Check number
      if (/[0-9]/.test(password)) {
        numberItem.classList.remove('invalid');
        numberItem.classList.add('valid');
      } else {
        numberItem.classList.remove('valid');
        numberItem.classList.add('invalid');
      }
    });
  </script>
</body>
</html>
