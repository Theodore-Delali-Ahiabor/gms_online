<!-- session -->
<?php include 'includes/session.php'; ?>
<!-- head -->
<?php include 'includes/head.php' ?>
<!-- page name -->
<?php $thisPage = 'Automobiles' ?>

<!-- Automobiles Modals -->
<?php include 'includes/modals/employeeModals.php' ?>

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
                        <span class="box-header-dot"></span> Automobiles Report
                    </span>
                    <span>
                        <a href="automobiles.php" class="btn btn-theme-outline"><i class="fa fa-arrow-left"></i> Back</a>
                        <button class="btn btn-green printAutomobiles"><i class="fa fa-print"></i> Print</button>
                    </span>
                </div>
                <div class="print-wraper tableResponsive" id="automobilesReport">
                    <div class="center">
                        <div class="bold">HTU-JMTC</div>
                        <div >List of Automobiles</div>
                    </div><br>
                    <table >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Description</th>
                                <th>Fuel</th>
                                <th>VIN</th>
                                <th>Reg. Number</th>
                                <th>Customer</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            try {
                                $conn = $pdo->open();
                        
                                    $stmt = $conn->prepare("SELECT *,`a`.`ID` AS `AutoID`,(SELECT `Category` FROM `Categories` WHERE `ID` = `a`.`CategoryID`) AS `Category`  FROM `automobiles` `a`
                                    JOIN `makes` `m` ON `a`.`MakeID` = `m`.`ID`
                                    JOIN `fuels` `f` ON `a`.`FuelID` = `f`.`ID`");
                                    $stmt->execute();
                                    
                                    foreach($stmt as $row){
                                        if(!empty($row['CustomerID'])){
                                            $stmtC = $conn->prepare("SELECT * FROM `customers` `c`
                                            JOIN `users` `u` ON `c`.`CustomerUserID` = `u`.`ID`
                                            WHERE `c`.`ID`=:id");
                                            $stmtC->execute(['id'=>$row['CustomerID']]);
                                            $rowC = $stmtC->fetch();
                                            $customer = $rowC['FirstName'].' '.$rowC['OtherName'].' '.$rowC['LastName'].'<br>'.$rowC['Phone'];
                                        }else{
                                            $customer = '';
                                        }
                                        echo '
                                        <tr>
                                            <td class="center">'.$row["AutoID"].'</td>
                                            <td class="center"><img src="../images/autos/'.((!empty($row["Photo"])?$row["Photo"]:'no-image.jpg')).'" width="60"></td>
                                            <td>'.$row['Color'].', '.$row['Year'].', '.$row['Category'].'<br>'.$row['Make'].', '.$row['Model'].'</td>
                                            <td>'.$row['Fuel'].'</td>
                                            <td>'.$row['VIN'].'</td>
                                            <td>'.$row['RegNumber'].'</td>
                                            <td>'.$customer.'</td>
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
            </div>

            <!-- footer -->
            <?php include 'includes/footer.php' ?>
        </div>
    </main>
</div>
<noscript>
    <style>
        .center{
            text-align:center;
        }
        table{
            border-collapse:collapse;
            width: 100%
        }
        table tr,table td,table th{
            border:1px solid gray;
        }
    </style>
</noscript>
<!-- scripts -->
<?php include 'includes/scripts.php' ?>
<script>
    $('.printAutomobiles').on('click', function(){
        printContent("#automobilesReport");
    })
    
</script>
<!-- foot -->
<?php include 'includes/foot.php' ?>