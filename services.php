<!-- head -->
<?php include 'includes/head.php' ?>

<!-- page name -->
<?php $thisPage = 'Services' ?>

<div class="layout-wrapper">
    <!-- aside -->
    <?php include 'includes/aside.php' ?>
    <!-- main content -->
    <main>
        <div class="main-wrapper">
            <!-- navigation -->
            <?php include 'includes/nav.php' ?>
            
            <!-- services -->
            <div class="box services">
                <div class="box-header center">
                   <span class="box-header-dot"></span> Services We Offer
                </div>
                <div class="flex box-body">
                    <div class="services-wrapper">
                    <?php 
                        try {
                            $conn = $pdo->open();
                    
                                $stmt = $conn->prepare("SELECT * FROM `services` ");
                                $stmt->execute();

                                foreach($stmt as $row){
                                    echo '
                                        <span class="service">
                                            <img src="images/system/'.(!empty($row['Photo'])?$row['Photo']:'no-image.jpg').'" alt="">
                                            <div class="center">
                                                <h3>'.$row['Name'].'</h3>
                                                '.$row['Description'].'
                                            </div>
                                        </span>
                                        ';
                            }
                                
                            $pdo->close();
                        } catch (PDOException $th) {
                            echo $th->getMessage();
                        }
                    ?>
                    </div>
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