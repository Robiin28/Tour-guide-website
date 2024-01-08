<?php include('../config/constant.php');?>
<html>
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../css/login.css" />
    <title>Login Form</title>
</head>
        <body>
            <div class="login-form" id="login-form">
                <div class="close-btn"><a style="color:white;text-decoration:none;font-family:'poppins';" href="../index.php">&times;<a></div>
                
                <form class="form-container"  action="" method="post">
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
                  <br><br>
                  <?php
        ob_start();
        if(isset($_SESSION['add-user-home']))
        {
        echo $_SESSION['add-user-home'];
        unset($_SESSION['add-user-home']);//Redirect and message will be lost
        }
        if(isset($_SESSION['logged']))
        {
        echo $_SESSION['logged'];
        unset($_SESSION['logged']);//Redirect and message will be lost
        }
        if(isset($_SESSION['login']))
        {
        echo $_SESSION['login'];
        unset($_SESSION['login']);//Redirect and message will be lost
        }
      
        
        if(isset($_SESSION['time']))
        {
        echo $_SESSION['time'];
        unset($_SESSION['time']);//Redirect and message will be lost
        }
       
        ?>
        <br>
        <br>
                  <h1>A few steps away from your unforgettable trip</h1>
                  <h3 class="welcome">Welcome back, Please login to your account</h3>
                  <label for="username">Username</label>
                  <div class="inp">
                  <input type="text" id="username" name="username" placeholder="Enter your user name" minlength="6"
                maxlength="35"  title="use more than 5 any character" required />
                  </div>
                  <!-- password for login -->
                  <label for="password">Password</label>
                  <div class="inp">
                    <input type="password" name="password" id="password" placeholder="your password here" required
                      pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$" />
                  </div>
                  <span><a href="forgot.php">Forget password?</a></span>
                  <button class="login-button" name="login-button">Login</button>
                  <span class="signup-link">Don't have an account? <a href="sign-up.php">Sign up</a></span>
                </form>
              </div>
</div>
</body>
    </html>
    <?php

//check whether the submit button is clicked  or not
if(isset($_POST['login-button']))
{
    //process the login
    //get the data from the login form
  $username=$_POST['username'];
  $password=md5($_POST['password']);
    // 2 check thee user with username and password

    $sql= "SELECT*FROM tbl_user WHERE username='$username' AND password='$password'";
    //execute the query
    $res=mysqli_query($conn,$sql);
    //count rows
    $count=mysqli_num_rows($res);
    if($count==1)
    {
        //user available

       
        $_SESSION['last-time']=time();
        $_SESSION['usered']=$username;
        header("location:".SITEURL.'/screens/home.php');
        ob_end_flush();

    }
    else
    {
    //user not available
        $_SESSION['login']="<div class='error text-center'> ACCESS DENIED</div>";
        header("location:".SITEURL.'/screens/login.php');
    }
}
?>