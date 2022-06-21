<!-- session -->
<?php include 'includes/session.php'; ?>
<!-- head -->
<?php include 'includes/head.php' ?>
<!-- page name -->
<?php $thisPage = 'Services' ?>

<!-- Employees Modals -->
<?php include 'includes/modals/serviceModals.php' ?>

<div class="layout-wrapper">
    <!-- aside -->
    <?php include 'includes/aside.php' ?>
    <!-- main content -->
    <main>
        <div class="main-wrapper">
            <!-- navigation -->
            <?php include 'includes/nav.php' ?>
            
            <!-- services -->
            <div class="box main">
                <div class="table-custom-top flex align-center space-between">
                    <span class="box-header no-margin">
                        <span class="box-header-dot"></span> Services We Offer
                    </span>
                    <span>
                        <a href="servicesReport.php" class="btn btn-theme-outline"><i class="fa fa-file"></i> Report</a>
                        <button class="btn btn-theme newService"><i class="fa fa-plus"></i> Add New</button>
                    </span>
                </div>
                <table>
                <?php 
                    try {
                        $conn = $pdo->open();
                
                            $stmt = $conn->prepare("SELECT * FROM `services` ");
                            $stmt->execute();

                            foreach($stmt as $row){
                                echo '<tr>
                                    <td>
                                        <span class="flex">
                                            <img src="../images/system/'.(!empty($row['Photo'])?$row['Photo']:'no-image.jpg').'" alt="" width="220" style="margin: 0 2rem 1rem 0;">
                                            <span class="left flex space-between column">
                                                <h3>'.$row['Name'].'</h3>
                                                <p>'.$row['Description'].'</p>
                                                <div class="flex space-between">
                                                    <span class="bold">
                                                        GH&#8373;'.$row['Cost'].'
                                                    </span>
                                                    <span>
                                                        <button class="btn btn-green"><i class="fa fa-pen"></i></button>
                                                        <button class="btn btn-red"><i class="fa fa-trash"></i></button>
                                                    </span>
                                                </div>
                                            </span>
                                        </span>
                                    </td>
                                </tr>';
                        }
                            
                        $pdo->close();
                    } catch (PDOException $th) {
                        echo $th->getMessage();
                    }
                    ?>
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