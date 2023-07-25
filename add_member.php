<!DOCTYPE html>
<html>
<head>
	<title>GUCC :: ADMIN</title>
	<link rel="stylesheet" type="text/css" href="add_member.css">
</head>
<body>
	<img src="admin_home_top.png" alt="">
	<div class="image"></div>
	
	<div class="row">
    <div class="col">
        <div class="leftside">
            <ul>
                <li><a class="active" href="admin_home.php">ADMIN PANEL</a></li>
                <li><a href="#news">NOTICES</a></li>
                <li><a href="#contact">BLOGS</a></li>
                <li><a href="#about">EVENTS</a></li>
                <li><a href="admin_member_list.php">MEMBER DETAILS</a></li>
                <li><a href="#contact">COMMITTEE</a></li>
                
              </ul>
        </div>
    </div>
    <div class="col">
        <table id="info" style="pad: 0;margin: 0;">
            <tr>
              <td colspan="2" style="text-align: center;background-color: #161743;color: white;">ADD NEW MEMBERS</td>
            </tr>  
        </table>
        <form action="add_member_submit.php" method="POST" enctype="multipart/form-data">
            <div class="main-box">
                <div class="login-text">UPLOAD THE .CSV FILE</div>
                <div class="inner-box1">
                  <input type="file" placeholder="Username" name="csv_file">
                </div>
                <div>
                  <button class="login-button" onclick="return confirm('Are you sure you want to proceed?')">
                    UPLOAD 
                  </button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>


