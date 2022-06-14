<!-- session -->
<?php include 'includes/session.php'; ?>
<!-- head -->
<?php include 'includes/head.php' ?>
<!-- page name -->
<?php $thisPage = 'Automobiles' ?>

<!-- Employees Modals -->
<?php include 'includes/modals/automobileModals.php' ?>

<div class="layout-wrapper">
    <!-- aside -->
    <?php include 'includes/aside.php' ?>
    <!-- main content -->
    <main>
        <div class="main-wrapper">
            <!-- navigation -->
            <?php include 'includes/nav.php' ?>

            <div class="box main">
                <div class="table-custom-top flex align-center space-between">
                    <span class="box-header no-margin">
                        <span class="box-header-dot"></span> List of Automobiles
                    </span>
                    <button class="btn btn-theme newAutomobile" ><i class="fa fa-plus"></i> Add New</button>
                </div>
                <table id="AutomobilesTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Photo</th>
                            <th>Category</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Color</th>
                            <th>Year</th>
                            <th>Fuel</th>
                            <th>VIN</th>
                            <th>Reg. Number</th>
                            <th>Owner</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        try {
                            $conn = $pdo->open();
                    
                                $stmt = $conn->prepare("SELECT * FROM `Automobiles`");
                                $stmt->execute();
                                
                                foreach($stmt as $row){
                                    $stmtE = $conn->prepare("SELECT COUNT(*) AS 'count' FROM `employees` WHERE `AutomobileID`=:id");
                                    $stmtE->execute(['id'=>$row['ID']]);
                                    $rowE = $stmtE->fetch();
                                    echo '
                                        <tr>
                                            <td class="center">'.$row["ID"].'</td>
                                            <td>'.$row["Automobile"].'</td>
                                            <td class="center">'.$rowE['count'].'</td>
                                            <td>
                                                <div class="center flex">
                                                    <button class="btn btn-green editAutomobile" data-id="'.$row["ID"].'"><i class="fa fa-pen"></i></button>
                                                    <button class="btn btn-red deleteAutomobile" data-id="'.$row["ID"].'"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    ';
                                }
                                $output['type'] = 'success';           
                    
                            $pdo->close();
                        } catch (PDOException $th) {
                            echo $th->getMessage();
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- footer -->
            <?php include 'includes/footer.php' ?>
        </div>
    </main>
</div>
<!-- scripts -->
<?php include 'includes/scripts.php' ?>
<!-- foot -->
<?php include 'includes/foot.php' ?>