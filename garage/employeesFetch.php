<?php
	include 'includes/session.php';

    $output['type'] = '';
    $output['message'] = '';
    try {
        $conn = $pdo->open();
        $output['type'] = 'success'; 
        if(isset($_POST['id'])){
            $output['type'] = 'success';
            $stmt = $conn->prepare("SELECT *,`e`.`ID` AS `EmployeeID`, `u`.`ID` AS `UserID` FROM `employees` `e` 
            JOIN `users` `u` ON `u`.`ID` = `e`.`EmployeeUserID` 
            JOIN `departments` `d` ON `d`.`ID` = `e`.`DepartmentID`
            JOIN `relationships` `re` ON `re`.`ID` = `e`.`RelationshipID`
            JOIN `addresses` `a` ON `a`.`ID` = `u`.`AddressID`
            JOIN `countries` `c` ON `c`.`ID` = `a`.`CountryID`
            JOIN `regions` `r` ON `r`.`ID` = `a`.`RegionID`
            JOIN `cities` `ci` ON `ci`.`ID` = `a`.`CityID`
            JOIN `genders` `g` ON `g`.`ID` = `u`.`GenderID` WHERE `e`.`ID` = :id");
            $stmt->execute(['id'=>$_POST['id']]);
            $row = $stmt->fetch();
            $output['id'] = $row['EmployeeID'];
            $output['photo'] = (!empty($row['Photo'])?$row['Photo']:'no-profile.jpg');
            $output['username'] = $row['Username'];
            $output['fname'] = $row['FirstName'];
            $output['oname'] = $row['OtherName'];
            $output['lname'] = $row['LastName'];
            $output['phone'] = $row['Phone'];
            $output['email'] = $row['Email'];
            $output['birthdate'] = $row['BirthDate'];
            $output['age'] = date("Y")- date("Y",strtotime($row['BirthDate'])).' years' ;
            $output['genderId'] = $row['GenderID'];
            $output['gender'] = $row['Gender'];
            $output['departmentId'] = $row['DepartmentID'];
            $output['department'] = $row['Department'];
            $output['countryId'] = $row['CountryID'];
            $output['country'] = $row['Country'];
            $output['regionId'] = $row['RegionID'];
            $output['region'] = $row['Region'];
            $output['cityId'] = $row['CityID'];
            $output['city'] = $row['City'];
            $output['street'] = $row['Street'];
            $output['house'] = $row['House'];
            $output['landmark'] = $row['Landmark'];
            $output['position'] = $row['Position'];
            $output['relationshipId'] = $row['RelationshipID'];
            $output['relationship'] = $row['Relationship'];
            $output['salary'] = $row['Salary'];
            $output['status'] = ($row['Status']==1)?"Active":"Inactive";
            $output['dateCreated'] = $row['DateCreated'];
            $output['lastModified'] = $row['LastModified'];
            $output['type'] = 'success';  

        }

        $pdo->close();
    } catch (PDOException $th) {
        $output['type'] = 'warning';
        $output['message'] = $th->getMessage();
    }
	echo json_encode($output)
?>