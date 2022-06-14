<!-- head -->
<?php include 'includes/head.php' ?>

<!-- page name -->
<?php $thisPage = 'Home' ?>

<div class="layout-wrapper">
    <!-- aside -->
    <?php include 'includes/aside.php' ?>
    <!-- main content -->
    <main>
        <div class="main-wrapper">
            <!-- navigation -->
            <?php include 'includes/nav.php' ?>

            <!-- carosel -->
            <div class="box carosel-wrapper">
                <div class="carosel">
                    <div class="slide fade">
                        <div class="flex slide-content">
                            <span class="slide-txt">
                                <h1>Welcome to our garage</h1>
                                <p class="flex">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque, eos!
                                </p>
                            </span>
                            <span class="slide-img">
                                <img src="images/system/smiling-mechanic-with-arms-crossed-spanner.jpg" alt="">
                            </span>
                        </div>
                    </div>
                    <div class="slide fade">
                        <div class="flex slide-content">
                            <span class="slide-txt">
                                <h1>We care for your car</h1>
                                <p class="flex">
                                    Trust worthy!<br>
                                    Fast payments!<br>
                                    Best rates!
                                </p>
                            </span>
                            <span class="slide-img">
                                <img src="images/system/mechanic-fixing-car-brake.jpg" alt="">
                            </span>
                        </div>
                    </div>
                    <div class="slide fade">
                        <div class="flex slide-content">
                            <span class="slide-txt">
                                <h1>Have a peak at our services</h1>
                                <p class="flex">
                                    Trust worthy!<br>
                                    Fast payments!<br>
                                    Best rates!
                                </p>
                            </span>
                            <span class="slide-img">
                                <img src="images/system/mechanic-servicing-car.jpg" alt="">
                            </span>
                        </div>
                    </div>
                    <div class="slide fade">
                        <div class="flex slide-content">
                            <span class="slide-txt">
                                <h1>Do you need to talk to us?</h1>
                                <p class="flex">
                                    Trust worthy!<br>
                                    Fast payments!<br>
                                    Best rates!
                                </p>
                            </span>
                            <span class="slide-img">
                                <img src="images/system/mechanic-standing-repair-garage.jpg" alt="">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="flex indicator">
                    <span class="dot active" data-id="0"></span>
                    <span class="dot" data-id="1"></span>
                    <span class="dot" data-id="2"></span>
                    <span class="dot" data-id="3"></span>
                </div>
            </div>
            <!-- services -->
            <div class="box services">
                <div class="box-header center">
                   <span class="box-header-dot"></span> Services We Offer
                </div>
                <div class="flex box-body">
                    <div class="services-wrapper">
                        <span class="service">
                            <img src="images/system/s1.jpg" alt="">
                            <div class="center">
                                <h3>Car Inspection</h3>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat laboriosam voluptate assumenda amet tempore quaerat?
                            </div>
                        </span>
                        <span class="service">
                            <img src="images/system/s2.jpg" alt="">
                            <div class="center">
                                <h3>Car cleaning</h3>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat laboriosam voluptate assumenda amet tempore quaerat?
                            </div>
                        </span>
                        <span class="service">
                            <img src="images/system/s3.jpg" alt="">
                            <div class="center">
                                <h3>Car Repair</h3>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat laboriosam voluptate assumenda amet tempore quaerat?
                            </div>
                        </span>
                        <span class="service">
                            <img src="images/system/s4.jpg" alt="">
                            <div class="center">
                                <h3>Consultation</h3>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat laboriosam voluptate assumenda amet tempore quaerat?
                            </div>
                        </span>
                    </div>
                </div>
            </div>
            <!-- Book appointment -->
            <div class="box appointment-wrapper">
                <div class="box-header center">
                    <span class="box-header-dot"></span> Request a Service
                </div>
                <div class="flex box-body">
                    <form action="">
                        <div class="appointment-inputs">
                            <span class="appointment-input">
                                <div class="">Full name</div>
                                <input type="text">
                            </span>
                            <span class="appointment-input">
                                <div class="appointment-input">Date</div>
                                <input type="date" name="date">
                            </span>
                            <span class="appointment-input description">
                                <div class="">Problem Description</div>
                                <textarea name="description" id=""></textarea>
                            </span>
                            <span class="appointment-input">
                                <div class="">Email</div>
                                <input type="email" name="email">
                            </span>
                            <span class="appointment-input">
                                <div class="appointment-input">Phone</div>
                                <input type="text" name="phone">
                            </span>
                            <span class="btn-appointment center">
                                <button class="btn btn-theme ">Book</button>
                            </span>
                        </div>
                        
                    </form>
                </div>
            </div>
            
            <!-- Team -->
            <div class="box team">
                <div class="box-header center">
                <span class="box-header-dot"></span> Meet our Team
                </div>
                <div class="flex box-body">
                    <div class="team-wrapper">
                        <span class="member">
                            <img src="images/employees/t1.jpg" alt="">
                            <div class="profile center">
                                <h2>John Doe</h2>
                                <h4>Mechanic</h4>
                                <div class="socials">
                                    <i class="fa fa-whatsapp"></i>
                                    <i class="fa fa-twitter"></i>
                                    <i class="fa fa-facebook"></i>
                                </div>
                            </div>
                        </span>
                        <span class="member">
                            <img src="images/employees/t2.jpg" alt="">
                            <div class="profile center">
                                <h2>John Doe</h2>
                                <h4>Mechanic</h4>
                                <div class="socials">
                                    <i class="fa fa-whatsapp"></i>
                                    <i class="fa fa-twitter"></i>
                                    <i class="fa fa-facebook"></i>
                                </div>
                            </div>
                        </span>
                        <span class="member">
                            <img src="images/employees/t3.jpg" alt="">
                            <div class="profile center">
                                <h2>John Doe</h2>
                                <h4>Mechanic</h4>
                                <div class="socials">
                                    <i class="fa fa-whatsapp"></i>
                                    <i class="fa fa-twitter"></i>
                                    <i class="fa fa-facebook"></i>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
            
            <!-- About Us -->
            <div class="box about-us-wrapper">
                <div class="box-header center">
                    <span class="box-header-dot"></span> About Us
                </div>
                <div class="flex box-body center">
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae ipsam quia iusto? Minus eos esse consectetur, non cumque impedit voluptates omnis doloremque, quisquam corporis blanditiis.
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit, saepe.
                    </p>
                    <div>
                        <button class="btn btn-theme-outline">Read more</i></button>
                    </div>
                </div>
            </div>
             <!-- Recent Testimonials -->
             <div class="box testimonials">
                <div class="box-header center">
                    <span class="box-header-dot"></span> Testimonials
                </div>
                <div class="flex box-body center">
                    <div class="carosel-wrapper">
                        <div class="carosel">
                            <div class="slide1 fade">
                                <div class="slide-content">
                                    <img src="images/profiles/no-profile.jpg" alt="">
                                    <p>
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit reiciendis nulla, nam quos praesentium placeat?
                                    </p>
                                </div>
                            </div>
                            <div class="slide1 fade">
                                <div class="slide-content">
                                    <img src="images/profiles/no-profile.jpg" alt="">
                                    <p>
                                        sentium placeat?
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-theme-outline carosel-back"><i class="fa fa-angle-left"></i></button>
                        <button class="btn btn-theme-outline carosel-forward"><i class="fa fa-angle-right"></i></button>
                    </div>
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