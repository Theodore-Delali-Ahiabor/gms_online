<!-- head -->
<?php include 'includes/head.php' ?>
<!-- page name -->
<?php $thisPage = 'Automobiles' ?>

<!-- Automobile Modals -->
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
                    <span>
                        <button class="btn btn-theme newAutomobile" ><i class="fa fa-plus"></i> Add New</button>
                    </span>
                </div>
                <table id="automobilesTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Photo</th>
                            <th>Description</th>
                            <th>Fuel</th>
                            <th>VIN</th>
                            <th>Reg. Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        try {
                            $conn = $pdo->open();
                    
                                $stmt = $conn->prepare("SELECT *,`a`.`ID` AS `AutoID` FROM `automobiles` `a`
                                JOIN `makes` `m` ON `a`.`MakeID` = `m`.`ID`
                                JOIN `fuels` `f` ON `a`.`FuelID` = `f`.`ID`
                                JOIN `categories` `c` ON `a`.`CategoryID` = `c`.`ID`
                                WHERE `a`.`CustomerID` = :id");
                                $stmt->execute(['id'=>$rowSession['CustomerID']]);
                                
                                foreach($stmt as $row){
                                    echo '
                                        <tr>
                                            <td class="center">'.$row["AutoID"].'</td>
                                            <td class="center"><img src="images/autos/'.((!empty($row["Photo"])?$row["Photo"]:'no-image.jpg')).'" width="60"></td>
                                            <td>'.$row['Color'].', '.$row['Year'].', '.$row['Category'].'<br>'.$row['Make'].', '.$row['Model'].'</td>
                                            <td>'.$row['Fuel'].'</td>
                                            <td>'.$row['VIN'].'</td>
                                            <td>'.$row['RegNumber'].'</td>
                                            <td>
                                                <div class="center flex">
                                                <button class="btn btn-blue viewAutomobile" data-id="'.$row["AutoID"].'"><i class="fa fa-eye"></i></button>
                                                    <button class="btn btn-green editAutomobile" data-id="'.$row["AutoID"].'"><i class="fa fa-pen"></i></button>
                                                    <button class="btn btn-red deleteAutomobile" data-id="'.$row["AutoID"].'"><i class="fa fa-trash"></i></button>
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