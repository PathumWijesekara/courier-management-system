<!DOCTYPE html>
<html lang="en">

<?php include 'pages/head.php'; ?>

<body>
    <div id=" auth">

        <div class="row">
            <div class="d-flex justify-content-center align-items-center ">
                <div class="col-md-5 p-5 shadow-sm border rounded-5 border-primary bg-white">
                    <h2 class="text-center mb-4 text-primary">Royal Express - Sign Up</h2>
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="name" class="form-control border border-primary" name="name" id="name" aria-describedby="nameHelp">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control border border-primary" name="email" id="email" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="phone" class="form-control border border-primary" name="phone" id="phone" aria-describedby="phoneHelp">
                        </div>
                        <div class="mb-3">
                            <label for="nic" class="form-label">NIC Number</label>
                            <input type="nic" class="form-control border border-primary" name="nic" id="nic" aria-describedby="nicHelp">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="address" class="form-control border border-primary" name="address" id="address" aria-describedby="addressHelp">
                        </div>

                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-control" name="gender" id="gender" aria-label="Default select example">
                                <option value="1" selected>Male</option>
                                <option value="0">Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control border border-primary" name="password" id="password">
                        </div>
                        <div class="mb-3">
                            <label for="conf_password" class="form-label">Confirm - Password</label>
                            <input type="password" class="form-control border border-primary" name="conf_password" id="conf_password">
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary" onclick="addCustomer(this.form)" type="button">Sign Up</button>
                        </div>
                    </form>
                    <div class="mt-3">
                        <p class="mb-0  text-center">Don't have an account? <a href="login.php" class="text-primary fw-bold">Sign
                                in</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">

            </div>
        </div>
    </div>

</body>

</html>