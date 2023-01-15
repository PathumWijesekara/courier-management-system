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
                <h3>Employee</h3>
            </div>
            <div class="row">
                <div class="col-lg-10">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Employee List</li>
                        </ol>
                    </nav>
                </div>
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin') : ?>
                    <div class="col-lg-2">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EmployeeModal"> Add
                            New</button>
                    </div>
                <?php endif; ?>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>NIC</th>
                                        <th>Address</th>
                                        <th>Branch</th>
                                        <th>Gender</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>

                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>NIC</th>
                                        <th>Address</th>
                                        <th>Branch</th>
                                        <th>Gender</th>

                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    if ($_SESSION['admin'] != 'admin') {
                                        $getall = getemployeeByEmail($_SESSION['admin']);
                                    } else {
                                        $getall = getAllemployee();
                                    }

                                    while ($row = mysqli_fetch_assoc($getall)) {
                                        $emp_id = $row['emp_id'];
                                    ?>


                                        <tr>

                                            <td>
                                                <?php echo $row['name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['email']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['phone']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['nic']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['address']; ?>
                                            </td>
                                            <td>
                                                <?php $getCat =  getBranchByID($row['branch_id']);
                                                if ($row4 = mysqli_fetch_assoc($getCat)) {
                                                    echo $row4['branch_name'];
                                                } ?>
                                            </td>
                                            <td>
                                                <?php if ($row['gender'] == "1") {
                                                    echo "Male";
                                                } else {
                                                    echo "Female";
                                                } ?>
                                            </td>
                                            <td> <a href="empolyee_edit.php?emp_id=<?php echo $emp_id; ?>" class="btn btn-darkblue"> <i class="fa-solid fa-edit"></i>
                                                </a>
                                                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin') : ?>
                                                    <button type="button" onclick="deleteData(<?php echo $row['emp_id']; ?>,'employee', 'emp_id')" class="btn btn-darkblue"> <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                <?php endif; ?>

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
    <div class="modal fade" id="EmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLabel">Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" id="basicform" data-parsley-validate="" enctype="multipart/form-data">
                    <div class="modal-body bg-white">
                        <form action="" method="post" id="basicform" data-parsley-validate="">
                            <div class="form-group mt-2">
                                <label for="inputName">Name</label>
                                <input id="inputName" type="text" name="name" data-parsley-trigger="change" required="" placeholder="Enter Full Name" autocomplete="off" class="form-control">
                            </div>

                            <div class="form-group mt-2">
                                <label for="inputEmail">Email address</label>
                                <input id="inputEmail" type="email" name="email" data-parsley-trigger="change" required="" placeholder="Enter email" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="inputPhone">Phone Number</label>
                                <input id="inputPhone" type="text" name="phone" data-parsley-trigger="change" required="" placeholder="Enter Phone Number" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="inputNIC">NIC</label>
                                <input id="inputNIC" type="text" name="nic" data-parsley-trigger="change" required="" placeholder="Enter NIC Number" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="inputNIC">Branch</label>
                                <select id="branch_id" class='form-control norad tx12' name="branch_id" type='text'>
                                    <?php $getall = getAllBranch();
                                    while ($row = mysqli_fetch_assoc($getall)) { ?>
                                        <option value="<?php echo $row['branch_id'] ?>">
                                            <?php echo $row['branch_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label for="inputAddress">Address</label>
                                <input id="inputAddress" type="text" name="address" data-parsley-trigger="change" required="" placeholder="Enter Address" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="inputGender">Gender</label>
                                <select class="form-select" name="gender" id="gender" aria-label="Default select example">
                                    <option value="1" selected>Male</option>
                                    <option value="0">Female</option>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label for="inputPassword">Password</label>
                                <input id="inputPassword" type="password" name="password" placeholder="Password" required="" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="inputRepeatPassword">Repeat Password</label>
                                <input id="inputRepeatPassword" data-parsley-equalto="#inputPassword" type="password" required="" name="conf_password" placeholder="Password" class="form-control">
                            </div>

                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                        <button type="button" onclick="addEmployee(this.form)" name="submit" class="btn btn-primary">Save
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