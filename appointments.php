<!-- head -->
<?php include 'includes/head.php' ?>
<!-- page name -->
<?php $thisPage = 'Appointments' ?>

<!-- Automobile Modals -->
<?php include 'includes/modals/appointmentModals.php' ?>

<div class="layout-wrapper">
    <!-- aside -->
    <?php include 'includes/aside.php' ?>
    <!-- main content -->
    <main>
        <div class="main-wrapper">
            <!-- navigation -->
            <?php include 'includes/nav.php' ?>
                <!-- Book appointment -->
            <div class="box appointment-wrapper">
                <div class="box-header left">
                    <span class="box-header-dot"></span> Book New Appointment
                </div>
                <div class="flex box-body">
                <form action="" class="modal-form center" id="addNewappointmentForm" >
                <div class="form-row flex">
                        <div class="form-column ">
                            <div class="left">Automobile <span class="required">*</span></div>
                            <div class="relative">
                                <input type="text" class="automobileName" disabled>
                                <input type="hidden" name="auto" class="automobileId">
                                <button class="btn btn-theme no-border addAutomobile"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="form-column">
                            <div class="left">Date In <span class="required">*</span></div>
                            <input type="date" name="in" id="in">
                        </div>
                        <div class="form-column">
                            <div class="left">Date Due Out <span class="required">*</span></div>
                            <input type="date" name="out" class="out">
                        </div>
                    </div>
                    <div class="form-row flex">
                        <div class="form-column">
                            <div class="left">Service Type <span class="required">*</span></div>
                            <select name="type"  class="types" ></select>
                        </div>
                        <div class="form-columnx2 ">
                            <div class="left">Complians</div>
                            <input type="text" name="complians" class="complians" >
                        </div>
                    </div>
                    <div class="form-row flex pickup hidden">
                        <div class="form-columnx2 pickup hidden">
                            <div class="left">Pickup Address</div>
                            <input type="text" name="pickup" >
                        </div>
                    </div>
                    <input type="hidden" name="add">
                    <br>
                    <div>
                        <button type="submit" class="btn btn-green"><i class="fa fa-save"></i> Save </button>
                        <button type="reset" class="btn btn-red modalCancel"> <i class="fa fa-times"></i> Cancel </button>
                    </div>
                </form>
                </div>
            </div>

            <div class="box main">
                <div class="table-custom-top flex align-center space-between">
                    <span class="box-header no-margin">
                        <span class="box-header-dot"></span> Appointments
                    </span>
                </div>
                <table id="requestsTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Automobile</th>
                            <th>Complians</th>
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
                                JOIN `status` `s` ON `s`.`ID` = `r`.`StatusID` ORDER BY `r`.`ID` DESC");
                                $stmt->execute();

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
                                            <td>'.$row['DateIn'].'</td>
                                            <td>'.$auto.'</td>
                                            <td>'.$row['Complians'].'</td>
                                            <td class="center">'.$row["Status"].'</td>
                                            <td>
                                                <div class="center flex">
                                                    <button class="btn btn-blue viewRequest" data-id="'.$row["RequestID"].'"><i class="fa fa-eye"></i></button>
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
