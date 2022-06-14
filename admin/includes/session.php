<?php
	include 'includes/dbconn.php';
	
    session_start();

	if(isset($_SESSION['admin'])){
		header('location: admin/index.php');
	}

	/* if(isset($_SESSION['user'])){
		//header('location: cart_view.php');
	} */
	$output['type'] = '';
  	$output['message'] = '';
?>