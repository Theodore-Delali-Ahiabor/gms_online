<nav class="box">
    <i class="fa fa-bars aside-show"></i>
    <a href="index.php">
        <span class="logo">
            <img src="../images/system/logo.png" alt="">
            <span>HTU-JMTC</span>
        </span>
    </a>
    <?php 
        if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
            try{
            $conn = $pdo->open();

            $null = '';

            $stmt = $conn->prepare("SELECT * FROM `user` `u` JOIN `customer_info` `c` ON `u`.`Employee_ID` = `c`.`ID` WHERE `c`.`ID` = :user ");
			$stmt->execute(['user' => $_SESSION['user']]);
			$current_user = $stmt->fetch();
            $current_user_name = $current_user["Username"];
            $current_user_image = (!empty($current_user["Photo"])? $current_user["Photo"] : 'no-profile.jpg');
            echo '
            <span class="user user-in">
                <span class="user-name">
                    <div>Hi, '.$current_user_name.'</div>
                </span>
                <span class="user-img">
                    <img src="images/profiles/'.$current_user_image.'"  alt="">
                </span>
            </span>';
    
             }catch(PDOException $e){
               echo "There is some problem in connection: " . $e->getMessage();
            }

            $pdo->close();       
        }else{
    ?>
        <span class="user-out">
            <span class="sign-buttons">
                <a href="signin.php" class="btn btn-theme">Sign-In</a>
                <a href="signup.php" class="btn btn-theme-outline">Sign-Up</a>
            </span>
            <i class="fa fa-user sign-icon user"></i>
        </span>
    <?php 
        }
    ?>
    <span class="user-dropdown box">
        <span class="spike"></span>
        <?php 
            if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                echo'
                    <div class="in">
                        <div>
                            <a href="">
                                <i class="fa fa-user"></i> Profile
                            </a>
                        </div>
                        <div>
                            <a href="logout.php">
                                <i class="fa fa-logout"></i> Logout
                            </a>
                        </div>
                    </div>
                ';
            }else{
                echo'
                    <div class="out">
                        <div>
                            <a href="signin.php">
                                <i class="fa fa-right-to-bracket"></i> SignIn
                            </a>
                        </div>
                        <div>
                            <a href="signup.php">
                                <i class="fa fa-user-plus"></i> SignUp
                            </a>
                        </div>
                    </div>
                ';
            }
        ?>  
        
    </span>
</nav>