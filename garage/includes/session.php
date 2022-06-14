<?php
	include '../includes/dbconn.php';
	
    session_start();

	if(!isset($_SESSION['employee'])){
		header('location: ../signin.php');
		exit();
	}

	$output['type'] = '';
  	$output['message'] = '';
	
	include 'slugify.php';
?>