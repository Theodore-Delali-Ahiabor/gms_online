<nav class="box">
    <i class="fa fa-bars aside-show"></i>
    <a href="index.php">
        <span class="logo">
            <?php 
                $conn = $pdo->open();
            ?>
            <img src="images/system/<?php echo $rowSystem['Logo'] ?>" alt="">
            <span><?php echo $rowSystem['ShortName'] ?></span>
            <?php 
                $pdo->close();
            ?>
        </span>
    </a>
    <?php 
        if(isset($_SESSION['customer']) && !empty($_SESSION['customer'])){
            try{
            $conn = $pdo->open();

            $null = '';

            $stmt = $conn->prepare("SELECT * FROM `users` `u` JOIN `customers` `c` ON `u`.`ID` = `c`.`CustomerUserID` WHERE `u`.`ID` = :user ");
			$stmt->execute(['user' => $_SESSION['customer']]);
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
            if(isset($_SESSION['customer']) && !empty($_SESSION['customer'])){
                echo'
                    <div class="in">
                        <div>
                            <a href="">
                                <i class="fa fa-user"></i> Profile
                            </a>
                        </div>
                        <div>
                            <a href="logout.php">
                                <i class="fas fa-sign-out-alt"></i> Logout
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