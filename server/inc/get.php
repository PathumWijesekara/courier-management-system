<?php


function getAllBranch()
{
    include 'connection.php';

    $viewcat = "SELECT * FROM branch WHERE is_deleted = 0";
    return mysqli_query($con, $viewcat);
}
function getAllArea()
{
    include 'connection.php';

    $viewcat = "SELECT * FROM area WHERE is_deleted = 0";
    return mysqli_query($con, $viewcat);
}
function getAllAreabyID($area_id)
{
    include 'connection.php';

    $viewcat = "SELECT * FROM area WHERE is_deleted = 0 AND area_id = '$area_id'";
    return mysqli_query($con, $viewcat);
}
function getAllPrice()
{
    include 'connection.php';

    $viewcat = "SELECT * FROM price_table WHERE is_deleted = 0";
    return mysqli_query($con, $viewcat);
}

function checkPrice($start_area, $end_area)
{
    include 'connection.php';

    $viewcat = "SELECT * FROM price_table WHERE is_deleted = 0 AND start_area = '$start_area' AND end_area = '$end_area'";
    return mysqli_num_rows(mysqli_query($con, $viewcat));
}

function getBille($customer_id)
{
    include 'connection.php';

    $q1 = "SELECT * FROM request join customer on customer.customer_id = request.customer_id WHERE request.customer_id = '$customer_id' ";
    return mysqli_query($con, $q1);
}

//product

function getAllemployee()
{
    include 'connection.php';

    $q1 = "SELECT * FROM employee WHERE is_deleted = 0 AND email != 'admin'";
    return mysqli_query($con, $q1);
}

function getemployeeByID($emp_id)
{
    include 'connection.php';

    $q1 = "SELECT * FROM employee WHERE is_deleted = 0 AND emp_id = '$emp_id'";
    return mysqli_query($con, $q1);
}

function getemployeeByEmail($email)
{
    include 'connection.php';

    $q1 = "SELECT * FROM employee WHERE is_deleted = 0 AND email = '$email'";
    return mysqli_query($con, $q1);
}

function getBranchByID($branch_id)
{
    include 'connection.php';

    $q1 = "SELECT * FROM branch WHERE is_deleted = 0 AND branch_id = '$branch_id'";
    return mysqli_query($con, $q1);
}

function getAllTrackingByCUS($customer_id)
{
    include 'connection.php';

    $viewcat = "SELECT * FROM request WHERE is_deleted = 0 AND customer_id = '$customer_id' ORDER BY date_updated DESC";
    return mysqli_query($con, $viewcat);
}

function getAllTracking()
{
    include 'connection.php';

    $viewcat = "SELECT * FROM request join customer on customer.customer_id = request.customer_id WHERE request.is_deleted = 0 ORDER BY date_updated DESC";
    return mysqli_query($con, $viewcat);
}

function checkemployeetByEmail($email)
{
    include 'connection.php';

    $employee = "SELECT * FROM employee WHERE email = '$email' AND is_deleted = 0";
    $result = mysqli_query($con, $employee);

    $customer = "SELECT * FROM customer WHERE email = '$email' AND is_deleted = 0";
    $cus_res = mysqli_query($con, $customer);

    if (mysqli_num_rows($result) > 0) {
        return mysqli_num_rows($result);
    } else if (mysqli_num_rows($cus_res) > 0) {
        return mysqli_num_rows($cus_res);
    } else {
        return 0;
    }
}

function getAllgalleryImages()
{
    include 'connection.php';

    $q1 = "SELECT * FROM gallery";
    return mysqli_query($con, $q1);
}

//customer


function checkuserPassword($data)
{
    include 'connection.php';
    $customer_id = $data['customer_id'];
    $password = $data['password'];

    $viewcat = "SELECT * FROM customer WHERE is_deleted = 0 AND password = '$password' AND customer_id = '$customer_id' ";
    $result = mysqli_query($con, $viewcat);
    $count = mysqli_num_rows($result);
    echo $count;
}

function checkArea($data)
{
    include 'connection.php';

    $start_area = $data['send_location'];
    $end_area = $data['end_location'];

    $viewcat = "SELECT * FROM price_table WHERE is_deleted = 0 AND start_area = '$start_area' AND end_area = '$end_area' ";
    $result = mysqli_query($con, $viewcat);
    $row = mysqli_fetch_assoc($result);
    echo $row['price'];
}

function checkAreaByName($area_name)
{
    include 'connection.php';

    $q1 = "SELECT * FROM area WHERE area_name = '$area_name' AND is_deleted = 0";
    $res =  mysqli_query($con, $q1);
    return mysqli_num_rows($res);
}

function checkUserEmail($data)
{
    include 'connection.php';

    $customer_id = $data['customer_id'];
    $email = $data['email'];

    $viewcat = "SELECT * FROM customer WHERE is_deleted = 0 AND email = '$email' AND customer_id = '$customer_id' ";
    $result = mysqli_query($con, $viewcat);
    $count = mysqli_num_rows($result);
    echo $count;
}

function getAllcustomerById($customer_id)
{
    include 'connection.php';

    $q1 = "SELECT * FROM customer WHERE is_deleted = '0' AND customer_id = '$customer_id'";
    return mysqli_query($con, $q1);
}

function getAllcustomers()
{
    include 'connection.php';

    $q1 = "SELECT * FROM customer WHERE is_deleted = 0 AND email != 'admin'";
    return mysqli_query($con, $q1);
}

