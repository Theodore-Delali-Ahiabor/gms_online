<?php 
    include 'includes/session.php';

    $output['type'] = '';
    $output['message'] = '';
    try {
        $conn = $pdo->open();

        if(isset($_POST['start']) || isset($_POST['done'])){
            $requestId = htmlentities($_POST['id']);
           
            /* add new job */
            if(isset($_POST['start'])){  
                try {
                    $stmt = $conn->prepare("UPDATE `requests` SET `StatusID`='2' WHERE `ID` = :requestId");
                    $stmt->execute(['requestId'=>$requestId]);
                    $stmt = $conn->prepare("INSERT INTO `jobs`( `RequestID`) VALUES (:requestId)");
                    $stmt->execute(['requestId'=>$requestId]);
                    $output['type'] = 'success';
                
                } catch (PDOException $th) {
                    $output['type'] = 'warning';
                    $output['message'] = $th->getMessage();
                }
            }
            /* edit job */
            else if(isset($_POST['done'])){
                $jobId = htmlentities($_POST['id']);

                try {
                    $stmt = $conn->prepare("UPDATE `requests` SET `StatusID`='3' WHERE `ID` = :requestId");
                    $stmt->execute(['requestId'=>$requestId]);
                    $stmt = $conn->prepare("INSERT INTO `invoice`( `JobID`) VALUES (:jobId)");
                    $stmt->execute(['jobId'=>$jobId]);
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
                $stmt = $conn->prepare("DELETE FROM `requests` WHERE `ID` = :id");
                $stmt->execute(['id'=> $id]);
                $output['type'] = 'success';

            } catch (PDOException $th) {
                $output['type'] = 'warning';
                $output['message'] = $th->getMessage();
            }
        }
        /* Services */
        else if(isset($_POST['services'])){
            $output['data'] = $_POST['data'];
            $data = implode(",",$_POST['data']);
            $id = $_POST['id'];
            try {
                $stmt = $conn->prepare("UPDATE `jobs` 
                SET `ServiceIDs`=:data
                WHERE `RequestID`= :id");
                $stmt->execute(['data'=>$data ,'id'=>$id]);
                $output['type'] = 'success';
            } catch (PDOException $th) {
                $output['type'] = 'warning';
                $output['message'] = $th->getMessage();
            }
        }
         /* parts */
         else if(isset($_POST['parts'])){
            $idData = implode(",",$_POST['idData']);
            $qtyData = implode(",",$_POST['qtyData']);
            $id = $_POST['id'];
            try {
                $stmt = $conn->prepare("UPDATE `jobs` 
                SET `PartIDs`=:idData, `PartQtys`=:qtyData
                WHERE `RequestID`= :id");
                $stmt->execute(['idData'=>$idData,'qtyData'=>$qtyData ,'id'=>$id]);
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