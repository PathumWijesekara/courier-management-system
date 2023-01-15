<!DOCTYPE html>
<html lang="en">
<?php include 'pages/head.php'; ?>
<?php include 'auth.php'; ?>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="200">

    <!-- <div class="site-wrap"> -->

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar py-3 js-site-navbar site-navbar-target" role="banner" id="site-navbar">

        <div class="container">
            <div class="row align-items-center">

                <div class="col-11 col-xl-2 site-logo">
                    <h1 class="mb-0"><a href="index.php" class="text-white h5 mb-0">Royal Express</a></h1>
                </div>
                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">

                        <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                            <li><a href="index.php#section-home" class="nav-link">Home</a></li>
                            <li>
                                <a href="index.php#section-about" class="nav-link">About Us</a>
                            </li>
                            <li><a href="index.php#section-gallery" class="nav-link">Gallery</a></li>
                            <li><a href="index.php#section-contact" class="nav-link">Contact</a></li>
                            <?php if (isset($_SESSION['customer'])) : ?>
                                <li><a href="profile.php" class="nav-link">Profile</a></li>
                                <li><a href="tracking.php" class="nav-link">Tracking</a></li>
                                <li><a href="admin/logout.php" class="nav-link">Logout</a></li>
                            <?php else : ?>
                                <li><a href="admin/login.php" class="nav-link">Login</a></li>
                            <?php endif; ?>
                            <li><a href="request.php" class="nav-link active">Request</a></li>
                        </ul>
                    </nav>
                </div>


                <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a></div>

            </div>

        </div>
        </div>

    </header>



    <div class="site-blocks-cover overlay" style=" height: 100px; background-image: url(<?php echo $subheader_src; ?>);" data-aos="fade" data-stellar-background-ratio="0.5" id="section-home">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">


                    <h1 class="text-white font-weight-light text-uppercase font-weight-bold" data-aos="fade-up">REQUEST
                    </h1>

                </div>
            </div>
        </div>
    </div>



    <div class="site-section bg-light" id="section-contact">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center border-primary">
                    <h2 class="font-weight-light text-primary">Make Request</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-5">



                    <form action="#" class="p-5 bg-white" method="post">


                        <h4>Sending Details</h4>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="text-black" for="send_phone">Phone Number</label>
                                        <input type="text" name="sender_phone" id="sender_phone" class="form-control">
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="text-black" for="weight">Weight</label>
                                        <input type="number" name="weight" id="weight" class="form-control">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="text-black" for="fname">Sending Location</label>
                                        <select id="send_location" class='form-control norad tx12' name="send_location" type='text'>
                                            <option>Please Select</option>
                                            <?php $getall = getAllArea();
                                            while ($row = mysqli_fetch_assoc($getall)) { ?>
                                                <option value="<?php echo $row['area_id'] ?>">
                                                    <?php echo $row['area_name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="text-black" for="fname">Pick Up Location</label>
                                        <select id="end_location" onchange="calculation(this)" class='form-control norad tx12' name="end_location" type='text'>
                                            <option>Please Select</option>
                                            <?php $getall = getAllArea();
                                            while ($row = mysqli_fetch_assoc($getall)) { ?>
                                                <option value="<?php echo $row['area_id'] ?>">
                                                    <?php echo $row['area_name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mt-5">
                                <div class="row form-group">

                                    <div class="col-md-12">
                                        <label class="text-black" for="email">Shipping details</label>

                                        <div class="row">
                                            <div class="col-md-6">
                                                Price :
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" disabled name="total" id="total" class="form-control">
                                                <input type="hidden" name="total_fee" id="total_fee" class="form-control">
                                                <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $_SESSION['customer']; ?>" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="mt-5">Receiver Details</h4>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="text-black" for="res_name">Receiver Name</label>
                                        <input type="text" name="res_name" id="res_name" class="form-control">
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="text-black" for="res_phone">Phone Number</label>
                                        <input type="text" name="res_phone" id="res_phone" class="form-control">
                                    </div>
                                </div>


                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="red_address">Receiver Address</label>
                                <textarea name="red_address" id="red_address" cols="30" rows="7" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="button" onclick="addRequest(this.form)" value="Send Request" class="btn btn-primary py-2 px-4 text-white">
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'pages/footer.php'; ?>
    <!-- </div> -->

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

</body>

</html>