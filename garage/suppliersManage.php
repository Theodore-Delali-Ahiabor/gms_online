<?php 
    include 'includes/session.php';

    $output['type'] = '';
    $output['message'] = '';
    try {
        $conn = $pdo->open();

        if(isset($_POST['add']) || isset($_POST['edit'])){
            $name = htmlentities($_POST['name']);    
            $sector = htmlentities($_POST['sector']);       
            $box = htmlentities($_POST['box']); 
            $phone = htmlentities($_POST['phone']); 
            $email = htmlentities($_POST['email']); 
            $country = htmlentities($_POST['country']); 
            $region = htmlentities($_POST['region']);
            $city = htmlentities($_POST['city']);
            $street = htmlentities($_POST['street']);
            $house = htmlentities($_POST['house']);
            $landmark = htmlentities($_POST['landmark']);
            $null = null;
            $now = date("Y-m-d h:i:s");

            /* Check if empty */
            if(empty($name) || empty($phone) || (empty($sector) || $sector == 0) || (empty($country) || $country == 0) || (empty($region) || $region == 0) || (empty($city) || $city == 0)){
                $output['type'] = 'error';
                $output['message'] = 'Some required (*) Fields are emtpy';
                //$output['message'] = 'fname='.$fname.'lname='.$lname.'phone='.$phone.'email='.$email.'Bdate='.$birthdate.'gender='.$gender.'country='.$country.'region='.$region.'city='.$city.'relationship='.$relationship.'';
            }
            else if(!is_numeric($phone)){
                $output['type'] = 'error';
                $output['message'] = 'Please enter numbers ONLY for the phone field';
            }
            else{
                try {
                    /* fetch suppliers with the specified phone */
                    $stmtPhone = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM `suppliers` `s` WHERE `s`.`phone`=:phone");
                    $stmtPhone->execute(['phone'=>$phone]);
                    $rowPhone = $stmtPhone->fetch();

                    /* fetch suppliers with the specified email */
                    $stmtEmail = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM `suppliers` `s` WHERE `s`.`email`=:email");
                    $stmtEmail->execute(['email'=>$email]);
                    $rowEmail = $stmtEmail->fetch();

                    /* add new supplier */
                    if(isset($_POST['add'])){
                        
                        if($rowPhone['numrows'] > 0){
                            $output['type'] = 'error';
                            $output['message'] = 'Supplier with specified phone number already exist';
                        }
                        else if($rowEmail['numrows'] > 0){
                            $output['type'] = 'error';
                            $output['message'] = 'Supplier with specified email already exist';
                        }else{
                            
                            /* insert into address table */
                            $stmt = $conn->prepare("INSERT INTO `addresses`(`CountryID`, `RegionID`, `CityID`, `Street`, `House`, `Landmark`) 
                            VALUES (:country,:region,:city,:street,:house,:landmark)");
                            $stmt->execute(['country'=>$country,'region'=>$region,'city'=>$city,'street'=>$street,'house'=>$house,'landmark'=>$landmark]);
                            $address = $conn->lastInsertId();
                            /* insert into supplier table */
                            $stmt = $conn->prepare("INSERT INTO `suppliers`(`Name`, `AddressID`, `SectorID`, `Phone`, `Email`, `Box`) 
                            VALUES (:name,:address,:sector,:phone,:email,:box)");
                            $stmt->execute(['name'=>$name,'address'=>$address,'sector'=>$sector,'phone'=>$phone,'email'=>$email,'box'=>$box]);
                            
                            $output['type'] = 'success';
                        
                        }
                    /* edit supplier */
                    }else if(isset($_POST['edit'])){
                        $id = htmlentities($_POST['id']);

                        if($rowPhone['numrows'] > 1){
                            $output['type'] = 'error';
                            $output['message'] = 'Supplier with specified phone number already exist';
                        }
                        else if($rowEmail['numrows'] > 1){
                            $output['type'] = 'error';
                            $output['message'] = 'Supplier with specified email already exist';
                        }else{
                            $stmtSupplier = $conn->prepare("SELECT *,`e`.`ID` AS `SupplierID` FROM `suppliers` `e`  
                            WHERE `e`.`ID`=:id");
                            $stmtSupplier->execute(['id'=>$id]);
                            $rowSupplier = $stmtSupplier->fetch();

                            if(empty($rowSupplier['AddressID'])){
                                /*  */
                                $stmt = $conn->prepare("INSERT INTO `addresses`(`CountryID`, `RegionID`, `CityID`, `Street`, `House`, `Landmark`) 
                                VALUES (:country,:region,:city,:street,:house,:landmark)");
                                $stmt->execute(['country'=>$country,'region'=>$region,'city'=>$city,'street'=>$street,'house'=>$house,'landmark'=>$landmark]);
                                $address = $conn->lastInsertId();

                                /* update suppliers table */
                                $stmt = $conn->prepare("UPDATE `users` SET `Photo`=:photo, `FirstName`=:fname, `OtherName`=:oname, `LastName`=:lname, `Phone`=:phone, `Email`=:email, `BirthDate`=:birthdate, `GenderID`=:gender , `AddressID`=:address, `LastModified`=:now
                                WHERE `ID`=:id");
                                $stmt->execute(['photo'=>$photo,'fname'=>$fname,'oname'=>$oname,'lname'=>$lname,'phone'=>$phone,'email'=>$email,'birthdate'=>$birthdate,'gender'=>$gender, 'address'=>$address,'id'=>$rowSupplier['SupplierUserID'],'now'=>$now]);
                                
                            }else{
                                /* update address table */
                                $stmt = $conn->prepare("UPDATE `addresses` SET `CountryID`=:country, `RegionID`=:region, `CityID`=:city, `Street`=:street, `House`=:house, `Landmark`=:landmark 
                                WHERE `ID`=:id");
                                $stmt->execute(['country'=>$country,'region'=>$region,'city'=>$city,'street'=>$street,'house'=>$house,'landmark'=>$landmark,'id'=>$rowSupplier['AddressID']]);
                               
                                /* update suppliers table */
                                $stmt = $conn->prepare("UPDATE `users` SET `Photo`=:photo, `FirstName`=:fname, `OtherName`=:oname, `LastName`=:lname, `Phone`=:phone, `Email`=:email, `BirthDate`=:birthdate, `GenderID`=:gender ,`LastModified`=:now
                                WHERE `ID`=:id");
                                $stmt->execute(['photo'=>$photo,'fname'=>$fname,'oname'=>$oname,'lname'=>$lname,'phone'=>$phone,'email'=>$email,'birthdate'=>$birthdate,'gender'=>$gender,'id'=>$rowSupplier['SupplierUserID'],'now'=>$now]);
                            
                            }
                            
                            $output['type'] = 'success';
                            $output['message'] = 'Supplier Edited successfully';
                        }
                        
                    }
                } catch (PDOException $th) {
                    $output['type'] = 'warning';
                    $output['message'] = $th->getMessage();
                }
            }

        }

        /* delete supplier */
        else if (isset($_POST['delete'])){
            $id = $_POST['id'];

            try {
                $stmt = $conn->prepare("DELETE FROM `suppliers` WHERE `ID` = :id");
                $stmt->execute(['id'=> $id]);
                $output['type'] = 'info';
                $output['message'] = $id;

            } catch (PDOException $th) {
                $output['type'] = 'warning';
                $output['message'] = $th->getMessage();
            }
        }

        /* Update supplier status */
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