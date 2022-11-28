<?php
session_start();

	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	// header('Location: '.$uri.'/dashboard/');
	if($_SESSION['id']!=null)
		header('Location: '.$uri.'/user/signup1/FramePage.php');
	else
		header('Location: '.$uri.'/user/signup1/loggedin.php');

	exit;
?>
Something is wrong with the XAMPP installation :-(
