<!-- session -->
<?php include 'includes/session.php'; ?>
<!-- head -->
<?php include 'includes/head.php' ?>
<!-- page name -->
<?php $thisPage = 'Service Requests' ?>

<!-- Employees Modals -->
<?php include 'includes/modals/requestModals.php' ?>

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
                        <span class="box-header-dot"></span> Edit Service Request
                    </span>
                    <span>
                        <a href="requests.php" class="btn btn-theme-outline"><i class="fa fa-arrow-left"></i> Back</a>
                        <a href="requestsAdd.php"  class="btn btn-theme newCustomer"><i class="fa fa-plus"></i> Add New</a>
                    </span>
                </div>
                <form action="" class="modal-form center" id="editRequestForm" >
                    <?php 
                        if(isset($_GET['id']) && !empty($_GET['id'])){
                            $id = $_GET['id'];
                            try {
                                $conn = $pdo->open();
                        
                                    $stmt = $conn->prepare("SELECT *,`r`.`ID` AS `RequestID` FROM `requests` `r` 
                                    JOIN `types` `t` ON `t`.`ID` = `r`.`TypeID`
                                    JOIN `status` `s` ON `s`.`ID` = `r`.`StatusID`
                                    WHERE `r`.`ID` = :id");
                                    $stmt->execute(['id'=>$id]);
    
                                    foreach($stmt as $row){
                                        $auto = '';
                                        $customer = '';
                                        $technician = '';
                                        if(!empty($row['EmployeeID'])){
                                            $stmtEmployee = $conn->prepare("SELECT *,`e`.`ID` AS `EmployeeID`, `u`.`ID` AS `UserID` FROM `employees` `e` 
                                            JOIN `users` `u` ON `u`.`ID` = `e`.`EmployeeUserID`  
                                            WHERE `e`.`ID`= :id");
                                            $stmtEmployee->execute(['id'=>$row['EmployeeID']]);
                                            $rowEmployee = $stmtEmployee->fetch();
                                            $technician = $rowEmployee["FirstName"].' '.$rowEmployee["OtherName"].' '.$rowEmployee["LastName"].' ('.$rowEmployee["Position"].')';    
                                        }
                                        if(!empty($row['AutomobileID'])){
                                            $stmtAuto = $conn->prepare("SELECT *,`a`.`ID` AS `AutoID` FROM `automobiles` `a`
                                            JOIN `makes` `m` ON `a`.`MakeID` = `m`.`ID`
                                            JOIN `fuels` `f` ON `a`.`FuelID` = `f`.`ID`
                                            JOIN `categories` `c` ON `a`.`CategoryID` = `c`.`ID`
                                            WHERE `a`.`ID` = :id");
                                            $stmtAuto->execute(['id'=>$row['AutomobileID']]);
                                            $rowAuto = $stmtAuto->fetch();
                                            $auto = $rowAuto['Color'].', '.$rowAuto['Year'].', '.$rowAuto['Category'].', '.$rowAuto['Make'].', '.$rowAuto['Model'];
    
                                            if(!empty($rowAuto['CustomerID'])){
                                                $stmtC = $conn->prepare("SELECT * FROM `customers` `c`
                                                JOIN `users` `u` ON `c`.`CustomerUserID` = `u`.`ID`
                                                WHERE `c`.`ID`=:id");
                                                $stmtC->execute(['id'=>$rowAuto['CustomerID']]);
                                                $rowC = $stmtC->fetch();
                                                $customer = $rowC['FirstName'].' '.$rowC['OtherName'].' '.$rowC['LastName'].'<br>'.$rowC['Phone'];
                                            }
                                        }           
                    ?>
                    <input type="hidden" name="id" value="<?php echo !empty($id)?$id:'' ?>">
                    <div class="form-row flex">
                        <div class="form-column ">
                            <div class="left">Automobile <span class="required">*</span></div>
                            <div class="relative">
                                <input type="text" class="automobileName" disabled value="<?php echo !empty($auto)?$auto:'' ?>">
                                <input type="hidden" name="auto" class="automobileId" value="<?php echo !empty($row['AutomobileID'])?$row['AutomobileID']:'' ?>">
                                <button class="btn btn-theme no-border addAutomobile"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="form-column">
                            <div class="left">Date In <span class="required">*</span></div>
                            <input type="date" name="in" id="in" value="<?php echo !empty($row['DateIn'])?$row['DateIn']:'' ?>">
                        </div>
                        <div class="form-column">
                            <div class="left">Date Due Out <span class="required">*</span></div>
                            <input type="date" name="out" class="out" value="<?php echo !empty($row['DateDueOut'])?$row['DateDueOut']:'' ?>">
                        </div>
                    </div>
                    <div class="form-row flex">
                        <div class="form-column ">
                            <div class="left">Mileage (km)</div>
                            <input type="number" name="mileage" class="mileage" value="<?php echo !empty($row['Mileage'])?$row['Mileage']:'' ?>">
                        </div>
                        <div class="form-column">
                            <div class="left">Service Type <span class="required">*</span></div>
                            <select name="type"  class="types" ></select>
                            <span class="hidden tempType"><?php echo !empty($row['TypeID'])?$row['TypeID']:'' ?></span>
                        </div>
                        <div class="form-column">
                            <div class="left">Status <span class="required">*</span></div>
                            <select name="status"  class="statuses" ></select>
                            <span class="hidden tempStatus"><?php echo !empty($row['StatusID'])?$row['StatusID']:'' ?></span>
                        </div>
                    </div>
                    <div class="form-row flex">
                        <div class="form-column">
                            <div class="left">Lead Technician <span class="required">*</span></div>
                            <div class="relative">
                                <input type="text" class="technicianName" value="<?php echo !empty($technician)?$technician:'' ?>" disabled>
                                <input type="hidden" name="technician" class="technicianId" value="<?php echo !empty($row['EmployeeID'])?$row['EmployeeID']:'' ?>">
                                <button class="btn btn-theme no-border selectTechnician"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="form-columnx2 ">
                            <div class="left">Complians</div>
                            <input type="text" name="complians" class="complians" value="<?php echo !empty($row['Complians'])?$row['Complians']:'' ?>">
                        </div>
                    </div>
                    <div class="form-row flex pickup">
                        <div class="form-columnx2 pickup">
                            <div class="left">Pickup Address</div>
                            <input type="text" name="pickup" value="<?php echo !empty($row['PickUpAddress'])?$row['PickUpAddress']:'' ?>">
                        </div>
                    </div>
                    <input type="hidden" name="edit">
                    <br>
                    <div>
                        <button type="submit" class="btn btn-green"><i class="fa fa-save"></i> Update </button>
                        <button type="reset" class="btn btn-red modalCancel"> <i class="fa fa-times"></i> Cancel </button>
                    </div>
                    <?php 
                                } 
                            $pdo->close();
                            } catch (PDOException $th) {
                                echo $th->getMessage();
                            }
                        }
                    ?>
                </form>
            </div>
            
            <!-- footer -->
            <?php include 'includes/footer.php' ?>
        </div>
    </main>
</div>
<!-- scripts -->
<?php include 'includes/scripts.php' ?>
<script>
    getCombo();

    
    /* Edit request */
    $('#editRequestForm').on('submit', function(e){
        e.preventDefault();
        data = $(this).serialize();
        $.ajax({
            type: "POST",
			url: "requestsManage.php",
			data: data,
            dataType: 'json',
            success: function(response){
                if (response.type == "error"){
                    notify(response.message,'','error');
                }else if(response.type == "warning"){
                    notify(response.message,'','warning');
                }else if(response.type == "info"){
                    notify(response.message,'','info');
                }else if(response.type == "success"){
                    location.reload(true);
                }
            }
        })
    })
    $(function(){
        var status = $('.tempStatus').html();
        var type = $('.tempType').html();
        
        if(type == 1){
            $(".pickup").removeClass('hidden');
        }else{
            $(".pickup").addClass('hidden');
        }

        $('#editRequestForm .types option[value="'+type+'"]').attr("selected", "selected");
        $('#editRequestForm .statuses option[value="'+status+'"]').attr("selected", "selected");
    })
</script>
<!-- foot -->
<?php include 'includes/foot.php' ?>