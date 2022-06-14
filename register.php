<?php

	include 'includes/session.php';

	if(isset($_POST['username'])){
		
		try {
			$firstname = htmlentities($_POST['firstname']);
			$lastname = htmlentities($_POST['lastname']);
			$email = htmlentities($_POST['email']);
			$username = htmlentities($_POST['username']);
			$password = htmlentities($_POST['password']);
			$confirmPassword = htmlentities($_POST['confirmPassword']);
			$null = ''; 
		
			if($password != $confirmPassword){
				$output['type'] = 'error';
				$output['message'] = 'Passwords did not match';
			}
			else{
				$conn = $pdo->open();

				/* validate username */
				$stmt = $conn->prepare("SELECT COUNT(*) AS `usernamenumrows` FROM `users` `u` JOIN `customers` `c` ON `c`.`CustomerUserID` = `u`.`ID` WHERE `u`.`Username`=:username && `c`.`CustomerUserID` != :null");
				$stmt->execute(['username'=>$username, 'null'=>$null]);
				$row = $stmt->fetch();
				if($row['usernamenumrows'] > 0){
					$output['type'] = 'error';
					$output['message'] = 'Sorry, a Customer with this username has already registered';
				}

				/* validate email */
				$stmt = $conn->prepare("SELECT COUNT(*) AS `emailnumrows` FROM `users` `u` JOIN `customers` `c` ON `c`.`CustomerUserID` = `u`.`ID` WHERE `Email`=:email && `c`.`CustomerUserID` != :null");
				$stmt->execute(['email'=>$email, 'null'=>$null]);
				$row = $stmt->fetch();
				if($row['emailnumrows'] > 0){
					$output['type'] = 'error';
					$output['message'] = 'Sorry, a customer with this Email has already registered';
				}
				else{
					if (preg_match('/[A-Za-z]/', $password) && preg_match('/[0-9]/', $password) && strlen($password) > 7){
						$now = date('Y-m-d');
						$hashPass = password_hash($confirmPassword, PASSWORD_DEFAULT);
						$status = 1;

						try{
							/* Insert new customer into users table  */
							$stmt = $conn->prepare("INSERT INTO `users`(`Username`, `Password`, `FirstName`, `LastName`, `Email`, `Status`, `DateCreated`)
							VALUES (:username, :password, :firstname, :lastname, :email, :status, :now)");
							$stmt->execute(['username'=>$username, 'password'=>$hashPass, 'firstname'=>$firstname, 'lastname'=>$lastname, 'email'=>$email, 'status'=>$status, 'now'=>$now]);
							$userid = $conn->lastInsertId();

							/* Insert new customer into customers table */
							$stmt = $conn->prepare("INSERT INTO `customers`(`CustomerUserID`)
							VALUES (:userid)");
							$stmt->execute(['userid'=>$userid]);

							$output['type'] = 'success';
							$output['message'] = 'Hi '.$username.', your free account has been created successfully. You can now login';
						}
						catch(PDOException $e){
							$output['type'] = 'warning';
							$output['message'] = "An error occured. Error details: ".$e->getMessage();
						}
					}else{
						$output['type'] = 'error';
						$output['message'] = 'Password must contain at least a letter, a number, and must be at least 8 characters long';
					}
				}
				$pdo->close();
			}
		}
		 catch (PDOException $th) {
			$output['type'] = 'warning';
			$output['message'] = $th->getMessage();
		 }		
	}
	else{
		$output['type'] = 'error';
		$output['message'] = "Please Fill all credentials";
	}
    echo json_encode($output);
?>