function getLoginAdmin($data)
{
    include 'connection.php';

    $email = $data['email'];
    $password = $data['password'];

    $loginAdmin = "SELECT * FROM employee WHERE email = '$email' AND password ='$password'";
    $countloginAdmin = mysqli_query($con, $loginAdmin);
    $counts_loginAdmin = mysqli_num_rows($countloginAdmin);

    $loginCustomer = "SELECT * FROM customer WHERE email = '$email' AND password ='$password'";
    $count_loginCustomer = mysqli_query($con, $loginCustomer);
    $counts_loginCustomer = mysqli_num_rows($count_loginCustomer);

    $value = "";

    if ($counts_loginAdmin > 0) {

        $value = 'admin';

        $res = checkemployee($email);
        $row = mysqli_fetch_assoc($res);
        $_SESSION['admin'] = $row['email'];
    } else if ($counts_loginCustomer > 0) {

        $value = 'customer';

        $res = checkCustomerByEmail($email);
        $row = mysqli_fetch_assoc($res);
        $_SESSION['customer'] = $row['customer_id'];
    }
    echo $value;
}

function checkemployee($email)
{
    include 'connection.php';

    $q1 = "SELECT * FROM employee WHERE email='$email' AND is_deleted='0'";
    return mysqli_query($con, $q1);
}

function checkCustomerByEmail($email)
{
    include 'connection.php';

    $q1 = "SELECT * FROM customer WHERE email='$email' AND is_deleted='0'";
    return mysqli_query($con, $q1);
}


function checkCustomerByID($customer_id)
{
    include 'connection.php';

    $q1 = "SELECT * FROM customer WHERE customer_id='$customer_id' AND is_deleted = '0'";
    return mysqli_query($con, $q1);
}

function getAllCustomer()
{
    include 'connection.php';

    $q1 = "SELECT * FROM customer WHERE is_deleted = '0' AND email != 'admin'";
    $table = mysqli_query($con, $q1);
    $columns = mysqli_fetch_all($table, MYSQLI_ASSOC);

    return $columns;
}


//contact

function getAllMessages()
{
    include 'connection.php';

    $messages = "SELECT * FROM contact";
    return mysqli_query($con, $messages);
}

//count

function dataCount($table)
{
    include 'connection.php';

    $counts = "SELECT * FROM $table WHERE is_deleted = 0";
    $res =  mysqli_query($con, $counts);
    $count =  mysqli_num_rows($res);
    echo $count;
}

function dataCountWhere($table, $where)
{
    include 'connection.php';

    $counts = "SELECT * FROM $table WHERE $where AND is_deleted = 0";
    $res =  mysqli_query($con, $counts);
    $count =  mysqli_num_rows($res);
    echo $count;
}

function dataforCount($table)
{
    include 'connection.php';

    $counts = "SELECT sum(total) as sum FROM $table WHERE is_deleted = 0";
    return mysqli_query($con, $counts);
}

function dataforCountToday($table)
{
    include 'connection.php';

    $counts = "SELECT sum(total) as sum FROM $table WHERE month(now()) = month(date_updated) AND is_deleted = 0s";
    return mysqli_query($con, $counts);
}


//settings

function getAllSettings()
{
    include 'connection.php';

    $settings = "SELECT * FROM settings";
    return mysqli_query($con, $settings);
}

function checkPasswordByName($data)
{
    include 'connection.php';
    $email = $data['email'];
    $password = $data['password'];

    $viewcat = "SELECT * FROM employee WHERE password = '$password' AND email = '$email' ";
    $result = mysqli_query($con, $viewcat);
    $count = mysqli_num_rows($result);
    echo $count;
}

function getAllCart($customer_id)
{
    include 'connection.php';

    $q1 = "SELECT * FROM cart join products on products.pid = cart.pid join customer on customer.customer_id = cart.customer_id WHERE cart.customer_id = '$customer_id'";
    return mysqli_query($con, $q1);
}


function getAllOrdersByCustomer($customer_id)
{
    include 'connection.php';

    $viewcat = "SELECT * FROM product_orders WHERE customer_id = '$customer_id' AND is_deleted = '0' ORDER BY date_updated DESC";
    return mysqli_query($con, $viewcat);
}

function getAllOrderItemsBYOrder($order_id)
{
    include 'connection.php';

    $viewcat = "SELECT * FROM order_items join products on order_items.pid = products.pid WHERE order_items.order_id = '$order_id'";
    return mysqli_query($con, $viewcat);
}

function getAllOrders()
{
    include 'connection.php';

    $viewcat = "SELECT * FROM product_orders join customer on customer.customer_id = product_orders.customer_id  WHERE product_orders.is_deleted = '0' ORDER BY date_updated DESC";
    return mysqli_query($con, $viewcat);
}

function getAllOrdersPending()
{
    include 'connection.php';

    $viewcat = "SELECT * FROM product_orders join customer on customer.customer_id = product_orders.customer_id  WHERE product_orders.is_deleted = '0' AND product_orders.order_status = '1' ORDER BY date_updated DESC";
    return mysqli_query($con, $viewcat);
}

function getAllOrderItems($order_id)
{
    include 'connection.php';

    $viewcat = "SELECT * FROM order_items join products on order_items.pid = products.pid WHERE order_items.order_id = '$order_id'";
    return mysqli_query($con, $viewcat);
}
