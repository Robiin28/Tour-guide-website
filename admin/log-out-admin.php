<?php include('../config/constant.php');
//1. Destroy the session
session_destroy();
//redirect
header('location:'.SITEURL.'admin/login-admin.php');

?>
