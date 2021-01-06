<style>
	.loginEr {
		color: red;
		margin-left: 450px;
		margin-top: -210px;
		position: fixed;
	}
</style>
<?php 
	/**
	* 
	*/
	require_once('models/UserModel.php');
	class UserController
	{
		public function getUser(){
			$email = isset($_POST['email'])? $_POST['email']: '' ;
			$password = isset($_POST['password'])? $_POST['password']: '' ;
			if ($password != '' && $email != '' ) {
				$usermodel = new UserModel();
				 $user = $usermodel->login($email , $password );

				 if ($user) {
					echo "chuc mung ban da dang nhap thanh cong ";
					session_start();
					$_SESSION['id'] = $user['id'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['picture'] = $user['avartar'];
                    $_SESSION['givenName'] = $user['name'];
					$_SESSION['access_token'] = 1;
					header('Location: views/index2.php');
                    exit();
					
				 } else {
				 	require_once('views/Login.php');
					 print "<div class = 'loginEr'> sai ten dang nhap hoac mat khau</div>";
				 }
				 
			}else{
				require_once('views/Login.php');
			}
		}
		
	}

 ?>
 