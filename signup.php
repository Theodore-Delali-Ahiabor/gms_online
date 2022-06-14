<!-- head -->
<?php include 'includes/head.php' ?>
<?php
  if(isset($_SESSION['customer'])){
    header('Location: appointments.php');
  }
  else if(isset($_SESSION['admin'])){
    header('./admin/index.php');
  }
?>
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
                    <form id="signupForm">
                        <div class="form-header center">
                            <span class="form_name">Sign Up</span>
                        </div>
                        <div class="form-input">
                            <input type="text" name="firstname" placeholder="First name" required>
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="form-input">
                            <input type="text" name="lastname" placeholder="Last name" required>
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="form-input">
                            <input type="email" name="email" placeholder="Email" required>
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="form-input">
                                <input type="text" name="username" placeholder="Username" required>
                                <i class="fa fa-user"></i>
                            </div>
                            <ul class="pass-rules">
                                <li>Password must contain a number (0-9)</li>
                                <li>Password must contain a letter (A-Z, a-z)</li>
                                <li>Password must must be at least 8 characters long</li>
                            </ul>
                        <div class="form-input">
                            <input type="password" name="password" placeholder="Password" required>
                            <i class="fa fa-key"></i>
                        </div>
                        <div class="form-input">
                            <input type="password" name="confirmPassword" placeholder="Confirm Password" required>
                            <i class="fa fa-lock"></i>
                        </div>
                        <span style="float:right;">
                            <input type="checkbox" name="terms" required> I agree to your <span class="theme-fore-color terms_btn">terms</span> and <span class="theme-fore-color terms_btn">conditions</span>
                        </span><br>
                        <div class="form-btn">
                            <input type="submit" value="CREATE ACCOUNT" class="btn btn-theme btn-submit-auth" name="signup">
                        </div>
                        <br>
                        <a href="signin.php" class="signup">
                            <i class="fa fa-user"></i> I already have an Account
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