<!-- session -->
<?php include 'includes/session.php'; ?>
<!-- head -->
<?php include 'includes/head.php' ?>
<!-- page name -->
<?php $thisPage = 'Jobs' ?>

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
                        <a href="jobsReport.php" class="btn btn-theme-outline"><i class="fa fa-file"></i> Report</a>
                    </span>
                </div>
                <table id="jobsTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Automobile</th>
                            <th>Complians</th>
                            <th>Parts</th>
                            <th>Services</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        try {
                            $conn = $pdo->open();
                    
                                $stmt = $conn->prepare("SELECT *,`r`.`ID` AS `RequestID` FROM `requests` `r` 
                                JOIN `types` `t` ON `t`.`ID` = `r`.`TypeID`
                                JOIN `status` `s` ON `s`.`ID` = `r`.`StatusID`
                                WHERE `EmployeeID` = :id");
                                $stmt->execute(['id'=>$rowSession['EmployeeID']]);

                                foreach($stmt as $row){
                                    $auto = '';
                                    $customer = '';
                                    if(!empty($row['AutomobileID'])){
                                        $stmtAuto = $conn->prepare("SELECT *,`a`.`ID` AS `AutoID` FROM `automobiles` `a`
                                        JOIN `makes` `m` ON `a`.`MakeID` = `m`.`ID`
                                        JOIN `fuels` `f` ON `a`.`FuelID` = `f`.`ID`
                                        JOIN `categories` `c` ON `a`.`CategoryID` = `c`.`ID`
                                        WHERE `a`.`ID` = :id");
                                        $stmtAuto->execute(['id'=>$row['AutomobileID']]);
                                        $rowAuto = $stmtAuto->fetch();
                                        $auto = $rowAuto['Color'].', '.$rowAuto['Year'].', '.$rowAuto['Category'].'<br>'.
                                        $rowAuto['Make'].', '.$rowAuto['Model'];

                                        if(!empty($rowAuto['CustomerID'])){
                                            $stmtC = $conn->prepare("SELECT * FROM `customers` `c`
                                            JOIN `users` `u` ON `c`.`CustomerUserID` = `u`.`ID`
                                            WHERE `c`.`ID`=:id");
                                            $stmtC->execute(['id'=>$rowAuto['CustomerID']]);
                                            $rowC = $stmtC->fetch();
                                            $customer = $rowC['FirstName'].' '.$rowC['OtherName'].' '.$rowC['LastName'].'<br>'.$rowC['Phone'];
                                        }
                                    }
                                    echo '
                                        <tr>
                                            <td class="center">'.$row["RequestID"].'</td>
                                            <td>'.$customer.'</td>
                                            <td>'.$auto.'</td>
                                            <td>'.$row['Complians'].'</td>
                                            <td></td>
                                            <td></td>
                                            <td class="center">'.$row["Status"].'</td>
                                            <td>
                                                <div class="center flex">
                                                    <button class="btn btn-blue viewCustomer" data-id="'.$row["RequestID"].'"><i class="fa fa-eye"></i></button>
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