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
                    <span>
                        <a href="suppliersReport.php" class="btn btn-theme-outline"><i class="fa fa-file"></i> Report</a>
                        <button class="btn btn-theme newSupplier" ><i class="fa fa-plus"></i> Add New</button>
                    </span>
                    
                </div>
                <table id="suppliersTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Brand Name</th>
                            <th>Bussines Sector</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        try {
                            $conn = $pdo->open();
                    
                                $stmt = $conn->prepare("SELECT *,`s`.`ID` AS `SupplierID` FROM `suppliers` `s`
                                JOIN `sectors` `se` ON `s`.`SectorID` = `se`.`ID`");
                                $stmt->execute();
                                
                                foreach($stmt as $row){
                                    $address = '';
                                    if(!empty($row['AddressID'])){
                                        $stmtAddress = $conn->prepare("SELECT * FROM `addresses` `a` 
                                        JOIN `suppliers` `s` ON `s`.`AddressID` = `a`.`ID`
                                        JOIN `countries` `c` ON `c`.`ID` = `a`.`CountryID`
                                        JOIN `regions` `r` ON `r`.`ID` = `a`.`RegionID`
                                        JOIN `cities` `ci` ON `ci`.`ID` = `a`.`CityID` 
                                        WHERE `s`.`AddressID` = :id");
                                        $stmtAddress->execute(['id'=>$row['AddressID']]);
                                        $rowAddress = $stmtAddress->fetch();
                                        $address = $rowAddress["Country"].', '.$rowAddress["Region"].', '.$rowAddress["City"].'<br>'.
                                        $rowAddress["Street"].', '.$rowAddress["House"].', '.$rowAddress["Landmark"].'<br>';    
                                    }
                                    echo '
                                        <tr>
                                            <td class="center">'.$row["SupplierID"].'</td>
                                            <td>'.$row["Name"].'</td>
                                            <td>'.$row['Sector'].'</td>
                                            <td>'.$address.'</td>
                                            <td>'.$row['Phone'].'<br>'.$row['Email'].'</td>
                                            <td>
                                                <div class="center flex">
                                                    <button class="btn btn-green editSupplier" data-id="'.$row["SupplierID"].'"><i class="fa fa-pen"></i></button>
                                                    <button class="btn btn-red deleteSupplier" data-id="'.$row["SupplierID"].'"><i class="fa fa-trash"></i></button>
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