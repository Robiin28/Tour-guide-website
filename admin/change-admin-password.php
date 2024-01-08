<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper ">
              <h1> Change Admin Password</h1>
              <br><br>
              <?php
              // get the id of selected admin
              $id=$_GET['id'];
              ?>
                 <?php
                     if(isset($_SESSION['pwd-not-match']))
                       {
                         echo $_SESSION['pwd-not-match'];
                         unset($_SESSION['pwd-not-match']);
                       }
                 ?>
              <form action="" method="post">
                <table class="tbl-30">
                    <tr>
                        <td> Old Password </td>
                        <td>
                        <input type="password" name="current_password" placeholder="current_password">
                        </td>
                    </tr>
                    <tr>
                        <td> New Password </td>
                        <td>
                        <input type="Password" name="new_password" placeholder="New password">
                        </td>
                    </tr>
                    <tr>
                        <td> Confirm Password </td>
                        <td>
                        <input type="Password" name="confirm_password" placeholder="confirm password">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="update Password" class="btn-secondary">
                        </td>
                        </tr>
                </table>

            </form>
</div>
</div>
<?php
//check whether the submit button is clicked or not
if(isset($_POST['submit']))
{
    // echo"button clicked";
    ///get the data 
    $id=$_POST['id'];
    $current_password=md5($_POST['current_password']);
    // echo $id;
    $new_password=md5($_POST['new_password']);
    $confirm_password=md5($_POST['confirm_password']);
    //check the current id and password exist or not
    $sql="SELECT*FROM tbl_admins WHERE id=$id AND password='$current_password'";
    //execute the query
    $res=mysqli_query($conn,$sql);

    if($res==TRUE){
        $count=mysqli_num_rows($res);
        if($count==1)
        {
            // user exists and password can be changed
            // echo"user found";
            // check the new password and confirm password match
                 if($new_password==$confirm_password)
                    {
                         //change password
                         // echo"Password matches";
                         $sql2="UPDATE tbl_admins SET
                          password='$new_password'
                          WHERE id=$id
                          ";
                        //Execute the query
                         $res2=mysqli_query($conn,$sql2);
                        // check whether the query is executed or not
                                if($res2==TRUE)
                                    {
                                      //display session message
                                       $_SESSION['update-password']="<div class='success'> Password changed successfully. </div>";
                                       header('location:'.SITEURL."admin/manage-admin.php");
                                    }
                                else{
                                    $_SESSION['update-password']="<div class='error'> Failed to change Password. </div>";
                                    header('location:'.SITEURL."admin/manage-admin.php");
                                    }

                     }
                    else
                    {
                         //session message for confirm and new password didn't match
                         $_SESSION['pwd-not-match']="<div class='error'> Password did not match. </div>";
                         header('location:'.SITEURL.'admin/change-admin-password.php');
                    }

}
  else
  {
    //  user does not exist set message
     $_SESSION['user-not-found']="<div class='error'> User Not Found. </div>";
     header('location:'.SITEURL.'admin/manage-admin.php');
  }
}
    // check password and confirm password match
    //change password if conditions are met
}
?>
<?php include('partials/footer.php');?>