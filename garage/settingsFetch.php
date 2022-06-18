<?php
	include 'includes/session.php';

    $output['type'] = '';
    $output['message'] = '';
    try {
        $conn = $pdo->open();

        $stmt = $conn->prepare("SELECT *, `g`.`ID` AS `GarageID`, COUNT(*) AS `numrows` FROM `garage` `g`
        JOIN `addresses` `a` ON `g`.`AddressID` = `a`.`ID`
        JOIN `countries` `c` ON `c`.`ID` = `a`.`CountryID`
        JOIN `regions` `r` ON `r`.`ID` = `a`.`RegionID`
        JOIN `cities` `ci` ON `ci`.`ID` = `a`.`CityID`");
        $stmt->execute();
        $row = $stmt->fetch(); 
        $output['logo'] = $row['Logo'];
        $output['sbname'] = $row['ShortName'];
        $output['fbname'] = $row['LongName'];
        $output['email'] = $row['Email'];
        $output['phone'] = $row['Phone'];
        $output['about'] = $row['AboutUs'];
        $output['pobox'] = $row['Box'];
        $output['addressId'] = $row['AddressID'];
        $output['countryId'] = $row['CountryID'];
        $output['country'] = $row['Country'];
        $output['regionId'] = $row['RegionID'];
        $output['region'] = $row['Region'];
        $output['cityId'] = $row['CityID'];
        $output['city'] = $row['City'];
        $output['street'] = $row['Street'];
        $output['house'] = $row['House'];
        $output['landmark'] = $row['Landmark'];

        $output['type'] = 'success';  

        $pdo->close();
    } catch (PDOException $th) {
        $output['type'] = 'warning';
        $output['message'] = $th->getMessage();
    }
	echo json_encode($output)
?>