

<?php

if(!isset($_SESSION['usered']))//login is not set
{
//usr is not login
//redirect to login page
$_SESSION['login']="<div class='error text-center'>PLEASE LOGIN TO ACCESS TH WEBSITE</div>";
//redirect
header('location:'.SITEURL.'/screens/login.php');
}

?>