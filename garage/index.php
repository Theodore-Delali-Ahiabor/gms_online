<!-- session -->
<?php include 'includes/session.php'; ?>
<!-- head -->
<?php include 'includes/head.php' ?>
<!-- page name -->
<?php $thisPage = 'Dashboard' ?>

<div class="layout-wrapper">
    <!-- aside -->
    <?php include 'includes/aside.php' ?>
    <!-- main content -->
    <main>
        <div class="main-wrapper">
            <!-- navigation -->
            <?php include 'includes/nav.php' ?>
            <?php 
                $conn = $pdo->open();
            
                try{
                $year = date("Y");
                $month = date("m");
                $day = date("d");
                $salesStmt = $conn->prepare("SELECT SUM(`Total`) AS 'total' FROM `sales` WHERE YEAR(`Date`) = '$year' && MONTH(`Date`) = '$month' && Day(`Date`) = '$day' ");
                $requestsStmt = $conn->prepare("SELECT COUNT(*) AS 'total' FROM `requests` WHERE `StatusID` = 1");
                $customersStmt = $conn->prepare("SELECT COUNT(*) AS 'total' FROM `customers`");
                $employeesStmt = $conn->prepare("SELECT COUNT(*) AS 'total' FROM `employees`");
                $autostStmt = $conn->prepare("SELECT COUNT(*) AS 'total' FROM `automobiles`");
                $inventoryStmt = $conn->prepare("SELECT COUNT(*) AS 'total' FROM `inventory`");
                //$feedbackStmt = $conn->prepare("SELECT COUNT(*) AS 'total' FROM `feedbacks` WHERE `status`='0'");'year'=>$year, 'month'=>$month, 'day'=>$day
            ?>
            
            <div class="grid no-margin info-palates ">
                <a href="customers.php" class="box info-palate flex">
                    <div class="image"><i class="fa fa-users fg-cadetblue" ></i></div>
                    <div class="value center">
                    <?php
                        $customersStmt->execute();
                        $customers = $customersStmt->fetch();
                        echo number_format_short($customers['total']) ;
                    ?>
                    </div>
                    <div class="name center">Customers</div>
                </a>
                <a href="employees.php" class="box info-palate flex">
                    <div class="image"><i class="fa fa-users-gear fg-goldenrod" ></i></div>
                    <div class="value center">
                    <?php
                        $employeesStmt->execute();
                        $employees = $employeesStmt->fetch();
                        echo number_format_short($employees['total']) ;
                    ?>
                    </div>
                    <div class="name center">Employees</div>
                </a>
                <a href="automobiles.php" class="box info-palate flex">
                    <div class="image"><i class="fa fa-car fg-black" ></i></div>
                    <div class="value center">
                    <?php
                        $autostStmt->execute();
                        $autos = $autostStmt->fetch();
                        echo number_format_short($autos['total']) ;
                    ?>
                    </div>
                    <div class="name center">Automobiles</div>
                </a>
                <div class="box info-palate flex">
                    <div class="image"><i class="fa fa-coins fg-forestgreen" ></i></div>
                    <div class="value center">&#8373; 
                    <?php
                        $salesStmt->execute();
                        $sales = $salesStmt->fetch();
                        echo number_format_short($sales['total']) ;
                    ?>
                    </div>
                    <div class="name center">Sales Today</div>
                </div>
                <a href="inventory.php" class="box info-palate flex">
                    <div class="image"><i class="fa-solid fa-warehouse fg-teal" ></i></div>
                    <div class="value center">
                    <?php
                        $inventoryStmt->execute();
                        $inventory = $inventoryStmt->fetch();
                        echo number_format_short($inventory['total']) ;
                    ?>
                    </div>
                    <div class="name center">inventory</div>
                </a>
                <a href="requests.php" class="box info-palate flex">
                    <div class="image"><i class="fa fa-calendar fg-salmon" ></i></div>
                    <div class="value center">
                        <?php
                            $requestsStmt->execute();
                            $request = $requestsStmt->fetch();
                            echo number_format_short($request['total']) ;
                        ?>
                    </div>
                    <div class="name center">Requests</div>
                </a>
            </div>
            <!-- Anual Sales Chart -->
            <div class="box main">
                <div class="table-custom-top flex align-center space-between">
                    <span class="box-header no-margin">
                        <span class="box-header-dot"></span> Anual Sales Chart
                    </span>
                    <span>
                        <button class="btn btn-green printSales hidden"><i class="fa fa-print"></i> Print</abutton>
                    </span>
                </div>
                <div >
                <?php include 'includes/salesChart.php' ?>
                </div>
            </div>
            <?php
                    }
                catch(PDOException $e){
                echo "There is some problem in connection: " . $e->getMessage();
                }

                $pdo->close();

            ?>
            <!-- footer -->
            <?php include 'includes/footer.php' ?>
        </div>
    </main>
</div>
<!-- scripts -->
<?php include 'includes/scripts.php' ?>
<script>
    $('.printSales').on('click', function(){
        printContent("#myChart");
    })
</script>
<!-- foot -->
<?php include 'includes/foot.php' ?>