<!-- head -->
<?php include 'includes/head.php' ?>
<div class="layout-wrapper">
    <!-- aside -->
    <?php include 'includes/aside.php' ?>
    <!-- main content -->
    <main>
        <div class="main-wrapper">
            <!-- navigation -->
            <?php include 'includes/nav.php' ?>

            <div class="flex auth-form-wrapper">
                <div class="box auth-form">
                    <form id="signinForm">
                        <div class="form-header center">
                            <span class="form_name">Sign In</span>
                        </div>
                        <div class="form-input">
                                <input type="text" name="user" placeholder="Username, Email or Phone" required>
                                <i class="fa fa-user"></i>
                            </div>
                        <div class="form-input">
                            <input type="password" name="password" placeholder="Password" class="password" required>
                            <i class="fa fa-lock"></i>
                            <i class="fa fa-eye eye"></i>
                        </div>
                        <a href="password_forgot.php" class="forgot-pass">
                            <i class="fa fa-key"></i> Forgot password?
                        </a><br>
                        <div class="form-btn">
                            <input type="submit" value="SIGN IN" class="btn btn-theme btn-submit-auth" name="login">
                        </div>
                        <br>
                        <a href="signup.php" class="signup">
                            <i class="fa fa-user-plus"></i> Create a free Account
                        </a><br>
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
