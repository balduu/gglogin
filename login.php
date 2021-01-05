<?php
    require_once "config.php";

	if (isset($_SESSION['access_token'])) {
		header('Location: index.php');
		exit();
	}

	$loginURL = $gClient->createAuthUrl();
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
    <link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>
    <?php
        $server = 'localhost';
        $user = 'root';
        $pass = '';
        $mydb = 'htttweb';

        $con = mysqli_connect($server, $user, $pass, $mydb);
        if ( !$con) {
            die ("Cannot connect to $server using $user");
        } 

        if(isset($_POST['login'])) {
            $email = $_POST['email'];
            $pass = $_POST['password'];
            //print "SELECT COUNT(*), `id`, `email`, `passwd`, `name`, `avartar` FROM `users` WHERE `name` = '". $email ."' AND `passwd` = '". $pass ."'";
            $sql="SELECT COUNT(*), `id`, `email`, `name`, `avartar` FROM `users` 
            WHERE `email` = '". $email ."' AND `passwd` = '". $pass ."'";
            $result = $con->query($sql);
            while($row = $result->fetch_assoc()) {
                if($row['COUNT(*)'] == 0) {
                    print "<p class = 'loginEr'>Wrong email or password</p>";
                } 
                if ($row['COUNT(*)'] == 1) {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['picture'] = $row['avartar'];
                    $_SESSION['givenName'] = $row['name'];
                    $_SESSION['access_token'] = 1;
                    header('Location: index.php');
                    exit();
                }
            }
        }

    ?>
    <div class="container" style="margin-top: 10px">
        <div class="row justify-content-center">
            <div class="col-md-6 col-offset-3" align="center">

                <img class = "logo" src="images/New2020.png"><br><br>

                <form action="login.php" method="post" target="_self">
                    <input placeholder="Email..." name="email" class="form-control"><br>
                    <input type="password" placeholder="Password..." name="password" class="form-control"><br>
                    <input type="submit" name = "login" value="Log In" class="btn btn-primary">
                    <input type="button" onclick="window.location = '<?php echo $loginURL ?>';" value="Log In With Google" class="btn btn-danger">
                </form>

            </div>
        </div>
    </div>
</body>
</html>
