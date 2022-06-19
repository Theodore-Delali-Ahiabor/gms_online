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
                        <span class="box-header-dot"></span> Add New Service Request
                    </span>
                    <span>
                        <a href="requests.php" class="btn btn-theme"><i class="fa fa-arrow-left"></i> Back</a>
                    </span>
                </div>
                <form action="" class="modal-form center" id="addNewRequestForm" >
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
                        <div class="form-column ">
                            <div class="left">Mileage (km)</div>
                            <input type="number" name="mileage" class="mileage" >
                        </div>
                        <div class="form-column">
                            <div class="left">Service Type <span class="required">*</span></div>
                            <select name="type"  class="types" ></select>
                        </div>
                        <div class="form-column">
                        <div class="left">Status <span class="required">*</span></div>
                            <select name="status"  class="statuses" ></select>
                        </div>
                    </div>
                    <div class="form-row flex">
                        <div class="form-column">
                            <div class="left">Lead Technician <span class="required">*</span></div>
                            <div class="relative">
                                <input type="text" class="technicianName" disabled>
                                <input type="hidden" name="technician" class="technicianId">
                                <button class="btn btn-theme no-border selectTechnician"><i class="fa fa-plus"></i></button>
                            </div>
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
            
            <!-- footer -->
            <?php include 'includes/footer.php' ?>
        </div>
    </main>
</div>
<!-- scripts -->
<?php include 'includes/scripts.php' ?>
<script>
    getCombo();

    /* Add new request */
    $('#addNewRequestForm').on('submit', function(e){
        e.preventDefault();
        data = $(this).serialize();
        notify(data,"","info");
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
</script>
<!-- foot -->
<?php include 'includes/foot.php' ?>