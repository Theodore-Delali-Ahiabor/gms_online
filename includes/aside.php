<aside>
    <i class="fa fa-angle-left aside-hide"></i>
    <ul class="menu">
        <li class="<?php echo (!empty($thisPage) && $thisPage == 'Home') ? 'menu-active' : '' ?>">
            <a href="index.php">
                <i class=" fa fa-home"></i>
                <span>Home</span>
            </a>
        </li>
        <?php if(isset($_SESSION['customer']) && !empty($_SESSION['customer']) ){ ?>
        <li class="<?php echo (!empty($thisPage) && $thisPage == 'Appointments') ? 'menu-active' : '' ?>">
            <a href="appointments.php">
                <i class=" fa fa-book"></i>
                <span>Appointments</span>
            </a>
        </li>
        <li class="<?php echo (!empty($thisPage) && $thisPage == 'Automobiles') ? 'menu-active' : '' ?>">
            <a href="automobiles.php">
                <i class=" fa fa-car"></i>
                <span>Automobiles</span>
            </a>
        </li>
        <?php }?>
        <li class="<?php echo (!empty($thisPage) && $thisPage == 'Services') ? 'menu-active' : '' ?>">
            <a href="services.php">
                <i class=" fa fa-tools"></i>
                <span>Services</span>
            </a>
        </li>
        <li class="<?php echo (!empty($thisPage) && $thisPage == 'Testimonials') ? 'menu-active' : '' ?>">
            <a href="testimonials.php">
                <i class=" fa fa-quote-left"></i>
                <span>Testimonials</span>
            </a>
        </li>
        <li class="<?php echo (!empty($thisPage) && $thisPage == 'About Us') ? 'menu-active' : '' ?>">
            <a href="">
                <i class=" fa fa-question"></i>
                <span>About Us</span>
            </a>
        </li>
        <li class="<?php echo (!empty($thisPage) && $thisPage == 'Contact Us') ? 'menu-active' : '' ?>">
            <a href="">
                <i class="fa fa-headset"></i>
                <span>Contact Us</span>
            </a>
        </li>
        <li class="<?php echo (!empty($thisPage) && $thisPage == 'FAQ') ? 'menu-active' : '' ?>">
            <a href="faq.php">
                <i class=" fa fa-message"></i>
                <span>FAQ</span>
            </a>
        </li>
    </ul>
</aside>