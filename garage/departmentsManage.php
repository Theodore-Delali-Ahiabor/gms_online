<?php 
    include 'includes/session.php';

    $output['type'] = '';
    $output['message'] = '';
    try {
        $conn = $pdo->open();

        /* add new department */
        if(isset($_POST['add'])){
            $name = htmlentities($_POST['name']);          
            /* Check if empty */
            if(empty($name)){
                $output['type'] = 'error';
                $output['message'] = 'Please enter a department name';
            }
            else{
                /* Check if department exist */
                $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM `departments` WHERE name=:name");
                $stmt->execute(['name'=>$name]);
                $row = $stmt->fetch();

                if($row['numrows'] > 0){
                    $output['type'] = 'error';
                    $output['message'] = 'Department already exist';
                }
                else{
                    try {
                        $stmt = $conn->prepare("INSERT INTO `departments`(`Department`) VALUES (:name)");
                        $stmt->execute(['name'=>$name]);
                        $output['type'] = 'success';
                        $output['message'] = 'Department added successfully';
                    
                    } catch (PDOException $th) {
                        $output['type'] = 'warning';
                        $output['message'] = $th->getMessage();
                    }
                }
            }

        }

        /* edit department */
        else if(isset($_POST['edit'])){
            $id = htmlentities($_POST['id']);
            $name = htmlentities($_POST['name']);

            /* validate form */
            if(empty($name)){
                $output['type'] = 'error';
                $output['message'] = 'Please enter a department name';
            }
            else{
                try {
                    $stmt = $conn->prepare("UPDATE `departments` SET `Department` = :name WHERE `ID` = :id");
                    $stmt->execute(['name'=>$name, 'id'=> $id]);
                    $output['type'] = 'success';
                } catch (PDOException $th) {
                    $output['type'] = 'warning';
                    $output['message'] = $th->getMessage();
                }
            }
        }

        /* delete department */
        else if (isset($_POST['delete'])){
            $id = htmlentities($_POST['id']);

            try {
                $stmt = $conn->prepare("DELETE FROM `departments` WHERE `id` = :id");
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