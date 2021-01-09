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
	<title>Vạn Niên Phổ Lịch</title>
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
		<div id="element">
				Năm sinh, Tuổi mệnh, Ngũ hành
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

<script>
	var birth = "<?php echo $_SESSION['birth']; ?>";
	birth = birth%10000;
	var can_number = birth % 10;
	var chi_number = (birth % 100) % 12;
	var can, chi;
	var User_ELEMENT = new Array("Mộc", "Kim", "Thủy", "Hỏa", "Thổ");
	//var mes1 = birth + " " + getYearCanChi(birth) ;
	
	// Thien Can
	if((can_number == 4) || (can_number == 5)) {
		can = 1;
	}
	else if((can_number == 6) || (can_number == 7)) {
		can = 2;
	}
	else if((can_number == 8) || (can_number == 9)) {
		can = 3;
	}
	else if((can_number == 0) || (can_number == 1)) {
		can = 4;
	}
	else if((can_number == 2) || (can_number == 3)) {
		can = 5;
	}
	// Dia chi
	if((chi_number == 0) || (chi_number == 1) || (chi_number == 6) || (chi_number == 7)) {
		chi = 0;
	}
	else if((chi_number == 2) || (chi_number == 3) || (chi_number == 8) || (chi_number == 9)) {
		chi = 1;
	}
	else if((chi_number == 4) || (chi_number == 5) || (chi_number == 10) || (chi_number == 11)) {
		chi = 2;
	}
	var nguhanh = (can + chi) % 5;
	var sinh, khac;
	if(nguhanh == 0) {
		sinh = User_ELEMENT[3];
		khac = User_ELEMENT[1] + " và " + User_ELEMENT[4];
	} 
	else if(nguhanh == 1) {
		sinh = User_ELEMENT[2];
		khac = User_ELEMENT[0] + " và " + User_ELEMENT[3];
	}
	else if(nguhanh == 2) {
		sinh = User_ELEMENT[0];
		khac = User_ELEMENT[3] + " và " + User_ELEMENT[4];
	}
	else if(nguhanh == 3) {
		sinh = User_ELEMENT[4];
		khac = User_ELEMENT[2] + " và " + User_ELEMENT[0];
	}
	else if(nguhanh == 4) {
		sinh = User_ELEMENT[1];
		khac = User_ELEMENT[0] + " và " + User_ELEMENT[2];
	}
	var mes = "Bạn sinh năm " + birth + " tuổi mệnh là " + getYearCanChi(birth) + " tương ứng với hành " + User_ELEMENT[nguhanh] + "<br>";
	mes += "Vạn sự hơp với những ngày hành " + sinh;
	mes += ", không hợp ngày hành " + khac;

	document.getElementById("element").innerHTML = mes;
</script>

