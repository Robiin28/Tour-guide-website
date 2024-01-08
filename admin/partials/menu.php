<?php 
include('../config/constant.php');
include('login-check.php');

?>
<?php

// if(isset($_SESSION['last-time'])){
    if((time()-$_SESSION['last-time'])>100){
        $_SESSION['time']="<div class='error text-center'> PLEASE LOGIN !!! </div>";
        header('location:'.SITEURL.'admin/login-admin.php');
    //  die();

    }


$_SESSION['last-time']=time();

?>
<DOCTYPE html>
    <html>
            <head>
                <title> RHO TOUR ADMIN PANEL </title>
                <link rel="stylesheet" href="../css/admin.css">
            <head>
        <body>
 <!-- menu section -->
            <div class="menu">
                <nav>
            <ul class="top" id="dropdown">
                <li><a href="index.php">Home</a></li>
                <li><a href="manage-tour.php">Tour</a></li>
                <li><a href="manage-destination.php">Destination</a></li>
                <li><a href="manage-hotel.php">Hotel</a></li>
                <li><a href="manage-booking.php">Booking</a></li>
                <li><a href="manage-review.php">Reviews</a></li>
                <li><a href="manage-user.php">User</a></li>
                <li><a href="manage-admin.php">Admin</a></li>
                <li><a href="login-admin.php">Log out</a></li>
                <li class="icon"><a href="javascript:void(0);" 
                    onclick="ico()">&#9776;</a></li>
                    <!-- <li><a href="#Address">Destination</a></li> -->

            </ul>
                 </nav>
             </div>