<?php
if (session_id() == '') {
    session_start();
}

include 'inc/get.php';
include 'inc/connection.php';
include 'inc/update.php';
include 'inc/delete.php';
include 'inc/add.php';

if (isset($_GET['function_code']) && $_GET['function_code'] == 'getCustomerTbleData') {
    echo json_encode(getAllCustomer());
} else if (isset($_GET['function_code']) && $_GET['function_code'] == 'updateData') {
    updateDataTable($_POST);
} else if (isset($_GET['function_code']) && $_GET['function_code'] == 'insertImageUpload') {

    $img = $_FILES['file']['name'];
    $target_dir = "uploads/gallery/";
    $target_file = $target_dir . basename($img);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensions_arr = array("jpg", "jpeg", "png", "gif", "jfif", "svg", "webp");

    if (in_array($imageFileType, $extensions_arr)) {
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $img);
        insertImagetoGallery($img);
    }
} else if (isset($_GET['function_code']) && $_GET['function_code'] == 'imageUploadProducts') {

    $img = $_FILES['file']['name'];
    $target_dir = "uploads/products/";
    $target_file = $target_dir . basename($img);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensions_arr = array("jpg", "jpeg", "png", "gif", "jfif", "svg", "webp");

    if (in_array($imageFileType, $extensions_arr)) {
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $img);
        editImages($_POST, $img);
    }
} else if (isset($_GET['function_code']) && $_GET['function_code'] == 'addProducts') {

    $img = $_FILES['file']['name'];
    $target_dir = "uploads/products/";
    $target_file = $target_dir . basename($img);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensions_arr = array("jpg", "jpeg", "png", "gif", "jfif", "svg", "webp");
} else if (isset($_GET['function_code']) && $_GET['function_code'] == 'deleteData') {
    deleteDataTables($_POST);
} else if (isset($_GET['function_code']) && $_GET['function_code'] == 'permanantDeleteData') {
    permanantDeleteDataTable($_POST);
} else if (isset($_GET['function_code']) && $_GET['function_code'] == 'changesettings') {
    changePageSettings($_POST);
} else if (isset($_GET['function_code']) && $_GET['function_code'] == 'SettingImage') {

    $img = $_FILES['file']['name'];
    $target_dir = "uploads/settings/";
    $target_file = $target_dir . basename($img);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensions_arr = array("jpg", "jpeg", "png", "gif", "jfif", "svg", "webp");

    if (in_array($imageFileType, $extensions_arr)) {
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $img);
        editSettingImage($_POST, $img);
    }
} else if (isset($_GET['function_code']) && $_GET['function_code'] == 'login') {
    echo getLoginAdmin($_POST);
} else if (isset($_GET['function_code']) && $_GET['function_code'] == 'checkPasswordByEmail') {
    checkPasswordByName($_POST);
} else if (isset($_GET['function_code']) && $_GET['function_code'] == 'editQty') {
    editQtyinCart($_POST);
} else if (isset($_GET['function_code']) && $_GET['function_code'] == 'addcontact') {
    addMessage($_POST);
} else if (isset($_GET['function_code']) && $_GET['function_code'] == 'addCustomer') {
    createCustomer($_POST);
} else if (isset($_GET['function_code']) && $_GET['function_code'] == 'checkEmail') {
    checkUserEmail($_POST);
} else if (isset($_GET['function_code']) && $_GET['function_code'] == 'checkPassword') {
    checkuserPassword($_POST);
} else if (isset($_GET['function_code']) && $_GET['function_code'] == 'addEmployee') {
    addEmployee($_POST);
} else if (isset($_GET['function_code']) && $_GET['function_code'] == 'addBranch') {
    addBranch($_POST);
} else if (isset($_GET['function_code']) && $_GET['function_code'] == 'addPrice') {
    addPrice($_POST);
} else if (isset($_GET['function_code']) && $_GET['function_code'] == 'checkArea') {
    checkArea($_POST);
} else if (isset($_GET['function_code']) && $_GET['function_code'] == 'addArea') {
    addArea($_POST);
} else if (isset($_GET['function_code']) && $_GET['function_code'] == 'addRequest') {
    addRequest($_POST);
}
