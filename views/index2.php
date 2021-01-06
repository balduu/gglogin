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
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Ma+Shan+Zheng&display=swap" rel="stylesheet">
	<script src="js/script.js" type="text/javascript" async></script>
	<SCRIPT LANGUAGE="JavaScript" SRC="js/amlich-hnd.js"></SCRIPT>
</head>
<body>
<div class = "page">
	<div class = "header">
		<img class = "logo" src="images/logo.png">
		<img class = "title" src="images/VNPL.png">
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
				<a href="logout.php">Log out</a>
			</div>
		</div>
	</div>

		<div class="container2">
		<script type="text/javascript">
			function viewSelectedMonth() {
				setOutputSize("small");
				var s = printSelectedMonth();
				document.open();
				document.writeln(s);
				document.close();
			}
			viewSelectedMonth();
		</script>

		</div>
		<div class="container3">
			<div class="day-info">
				<div id="date">
					
				</div>
				<div id="info">
				</div>
			</div>
		</div>

	<div class = "footer">
		<div class="f-left">
			<img src="images/dragon.png" alt="dragon">
		</div>
		<div class="f-right">
			<img src="images/phoenix.svg" alt="phoenix">
		</div>
	</div>
</div>
</body>
</html>
