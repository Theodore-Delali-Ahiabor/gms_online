<?php
	include 'includes/dbconn.php';
	
    session_start();

	if(isset($_SESSION['customer']) && !empty($_SESSION['customer'])){
		//header('location: appointments.php');
		try {
			$conn = $pdo->open();
	
			$customerId = $_SESSION['customer'];
			$stmtSession = $conn->prepare("SELECT *,`c`.`ID` AS `CustomerID`, `u`.`ID` AS `UserID` FROM `customers` `c` 
            JOIN `users` `u` ON `u`.`ID` = `c`.`CustomerUserID` 
			WHERE `CustomerUserID` = :id");
			$stmtSession->execute(['id'=>$customerId]);
			$rowSession = $stmtSession->fetch();
			
			$pdo->close();
		} catch (PDOException $th) {
			echo $th->getMessage();
		}
	}
	if(isset($_SESSION['employee'])){
		header('location: garage/index.php');
	}
	if(isset($_SESSION['admin'])){
		header('location: admin/index.php');
	}
	try {
		$conn = $pdo->open();

		$stmtSystem = $conn->prepare("SELECT *, `g`.`ID` AS `GarageID`, COUNT(*) AS `numrows` FROM `garage` `g`
		JOIN `addresses` `a` ON `g`.`AddressID` = `a`.`ID`
		JOIN `countries` `c` ON `c`.`ID` = `a`.`CountryID`
		JOIN `regions` `r` ON `r`.`ID` = `a`.`RegionID`
		JOIN `cities` `ci` ON `ci`.`ID` = `a`.`CityID`");
		$stmtSystem->execute();
		$rowSystem = $stmtSystem->fetch(); 
		
		$pdo->close();
	} catch (PDOException $th) {
		echo $th->getMessage();
	}
	
	

	$output['type'] = '';
  	$output['message'] = '';
?>