<!-- session -->
<?php include 'includes/session.php'; ?>
<!-- head -->
<?php include 'includes/head.php' ?>
<!-- page name -->
<?php $thisPage = 'Customers' ?>

<!-- Customers Modals -->
<?php include 'includes/modals/customerModals.php' ?>

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
                        <span class="box-header-dot"></span> List of Customers
                    </span>
                    <button class="btn btn-theme newCustomer"><i class="fa fa-plus"></i> Add New</button>
                </div>
                <table id="customersTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        try {
                            $conn = $pdo->open();
                    
                                $stmt = $conn->prepare("SELECT *,`c`.`ID` AS `CustomerID` FROM `customers` `c` 
                                JOIN `users` `u` ON `u`.`ID` = `c`.`CustomerUserID`");
                                $stmt->execute();

                                foreach($stmt as $row){
                                    $stmtAddress = $conn->prepare("SELECT * FROM `addresses` `a` 
                                    JOIN `users` `u` ON `u`.`AddressID` = `a`.`ID`
                                    JOIN `countries` `c` ON `c`.`ID` = `a`.`CountryID`
                                    JOIN `regions` `r` ON `r`.`ID` = `a`.`RegionID`
                                    JOIN `cities` `ci` ON `ci`.`ID` = `a`.`CityID`");
                                    $stmtAddress->execute();
                                    $rowAddress = $stmtAddress->fetch();
                                    $address = $rowAddress["Country"].', '.$rowAddress["Region"].', '.$rowAddress["City"].'<br>'.
                                    $rowAddress["Street"].', '.$rowAddress["House"].', '.$rowAddress["Landmark"].'<br>';
                                    echo '
                                        <tr>
                                            <td class="center">'.$row["CustomerID"].'</td>
                                            <td class="center"><img src="../images/profiles/'.((!empty($row["Photo"])?$row["Photo"]:'no-profile.jpg')).'" width="60"></td>
                                            <td>'.$row["FirstName"].' '.$row["OtherName"].' '.$row["LastName"].'</td>
                                            <td>'.$row["Email"].'<br>'.$row["Phone"].'</td>
                                            <td>'.$address.'</td>
                                            <td>
                                                <div class="center flex">
                                                    <span class="status bg '.(($row["Status"] == 1)?"bg-forestgreen":"bg-crimson").'"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="center flex">
                                                    <button class="btn btn-blue viewCustomer" data-id="'.$row["CustomerID"].'"><i class="fa fa-eye"></i></button>
                                                    <button class="btn btn-green editCustomer" data-id="'.$row["CustomerID"].'"><i class="fa fa-pen"></i></button>
                                                    <button class="btn btn-red deleteCustomer" data-id="'.$row["CustomerID"].'"><i class="fa fa-trash"></i></button>
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