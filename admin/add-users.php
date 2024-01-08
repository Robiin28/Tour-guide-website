<?php include('partials/menu.php');?>


<div class="main-content">
    <div class="wrapper ">
        <h1> Add User</h1>
        <br>
        <br>
        <?php
ob_start();
if(isset($_SESSION['logo']))
  {
  echo $_SESSION['logo'];
  unset($_SESSION['logo']);//Redirect and message will be lost

}
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
                    </td>
                </tr>

                <tr>
                    <td>Email: </td>
                    <td>
                    <input type="email" id="email" name="email" placeholder="someone123@example.com"
                pattern="^[a-zA-Z0-9_]+@[a-zA-Z]+[.]+com$" title="enter a valid email address eg.someone1234@gmail.com"
                required />
                    </td>
                </tr>
                <tr>
                    <td> Phone-no</td>
                    <td>
                    <input type="tel" id="phone-number" name="phone_no" placeholder="eg. +2519 89101010"
                title="please enter the country code and space and the rest digits" pattern="^[+]+[0-9]{3} [0-9]{9}$"
                required />
                    </td>

                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" id="address" name="address" placeholder="Enter your city" required minlength="3"
                maxlength="50" title="please enter 3 or more than characters" /> </td>
                </tr>
                    <td>password: </td>
                    <td>
                        <!-- <input type="password" name="password" id="password" placeholder="your password here" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$" /> -->
                        <input type="password" id="password-one" placeholder="min of 8 characters  " required
                pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$"
                title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number." name="password"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add User" class="btn-secondary"></td>
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
     $email =$_POST['email'];
     $phone_no =$_POST['phone_no'];
     $address =$_POST['address'];
     $password =md5($_POST['password']);//encrypting password
    //2 sql query to save the data to database
    
    $sql2= "SELECT*FROM tbl_user WHERE username='$username'";
    //execute the query
    $res2=mysqli_query($conn,$sql2);
    //count rows
    $count=mysqli_num_rows($res2);
    if($count>=1)
    {
        //user available
        $_SESSION['logo']="<div class='error'> User name taken </div>";
        header("location:".SITEURL.'admin/add-users.php');
        // ob_end_flush();
    }
    else
    {
   $sql = "INSERT INTO tbl_user SET
   full_name='$full_name',
   username='$username',
   email='$email',
   phone_no='$phone_no',
   address='$address',
   password='$password'
   ";

    //3 execute th query
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

   //4 save whether the data is inserted or not displaying approval message

     if($res==TRUE)
     {
        // success message
        $_SESSION['add-user']="<div class='success'>User Added Successfully</div>";
        // // redirect page
        header("location:".SITEURL.'admin/manage-user.php');
        ob_end_flush();
        // // echo "Admin added successfully";
        // $_SESSION['add-users']="<div class='success'>User Added Successfully  </div>";
        //redirect to manage admin page
     
    //  echo"admin added";   // header('manage-user.php');

     }
     else{
        //failed message
        $_SESSION['add-user']="<div class='error'>Failed to Add User</div>";
        header("location:".SITEURL.'admin/add_users.php');
        // $_SESSION['add-users']="<div class='success'>Failed to Add   </div>";
        // //redirect to manage admin page
        // header('manage-user.php');
        // echo"admin failed added";
     }


}
}
?>
