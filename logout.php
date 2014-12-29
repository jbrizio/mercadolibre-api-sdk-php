<?php
	session_start();
	unset($_SESSION['access_token']);
	unset($_SESSION['expires_in']);
	unset($_SESSION['refresh_token']);
	header('Location: http://develop.com/mercadolibre/');
?>
