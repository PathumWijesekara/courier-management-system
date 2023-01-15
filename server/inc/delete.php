<?php

function deleteDataTables($data){
    include 'connection.php';

    $id_fild =  $data['id_fild'];
    $id =  $data['id'];
    $table = $data['table'];

    $sql = "UPDATE $table SET is_deleted = '1' where $id_fild='$id'";
    return mysqli_query($con, $sql);	
}

function permanantDeleteDataTable($data){
    include 'connection.php';

    $id_fild =  $data['id_fild'];
    $id =  $data['id'];
    $table = $data['table'];

    $sql = "DELETE FROM $table WHERE $id_fild = $id";
    return mysqli_query($con, $sql);	
}


function deleteAllCartItems($customer_id){

	include 'connection.php';

	$sql2 = "DELETE FROM cart where customer_id = $customer_id";
    return mysqli_query($con, $sql2);
}


?>