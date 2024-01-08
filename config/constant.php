<?php
//start session
session_start();
    //create data base connection
    //by default username is root and password is blank
    //create constant to store non repeatable values
    //constant name capital letter
    
    define('SITEURL','http://localhost/turd/');
    define('LOCALHOST','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','tourist');
    

$conn =mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
//selecting database
$db_select =mysqli_select_db($conn, DB_NAME) or die(mysqli_error());



?>