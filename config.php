<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("507195132317-f69uettrjgs6a39ce4f7qv2trr26n9k1.apps.googleusercontent.com");
	$gClient->setClientSecret("R2Ai6kre18-bhFRTRHwJ8Kve");
	$gClient->setApplicationName("PerfectNew");
	$gClient->setRedirectUri("http://localhost:8868/gglogin/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
