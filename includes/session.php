<?php
	include 'includes/dbconn.php';
	
    session_start();

	/* if(isset($_SESSION['customer'])){
		header('location: appointments.php');
	} */
	if(isset($_SESSION['employee'])){
		header('location: garage/index.php');
	}
	if(isset($_SESSION['admin'])){
		header('location: admin/index.php');
	}

	$output['type'] = '';
  	$output['message'] = '';
?>