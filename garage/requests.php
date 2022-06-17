<!-- session -->
<?php include 'includes/session.php'; ?>
<!-- head -->
<?php include 'includes/head.php' ?>
<!-- page name -->
<?php $thisPage = 'Service Requests' ?>

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
                        <span class="box-header-dot"></span> List of Jobs
                    </span>
                    <span>
                        <a href="requestsReport.php" class="btn btn-theme-outline"><i class="fa fa-file"></i> Report</a>
                        <a href="requestsAdd.php"  class="btn btn-theme newCustomer"><i class="fa fa-plus"></i> Add New</a>
                    </span>
                </div>
                <table id="requestsTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Automobile</th>
                            <th>Technician</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        /* try {
                            $conn = $pdo->open();
                    
                                $stmt = $conn->prepare("SELECT *,`c`.`ID` AS `CustomerID`,`u`.`ID` AS `UserID` FROM `jobs` `c` 
                                JOIN `users` `u` ON `u`.`ID` = `c`.`CustomerUserID`");
                                $stmt->execute();

                                foreach($stmt as $row){
                                    $address = '';
                                    if(!empty($row['AddressID'])){
                                        $stmtAddress = $conn->prepare("SELECT * FROM `addresses` `a` 
                                        JOIN `users` `u` ON `u`.`AddressID` = `a`.`ID`
                                        JOIN `countries` `c` ON `c`.`ID` = `a`.`CountryID`
                                        JOIN `regions` `r` ON `r`.`ID` = `a`.`RegionID`
                                        JOIN `cities` `ci` ON `ci`.`ID` = `a`.`CityID` 
                                        WHERE `u`.`AddressID` = :id");
                                        $stmtAddress->execute(['id'=>$row['AddressID']]);
                                        $rowAddress = $stmtAddress->fetch();
                                        $address = $rowAddress["Country"].', '.$rowAddress["Region"].', '.$rowAddress["City"].'<br>'.
                                        $rowAddress["Street"].', '.$rowAddress["House"].', '.$rowAddress["Landmark"].'<br>';    
                                    }
                                    echo '
                                        <tr>
                                            <td class="center">'.$row["CustomerID"].'</td>
                                            <td class="center"><img src="../images/profiles/'.((!empty($row["Photo"])?$row["Photo"]:'no-profile.jpg')).'" width="60"></td>
                                            <td>'.$row["FirstName"].' '.$row["OtherName"].' '.$row["LastName"].'</td>
                                            <td>'.$row["Email"].'<br>'.$row["Phone"].'</td>
                                            <td>'.$address.'</td>
                                            <td>
                                                <div class="center flex">
                                                    <span class="toggleCustomerStatus status bg '.(($row["Status"] == 1)?"bg-forestgreen":"bg-crimson").'" data-id="'.$row["UserID"].'" data-status="'.$row["Status"].'"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="center flex">
                                                    <button class="btn btn-blue viewCustomer" data-id="'.$row["CustomerID"].'"><i class="fa fa-eye"></i></button>
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
                        } */
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