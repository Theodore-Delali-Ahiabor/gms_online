<?php

	include 'includes/session.php';
	$conn = $pdo->open();

	if(isset($_POST['user']) && isset($_POST['password'])){
		$username = htmlentities($_POST['user']);
		$password = htmlentities($_POST['password']);
		$null = "";
		
		try{
			$user = 0;
			$type = '';
			if($user == 0){
				/* If user is a custoner */
				$stmt = $conn->prepare("SELECT *,`u`.`ID` AS `UserID`,`c`.`ID` AS `CustomerID`, COUNT(*) AS 'numrows' 
				FROM `customers` `c` 
				JOIN `users` `u` ON `u`.`ID` = `c`.`CustomerUserID` 
				WHERE (`u`.`Username` != :null && `u`.`Username` = :user) || (`u`.`Phone` != :null && `u`.`Phone` = :user) || (`u`.`Email` != :null && `u`.`Email` = :user)");
				$stmt->execute(['user'=>$username,'null'=>$null]);
				$row = $stmt->fetch();
				if($row['numrows']  == 1){
					$user = 1;
					if($row['Status'] == 1){
						if(password_verify($password, $row['Password'])){
							$_SESSION['customer'] = $row['CustomerUserID'];
							$output['type'] = 'success';
						}else{
							$output['type'] = 'error';
							$output['message'] = 'Incorrect Password';
						}
					}else{
						$output['type'] = 'error';
						$output['message'] = 'User account not ACTIVE. Please contact support for assistance.';
					}
				}
			}
			if($user == 0){
				/* If user is an employee */
				$stmt = $conn->prepare("SELECT *,`u`.`ID` AS `UserID`,`e`.`ID` AS `EmployeeID`, COUNT(*) AS 'numrows' 
				FROM `employees` `e` 
				JOIN `users` `u` ON `u`.`ID` = `e`.`EmployeeUserID` 
				WHERE (`u`.`Username` != :null && `u`.`Username` = :user) || (`u`.`Phone` != :null && `u`.`Phone` = :user) || (`u`.`Email` != :null && `u`.`Email` = :user)");
				$stmt->execute(['user'=>$username,'null'=>$null]);
				$row = $stmt->fetch();
				if($row['numrows']  == 1){
					$user = 1;
					if($row['Status'] == 1){
						if(password_verify($password, $row['Password'])){
							$_SESSION['employee'] = $row['EmployeeUserID'];
							$output['type'] = 'success';
						}else{
							$output['type'] = 'error';
							$output['message'] = 'Incorrect Password';
						}
					}else{
						$output['type'] = 'error';
						$output['message'] = 'Employee account not ACTIVE. Please contact Management for assistance.';
					}
				}
			}
			if($user == 0){
				/* If user is an admin */
				$stmt = $conn->prepare("SELECT *,`u`.`ID` AS `UserID`,`a`.`ID` AS `AdminID`, COUNT(*) AS 'numrows' 
				FROM `admins` `a` 
				JOIN `users` `u` ON `u`.`ID` = `a`.`AdminUserID` 
				WHERE (`u`.`Username` != :null && `u`.`Username` = :user) || (`u`.`Phone` != :null && `u`.`Phone` = :user) || (`u`.`Email` != :null && `u`.`Email` = :user)");
				$stmt->execute(['user'=>$username,'null'=>$null]);
				$row = $stmt->fetch();
				if($row['numrows']  == 1){
					$user = 1;
					if($row['Status'] == 1){
						if(password_verify($password, $row['Password'])){
							$_SESSION['admin'] = $row['AdminUserID'];
							$output['type'] = 'success';
						}else{
							$output['type'] = 'error';
							$output['message'] = 'Incorrect Password';
						}
					}else{
						$output['type'] = 'error';
						$output['message'] = 'Admin account not ACTIVE. Please contact a superior Admin for assistance.';
					}
				}
			}
			if($user == 0){
				$output['type'] = 'error';
				$output['message'] = 'User account not found';
			}
		}
		catch(PDOException $e){
			$output['type'] = 'warning';
			$output['message'] = "An error occured. Error details: " . $e->getMessage();
		}
	}
	else{
		$output['type'] = 'error';
		$output['message'] = "Login credentails are empty";
	}

	$pdo->close();
	echo json_encode($output);

?>
