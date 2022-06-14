<?php
    include 'includes/session.php';
  
     try{
        $conn = $pdo->open();

        $output['countries'] = '<option value="0">--Select--</option>';
        $output['regions']  = '<option value="0">--Select--</option>';
        $output['cities'] = '<option value="0">--Select--</option>';
        $output['genders'] = '<option value="0">--Select--</option>';
        $output['departments'] = '<option value="0">--Select--</option>';
        $output['relationships'] = '<option value="0">--Select--</option>';

         /* fetch Countries */
        $stmtCountries = $conn->prepare("SELECT * FROM `countries` ORDER BY `Country`");
        $stmtCountries->execute();
        foreach ($stmtCountries as $rowCountries) {
            $output['countries'] .=  "<option value='".$rowCountries['ID']."'>".$rowCountries['Country']."</option>";
        }
        /* fetch Regions */
        if(isset($_POST['countryId'])){
            $countryId = $_POST['countryId'];
            $stmtRegions = $conn->prepare("SELECT * FROM `regions` WHERE `CountryID` = :countryId ORDER BY `Region` ");
            $stmtRegions->execute(['countryId'=>$countryId]);
            foreach ($stmtRegions as $rowRegions) {
                $output['regions'] .=  "<option value='".$rowRegions['ID']."'>".$rowRegions['Region']."</option>";
            }
        }
        /* fetch cities */
        if(isset($_POST['regionId'])){
            $regionId = $_POST['regionId'];
            $stmtCities = $conn->prepare("SELECT * FROM `cities` WHERE `RegionID` = :regionId  ORDER BY `City`");
            $stmtCities->execute(['regionId'=>$regionId]);
            foreach ($stmtCities as $rowCity) {
                $output['cities'] .=  "<option value='".$rowCity['ID']."'>".$rowCity['City']."</option>";
            }
        }
        /* Genders */
        $stmtGender = $conn->prepare("SELECT * FROM `genders` ORDER BY `Gender` DESC ");
        $stmtGender->execute();
        foreach ($stmtGender as $rowGender) {
            $output['genders'] .=  "<option value='".$rowGender['ID']."'>".$rowGender['Gender']."</option>";
        }
        /* Departments */
        $stmtDepartment = $conn->prepare("SELECT * FROM `departments` ORDER BY `Department` DESC ");
        $stmtDepartment->execute();
        foreach ($stmtDepartment as $rowDepartment) {
            $output['departments'] .=  "<option value='".$rowDepartment['ID']."'>".$rowDepartment['Department']."</option>";
        }
        /* relationships */
        $stmtRelationship = $conn->prepare("SELECT * FROM `relationships` ORDER BY `Relationship` DESC ");
        $stmtRelationship->execute();
        foreach ($stmtRelationship as $rowRelationship) {
            $output['relationships'] .=  "<option value='".$rowRelationship['ID']."'>".$rowRelationship['Relationship']."</option>";
        }

        $output['type'] = 'success';
        $pdo->close();
    }
    catch(PDOException $e){
        $output['type'] = 'warning';
        $output['message'] = $e->getMessage();
    }

echo json_encode($output);
?>