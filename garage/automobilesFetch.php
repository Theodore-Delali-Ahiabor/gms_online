<?php
	include 'includes/session.php';

    $output['type'] = '';
    $output['message'] = '';
    try {
        $conn = $pdo->open();
        $id = $_POST['id'];
        $stmt = $conn->prepare("SELECT *,`a`.`ID` AS `CustomerID` FROM `automobiles` `a`
        JOIN `makes` `m` ON `a`.`MakeID` = `m`.`ID`
        JOIN `categories` `c` ON `a`.`CategoryID` = `c`.`ID`
        JOIN `fuels` `f` ON `a`.`FuelID` = `f`.`ID` 
        WHERE `a`.`ID` = :id");
        $stmt->execute(['id'=>$id]);
        
        foreach($stmt as $row){
            if(!empty($row['CustomerID']) || $row['CustomerID'] != null){
                $stmtC = $conn->prepare("SELECT * FROM `customers` `c`
                JOIN `users` `u` ON `c`.`CustomerUserID` = `u`.`ID`
                WHERE `c`.`ID`=:id");
                $stmtC->execute(['id'=>$row['CustomerID']]);
                $rowC = $stmtC->fetch();
                $customer = $rowC['FirstName'].' '.$rowC['OtherName'].' '.$rowC['LastName'].'<br>'.$rowC['Phone'].'<br>'.$rowC['Email'];
            }else{
                $customer = '';
            }
            
            $output['id'] = $row['CustomerID'];
            $output['photo'] = !empty($row['Photo'])?$row['Photo']:'no-image.jpg';
            $output['categoryId'] = $row['CategoryID'];
            $output['category'] = $row['Category'];
            $output['year'] = $row['Year'];
            $output['model'] = $row['Model'];
            $output['color'] = $row['Color'];
            $output['fuelId'] = $row['FuelID'];
            $output['fuel'] = $row['Fuel'];
            $output['vin'] = $row['VIN'];
            $output['registration'] = $row['RegNumber'];
            $output['makeId'] = $row['MakeID'];
            $output['make'] = $row['Make'];
            $output['customer'] = $customer;
            
            $output['type'] = 'success';  

        }

        $pdo->close();
    } catch (PDOException $th) {
        $output['type'] = 'warning';
        $output['message'] = $th->getMessage();
    }
	echo json_encode($output)
?>