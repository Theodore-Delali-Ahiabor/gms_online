<!-- session -->
<?php include 'includes/session.php'; ?>
<!-- head -->
<?php include 'includes/head.php' ?>
<!-- page name -->
<?php $thisPage = 'Jobs' ?>

<!-- Employees Modals -->
<?php include 'includes/modals/jobModals.php' ?>

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
                        <span class="box-header-dot"></span> Pending Jobs
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
                            <th>Date Due</th>
                            <th>Parts</th>
                            <th>Services</th>
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
                                WHERE `EmployeeID` = :id && `StatusID` = 1 || `StatusID` = 2");
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
                                    if($row["Status"] == "Pending"){
                                        $parts = '';
                                        $services = '';
                                    }else if($row["Status"] == "In Progress"){
                                            $stmtS = $conn->prepare("SELECT * FROM `jobs` `j`
                                            JOIN `requests` `r` ON `j`.`RequestID` = `r`.`ID`
                                            WHERE `j`.`RequestID`=:id");
                                            $stmtS->execute(['id'=>$row['RequestID']]);
                                            $rowS = $stmtS->fetch();
                                            $serviceArray = explode(",", $rowS['ServiceIDs']);
                                            $partQtyArray = explode(",", $rowS['PartQtys']);
                                            $partArray = explode(",", $rowS['PartIDs']);
                                            //echo "<script>getServices(".$serviceArray.",1)</script>";
                                            $serviceCost = 0;
                                            $partCost = 0;
                                            if(!empty($serviceArray)){
                                                foreach($serviceArray as $service){
                                                    $stmtSe = $conn->prepare("SELECT * FROM `services`
                                                    WHERE `ID`=:id");
                                                    $stmtSe->execute(['id'=>$service]);
                                                    $rowSe = $stmtSe->fetch();
                                                    $serviceCost += !empty($rowSe['Cost'])?$rowSe['Cost']:0.00;
                                                }
                                            }
                                            if(!empty($partArray)){
                                                foreach($partArray as $part){
                                                    $stmtP = $conn->prepare("SELECT * FROM `inventory`
                                                    WHERE `ID`=:id");
                                                    $stmtP->execute(['id'=>$part]);
                                                    $rowP = $stmtP->fetch();
                                                    foreach($partQtyArray as $qty){
                                                        $subcost = !empty($rowP['UnitCost'])?$rowP['UnitCost']*$qty:0.00;
                                                        $partCost += $subcost;
                                                    }
                                                }
                                            }
                                        $parts = '  
                                                <div class="flex center space-between">
                                                    <span class="left"> '.count($partArray).' Parts | &#8373;'.$partCost.' </span>
                                                    <span class="right">
                                                        <button class="addParts btn btn-theme-outline no-border" data-id="'.$row["RequestID"].'"><i class="fa fa-plus"></i></button>
                                                    </span>
                                                </div>';
                                        $services = '
                                                <div class="flex center space-between">
                                                    <span class="left"> '.count($serviceArray).' Services | &#8373;'.$serviceCost.' </span>
                                                    <span class="right">
                                                        <button class="addServices btn btn-theme-outline no-border" data-id="'.$row["RequestID"].'"><i class="fa fa-plus"></i></button>
                                                    </span>
                                                </div>';
                                    }
                                    echo '
                                        <tr>
                                            <td class="center">'.$row["RequestID"].'</td>
                                            <td>'.$customer.'</td>
                                            <td>'.$auto.'</td>
                                            <td>'.$row['Complians'].'</td>
                                            <td>'.$row['DateDueOut'].'</td>
                                            <td>'.$parts.'</td>
                                            <td>'.$services.'</td>
                                            <td>
                                                <div class="center flex">
                                                    <button class="btn btn-green '.(($row["Status"] == "Pending")?"startJob":(($row["Status"] == "In Progress")?"doneJob":"")).'" data-id="'.$row["RequestID"].'"><i class="fa fa-'.(($row["Status"] == "Pending")?"play":(($row["Status"] == "In Progress")?"check":"")).'"></i></button>
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