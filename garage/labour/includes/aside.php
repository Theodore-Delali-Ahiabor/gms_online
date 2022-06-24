<aside>
    <i class="fa fa-angle-left aside-hide"></i>
    <div class="theme-fore-color bold">
        <i class="fa fa-dot"></i>
        <?php echo $_SESSION['department'] ?>
    </div>
    <ul class="menu" style="padding-top: 0;">
        <li class="<?php echo (!empty($thisPage) && $thisPage == 'Jobs') ? 'menu-active' : '' ?>">
            <a href="jobs.php">
                <i class=" fa fa-tools"></i>
                <span>Jobs</span>
            </a>
        </li>
    </ul>
</aside>