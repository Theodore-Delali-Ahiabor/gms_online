<?php 
    include 'includes/session.php';

    $output['type'] = '';
    $output['message'] = '';
    try {
        $conn = $pdo->open();

        if(isset($_POST['add']) || isset($_POST['edit'])){
            $photo = $_FILES['photo']['name'];
            $name = htmlentities($_POST['name']);
            $alternative = htmlentities($_POST['alternative']);
            $serial = htmlentities($_POST['serial']);
            $location = htmlentities($_POST['location']);
            $shelve = htmlentities($_POST['shelve']);
            $make = htmlentities($_POST['make']);
            $model = htmlentities($_POST['model']);
            $stock = htmlentities($_POST['stock']);
            $cost = htmlentities($_POST['cost']);
            $null = null;
            $now = date("Y-m-d h:i:s");
            $uploadDir = "../images/inventory/";

            /* add new inventory */
            if(isset($_POST['add'])){      
                /* Check if empty */
                if(empty($name) || empty($serial) || empty($location) || empty($shelve) || empty($make) || empty($cost) || empty($stock)){
                    $output['type'] = 'error';
                    $output['message'] = 'Please fill all required (*) fields';
                }else if(!is_numeric($cost)){
                    $output['type'] = 'error';
                    $output['message'] = 'Please enter a valid unit cost';
                }
                else{
                    /* Check if inventory exist */
                    $stmt = $conn->prepare("SELECT count(*) AS `numrows` FROM `inventory` WHERE `SerialNo` = :serial ");
                    $stmt->execute(['serial'=>$serial]);
                    $row = $stmt->fetch();

                    if($row['numrows'] > 0){
                        $output['type'] = 'error';
                        $output['message'] = 'Item already exist';
                    }
                    else{
                        try {
                            /* upload photo */
                            if(!empty($photo)){
                                $ext = pathinfo($photo, PATHINFO_EXTENSION);
                                $new_filename = $serial.'-'.slugify(date("Y-m-d h:i:s")).'.'.$ext;
                                move_uploaded_file($_FILES['photo']['tmp_name'], $uploadDir.$new_filename);
                                $output['type'] = 'error';
                                $output['message'] =$new_filename;	
                                $photo = $new_filename;
                            }else{
                                $photo = $null;
                            }

                            $stmt = $conn->prepare("INSERT INTO `inventory`(`Photo`, `Name`, `Alternative`, `SerialNo`, `LocationID`, `Shelve`, `MakeID`, `Model`, `Stock`, `UnitCost`) 
                            VALUES (:photo,:name,:alternative,:serial,:location,:shelve,:make,:model,:stock,:cost)");
                            $stmt->execute(['photo'=>$photo ,'name'=>$name ,'alternative'=>$alternative ,'serial'=>$serial ,'location'=>$location ,'shelve'=>$shelve ,'make'=>$make, 'model'=>$model, 'stock'=>$stock, 'cost'=>$cost]);
                            $output['type'] = 'success';
                        
                        } catch (PDOException $th) {
                            $output['type'] = 'warning';
                            $output['message'] = $th->getMessage();
                        }
                    }
                }

            }

            /* edit inventory */
            else if(isset($_POST['edit'])){
                $id = htmlentities($_POST['id']);
                $stmtInventory = $conn->prepare("SELECT * FROM `inventory` 
                WHERE `ID`=:id");
                $stmtInventory->execute(['id'=>$id]);
                $rowInventory = $stmtInventory->fetch();

                /* upload photo */
                if(!empty($photo)){
                    $ext = pathinfo($photo, PATHINFO_EXTENSION);
                    $new_filename = $vin.'-'.slugify(date("Y-m-d h:i:s")).'.'.$ext;
                    move_uploaded_file($_FILES['photo']['tmp_name'], $uploadDir.$new_filename);
                    $output['type'] = 'error';
                    $output['message'] =$new_filename;	
                    $photo = $new_filename;
                }else{
                    $photo = $rowInventory['Photo'];
                }
                try {
                    $stmt = $conn->prepare("UPDATE `inventory` 
                    SET `Photo`=:photo,`Name`=:name,`Alternative`=:alternative,`SerialNo`=:serial,`LocationID`=:location,`Shelve`=:shelve,`MakeID`=:make,`Model`=:model,`Stock`=:stock,`UnitCost`=:cost,`LastModified`=:now 
                    WHERE `ID`= :id");
                    $stmt->execute(['photo'=>$photo ,'name'=>$name ,'alternative'=>$alternative ,'serial'=>$serial ,'location'=>$location ,'shelve'=>$shelve ,'make'=>$make, 'model'=>$model, 'stock'=>$stock, 'cost'=>$cost, 'now'=>$now, 'id'=>$id]);
                    $output['type'] = 'success';
                } catch (PDOException $th) {
                    $output['type'] = 'warning';
                    $output['message'] = $th->getMessage();
                }
            }
        }
        
        /* delete inventory */
        else if (isset($_POST['delete'])){
            $id = htmlentities($_POST['id']);

            try {
                $stmt = $conn->prepare("DELETE FROM `inventory` WHERE `id` = :id");
                $stmt->execute(['id'=> $id]);
                $output['type'] = 'success';

            } catch (PDOException $th) {
                $output['type'] = 'warning';
                $output['message'] = $th->getMessage();
            }
        }

        /* add Supplier */
        else if(isset($_POST['autoId']) && isset($_POST['customerId'])){
            try {
                $customerId = htmlentities($_POST['customerId']);
                $autoId = htmlentities($_POST['autoId']);

                $stmt = $conn->prepare("UPDATE `inventorys` SET `Customer` = :customerId WHERE `ID` = :autoId");
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