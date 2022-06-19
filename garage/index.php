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
                //$salesStmt = $conn->prepare("SELECT SUM(`details`.`quantity` * `products`.`selling_price`) AS 'total' FROM `sales` JOIN `details` ON `details`.`sales_id` = `sales`.`id` JOIN `products` ON `products`.`id` = `details`.`product_id` WHERE `sales`.`sales_date` =  :now ");
                //$requestsStmt = $conn->prepare("SELECT COUNT(*) AS 'total' FROM `users` WHERE `type` = 3");
                $customersStmt = $conn->prepare("SELECT COUNT(*) AS 'total' FROM `customers`");
                $employeesStmt = $conn->prepare("SELECT COUNT(*) AS 'total' FROM `employees`");
                $autostStmt = $conn->prepare("SELECT COUNT(*) AS 'total' FROM `automobiles`");
                //$feedbackStmt = $conn->prepare("SELECT COUNT(*) AS 'total' FROM `feedbacks` WHERE `status`='0'");
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
                    <div class="value center">&#8373; 0</div>
                    <div class="name center">Sales Today</div>
                </div>
                <div class="box info-palate flex">
                    <div class="image"><i class="fa fa-message fg-teal" ></i></div>
                    <div class="value center">0</div>
                    <div class="name center">Feedbacks</div>
                </div>
                <div class="box info-palate flex">
                    <div class="image"><i class="fa fa-calendar fg-salmon" ></i></div>
                    <div class="value center">0</div>
                    <div class="name center">Appointments</div>
                </div>
            </div>
            <!-- Anual Sales Chart -->
            <div class="box main">
                <div class="table-custom-top flex align-center space-between">
                    <span class="box-header no-margin">
                        <span class="box-header-dot"></span> Anual Sales Chart
                    </span>
                    <span>
                        <button class="btn btn-green"><i class="fa fa-print"></i> Print</abutton>
                    </span>
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
<!-- foot -->
<?php include 'includes/foot.php' ?>