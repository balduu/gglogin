<?php
	session_start();

	if (!isset($_SESSION['access_token'])) {
		header('Location: login.php');
		exit();
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login With Google</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	<link rel="stylesheet" href="css/stylesheet.css">
	<script src="js/script.js" type="text/javascript" async></script>
</head>
<body>
<div class = "header">
	<div class="user">
		<div class="avt">
		<img class = "avatar" src="
			<?php 
			if($_SESSION['access_token'] != 1) {
				echo $_SESSION['picture'];
			}
			else {
				$avartar = "images/avatar/";
				$avartar .= $_SESSION['picture'];
				echo $avartar;
			}
			?>
		">
		</div>
		<div class="name">
			<?php echo $_SESSION['givenName'] 
				#echo $_SESSION['id'] 
				#echo $_SESSION['email'] 
			?>
			
		</div>
		<div class="dropdown-content">
			<a href="#">Link 1</a>
			<a href="#">Link 2</a>
			<a href="logout.php">Log out</a>
		</div>
	</div>
</div>

	<div class="container2">
        <div class="calendar">
            <div class="month">
                <i class="fas fa-angle-left prev"></i>
                <div class="date">
                    <h1></h1>
                    <p></p>
                </div>
                <i class="fas fa-angle-right next"></i>
            </div>
            <div class="weekdays">
                <div>Sun</div>
                <div>Mon</div>
                <div>Tue</div>
                <div>Wed</div>
                <div>Thu</div>
                <div>Fri</div>
                <div>Sat</div>
            </div>
            <div class="days">
                
            </div>
        </div>
	</div>
	<div class="container3"></div>

<div class = "footer">

</div>
</body>
</html>