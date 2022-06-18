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
	try {
		$conn = $pdo->open();

		$stmtSytem = $conn->prepare("SELECT *, `g`.`ID` AS `GarageID`, COUNT(*) AS `numrows` FROM `garage` `g`
		JOIN `addresses` `a` ON `g`.`AddressID` = `a`.`ID`
		JOIN `countries` `c` ON `c`.`ID` = `a`.`CountryID`
		JOIN `regions` `r` ON `r`.`ID` = `a`.`RegionID`
		JOIN `cities` `ci` ON `ci`.`ID` = `a`.`CityID`");
		$stmtSytem->execute();
		$rowSytem = $stmtSytem->fetch(); 
		
		$pdo->close();
	} catch (PDOException $th) {
		echo $th->getMessage();
	}
	
	

	$output['type'] = '';
  	$output['message'] = '';
?>