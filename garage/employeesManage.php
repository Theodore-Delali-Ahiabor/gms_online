<?php 
    include 'includes/session.php';

    $output['type'] = '';
    $output['message'] = '';
    try {
        $conn = $pdo->open();

        if(isset($_POST['add']) || isset($_POST['edit'])){
            $photo = $_FILES['photo']['name']; 
            $fname = htmlentities($_POST['fname']);    
            $oname = htmlentities($_POST['oname']);       
            $lname = htmlentities($_POST['lname']); 
            $phone = htmlentities($_POST['phone']); 
            $email = htmlentities($_POST['email']); 
            $birthdate = htmlentities($_POST['birthdate']); 
            $gender = htmlentities($_POST['gender']); 
            $department = htmlentities($_POST['department']); 
            $country = htmlentities($_POST['country']); 
            $region = htmlentities($_POST['region']);
            $city = htmlentities($_POST['city']);
            $street = htmlentities($_POST['street']);
            $house = htmlentities($_POST['house']);
            $landmark = htmlentities($_POST['landmark']);
            $position = htmlentities($_POST['position']);
            $relationship = htmlentities($_POST['relationship']);
            $salary = htmlentities($_POST['salary']);
            $username = $email;
            $set = '1234567890ABCDEFGHIJKLMNOPQRSTUVXYZabcdefghijklmnopqrstuvwxyz';
			$pass = substr(str_shuffle($set), 0, 10);
            $password = password_hash($pass, PASSWORD_DEFAULT);
            $null = '';
            $now = date("Y-m-d h:i:s");
            $uploadDir = "../images/profiles/";

            /* Check if empty */
            if(empty($fname) || empty($lname) || empty($phone) || empty($email) || empty($birthdate) || (empty($gender) || $gender == 0) || (empty($country) || $country == 0) || (empty($region) || $region == 0) || (empty($city) || $city == 0) || (empty($relationship) || $relationship == 0)){
                $output['type'] = 'error';
                $output['message'] = 'Some required (*) Fields are emtpy';
                //$output['message'] = 'fname='.$fname.'lname='.$lname.'phone='.$phone.'email='.$email.'Bdate='.$birthdate.'gender='.$gender.'country='.$country.'region='.$region.'city='.$city.'relationship='.$relationship.'';
            }
            else if(!is_numeric($phone)){
                $output['type'] = 'error';
                $output['message'] = 'Please enter numbers ONLY for the phone field';
            }
            else if(!is_numeric($salary)){
                $output['type'] = 'error';
                $output['message'] = 'Please enter numbers ONLY for the salary field';
            }
            else{
                try {
                    /* fetch employees with the specified phone */
                    $stmtPhone = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM `employees` `e` JOIN `users` `u` ON `u`.`ID` = `e`.`EmployeeUserID` WHERE `u`.`phone`=:phone");
                    $stmtPhone->execute(['phone'=>$phone]);
                    $rowPhone = $stmtPhone->fetch();

                    /* fetch employees with the specified email */
                    $stmtEmail = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM `employees` `e` JOIN `users` `u` ON `u`.`ID` = `e`.`EmployeeUserID` WHERE `u`.`email`=:email");
                    $stmtEmail->execute(['email'=>$email]);
                    $rowEmail = $stmtEmail->fetch();

                    /* add new employee */
                    if(isset($_POST['add'])){
                        
                        if($rowPhone['numrows'] > 0){
                            $output['type'] = 'error';
                            $output['message'] = 'Employee with specified phone number already exist';
                        }
                        else if($rowEmail['numrows'] > 0){
                            $output['type'] = 'error';
                            $output['message'] = 'Employee with specified email already exist';
                        }else{
                            /* upload photo */
                            if(!empty($photo)){
                                $ext = pathinfo($photo, PATHINFO_EXTENSION);
                                $new_filename = $phone.'-'.slugify(date("Y-m-d h:i:s")).'.'.$ext;
                                move_uploaded_file($_FILES['photo']['tmp_name'], $uploadDir.$new_filename);
                                $output['type'] = 'error';
                                $output['message'] =$new_filename;	
                                $photo = $new_filename;
                            }else{
                                $photo = $null;
                            }
                            /* insert into address table */
                            $stmt = $conn->prepare("INSERT INTO `addresses`(`CountryID`, `RegionID`, `CityID`, `Street`, `House`, `Landmark`) 
                            VALUES (:country,:region,:city,:street,:house,:landmark)");
                            $stmt->execute(['country'=>$country,'region'=>$region,'city'=>$city,'street'=>$street,'house'=>$house,'landmark'=>$landmark]);
                            $address = $conn->lastInsertId();
                            /* insert into user table */
                            $stmt = $conn->prepare("INSERT INTO `users`(`Username`, `Password`, `Photo`, `FirstName`, `OtherName`, `LastName`, `Phone`, `Email`, `BirthDate`, `GenderID`, `AddressID`) 
                            VALUES (:username,:password,:photo,:fname,:oname,:lname,:phone,:email,:birthdate,:gender,:address)");
                            $stmt->execute(['username'=>$username,'password'=>$password,'photo'=>$photo,'fname'=>$fname,'oname'=>$oname,'lname'=>$lname,'phone'=>$phone,'email'=>$email,'birthdate'=>$birthdate,'gender'=>$gender,'address'=>$address]);
                            $userId = $conn->lastInsertId();
                            /* insert into employee table */
                            $stmt = $conn->prepare("INSERT INTO `employees`(`EmployeeUserID`, `DepartmentID`, `Position`, `RelationshipID`, `Salary`) 
                            VALUES (:userId, :department, :position, :relationship, :salary)");
                            $stmt->execute(['userId'=>$userId,'department'=>$department,'position'=>$position,'relationship'=>$relationship,'salary'=>$salary]);
                            
                            $output['type'] = 'success';
                            $output['message'] = 'Employee added successfully';
                        
                        }
                    /* edit employee */
                    }else if(isset($_POST['edit'])){
                        $id = htmlentities($_POST['id']);

                        if($rowPhone['numrows'] > 1){
                            $output['type'] = 'error';
                            $output['message'] = 'Employee with specified phone number already exist';
                        }
                        else if($rowEmail['numrows'] > 1){
                            $output['type'] = 'error';
                            $output['message'] = 'Employee with specified email already exist';
                        }else{
                            $stmtEmployee = $conn->prepare("SELECT *,`e`.`ID` AS `EmployeeID` FROM `employees` `e` JOIN `users` `u` ON `u`.`ID` = `e`.`EmployeeUserID` 
                            WHERE `e`.`ID`=:id");
                            $stmtEmployee->execute(['id'=>$id]);
                            $rowEmployee = $stmtEmployee->fetch();

                            /* upload photo */
                            if(!empty($photo)){
                                $ext = pathinfo($photo, PATHINFO_EXTENSION);
                                $new_filename = $phone.'-'.slugify(date("Y-m-d h:i:s")).'.'.$ext;
                                move_uploaded_file($_FILES['photo']['tmp_name'], $uploadDir.$new_filename);
                                $output['type'] = 'error';
                                $output['message'] =$new_filename;	
                                $photo = $new_filename;
                            }else{
                                $photo = $rowEmployee['Photo'];
                            }
                            /* update address table */
                            $stmt = $conn->prepare("UPDATE `addresses` SET `CountryID`=:country, `RegionID`=:region, `CityID`=:city, `Street`=:street, `House`=:house, `Landmark`=:landmark 
                            WHERE `ID`=:id");
                            $stmt->execute(['country'=>$country,'region'=>$region,'city'=>$city,'street'=>$street,'house'=>$house,'landmark'=>$landmark,'id'=>$rowEmployee['AddressID']]);
                            
                            /* update user table */
                            $stmt = $conn->prepare("UPDATE `users` SET `Photo`=:photo, `FirstName`=:fname, `OtherName`=:oname, `LastName`=:lname, `Phone`=:phone, `Email`=:email, `BirthDate`=:birthdate, `GenderID`=:gender ,`LastModified`=:now
                            WHERE `ID`=:id");
                            $stmt->execute(['photo'=>$photo,'fname'=>$fname,'oname'=>$oname,'lname'=>$lname,'phone'=>$phone,'email'=>$email,'birthdate'=>$birthdate,'gender'=>$gender,'id'=>$rowEmployee['EmployeeUserID'],'now'=>$now]);
                            
                            /* update employee table */
                            $stmt = $conn->prepare("UPDATE `employees` SET `DepartmentID`=:department, `Position`=:position, `RelationshipID`=:relationship, `Salary`=:salary 
                            WHERE `ID`=:id");
                            $stmt->execute(['department'=>$department,'position'=>$position,'relationship'=>$relationship,'salary'=>$salary,'id'=>$rowEmployee['EmployeeID']]);
                            
                            $output['type'] = 'success';
                            $output['message'] = 'Employee Edited successfully';
                        }
                    }
                } catch (PDOException $th) {
                    $output['type'] = 'warning';
                    $output['message'] = $th->getMessage();
                }
            }

        }

        /* delete employee */
        else if (isset($_POST['delete'])){
            $id = $_POST['id'];

            try {
                $stmt = $conn->prepare("DELETE FROM `employees` WHERE `ID` = :id");
                $stmt->execute(['id'=> $id]);
                $output['type'] = 'info';
                $output['message'] = $id;

            } catch (PDOException $th) {
                $output['type'] = 'warning';
                $output['message'] = $th->getMessage();
            }
        }

        /* Update employee status */
        else if (isset($_POST['status'])){
            $id = $_POST['id'];
            $status = $_POST['status'];

            try {
                $stmt = $conn->prepare("UPDATE `users` SET `Status` = :status WHERE `ID` = :id");
                $stmt->execute(['id'=> $id, 'status'=>$status]);
                $output['type'] = 'success';

            } catch (PDOException $th) {
                $output['type'] = 'warning';
                $output['message'] = $th->getMessage();
            }
        }
       
        $pdo->close();
    } catch (PDOException $th) {
        $output['type'] = 'warning';
        $output['message'] = $th->getMessage();
    }

    $pdo->close();
    echo json_encode($output);
?>