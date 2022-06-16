<!-- session -->
<?php include 'includes/session.php'; ?>
<!-- head -->
<?php include 'includes/head.php' ?>
<!-- page name -->
<?php $thisPage = 'Suppliers' ?>
<!-- suppliers Modals -->
<?php include 'includes/modals/supplierModals.php' ?>

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
                        <span class="box-header-dot"></span> List of Suppliers
                    </span>
                    <button class="btn btn-theme newSupplier" ><i class="fa fa-plus"></i> Add New</button>
                </div>
                <table id="suppliersTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Brand Name</th>
                            <th>Bussines Sector</th>
                            <th>Address</th>
                            <th>Contact</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        try {
                            $conn = $pdo->open();
                    
                                $stmt = $conn->prepare("SELECT * FROM `suppliers` `s`
                                JOIN `sectors` `se` ON `s`.`SectorID` = `se`.`ID`");
                                $stmt->execute();
                                
                                foreach($stmt as $row){
                                    /* $stmtE = $conn->prepare("SELECT COUNT(*) AS 'count' FROM `employees` WHERE `SupplierID`=:id");
                                    $stmtE->execute(['id'=>$row['ID']]);
                                    $rowE = $stmtE->fetch(); */
                                    echo '
                                        <tr>
                                            <td class="center">'.$row["ID"].'</td>
                                            <td>'.$row["Name"].'</td>
                                            <td class="center">'.$row['Sector'].'</td>
                                            <td class="center">'.$row['Phone'].'</td>
                                            <td>
                                                <div class="center flex">
                                                    <button class="btn btn-green editSupplier" data-id="'.$row["ID"].'"><i class="fa fa-pen"></i></button>
                                                    <button class="btn btn-red deleteSupplier" data-id="'.$row["ID"].'"><i class="fa fa-trash"></i></button>
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