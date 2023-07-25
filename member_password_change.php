<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="member_password_change.css">
    <title>GUCC :: Home</title>
</head>
<body>
    
    <nav id="main-menu">
        <ul class="nav-bar">
             <img class="img-position" src="gucc 1 (1).png">
             <li class="nav-button-xyz"><a href="#">XYZ</a></li>
             <li class="nav-button-home"><a href="#">HOME</a></li>
             <li class="nav-button-commiittee"><a href="#">COMMITTEE</a></li>
             <li class="nav-button-notice"><a href="#">NOTICE</a></li>
             <li class="nav-button-blog"><a href="#">BLOG</a></li>
             <li class="nav-button-event"><a href="#">EVENT</a></li>
             <li class="nav-button-blood_donation"><a href="#">BLOOD DONATION</a></li>
             <li class="nav-button-profile"><a href="#">PROFILE</a></li>
             <li class="nav-button-logout"><a href="member_logout.php">LOGOUT</a></li>
        </ul>
    </nav>
           
    
    <div class="box1" style="margin-top: 30px;">
        <div class="box1-text">MEMBER PROFILE</div>
    </div>

    <div class="row">
        <div class="col">
            <div class="leftside">
                <ul>
                    <li id="special"><a  href="member_profile.php">MEMBER INFORMATION</a></li>
                    <li class="active"><a href="member_password_change.php">CHANGE PASSWORD</a></li>
                </ul>
            </div>
        </div>
        <div class="col">
        <form action="member_password_change_submit.php" method="POST" >
            <div class="main-box">
                <div class="login-text">PASSWORD UPDATE</div>
                <div class="inner-box1">
                    <input type="password" placeholder="CURRENT PASSWORD" name="current_password" required>
                </div>
                <div class="inner-box2">
                    <input type="password" placeholder="NEW Password" name="new_password" required>
                </div>
                <div class="inner-box3">
                    <input type="password" placeholder="RE-TYPE NEW Password" name="retype_new_password" required>
                </div>
                <input type="submit" name="save" value="UPDATE" class="login-button">
            </div>
        </form>
        
        </div>
    </div>
    
</body>
</html>