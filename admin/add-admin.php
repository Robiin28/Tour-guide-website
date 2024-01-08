<?php include('partials/menu.php');?>


<div class="main-content">
    <div class="wrapper ">
        <h1> Add Admin</h1>
        <br>
        <br>
  <?php
   if(isset($_SESSION['add']))
  {
  echo $_SESSION['add'];
  unset($_SESSION['add']);//Redirect and message will be lost

}
 ?>
<br><br>

        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <!-- <input type="text" name="full_name" placeholder="Enter Your Name"> -->
                        <input type="text" id="full-name" name="full_name" placeholder="Enter your full name" minlength="5"
                maxlength="100" pattern="^[a-zA-Z]{3,30}$" title="use more than three alphabet letters" required />
                    </td>
                </tr>

                <tr>
                    <td>UserName: </td>
                    <td>
                        <!-- <input type="text" name="username" placeholder="User-name"></td> -->
                        <input type="text" id="username" name="username" placeholder="Enter your user name" minlength="6"
                maxlength="35"  title="use more than 5 any character" required />
                </tr>
                <tr>
                    <td>password: </td>
                    <td>
                        <!-- <input type="password" name="password" id="password" placeholder="your password here" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$" /> -->
                        <input type="password" id="password-one" placeholder="enter your password with min of 8 characters  " required
                pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$"
                title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number." name="password"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary"></td>
                 </tr>
            </table>
        </form>
    </div>
</div>


<?php include('partials/footer.php');?>
<?php

// process the value from db and save it in database for website

// check the submit button is clicked

if(isset($_POST['submit']))
{
    // button is clicked
    //1 get the data from the form we are using post method
     $full_name =$_POST['full_name'];
     $username =$_POST['username'];
     $password =md5($_POST['password']);//encrypting password
    //2 sql query to save the data to database
   $sql = "INSERT INTO tbl_admins SET
   full_name='$full_name',
   username='$username',
   password='$password'
   ";

//     //3 execute th query
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

//    //4 save whether the data is inserted or not displaying approval message

     if($res==TRUE)
     {
        // success message
        $_SESSION['add']="<div class='success'>Admin Added Successfully</div>";
        // redirect page
        header("location:".SITEURL.'admin/manage-admin.php');
        // echo "Admin addes successfully";

     }
     else{
        //failed message
        $_SESSION['add']="<div class='error'>Failed to Add Admin</div>";
        header("location:".SITEURL.'admin/add-admin.php');

     }


}
?>
