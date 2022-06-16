<?php
	include 'includes/session.php';

    $output['type'] = '';
    $output['message'] = '';
    try {
        $conn = $pdo->open();
        $id = $_POST['id'];
        $stmt = $conn->prepare("SELECT *,`i`.`ID` AS `InventoryID` FROM `inventory` `i` 
        JOIN `locations` `l` ON `i`.`LocationID` = `l`.`ID`
        JOIN `makes` `m` ON `i`.`MakeID` = `m`.`ID`
        WHERE `i`.`ID` = :id");
        $stmt->execute(['id'=>$id]);
        
        foreach($stmt as $row){
            /* if(!empty($row['InventoryID'])){
                $stmtC = $conn->prepare("SELECT * FROM `inventorys` `c`
                JOIN `users` `u` ON `c`.`InventoryUserID` = `u`.`ID`
                WHERE `c`.`ID`=:id");
                $stmtC->execute(['id'=>$row['InventoryID']]);
                $rowC = $stmtC->fetch();
                $supplier = $rowC['FirstName'].' '.$rowC['OtherName'].' '.$rowC['LastName'].'<br>'.$rowC['Phone'].'<br>'.$rowC['Email'];
            }else{
                $supplier = '';
            } */
            
            $output['id'] = $row['InventoryID'];
            $output['photo'] = !empty($row['Photo'])?$row['Photo']:'no-image.jpg';
            $output['name'] = $row['Name'];
            $output['alternative'] = $row['Alternative'];
            $output['serial'] = $row['SerialNo'];
            $output['locationId'] = $row['LocationID'];
            $output['location'] = $row['Location'];
            $output['shelve'] = $row['Shelve'];
            $output['model'] = $row['Model'];
            $output['stock'] = $row['Stock'];
            $output['cost'] = $row['UnitCost'];
            $output['makeId'] = $row['MakeID'];
            $output['make'] = $row['Make'];
            //$output['supplier'] = $supplier;
            
            $output['type'] = 'success';
        }

        $pdo->close();
    } catch (PDOException $th) {
        $output['type'] = 'warning';
        $output['message'] = $th->getMessage();
    }
	echo json_encode($output)
?>