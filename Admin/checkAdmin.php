<?php 

if(session_id() == '') {
    session_start();
}

    if($_SESSION['admin'] != 'admin'){
        header("Location: login.php");
    }
?>