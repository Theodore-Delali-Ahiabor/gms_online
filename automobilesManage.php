<?php 
    include 'includes/session.php';

    $output['type'] = '';
    $output['message'] = '';
    try {
        $conn = $pdo->open();

        if(isset($_POST['add']) || isset($_POST['edit'])){
            $photo = $_FILES['photo']['name'];
            $category = htmlentities($_POST['category']);
            $make = htmlentities($_POST['make']);
            $model = htmlentities($_POST['model']);
            $color = htmlentities($_POST['color']);
            $fuel = htmlentities($_POST['fuel']);
            $year = htmlentities($_POST['year']);
            $vin = htmlentities($_POST['vin']);
            $registration = htmlentities($_POST['registration']);
            $null = null;
            $uploadDir = "../images/autos/";

            /* add new automobile */
            if(isset($_POST['add'])){      
                /* Check if empty */
                if(empty($category) || empty($make) || empty($color) || empty($fuel) || empty($year) || empty($vin)){
                    $output['type'] = 'error';
                    $output['message'] = 'Please fill all required (*) fields';
                }
                else{
                    /* Check if automobile exist */
                    $stmt = $conn->prepare("SELECT count(*) AS `numrows` FROM `automobiles` WHERE `VIN` = :vin ");
                    $stmt->execute(['vin'=>$vin]);
                    $row = $stmt->fetch();

                    if($row['numrows'] > 0){
                        $output['type'] = 'error';
                        $output['message'] = 'Automobile already exist';
                    }
                    else{
                        try {
                            /* upload photo */
                            if(!empty($photo)){
                                $ext = pathinfo($photo, PATHINFO_EXTENSION);
                                $new_filename = $vin.'-'.slugify(date("Y-m-d h:i:s")).'.'.$ext;
                                move_uploaded_file($_FILES['photo']['tmp_name'], $uploadDir.$new_filename);
                                $output['type'] = 'error';
                                $output['message'] =$new_filename;	
                                $photo = $new_filename;
                            }else{
                                $photo = $null;
                            }

                            $stmt = $conn->prepare("INSERT INTO `automobiles`(`Photo`,`CustomerID`, `CategoryID`, `Year`, `MakeID`, `Model`, `Color`, `FuelID`, `VIN`, `RegNumber`) 
                            VALUES (:photo, :customer, :category, :year, :make, :model, :color, :fuel, :vin, :registration)");
                            $stmt->execute(['photo'=>$photo,'customer'=>$rowSession['CustomerID'] ,'category'=>$category ,'year'=>$year ,'make'=>$make ,'model'=>$model ,'color'=>$color ,'fuel'=>$fuel, 'vin'=>$vin, 'registration'=>$registration]);
                            $output['type'] = 'success';
                            $output['message'] = 'Automobile added successfully';
                        
                        } catch (PDOException $th) {
                            $output['type'] = 'warning';
                            $output['message'] = $th->getMessage();
                        }
                    }
                }

            }

            /* edit automobile */
            else if(isset($_POST['edit'])){
                $id = htmlentities($_POST['id']);
                $stmtCustomer = $conn->prepare("SELECT * FROM `automobiles` 
                WHERE `ID`=:id");
                $stmtCustomer->execute(['id'=>$id]);
                $rowCustomer = $stmtCustomer->fetch();

                /* upload photo */
                if(!empty($photo)){
                    $ext = pathinfo($photo, PATHINFO_EXTENSION);
                    $new_filename = $vin.'-'.slugify(date("Y-m-d h:i:s")).'.'.$ext;
                    move_uploaded_file($_FILES['photo']['tmp_name'], $uploadDir.$new_filename);
                    $output['type'] = 'error';
                    $output['message'] =$new_filename;	
                    $photo = $new_filename;
                }else{
                    $photo = $rowCustomer['Photo'];
                }
                try {
                    $stmt = $conn->prepare("UPDATE `automobiles` 
                    SET `Photo`=:photo,`CategoryID`=:category,`Year`=:year,`MakeID`=:make,`Model`=:model,`Color`=:color,`FuelID`=:fuel,`VIN`=:vin,`RegNumber`=:registration 
                    WHERE `ID`= :id");
                    $stmt->execute(['photo'=>$photo ,'category'=>$category ,'year'=>$year ,'make'=>$make ,'model'=>$model ,'color'=>$color ,'fuel'=>$fuel, 'vin'=>$vin, 'registration'=>$registration, 'id'=>$id]);
                    $output['type'] = 'success';
                } catch (PDOException $th) {
                    $output['type'] = 'warning';
                    $output['message'] = $th->getMessage();
                }
        }
        }
        

        /* delete automobile */
        else if (isset($_POST['delete'])){
            $id = htmlentities($_POST['id']);

            try {
                $stmt = $conn->prepare("DELETE FROM `automobiles` WHERE `id` = :id");
                $stmt->execute(['id'=> $id]);
                $output['type'] = 'success';

            } catch (PDOException $th) {
                $output['type'] = 'warning';
                $output['message'] = $th->getMessage();
            }
        }

        /* add customer */
        else if(isset($_POST['autoId']) && isset($_POST['customerId'])){
            try {
                $customerId = htmlentities($_POST['customerId']);
                $autoId = htmlentities($_POST['autoId']);

                $stmt = $conn->prepare("UPDATE `automobiles` SET `CustomerID` = :customerId WHERE `ID` = :autoId");
                $stmt->execute(['customerId'=>$customerId, 'autoId'=> $autoId]);
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