<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper ">
              <h1> Change User Password</h1>
              <br><br>
              <?php
              // get the id of selected admin
              $id=$_GET['id'];
              ?>
                 <?php
                     if(isset($_SESSION['pwd-not-match-user']))
                       {
                         echo $_SESSION['pwd-not-match-user'];
                         unset($_SESSION['pwd-not-match-user']);
                       }
                 ?>
              <form action="" method="post">
                <table class="tbl-30">
                    <tr>
                        <td> New Password </td>
                        <td>
                        <input type="password" id="password-one" placeholder=" min of 8 characters  " required
                pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$"
                title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number." name="password"/>
                        </td>
                    </tr>
                    <tr>
                        <td> Confirm Password </td>
                        <td>
                        <input type="password" id="password-one" placeholder="min of 8 characters  " required
                pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$"
                title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number." name="password"/>
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
    // $current_password=md5($_POST['current_password']);
    // echo $id;
    $new_password=md5($_POST['new_password']);
    $confirm_password=md5($_POST['confirm_password']);
    //check the current id and password exist or not
    $sql="SELECT*FROM tbl_user WHERE id=$id";
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
                         $sql2="UPDATE tbl_user SET
                          password='$new_password'
                          WHERE id=$id
                          ";
                        //Execute the query
                         $res2=mysqli_query($conn,$sql2);
                        // check whether the query is executed or not
                                if($res2==TRUE)
                                    {
                                      //display session message
                                       $_SESSION['update-password-user']="<div class='success'> Password changed successfully. </div>";
                                       header('location:'.SITEURL."admin/manage-user.php");
                                    }
                                else{
                                    $_SESSION['update-password-user']="<div class='error'> Failed to change Password. </div>";
                                    header('location:'.SITEURL."admin/manage-user.php");
                                    }

                     }
                    else
                    {
                         //session message for confirm and new password didn't match
                         $_SESSION['pwd-not-match-user']="<div class='error'> Password did not match. </div>";
                         header('location:'.SITEURL.'admin/change-user-password.php');
                    }

}
  else
  {
    //  user does not exist set message
     $_SESSION['user-not-found-user']="<div class='error'> User Not Found. </div>";
     header('location:'.SITEURL.'admin/manage-user.php');
  }
}
    // check password and confirm password match
    //change password if conditions are met
}
?>s
<?php include('partials/footer.php');?>