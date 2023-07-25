<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="admin_login.css">
    <title>GUCC</title>
</head>
<body>
    <div class="header-text">GREEN UNIVERSITY COMPUTER CLUB</div>
    <form action="admin_login_submit.php" method="POST" >
      <div class="main-box">
        <div class="login-text">ADMIN LOGIN</div>
          <div class="inner-box1">
            <input type="text" placeholder="ID" name="A_ID">
          </div>
          <div class="inner-box2">
            <input type="password" placeholder="Password" name="password">
          </div>
        <input type="submit" name="save" value="LOGIN" class="login-button">
      </div>
      </form>
    </div>
    <a href="admin_forgot_password.html" class="forget-password">FORGET PASSWORD?</a>
</body>
</html>