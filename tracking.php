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
                                <li><a href="tracking.php" class="nav-link active">Tracking</a></li>
                                <li><a href="admin/logout.php" class="nav-link">Logout</a></li>
                            <?php else : ?>
                                <li><a href="admin/login.php" class="nav-link">Login</a></li>
                            <?php endif; ?>
                            <li><a href="request.php" class="nav-link ">Request</a></li>
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


                    <h1 class="text-white font-weight-light text-uppercase font-weight-bold" data-aos="fade-up">Tracking
                    </h1>

                </div>
            </div>
        </div>
    </div>



    <div class="site-section bg-light" id="section-contact">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center border-primary">
                    <h2 class="font-weight-light text-primary">Courier Tracking</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-5">

                    <?php
                    $getall = getAllTrackingByCUS($_SESSION['customer']);

                    while ($row = mysqli_fetch_assoc($getall)) {
                        $request_id = $row['request_id'];
                    ?>
                        <article class="card mt-5" style="border: 2px solid #2c3e50">
                            <header class="card-header text-white" style="background-color: #2c3e50; border-radius: 0px;">
                                Orders /
                                Tracking </header>
                            <div class="card-body">
                                <h6>Traking ID: #<?php echo $row['request_id']; ?> </h6>
                                <article class="card">
                                    <div class="card-body row">

                                        <div class="col"> <strong>Shipping Address:</strong>
                                            <br><?php echo $row['red_address']; ?>
                                        </div>
                                        <div class="col"> <strong>Recever Mobile:</strong>
                                            <br><?php echo $row['res_phone']; ?>
                                        </div>
                                        <div class="col"> <strong>Current Status:</strong>
                                            <br>
                                            <?php if ($row['tracking_status'] == 1) {
                                                echo 'Order Pending';
                                            } else if ($row['tracking_status'] == 2) {
                                                echo 'Prepare Order';
                                            } else if ($row['tracking_status'] == 3) {
                                                echo 'Shipped Order';
                                            } else if ($row['tracking_status'] == 4) {
                                                echo 'Deliverd';
                                            } else if ($row['tracking_status'] == 5) {
                                                echo 'Canceled';
                                            } ?>
                                        </div>
                                        <div class="col"> <strong>Requested Date:</strong>
                                            <br><?php echo $row['date_updated']; ?>
                                        </div>
                                    </div>
                                    <div class="card-body row">

                                        <div class="col"> <strong>Weight:</strong>
                                            <br><?php echo $row['weight']; ?>
                                        </div>
                                        <div class="col"> <strong>Sender Mobile:</strong>
                                            <br><?php echo $row['sender_phone']; ?>
                                        </div>
                                        <div class="col"> <strong>Send Location</strong>
                                            <br>
                                            <?php
                                            $getLocation = getAllAreabyID($row['send_location']);
                                            $row2 = mysqli_fetch_assoc($getLocation);
                                            echo $row2['area_name'];
                                            ?>
                                        </div>
                                        <div class="col"> <strong>End Location</strong>
                                            <br>
                                            <?php
                                            $getLocation = getAllAreabyID($row['end_location']);
                                            $row2 = mysqli_fetch_assoc($getLocation);
                                            echo $row2['area_name'];
                                            ?>
                                        </div>
                                    </div>
                                </article>
                                <?php if ($row['tracking_status'] != 5) { ?>
                                    <div class="track">

                                        <div class="step <?php if ($row['tracking_status'] == 1 || $row['tracking_status'] == 2 || $row['tracking_status'] == 3 || $row['tracking_status'] == 4) {
                                                                echo 'active';
                                                            } ?>">
                                            <span class="icon"> <i class="fa fa-check"></i> </span>
                                            <span class="text">Order Pending</span>
                                        </div>
                                        <div class="step <?php if ($row['tracking_status'] == 2 || $row['tracking_status'] == 3 || $row['tracking_status'] == 4) {
                                                                echo 'active';
                                                            } ?>">
                                            <span class="icon"> <i class="fa fa-user"></i> </span>
                                            <span class="text">Prepare Order</span>
                                        </div>
                                        <div class="step <?php if ($row['tracking_status'] == 3 || $row['tracking_status'] == 4) {
                                                                echo 'active';
                                                            } ?>">
                                            <span class="icon"> <i class="fa fa-truck"></i> </span>
                                            <span class="text"> Shipped Order </span>
                                        </div>
                                        <div class="step <?php if ($row['tracking_status'] == 4) {
                                                                echo 'active';
                                                            } ?>">
                                            <span class="icon"> <i class="fa fa-box"></i> </span>
                                            <span class="text">Deliverd</span>
                                        </div>
                                    </div>
                                <?php } ?>
                                <hr>
                                <div class="row">

                                    <?php if ($row['tracking_status'] == "1") { ?>
                                        <div class="col-md-3">
                                            <label for="tracking_status" class="form-label">Order Cancel</label>
                                            <select onchange='updateDataFromHome(this, "<?php echo $request_id; ?>","tracking_status", "request", "request_id")' id="tracking_status <?php echo $request_id; ?>" class='form-control norad tx12' name="tracking_status" type='text'>
                                                <option value="1">Please Select</option>
                                                <option value="5" <?php if ($row['tracking_status'] == "5") echo "selected"; ?>>
                                                    Canceled
                                                </option>
                                            </select>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="row mt-3">

                                    <a href="admin/getbill.php?customer_id=<?php echo $_SESSION['customer']; ?>" class="btn btn-darkblue">Print <i class="fa-solid fa-file-pdf"></i></a>
                                </div>
                            </div>
                        </article>
                    <?php } ?>

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

    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

        body {
            background-color: #eeeeee;
            font-family: 'Open Sans', serif
        }


        .card {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 0.10rem
        }

        .card-header:first-child {
            border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
        }

        .card-header {
            padding: 0.75rem 1.25rem;
            margin-bottom: 0;
            background-color: #fff;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1)
        }

        .track {
            position: relative;
            background-color: #ddd;
            height: 7px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin-bottom: 60px;
            margin-top: 50px
        }

        .track .step {
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            width: 25%;
            margin-top: -18px;
            text-align: center;
            position: relative
        }

        .track .step.active:before {
            background: #2c3e50
        }

        .track .step::before {
            height: 7px;
            position: absolute;
            content: "";
            width: 100%;
            left: 0;
            top: 18px
        }

        .track .step.active .icon {
            background: #2c3e50;
            color: #fff
        }

        .track .icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            position: relative;
            border-radius: 100%;
            background: #ddd
        }

        .track .step.active .text {
            font-weight: 400;
            color: #000
        }

        .track .text {
            display: block;
            margin-top: 7px
        }

        .itemside {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            width: 100%
        }

        .itemside .aside {
            position: relative;
            -ms-flex-negative: 0;
            flex-shrink: 0
        }

        .img-sm {
            width: 80px;
            height: 80px;
            padding: 7px
        }

        ul.row,
        ul.row-sm {
            list-style: none;
            padding: 0
        }

        .itemside .info {
            padding-left: 15px;
            padding-right: 7px
        }

        .itemside .title {
            display: block;
            margin-bottom: 5px;
            color: #212529
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem
        }

        .btn-warning {
            color: #ffffff;
            background-color: #2c3e50;
            border-color: #2c3e50;
            border-radius: 1px
        }

        .btn-warning:hover {
            color: #ffffff;
            background-color: #ff2b00;
            border-color: #ff2b00;
            border-radius: 1px
        }
    </style>
</body>

</html>