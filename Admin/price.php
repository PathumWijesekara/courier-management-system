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
                                    <span>Branchs</span>
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
                        <?php endif; ?>
                        <li class="sidebar-item">
                            <a href="settings.php" class='sidebar-link'>
                                <i class="bi bi-gear-fill"></i>
                                <span>Settings</span>
                            </a>
                        </li>

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
                <h3>Price List</h3>
            </div>
            <div class="row">
                <div class="col-lg-10">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Price List</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-2">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#PriceModal"> Add
                        New</button>
                </div>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Start Area</th>
                                        <th>End Area</th>
                                        <th>Price</th>
                                        <th>Date</th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $getall = getAllPrice();

                                    while ($row = mysqli_fetch_assoc($getall)) {

                                        $price_id = $row['price_id']; ?>


                                        <tr>
                                            <td><select onchange="updateData(this, '<?php echo $price_id; ?>', 'start_area', 'price_table', 'price_id');" id="start_area <?php echo $price_id; ?>" class='form-control norad tx12' name="start_area" type='text'>
                                                    <?php
                                                    $getallCat = getAllArea();
                                                    while ($row2 = mysqli_fetch_assoc($getallCat)) { ?>

                                                        <option value="<?php echo $row2['area_id']; ?>" <?php if ($row['start_area'] == $row2['area_id']) echo "selected"; ?>>
                                                            <?php echo $row2['area_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>

                                            <td><select onchange="updateData(this, '<?php echo $price_id; ?>', 'end_area', 'price_table', 'price_id');" id="end_area <?php echo $price_id; ?>" class='form-control norad tx12' name="end_area" type='text'>
                                                    <?php
                                                    $getallCat = getAllArea();
                                                    while ($row2 = mysqli_fetch_assoc($getallCat)) { ?>

                                                        <option value="<?php echo $row2['area_id']; ?>" <?php if ($row['end_area'] == $row2['area_id']) echo "selected"; ?>>
                                                            <?php echo $row2['area_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>

                                            <td>
                                                <input type="number" id="price" name="price" required="required" onchange="updateData(this, '<?php echo $price_id; ?>', 'price', 'price_table', 'price_id');" value="<?php echo $row['price']; ?>" class="form-control col-md-7 col-xs-12">
                                            </td>
                                            <td><?php echo $row['date_updated']; ?></td>
                                            <td>

                                                <button type="button" onclick="deleteData(<?php echo $row['price_id']; ?>, 'price_table', 'price_id')" class="btn btn-darkblue"> <i class="fa-solid fa-trash"></i>
                                                </button>

                                            </td>
                                        </tr>

                                    <?php } ?>

                                </tbody>
                            </table>

                        </div>
                    </div>

                </section>
            </div>

            <?php include 'pages/footer.php'; ?>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="PriceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Price List</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" id="basicform" data-parsley-validate="" enctype="multipart/form-data">
                    <div class="modal-body bg-white">
                        <form action="" method="post" id="basicform" data-parsley-validate="">

                            <div class="col-md-12 mt-2">
                                <label for="start_area" class="form-label">Start Area</label>
                                <select id="start_area" class='form-control norad tx12' name="start_area" type='text'>
                                    <?php $getall = getAllArea();
                                    while ($row = mysqli_fetch_assoc($getall)) { ?>
                                        <option value="<?php echo $row['area_id'] ?>">
                                            <?php echo $row['area_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label for="end_area" class="form-label">End Area</label>
                                <select id="end_area" class='form-control norad tx12' name="end_area" type='text'>
                                    <?php $getall = getAllArea();
                                    while ($row = mysqli_fetch_assoc($getall)) { ?>
                                        <option value="<?php echo $row['area_id'] ?>">
                                            <?php echo $row['area_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-md-12 mt-2">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" name="price" id="price" placeholder="Price" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                        <button type="button" onclick="addPrice(this.form)" name="submit" class="btn btn-primary">Save
                            changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>