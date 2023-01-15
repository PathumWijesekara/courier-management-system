<?php 

if (session_id() == '') {
    session_start();
}

    if(!isset($_SESSION['customer'])){
        header("Location: admin/login.php");
    }else{
        $getall = getAllcustomerById($_SESSION['customer']);
        $cus=mysqli_fetch_assoc($getall);
        $customer_id = $cus['customer_id']; 
    }
?>