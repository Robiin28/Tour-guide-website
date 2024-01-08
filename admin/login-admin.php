<?php include('../config/constant.php');?>
<DOCTYPE html>
    <html>
            <head>
                <title> LOGIN TO ADMIN PANEL </title>
                <link rel="stylesheet" href="../css/admin.css">
            <head>
        <body>
 <!-- menu section -->

    <div class="login-admin">
        <h1 class="text-center"> Login</h1>
        <!-- login form -->
        <br><br>
        <?php
        ob_start();
        if(isset($_SESSION['log']))
        {
        echo $_SESSION['log'];
        unset($_SESSION['log']);//Redirect and message will be lost
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
        <br><br>
        <form action="" method="POST">
                  <div class="txt-center">
        
            Username:
            <input type="text" name="username" placeholder="enter username">
            <br><br>
            Password :
            <input type="password" name="password" placeholder="enter password">
          <br>
            <input type="submit" name="submit" value="login" class="btn-secondary">

        <p class="text-center"> Created BY RHO </p>
        
              </div>
        </form>
    </div>
</body>
    </html>
    <?php

    //check whether the submit button is clicked  or not
    if(isset($_POST['submit']))
    {
        //process the login
        //get the data from the login form
      $username=$_POST['username'];
      $password=md5($_POST['password']);
        // 2 check thee user with username and password

        $sql= "SELECT*FROM tbl_admins WHERE username='$username' AND password='$password'";
        //execute the query
        $res=mysqli_query($conn,$sql);
        //count rows
        $count=mysqli_num_rows($res);
        if($count==1)
        {
            //user available
            $_SESSION['login']="<div class='success'> LOGIN SUCCESSFULLY </div>";
           
            $_SESSION['last-time']=time();
            $_SESSION['user']=$username;
            header("location:".SITEURL.'admin/');
            ob_end_flush();

        }
        else
        {
        //user not available
            $_SESSION['login']="<div class='error text-center'> ACCESS DENIED</div>";
            header("location:".SITEURL.'admin/login-admin.php');
        }
    }
    ?>