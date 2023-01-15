<!DOCTYPE html>
<html lang="en">

<?php include 'pages/head.php'; ?>
<?php include 'admin.php'; ?>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between mt-0 px-2">

                        <h1 class="mb-0"><a href="index.php" class="text-warning h5 mb-0 px-2 ">Royal Express </a></h1>

                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-item active ">
                            <a href="index.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="customer.php" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
                                <span>Customer</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="price.php" class='sidebar-link'>
                                <i class="bi bi-table"></i>
                                <span>Price Table</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="courier.php" class='sidebar-link'>
                                <i class="bi bi-truck"></i>
                                <span>Courier</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="message.php" class='sidebar-link'>
                                <i class="bi bi-chat"></i>
                                <span>Message</span>
                            </a>
                        </li>
                        <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin') : ?>
                            <li class="sidebar-item">
                                <a href="branch.php" class='sidebar-link'>
                                    <i class="bi bi-columns"></i>
                                    <span>Branches</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="sidebar-item">
                            <a href="employee.php" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i>
                                <span>Employee </span>
                            </a>
                        </li>
                        <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin') : ?>
                            <li class="sidebar-item">
                                <a href="area.php" class='sidebar-link'>
                                    <i class="bi bi-geo-alt-fill"></i>
                                    <span>Area</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="gallery.php" class='sidebar-link'>
                                    <i class="bi bi-images"></i>
                                    <span>Gallery</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="settings.php" class='sidebar-link'>
                                    <i class="bi bi-gear-fill"></i>
                                    <span>Settings</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="sidebar-item">
                            <a href="logout.php" class='sidebar-link'>
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Log Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Courier Request</h3>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Courier List</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <a href="add_courier.php" class="btn btn-primary"> Register Customer</a>
                </div>
                <div class="col-lg-3">
                    <a href="add_request.php" class="btn btn-primary"> Add
                        Courier Request</a>
                </div>
            </div>
            <div class="page-content">
                <?php
                $getall = getAllTracking();

                while ($row = mysqli_fetch_assoc($getall)) {
                    $request_id = $row['request_id'];
                ?>
                    <article class="card mt-5" style="border: 2px solid #2c3e50">
                        <header class="card-header text-white" style="background-color: #2c3e50; border-radius: 0px;">
                            Orders /
                            Tracking </header>
                        <div class="card-body mt-3">
                            <h6>Traking ID: #<?php echo $row['request_id']; ?> </h6>
                            <article class="card">
                                <div class="card-body row">

                                    <div class="col"> <strong>Shipping Address:</strong>
                                        <br><?php echo $row['name']; ?>
                                        <br><?php echo $row['phone']; ?>
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
                                        <span class="text">Order confirmed</span>
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


                                <div class="col-md-5">
                                    <label for="tracking_status" class="form-label">Order Status</label>
                                    <select onchange='updateData(this, "<?php echo $request_id; ?>","tracking_status", "request", "request_id")' id="tracking_status <?php echo $request_id; ?>" class='form-control norad tx12' name="tracking_status" type='text'>
                                        <option value="1" <?php if ($row['tracking_status'] == "1") echo "selected"; ?>>
                                            Order Pending
                                        </option>
                                        <option value="2" <?php if ($row['tracking_status'] == "2") echo "selected"; ?>>
                                            Prepare Order
                                        </option>
                                        <option value="3" <?php if ($row['tracking_status'] == "3") echo "selected"; ?>>
                                            Shipped Order
                                        </option>
                                        <option value="4" <?php if ($row['tracking_status'] == "4") echo "selected"; ?>>
                                            Deliverd
                                        </option>
                                        <option value="5" <?php if ($row['tracking_status'] == "5") echo "selected"; ?>>
                                            Canceled
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="tracking_status" class="form-label">Order Delete : </label>
                                    <button type="button" onclick="deleteData(<?php echo $row['request_id']; ?>,'request', 'request_id')" class="btn btn-darkblue"> <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </article>
                <?php } ?>
            </div>

            <?php include 'pages/footer.php'; ?>
        </div>
    </div>


    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
</body>
<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

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

</html>