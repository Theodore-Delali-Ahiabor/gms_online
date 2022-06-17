<!-- session -->
<?php include 'includes/session.php'; ?>
<!-- head -->
<?php include 'includes/head.php' ?>
<!-- page name -->
<?php $thisPage = 'Jobs' ?>

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
                        <span class="box-header-dot"></span> List of Jobs
                    </span>
                    <span>
                        <a href="jobs.php" class="btn btn-theme-outline"><i class="fa fa-arrow-left"></i> Back</a>
                        <button class="btn btn-green printJobs"><i class="fa fa-print"></i> Print</button>
                    </span>
                </div>
                <div class="print-wraper tableResponsive" id="jobsReport">
                    <div class="center">
                        <div class="bold">HTU-JMTC</div>
                        <div >List of Jobs</div>
                    </div><br>
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