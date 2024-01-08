<?php
    //create data base connection
    //by default username is root and password is blank
    //create constant to store non repeatable values
    //constant name capital letter
    define('LOCALHOST','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','password');
    define('DB_NAME','tourist');

$conn =mysqli_connect('localhost','root','') or die(mysqli_error());
//selecting database
$db_select =mysqli_select_db($conn, 'tourist') or die(mysqli_error());



?>