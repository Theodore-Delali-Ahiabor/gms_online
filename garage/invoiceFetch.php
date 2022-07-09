<?php
	include 'includes/session.php';

    $output['type'] = '';
    $output['message'] = '';
    try {
        $conn = $pdo->open();
        $id = $_POST['id'];
        $stmt = $conn->prepare("SELECT *,`i`.`ID` AS `InvoiceID` FROM `invoice` `i`
        JOIN `requests` `r` ON `r`.`ID` = `i`.`JobID` 
        JOIN `types` `t` ON `t`.`ID` = `r`.`TypeID`
        JOIN `status` `s` ON `s`.`ID` = `r`.`StatusID`
        JOIN `jobs` `j` ON `j`.`RequestID` = `r`.`ID`
        JOIN `automobiles` `a` ON `r`.`AutomobileID` = `a`.`ID`
        JOIN `customers` `c` ON `a`.`CustomerID` = `c`.`ID`
        JOIN `users` `u` ON `c`.`CustomerUserID` = `u`.`ID`
        WHERE `i`.`ID` = :id");
        $stmt->execute(['id'=>$id]);
        $row = $stmt->fetch();
        
        $serviceArray = explode(",", $row['ServiceIDs']);
        $partQtyArray = explode(",", $row['PartQtys']);
        $partArray = explode(",", $row['PartIDs']);
        $serviceCost = 0.0;
        $partCost = 0.0;
        
        $output['services'] = '';
        $serviceNo = 0;
        if(!empty($serviceArray)){
            foreach($serviceArray as $service){
                $serviceNo++;
                $stmtSe = $conn->prepare("SELECT * FROM `services`
                WHERE `ID`=:id");
                $stmtSe->execute(['id'=>$service]);
                $rowSe = $stmtSe->fetch();
                $serviceCost += !empty($rowSe['Cost'])?$rowSe['Cost']:0.0;

                $output['services'] .= '
                    <tr>
                        <td class="center">'. $serviceNo.'</td>
                        <td>'.$rowSe['Name'].'</td>
                        <td class="center">'.$rowSe['Cost'].'</td>
                    </tr>
                ';
            }
            $output['services'] .= '
                <tr>
                    <td colspan="2"> <span class="right bold">SubTotal</span></td>
                    <td class="center bold">'.$serviceCost.'</td>
                </tr>
            ';
        }

        $output['parts'] = '';
        $partNo = 0;
        if(!empty($partArray)){
            foreach($partArray as $part){
                $partNo++;
                $stmtP = $conn->prepare("SELECT * FROM `inventory`
                WHERE `ID`=:id");
                $stmtP->execute(['id'=>$part]);
                $rowP = $stmtP->fetch();
                $unitQty = 0;
                foreach($partQtyArray as $qty){
                    $subcost = !empty($rowP['UnitCost'])?$rowP['UnitCost']*$qty:0.00;
                    $unitQty = $qty;
                }

                $output['parts'] .= '
                    <tr>
                        <td class="center">'. $partNo.'</td>
                        <td>'.$rowP['Name'].'</td>
                        <td class="center">'.$unitQty.'</td>
                        <td class="center">'.$rowP['UnitCost'].'</td>
                        <td class="center">'.$subcost.'</td>
                    </tr>
                ';
                $partCost += $subcost;
            }
            $output['parts'] .= '
                <tr>
                    <td colspan="4"> <span class="right bold">SubTotal</span></td>
                    <td class="center bold">'.$partCost.'</td>
                </tr>
            ';
        }

         /* technician details */
        $technician = '';
        if(!empty($row['EmployeeID'])){
            $stmtEmployee = $conn->prepare("SELECT *,`e`.`ID` AS `EmployeeID`, `u`.`ID` AS `UserID` FROM `employees` `e` 
            JOIN `users` `u` ON `u`.`ID` = `e`.`EmployeeUserID`  
            WHERE `e`.`ID`= :id");
            $stmtEmployee->execute(['id'=>$row['EmployeeID']]);
            $rowEmployee = $stmtEmployee->fetch();
            $technician = $rowEmployee["FirstName"].' '.$rowEmployee["OtherName"].' '.$rowEmployee["LastName"].' ('.$rowEmployee["Position"].')';    
            $output['technician'] = $technician;
        }
        /* automobile details */
        if(!empty($row['AutomobileID'])){
            $stmtAuto = $conn->prepare("SELECT *,`a`.`ID` AS `AutoID` FROM `automobiles` `a`
            JOIN `makes` `m` ON `a`.`MakeID` = `m`.`ID`
            JOIN `fuels` `f` ON `a`.`FuelID` = `f`.`ID`
            JOIN `categories` `c` ON `a`.`CategoryID` = `c`.`ID`
            WHERE `a`.`ID` = :id");
            $stmtAuto->execute(['id'=>$row['AutomobileID']]);
            $rowAuto = $stmtAuto->fetch();
            $output['autoColor'] = $rowAuto['Color'];
            $output['autoYear'] = $rowAuto['Year'];
            $output['autoMake'] = $rowAuto['Make'];
            $output['autoModel'] = $rowAuto['Model'];
            $output['autoCategory'] = $rowAuto['Category'];
            $output['autoVin'] = $rowAuto['VIN'];
            $output['autoRegNo'] = $rowAuto['RegNumber'];
        }

        if(!empty($rowAuto['CustomerID'])){
            $stmtC = $conn->prepare("SELECT * FROM `customers` `c`
            JOIN `users` `u` ON `c`.`CustomerUserID` = `u`.`ID`
            WHERE `c`.`ID`=:id");
            $stmtC->execute(['id'=>$rowAuto['CustomerID']]);
            $rowC = $stmtC->fetch();
            $customer = $rowC['FirstName'].' '.$rowC['OtherName'].' '.$rowC['LastName'];
            $output['cusName'] = $customer;
            $output['cusPhone'] = $rowC['Phone'];
            $output['cusEmail'] = $rowC['Email'];
    }

        $total = $partCost + $serviceCost;
        /* customer details */
        $output['name'] = $row['FirstName'].' '.$row['OtherName'].' '.$row['LastName'];
        $output['phone'] = $row['Phone'];
        $output['email'] = $row['Email'];
        
        /* invoice details */
        $output['id'] = $row['InvoiceID'];
        $output['serviceCost'] = $serviceCost;
        $output['partCost'] = $partCost;
        $output['total'] = $total;
        $output['autoMileage'] = $row['Mileage'];

        $output['type'] = 'success';

        $pdo->close();
    } catch (PDOException $th) {
        $output['type'] = 'warning';
        $output['message'] = $th->getMessage();
    }
	echo json_encode($output)
?>