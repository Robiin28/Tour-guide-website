<?php include('../config/constant.php'); ?>

<html>
    <head>
    <link rel="stylesheet" href="../css/signup.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
      rel="stylesheet"
    />
    <title>Signup Form</title>
</head>
        <body>
           
            <div class="signup-form" id="signup-form">
        <div class="close-btn"><a style="color:white;text-decoration:none;" href='../index.php' >&times;<a></div>
        <div class="container">
            <br>
            <br>
            <?php
            ob_start();
if(isset($_SESSION['add-user-home']))
  {
  echo $_SESSION['add-user-home'];
  unset($_SESSION['add-user-home']);//Redirect and message will be lost

}
   if(isset($_SESSION['logo-user']))
  {
  echo $_SESSION['logo-user'];
  unset($_SESSION['logo-user']);//Redirect and message will be lost

}
if(isset($_SESSION['message-sent']))
{
echo $_SESSION['message-sent'];
unset($_SESSION['message-sent']);//Redirect and message will be lost

}
?>
          <!-- form for signup -->
          <!-- <form action="http://localhost/dashen-tour-backend/Signup.php" class="form-container" id="form" method="post"> -->
          <form class="form-container" action="" id="form" method="post">
        <table>
              <div class="namelogo">
              <svg width="83" height="90" viewBox="0 0 83 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M0 59.1815C0 51.8507 1.3356 45.8768 4.00681 41.2598C8.64432 33.1184 15.1183 29.0477 23.4287 29.0477C28.2517 29.0477 32.3698 30.898 35.783 34.5987V11.0732L46.3565 6.31522H46.913V59.1815C46.913 66.5122 45.5774 72.4861 42.9062 77.1031C38.1945 85.2445 31.702 89.3152 23.4287 89.3152C15.2667 89.3152 8.79272 85.2445 4.00681 77.1031C1.3356 72.5566 0 66.5827 0 59.1815ZM11.13 59.1815C11.13 65.8074 11.8906 70.5301 13.4117 73.3496C15.9345 78.0018 19.2735 80.328 23.4287 80.328C27.621 80.328 30.96 78.0018 33.4457 73.3496C35.0039 70.4243 35.783 65.7016 35.783 59.1815C35.783 52.6613 35.0039 47.9386 33.4457 45.0133C30.9971 40.3963 27.6581 38.0878 23.4287 38.0878C19.1993 38.0878 15.8603 40.4316 13.4117 45.119C11.8906 48.0443 11.13 52.7318 11.13 59.1815Z"
                  fill="#411D0D" fill-opacity="1" />
                <path
                  d="M57.1913 83V32.3648L46.913 37V28.5L57.1913 23.4906V4.69811L67.9214 0H68.4861V22.5L81.2421 28.5L83 24.0126L78.5 35.5L68.4861 31V78.3019L57.7561 83H57.1913Z"
                  fill="#411D0D" fill-opacity="1" />
              </svg>
              <h1 class="company-name">RHO Tour</h1>
            </div>
            <h1>Become a member and get unbelievable discounts</h1>
            <!-- full name -->
            <label for="full_name">Full Name</label>
            <div class="inp">
              <input type="text" id="full_name" name="full_name" placeholder="Enter your full name" minlength="5"
                maxlength="100" pattern="^[a-zA-Z]{3,30}$" title="use more than three alphabet letters" required />
            </div>
            <!-- email  -->
            <label for="email">Email</label>
            <div class="inp">
              <input type="email" id="semail" name="email" placeholder="someone123@example.com"
                pattern="^[a-zA-Z0-9_]+@[a-zA-Z]+[.]+com$" title="enter a valid email address eg.someone1234@gmail.com"
                required />
            </div >
            <label for="username"> Username </label>
            <div class="inp">
             <!-- <input type="text" name="username" placeholder="User-name"></td> -->
             <input type="text" id="username" name="username" placeholder="Enter your user name" minlength="6"
                maxlength="35"  title="use more than 5 any character" required />
          </div>
            <!-- phone number -->
            <label for="phone_number">Phone Number</label>
            <div class="inp">
              <input type="tel" id="phone_no" name="phone_no" placeholder="country code-number  eg. +251 911101010"
                title="please enter the country code and space and the rest digits" pattern="^[+]+[0-9]{3} [0-9]{9}$"
                required />
            </div>
            <!--address -->
            <label for="address">Address</label>
            <div class="inp">
              <input type="text" id="address" name="address" placeholder="Enter your city" required minlength="3"
                maxlength="50" title="please enter 3 or more than characters" />
            </div>
            <!-- your password-->
            <label for="password">Password</label>
            <div class="inp">
              <input type="password" name="password" id="password-one" placeholder="enter your password with min of 8 characters  " required
                pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$"
                title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number."/>
            </div>
            <!-- submit button -->
            <button class="signup-button" name="sign-upin">Sign Up</button>
            <span class="login-link"> Already have an account? <a href="login.php">Login</a></span>
          </table>
        </form>
    
        
          </div>
    </div>
          </div>
          </body>
          </html>
          <?php
               if(isset($_POST['sign-upin']))
               {
                   // button is clicked
                   //1 get the data from the form we are using post method
                    $full_name =$_POST['full_name'];
                    $username =$_POST['username'];
                    $email =$_POST['email'];
                    $phone_no =$_POST['phone_no'];
                    $address =$_POST['address'];

                    $password =md5($_POST['password']);
                   //encrypting password
                   //2 sql query to save the data to database
                   
                   $sql2= "SELECT*FROM tbl_user WHERE username='$username'";
                   //execute the query
                   $res2=mysqli_query($conn,$sql2);
                   //count rows
                   $count=mysqli_num_rows($res2);
                   if($count>=1)
                   {
                       //user available
                       $_SESSION['logo-user']="<div class='error text-center'> User name taken </div>";
                       header("location:".SITEURL.'sign-up.php');
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
                       $_SESSION['add-user-home']="<div class='success text-center'>Registered Successfully</div>";
                       // // redirect page
                       header("location:".SITEURL.'/screens/login.php');
                       ob_end_flush();
                       // // echo "Admin added successfully";
                       // $_SESSION['add-users']="<div class='success'>User Added Successfully  </div>";
                       //redirect to manage admin page
                    
                   //  echo"admin added";   // header('manage-user.php');
               
                    }
                    else{
                       //failed message
                       $_SESSION['add-user-home']="<div class='error text-center'>Failed to Register</div>";
                       header("location:".SITEURL.'sign-up.php');
                       // $_SESSION['add-users']="<div class='success'>Failed to Add   </div>";
                       // //redirect to manage admin page
                       // header('manage-user.php');
                       // echo"admin failed added";
                    }
               
               
               }
               }
               ?>
               
