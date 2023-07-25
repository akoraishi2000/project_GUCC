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