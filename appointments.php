<!-- head -->
<?php include 'includes/head.php' ?>
<!-- page name -->
<?php $thisPage = 'Appointments' ?>
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
                <form action="" class="modal-form center" id="addNewSupplierForm" >
                    <div class="form-row flex">
                        <div class="form-column ">
                            <div class="left">Automobile <span class="required">*</span></div>
                            <div class="relative">
                                <input type="text" name="name" class="name" disabled>
                                <button class="btn btn-theme no-border"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="form-column">
                            <div class="left">Start Date <span class="required">*</span></div>
                            <input type="date" name="in" id="in">
                        </div>
                        <div class="form-column">
                            <div class="left">End Date <span class="required">*</span></div>
                            <input type="date" name="out" class="out">
                        </div>
                    </div>
                    <div class="form-row flex">
                        <div class="form-column">
                            <div class="left">Service Type <span class="required">*</span></div>
                            <select name="type"  class="types" ></select>
                        </div>
                        <div class="form-columnx2 ">
                            <div class="left">Problems Description <span class="required">*</span></div>
                            <input type="text" name="name" class="name">
                        </div>
                    </div>
                    <input type="hidden" name="add">
                    <br>
                    <div>
                        <button type="submit" class="btn btn-green"><i class="fa fa-paper-plane"></i>  Send Request</button>
                        <button type="reset" class="btn btn-red modalCancel"> <i class="fa fa-times"></i> Cancel </button>
                    </div>
                </form>
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
