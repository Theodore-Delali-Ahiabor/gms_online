<!-- session -->
<?php include 'includes/session.php'; ?>
<!-- head -->
<?php include 'includes/head.php' ?>
<!-- page name -->
<?php $thisPage = 'Inventory' ?>

<!-- Customers Modals -->
<?php include 'includes/modals/inventoryModals.php' ?>

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
                        <span class="box-header-dot"></span> List of Inventory Items
                    </span>
                    <span>
                        <a href="inventoryReport.php" class="btn btn-theme-outline"><i class="fa fa-file"></i> Report</a>
                        <button class="btn btn-theme newInventory"><i class="fa fa-plus"></i> Add New</button>
                    </span>
                </div>
                <table id="inventoryTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Serial No.</th>
                            <th>Location</th>
                            <th>Model & Make</th>
                            <th>Stock</th>
                            <th>Unit Cost/GH&#8373;</th>
                            <th>Supplier</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        try {
                            $conn = $pdo->open();
                    
                                $stmt = $conn->prepare("SELECT *,`i`.`ID` AS `InventoryID` FROM `inventory` `i` 
                                JOIN `locations` `l` ON `i`.`LocationID` = `l`.`ID`
                                JOIN `makes` `m` ON `i`.`MakeID` = `m`.`ID`");
                                $stmt->execute();

                                foreach($stmt as $row){
                                    if(!empty($row['SupplierID'])){
                                        $stmtC = $conn->prepare("SELECT *,`s`.`ID` AS `SupplierID` FROM `suppliers` `s`
                                        WHERE `s`.`ID`=:id");
                                        $stmtC->execute(['id'=>$row['SupplierID']]);
                                        $rowC = $stmtC->fetch();
                                        $supplier = $rowC['Name'];
                                    }else{
                                        $supplier = '<div class="center">
                                                        <button class="addSupplier btn btn-theme-outline no-border" data-id="'.$row["InventoryID"].'"><i class="fa fa-plus"></i></button>
                                                    </div>';
                                    }
                                    echo '
                                        <tr>
                                            <td class="center">'.$row["InventoryID"].'</td>
                                            <td class="center"><img src="../images/inventory/'.((!empty($row["Photo"])?$row["Photo"]:'no-image.jpg')).'" width="60"></td>
                                            <td>'.$row["Name"].'</td>
                                            <td>'.$row["SerialNo"].'</td>
                                            <td>'.$row["Location"].'<br>'.$row["Shelve"].'</td>
                                            <td>'.$row["Make"].'<br>'.$row["Model"].'</td>
                                            <td class="center">'.$row["Stock"].'</td>
                                            <td class="center">'.$row["UnitCost"].'</td>
                                            <td>'.$supplier.'</td>
                                            <td>
                                                <div class="center flex">
                                                    <button class="btn btn-blue viewInventory" data-id="'.$row["InventoryID"].'"><i class="fa fa-eye"></i></button>
                                                    <button class="btn btn-green editInventory" data-id="'.$row["InventoryID"].'"><i class="fa fa-pen"></i></button>
                                                    <button class="btn btn-red deleteInventory" data-id="'.$row["InventoryID"].'"><i class="fa fa-trash"></i></button>
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