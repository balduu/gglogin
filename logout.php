<?php
	require_once "config.php";
	unset($_SESSION['access_token']);
	/*
	unset($_SESSION['id']);
	unset($_SESSION['email']);
	unset($_SESSION['picture']);
	unset($_SESSION['gender']);
	unset($_SESSION['familyName']);
	unset($_SESSION['givenName']);
	*/
	$gClient->revokeToken();
	session_destroy();
	header('Location: login.php');
	exit();
?>