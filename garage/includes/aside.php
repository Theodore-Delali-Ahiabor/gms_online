<aside>
    <i class="fa fa-angle-left aside-hide"></i>
    <div class="theme-fore-color bold">
        <i class="fa fa-dot"></i>
        <?php echo $_SESSION['department'] ?>
    </div>
    <ul class="menu" style="padding-top: 0;">
        <li class="<?php echo (!empty($thisPage) && $thisPage == 'Dashboard') ? 'menu-active' : '' ?>">
            <a href="index.php">
                <i class=" fa fa-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="<?php echo (!empty($thisPage) && $thisPage == 'Jobs') ? 'menu-active' : '' ?>">
            <a href="jobs.php">
                <i class=" fa fa-tools"></i>
                <span>Jobs</span>
            </a>
        </li>
        <li class="<?php echo (!empty($thisPage) && $thisPage == 'Inventory') ? 'menu-active' : '' ?>">
            <a href="inventory.php">
                <i class=" fa fa-list"></i>
                <span>Inventory</span>
            </a>
        </li>
        <li class="<?php echo (!empty($thisPage) && $thisPage == 'Invoice') ? 'menu-active' : '' ?>">
            <a href="invoice.php">
                <i class=" fa fa-file"></i>
                <span>Invoice</span>
            </a>
        </li>
        <li class="<?php echo (!empty($thisPage) && $thisPage == 'Testimonials') ? 'menu-active' : '' ?>">
            <a href="testimonials.php">
                <i class=" fa fa-message"></i>
                <span>Testimonials</span>
            </a>
        </li>
        <li class="<?php echo (!empty($thisPage) && $thisPage == 'Service Requests') ? 'menu-active' : '' ?>">
            <a href="requests.php">
                <i class=" fa fa-calendar"></i>
                <span>Service Requests</span>
            </a>
        </li>
        <li class="<?php echo (!empty($thisPage) && $thisPage == 'Employees') ? 'menu-active' : '' ?>">
            <a href="employees.php">
                <i class=" fa fa-users-gear"></i>
                <span>Employees</span>
            </a>
        </li>
        <li class="<?php echo (!empty($thisPage) && $thisPage == 'Customers') ? 'menu-active' : '' ?>">
            <a href="customers.php">
                <i class=" fa fa-users"></i>
                <span>Customers</span>
            </a>
        </li>
        <li class="<?php echo (!empty($thisPage) && $thisPage == 'Automobiles') ? 'menu-active' : '' ?>">
            <a href="automobiles.php">
                <i class=" fa fa-car"></i>
                <span>Automobiles</span>
            </a>
        </li>
        <li class="<?php echo (!empty($thisPage) && $thisPage == 'Departments') ? 'menu-active' : '' ?>">
            <a href="departments.php">
                <i class=" fa fa-list"></i>
                <span>Departments</span>
            </a>
        </li>
        <li class="<?php echo (!empty($thisPage) && $thisPage == 'Suppliers') ? 'menu-active' : '' ?>">
            <a href="suppliers.php">
                <i class=" fa fa-list"></i>
                <span>Suppliers</span>
            </a>
        </li>
        <li class="<?php echo (!empty($thisPage) && $thisPage == 'Settings') ? 'menu-active' : '' ?>">
            <a href="settings">
                <i class="fa fa-gear"></i>
                <span>Settings</span>
            </a>
        </li>
    </ul>
</aside>