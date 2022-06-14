<?php
	include 'includes/session.php';

    $output['type'] = '';
    $output['message'] = '';
    try {
        $conn = $pdo->open();

            $stmt = $conn->prepare("SELECT * FROM `departments` WHERE `ID` = :id ");
            $stmt->execute(['id'=>$_POST['id']]);
            $row = $stmt->fetch();
            $output['id'] = $row['ID'];
            $output['name'] = $row['Department'];
            $output['type'] = 'success';  

        $pdo->close();
    } catch (PDOException $th) {
        $output['type'] = 'warning';
        $output['message'] = $th->getMessage();
    }
	echo json_encode($output)
?>