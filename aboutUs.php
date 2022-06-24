<!-- head -->
<?php include 'includes/head.php' ?>
<!-- page name -->
<?php $thisPage = 'About Us' ?>

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
                <span class="box-header no-margin center">
                    <span class="box-header-dot"></span> About Us
                </span>
                <div>
                <?php 
                $conn = $pdo->open();
            
                try{
                    $aboutStmt = $conn->prepare("SELECT * FROM `garage` ");
                    $aboutStmt->execute();
                    $aboutRow = $aboutStmt->fetch();
                    echo $aboutRow['AboutUs'];

                }
                    catch(PDOException $e){
                    echo "There is some problem in connection: " . $e->getMessage();
                }

                $pdo->close();

                ?>
                </div>
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