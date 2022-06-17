<?php
	include 'includes/session.php';

    $output['type'] = '';
    $output['message'] = '';
    try {
        $conn = $pdo->open();

            $stmt = $conn->prepare("SELECT *,`s`.`ID` AS `SupplierID` FROM `suppliers` `s`
            JOIN `sectors` `se` ON `s`.`SectorID` = `se`.`ID`
            JOIN `addresses` `a` ON `a`.`ID` = `s`.`AddressID`
            JOIN `countries` `c` ON `c`.`ID` = `a`.`CountryID`
            JOIN `regions` `r` ON `r`.`ID` = `a`.`RegionID`
            JOIN `cities` `ci` ON `ci`.`ID` = `a`.`CityID`
            WHERE `s`.`ID` = :id ");
            $stmt->execute(['id'=>$_POST['id']]);
            $row = $stmt->fetch();
            $output['id'] = $row['SupplierID'];
            $output['name'] = $row['Name'];
            $output['sectorId'] = $row['SectorID'];
            $output['sector'] = $row['Sector'];
            $output['phone'] = $row['Phone'];
            $output['email'] = $row['Email'];
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