<?php
	include '../includes/dbconn.php';
	
    session_start();

	if(!isset($_SESSION['employee'])){
		header('location: ../signin.php');
		exit();
	}else{
		try {
			$conn = $pdo->open();
			$employeeId = $_SESSION['employee'];
			$stmtSession = $conn->prepare("SELECT *,`e`.`ID` AS `EmployeeID`, `u`.`ID` AS `UserID` FROM `employees` `e` 
            JOIN `users` `u` ON `u`.`ID` = `e`.`EmployeeUserID` 
            JOIN `departments` `d` ON `d`.`ID` = `e`.`DepartmentID`
			WHERE `EmployeeUserID` = :id");
			$stmtSession->execute(['id'=>$employeeId]);
			$rowSession = $stmtSession->fetch();
			$_SESSION['department'] = $rowSession['Department'];
			

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
	}

	$output['type'] = '';
  	$output['message'] = '';
	
	include 'slugify.php';
?>