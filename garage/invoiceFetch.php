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
        $serviceCost = 0;
        $partCost = 0;
        if(!empty($serviceArray)){
            foreach($serviceArray as $service){
                $stmtSe = $conn->prepare("SELECT * FROM `services`
                WHERE `ID`=:id");
                $stmtSe->execute(['id'=>$service]);
                $rowSe = $stmtSe->fetch();
                $serviceCost += !empty($rowSe['Cost'])?$rowSe['Cost']:0.00;
            }
        }
        if(!empty($partArray)){
            foreach($partArray as $part){
                $stmtP = $conn->prepare("SELECT * FROM `inventory`
                WHERE `ID`=:id");
                $stmtP->execute(['id'=>$part]);
                $rowP = $stmtP->fetch();
                foreach($partQtyArray as $qty){
                    $subcost = !empty($rowP['UnitCost'])?$rowP['UnitCost']*$qty:0.00;
                }
                $partCost += $subcost;
            }
        }

        $total = $partCost + $serviceCost;

        $output['name'] = $row['FirstName'].' '.$row['OtherName'].' '.$row['LastName'];
        $output['phone'] = $row['Phone'];
        $output['email'] = $row['Email'];
        $output['total'] = $total;
        $output['type'] = 'success';

        $pdo->close();
    } catch (PDOException $th) {
        $output['type'] = 'warning';
        $output['message'] = $th->getMessage();
    }
	echo json_encode($output)
?>