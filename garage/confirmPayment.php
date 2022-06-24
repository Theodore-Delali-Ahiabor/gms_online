<?php

    include 'includes/session.php';

    $output['type'] = '';
    $output['message'] = '';
    if(isset($_SESSION['employee']) || isset($_SESSION['employee'])){
        $output['type'] = 'info';
        $output['message'] = '';

        $payid = $_GET['reference'];
        $invoiceid = $_GET['id'];
        $total = $_GET['total'];

        $conn = $pdo->open();

        try{
            // insert in to sales table
            $stmt = $conn->prepare("INSERT INTO `sales`(`InvoiceID`, `PaymentID`, `Total`) 
            VALUES (:invoiceid,:payid,:total)");
            $stmt->execute(['invoiceid'=>$invoiceid, 'payid'=>$payid, 'total'=>$total]);

           
            $stmt = $conn->prepare(" UPDATE `invoice` SET `PaymentStatus`= 1  WHERE `ID` = :invoiceid");
            $stmt->execute(['invoiceid'=>$invoiceid]);

            $output['type'] = 'success';

        }
        catch(PDOException $e){
            $output['type'] = 'error';
            $output['message'] = $e->getMessage();
        }

        $pdo->close();
        
    } 
    else{
        $output['type'] = 'info';
        $output['message'] ='Login required.';
  } 
  echo json_encode($output)
?>
