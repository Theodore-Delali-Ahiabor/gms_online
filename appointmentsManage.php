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
            $pickup = htmlentities($_POST['pickup']);
            $null = null;
            $now = date("Y-m-d h:i:s");

                
            /* Check if empty */
            if(empty($auto) || empty($in) || empty($out) || empty($type) || $type==0 || $status==0 || empty($status) || empty($technician)){
                $output['type'] = 'error';
                $output['message'] = 'Please fill all required (*) fields';
            }else if(!is_numeric($mileage)){
                $output['type'] = 'error';
                $output['message'] = 'Please enter a valid mileage';
            }else if($type == 1 && empty($pickup)){
                $output['type'] = 'error';
                $output['message'] = 'Please enter a Pick Up address';
            }
            else{
                /* add new request */
                if(isset($_POST['add'])){  
                    try {
                        $stmt = $conn->prepare("INSERT INTO `requests`(`AutomobileID`, `EmployeeID`, `DateIn`, `DateDueOut`, `Mileage`, `Complians`, `TypeID`, `PickUpAddress`, `StatusID`) 
                        VALUES (:auto,:technician,:in,:out,:mileage,:complians,:type,:pickup,:status)");
                        $stmt->execute(['auto'=>$auto ,'in'=>$in ,'out'=>$out ,'mileage'=>$mileage ,'type'=>$type,'pickup'=>$pickup,'status'=>$status ,'technician'=>$technician, 'complians'=>$complians]);
                        $output['type'] = 'success';
                    
                    } catch (PDOException $th) {
                        $output['type'] = 'warning';
                        $output['message'] = $th->getMessage();
                    }
                }
                /* edit request */
                else if(isset($_POST['edit'])){
                    $id = htmlentities($_POST['id']);

                    try {
                        $stmt = $conn->prepare("UPDATE `requests` 
                        SET `AutomobileID`=:auto,`EmployeeID`=:technician,`DateIn`=:in,`DateDueOut`=:out,`Mileage`=:mileage,`Complians`=:complians,`TypeID`=:type,`PickUpAddress`=:pickup,`StatusID`=:status,`LastModified`=:now 
                        WHERE `ID`= :id");
                        $stmt->execute(['auto'=>$auto ,'in'=>$in ,'out'=>$out ,'mileage'=>$mileage ,'type'=>$type,'pickup'=>$pickup,'status'=>$status ,'technician'=>$technician, 'complians'=>$complians, 'now'=>$now, 'id'=>$id]);
                        $output['type'] = 'success';
                    } catch (PDOException $th) {
                        $output['type'] = 'warning';
                        $output['message'] = $th->getMessage();
                    }
                }
            }
        }
        
        /* delete request */
        else if (isset($_POST['delete'])){
            $id = htmlentities($_POST['id']);

            try {
                $stmt = $conn->prepare("DELETE FROM `requests` WHERE `ID` = :id");
                $stmt->execute(['id'=> $id]);
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