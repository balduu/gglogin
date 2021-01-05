<?php 
	/**
	* 
	*/
	require_once('DbModel.php');
	class UserModel extends DbModel
	{
		
		public function login($email , $password )
		{
			$con = $this->connect();
			$sql = 'SELECT * FROM `users` WHERE email = "'.$email.'" and passwd = "'.$password.'" ' ;
			$result = $con-> query($sql);
			return $user = mysqli_fetch_assoc($result);
		}
	}

 ?>
 