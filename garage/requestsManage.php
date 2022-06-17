<?php 
    include 'includes/session.php';

    $output['type'] = '';
    $output['message'] = '';
    try {
        $conn = $pdo->open();

        if(isset($_POST['add']) || isset($_POST['edit'])){
            $auto = htmlentities($_POST['auto']);
            $in = htmlentities($_POST['in']);
            $out = htmlentities($_POST['out']);
            $mileage = htmlentities($_POST['mileage']);
            $type = htmlentities($_POST['type']);
            $status = htmlentities($_POST['status']);
            $technician = htmlentities($_POST['technician']);
            $complians = htmlentities($_POST['complians']);
            $null = null;
            $now = date("Y-m-d h:i:s");

            /* add new request */
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
                    try {
                        $stmt = $conn->prepare("INSERT INTO `requests`(`AutomobileID`, `EmployeeID`, `DateIn`, `DateDueOut`, `Mileage`, `Compliant`, `Status`) 
                        VALUES ('[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]'");
                        $stmt->execute(['auto'=>$auto ,'in'=>$in ,'out'=>$out ,'mileage'=>$mileage ,'type'=>$type ,'status'=>$status ,'technician'=>$technician, 'complians'=>$complians]);
                        $output['type'] = 'success';
                    
                    } catch (PDOException $th) {
                        $output['type'] = 'warning';
                        $output['message'] = $th->getMessage();
                    }
                }

            }

            /* edit request */
            else if(isset($_POST['edit'])){
                $id = htmlentities($_POST['id']);
                $stmtRequest = $conn->prepare("SELECT * FROM `request` 
                WHERE `ID`=:id");
                $stmtRequest->execute(['id'=>$id]);
                $rowRequest = $stmtRequest->fetch();

                
                try {
                    $stmt = $conn->prepare("UPDATE `request` 
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
        
        /* delete request */
        else if (isset($_POST['delete'])){
            $id = htmlentities($_POST['id']);

            try {
                $stmt = $conn->prepare("DELETE FROM `request` WHERE `id` = :id");
                $stmt->execute(['id'=> $id]);
                $output['type'] = 'success';

            } catch (PDOException $th) {
                $output['type'] = 'warning';
                $output['message'] = $th->getMessage();
            }
        }

        /* add Supplier */
        else if(isset($_POST['supplierId']) && isset($_POST['itemId'])){
            try {
                $supplierId = htmlentities($_POST['supplierId']);
                $itemId = htmlentities($_POST['itemId']);

                $stmt = $conn->prepare("UPDATE `request` SET `SupplierID` = :supplierId WHERE `ID` = :itemId");
                $stmt->execute(['supplierId'=>$supplierId, 'itemId'=> $itemId]);
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