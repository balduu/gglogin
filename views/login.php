<style>
    body {
        background-color: #66A5AD;
    }
    .lgcontainer {
        width: 100%;
        height: 100%;
        background-image: url("views/images/long_phung.jpg");
        background-repeat: no-repeat;
        background-size: 100%;
        background-attachment: fixed;
        background-position: center;
    }
    .lgcontainer .form-control {
        width: 60%;
    }
</style>
<?php
    require_once __DIR__ . "/../config.php";

	if (isset($_SESSION['access_token'])) {
		header('Location: views/index2.php');
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
    <div class="lgcontainer">
        <div class="row justify-content-center">
            <div class="col-md-6 col-offset-3" align="center">

                <img style = "width: 200px; height: auto;" src="views/images/logo.png"><br><br>

                <form action="" method="post" target="_self">
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
