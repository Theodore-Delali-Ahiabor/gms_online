<?php 
    include 'includes/session.php';

    $output['type'] = '';
    $output['message'] = '';
    try {
        $conn = $pdo->open();

        if(isset($_POST['add']) || isset($_POST['edit'])){
            $photo = $_FILES['photo']['name'];
            $sbname = htmlentities($_POST['sbname']);    
            $fbname = htmlentities($_POST['fbname']);       
            $pobox = htmlentities($_POST['pobox']); 
            $phone = htmlentities($_POST['phone']); 
            $about = $_POST['about']; 
            $email = htmlentities($_POST['email']); 
            $country = htmlentities($_POST['country']); 
            $region = htmlentities($_POST['region']);
            $city = htmlentities($_POST['city']);
            $street = htmlentities($_POST['street']);
            $house = htmlentities($_POST['house']);
            $landmark = htmlentities($_POST['landmark']);
            $uploadDir = "../images/system/";
            $null = null;
            $now = date("Y-m-d h:i:s");

            /* Check if empty */
            if(empty($sbname) || empty($fbname) || empty($phone) || empty($email) || (empty($country) || $country == 0) || (empty($region) || $region == 0) || (empty($city) || $city == 0)){
                $output['type'] = 'error';
                $output['message'] = 'Some required (*) Fields are emtpy';
            }
            else if(!is_numeric($phone)){
                $output['type'] = 'error';
                $output['message'] = 'Please enter numbers ONLY for the phone field';
            }
            else{
                try {
                    /* fetch garage details */
                    $stmtFetch = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM `garage` `g`");
                    $stmtFetch->execute();
                    $rowFetch = $stmtFetch->fetch();
                    if(empty($photo) && empty($rowFetch['Logo'])){
                        $output['type'] = 'error';
                        $output['message'] = 'Please choose a logo Image';
                    }

                    /* add new supplier */
                    else if(isset($_POST['add'])){
                        
                        if($rowFetch['numrows'] > 0){
                            $output['type'] = 'error';
                            $output['message'] = 'Garage details already exist, You can only Edit.';
                        }
                        else{
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
                            /* insert garage table */
                            $stmt = $conn->prepare("INSERT INTO `garage`(`Logo`, `AddressID`, `AboutUs`, `ShortName`, `LongName`, `Phone`, `Email`, `Box`) 
                            VALUES (:photo,:address,:about,:sbname,:fbname,:phone,:email,:pobox)");
                            $stmt->execute(['photo'=>$photo,'address'=>$address,'about'=>$about,'sbname'=>$sbname,'fbname'=>$fbname, 'phone'=>$phone,'email'=>$email,'pobox'=>$pobox]);
                            
                            $output['type'] = 'success';
                        
                        }
                    /* edit supplier */
                    }else if(isset($_POST['edit'])){
                        
                        /* upload photo */
                        if(!empty($photo)){
                            $ext = pathinfo($photo, PATHINFO_EXTENSION);
                            $new_filename = $phone.'-'.slugify(date("Y-m-d h:i:s")).'.'.$ext;
                            move_uploaded_file($_FILES['photo']['tmp_name'], $uploadDir.$new_filename);
                            $output['type'] = 'error';
                            $output['message'] =$new_filename;	
                            $photo = $new_filename;
                        }else{
                            $photo = $rowFetch['Logo'];
                        }

                        /* update address table */
                        $stmt = $conn->prepare("UPDATE `addresses` SET `CountryID`=:country, `RegionID`=:region, `CityID`=:city, `Street`=:street, `House`=:house, `Landmark`=:landmark 
                        WHERE `ID`=:id");
                        $stmt->execute(['country'=>$country,'region'=>$region,'city'=>$city,'street'=>$street,'house'=>$house,'landmark'=>$landmark,'id'=>$rowFetch['AddressID']]);
                        
                        /* update garage table */
                        $stmt = $conn->prepare("UPDATE `garage` SET `Logo`=:photo,`AboutUs`=:about,`ShortName`=:sbname,`LongName`=:fbname,`Phone`=:phone,`Email`=:email,`Box`=:pobox,`LastModified`=:now 
                        WHERE `ID` =:id");
                        $stmt->execute(['photo'=>$photo,'about'=>$about,'sbname'=>$sbname,'fbname'=>$fbname, 'phone'=>$phone,'email'=>$email,'pobox'=>$pobox,'now'=>$now, 'id'=>$rowFetch['ID']]);
                                                    
                        $output['type'] = 'success';
                        
                    }
                } catch (PDOException $th) {
                    $output['type'] = 'warning';
                    $output['message'] = $th->getMessage();
                }
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