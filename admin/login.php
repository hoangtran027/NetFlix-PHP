<?php include('../config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
	    <div class="container">
        <div class="card card-container">

            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <?php 
            if (isset($_SESSION['login'])) {
            	echo $_SESSION['login'];
            	unset($_SESSION['login']);
            }
            if (isset($_SESSION['no-login-message'])) {
            	echo $_SESSION['no-login-message'];
            	unset($_SESSION['no-login-message']);
            }
             ?>
             <br>
            <form class="form-signin" action="" method="POST">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <input type="submit" name="submit" value="login" class="btn btn-lg btn-primary btn-block btn-signin">
            </form><!-- /form -->
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->	
</body>
</html>

<?php 
	if (isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";
		$res = mysqli_query($conn,$sql);
		$count = mysqli_num_rows($res);
		if ($count == 1) {
			$_SESSION['login'] = "<div class='success'>Login Success</div>";
			$_SESSION['user'] = $username;
			header('location:'.SITEURL.'admin/');
		}
		else{
			$_SESSION['login'] = "<div class='success'>UserName Or Password Not Match</div>";
			header('location:'.SITEURL.'admin/login.php');
		}
	}


 ?>