<?php
ob_start();
session_start();
@$userId = $_SESSION['orderCode'];
include_once 'dbconfig.php';
?>