<?php

if (session_id() == '') {
    session_start();
}

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
}
