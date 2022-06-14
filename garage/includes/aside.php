<aside>
    <i class="fa fa-angle-left aside-hide"></i>
    <ul class="menu">
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
        <li class="<?php echo (!empty($thisPage) && $thisPage == 'Settings') ? 'menu-active' : '' ?>">
            <a href="settings">
                <i class="fa fa-gear"></i>
                <span>Settings</span>
            </a>
        </li>
    </ul>
</aside>