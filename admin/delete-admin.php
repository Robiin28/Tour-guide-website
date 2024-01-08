<?php include('../config/constant.php');?>
<?php 
//appropriate admin who logged in can delete another admin
if(isset($_SESSION['user']))//login is not set
{
//usr is login
//redirect to login page

}
else{
    $_SESSION['no-login']="<div class='error text-center'>PLEASE LOGIN TO ACCESS ADMIN PANAL</div>";
    //redirect
    header('location:'.SITEURL.'admin/login-admin.php');
}
?>

<!-- only need for deletion -->
<?php

// get the id of admin to delete
$id=$_GET['id'];
//create sql query to delete admin
$sql ="DELETE FROM tbl_admins WHERE id=$id ";
//execute the query
$res =mysqli_query($conn,$sql);
//check whether the query is executed successfully or no
if($res==TRUE){
    //admin deleted successfully
    //create session variable to show message
    $_SESSION['delete']="<div class='success'>Admin Deleted Successfully </div>";
    //redirect to manage admin page
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else{
    //failed to delete admin
    $_SESSION['delete']="<div class='error'>Failed TO Deleted Admin </div>";
    //redirect to manage admin page
    header('location:'.SITEURL.'admin/manage-admin.php');
}
?>