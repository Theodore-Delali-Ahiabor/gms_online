<?php
	include 'includes/session.php';

    $output['type'] = '';
    $output['message'] = '';
    try {
        $conn = $pdo->open();
        $output['type'] = 'success'; 
        if(isset($_POST['id'])){
            $stmt = $conn->prepare("SELECT *,`c`.`ID` AS `CustomerID`, `u`.`ID` AS `UserID` FROM `customers` `c` 
            JOIN `users` `u` ON `c`.`CustomerUserID` = `u`.`ID`
            WHERE `c`.`ID` = :id");
            $stmt->execute(['id'=>$_POST['id']]);
            $row = $stmt->fetch();

            if(!empty($row['AddressID'])){
                $stmtAddress = $conn->prepare("SELECT * FROM `addresses` `a` 
                JOIN `countries` `c` ON `a`.`CountryID` = `c`.`ID`
                JOIN `regions` `r` ON `a`.`RegionID` = `r`.`ID`
                JOIN `cities` `ci` ON `a`.`CityID` = `ci`.`ID`
                WHERE `a`.`ID` = :id");
                $stmtAddress->execute(['id'=>$row['AddressID']]);
                $rowAddress = $stmtAddress->fetch();

                $output['countryId'] = $rowAddress['CountryID'];
                $output['country'] = $rowAddress['Country'];
                $output['regionId'] = $rowAddress['RegionID'];
                $output['region'] = $rowAddress['Region'];
                $output['cityId'] = $rowAddress['CityID'];
                $output['city'] = $rowAddress['City'];
                $output['street'] = $rowAddress['Street'];
                $output['house'] = $rowAddress['House'];
                $output['landmark'] = $rowAddress['Landmark'];
            }
            if(!empty($row['GenderID'])){
                $stmtGender = $conn->prepare("SELECT * FROM `genders`
                WHERE `ID` = :id");
                $stmtGender->execute(['id'=>$row['GenderID']]);
                $rowGender = $stmtGender->fetch();

                $output['genderId'] = $rowGender['ID'];
                $output['gender'] = $rowGender['Gender'];
            }
            
            $output['id'] = $row['CustomerID'];
            $output['photo'] = (!empty($row['Photo'])?$row['Photo']:'no-profile.jpg');
            $output['username'] = $row['Username'];
            $output['fname'] = $row['FirstName'];
            $output['oname'] = $row['OtherName'];
            $output['lname'] = $row['LastName'];
            $output['phone'] = $row['Phone'];
            $output['email'] = $row['Email'];
            $output['birthdate'] = $row['BirthDate'];
            $output['age'] = date("Y")- date("Y",strtotime($row['BirthDate'])).' years' ;
            
            $output['type'] = 'success';  

        }

        $pdo->close();
    } catch (PDOException $th) {
        $output['type'] = 'warning';
        $output['message'] = $th->getMessage();
    }
	echo json_encode($output)
?>