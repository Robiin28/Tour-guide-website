<?php

if(!isset($_SESSION['user']))//login is not set
{
//usr is not login
//redirect to login page
$_SESSION['log']="<div class='error text-center'>PLEASE LOGIN TO ACCESS ADMIN PANEL</div>";
//redirect
header('location:'.SITEURL.'admin/login-admin.php');
}

?>