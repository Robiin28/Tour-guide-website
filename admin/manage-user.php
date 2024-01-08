<?php include('partials/menu.php');?>
<div class="main-content">
         <div class="wrapper">
               <h1> Manage User</h1>
               <div class="main-content">
               <br/><br/>
          <?php
           if(isset($_SESSION['add-user'])){
            echo $_SESSION['add-user'];
            unset($_SESSION['add-user']);
           }
           if(isset($_SESSION['add-users'])){
            echo $_SESSION['add-users'];
            unset($_SESSION['add-users']);
           }

           if(isset($_SESSION['delete-user'])){
            echo $_SESSION['delete-user'];
            unset($_SESSION['delete-user']);
           }
           if(isset($_SESSION['update-user'])){
            echo $_SESSION['update-user'];
            unset($_SESSION['update-user']);
           }
           if(isset($_SESSION['user-not-found-user'])){
            echo $_SESSION['user-not-found-user'];
            unset($_SESSION['user-not-found-user']);
           }
           if(isset($_SESSION['update-password-user'])){
            echo $_SESSION['update-password-user'];
            unset($_SESSION['update-password-user']);
           }
          ?>
               <br><br><br>
               <!-- Button to add Admin -->
               <a href="add-users.php" class="btn-primary">Add User</a>

               <br><br><br>
               <table class="tbl-full">
                <tr>
                     <th>S.N</th>
                      <th>Full-name</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Phone no</th>
                      <th>Address</th>
                      <th>Actions</th>
                </tr>
                <?php
                //Query to get all admins
                $sql="SELECT*FROM tbl_user";
                //execute the query
                $res=mysqli_query($conn,$sql);
                //check whether the query is executed or not
                if($res==TRUE)
                {
                  $sn=1;//create a variable
                  //count rows to check the data is available or not
                  $count=mysqli_num_rows($res);//function to get the no of rows
                  //check th rows
                  if($count>0){
                    //we have data in database
                    while ($rows=mysqli_fetch_assoc($res)){
              //while loop to get all data from database
              //get individual data
              $id=$rows['id'];
              $full_name=$rows['full_name'];
              $username=$rows['username'];
              $email=$rows['email'];
              $phone_no=$rows['phone_no'];
              $address=$rows['address'];
              //display the value
              ?>
              <tr>
                     <td><?php echo $sn++;?></td>
                      <td><?php echo $full_name; ?> </td>
                      <td><?php echo $username; ?></td>
                      <td><?php echo $email; ?></td>
                      <td><?php echo $phone_no; ?></td>
                      <td><?php echo $address; ?></td>
                      <td>
                          <a href ="<?php echo SITEURL; ?>admin/change-user-password.php?id=<?php echo $id ;?>" class="btn-primary">Change password</a>
                          <a href ="<?php echo SITEURL; ?>admin/update-user.php?id=<?php echo $id ;?>" class="btn-secondary">Update user</a>
                          <a href ="<?php echo SITEURL; ?>admin/delete-user.php?id=<?php echo $id ;?>" class="btn-danger">delete user</a>
                      </td>
                </tr>

              <?php
                    }
                  }

                }
                ?>
               </table>
         </div>
  </div>
         </div>
  </div>
<?php include('partials/footer.php');?>