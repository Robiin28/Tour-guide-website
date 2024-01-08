<?php include('partials/menu.php');?>


<div class="main-content">
         <div class="wrapper">
               <h1>Manage Admin</h1>
               <br/><br/>
          <?php
           if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);
           }
           if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
           }
           if(isset($_SESSION['update'])){
            echo $_SESSION['update'];
            unset($_SESSION['update']);
           }
           if(isset($_SESSION['user-not-found'])){
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
           }
           if(isset($_SESSION['update-password'])){
            echo $_SESSION['update-password'];
            unset($_SESSION['update-password']);
           }
          ?>
               <br><br><br>
               <!-- Button to add Admin -->
               <a href="add-admin.php" class="btn-primary">Add Admin</a>

               <br><br><br>
               <table class="tbl-full">
                <tr>
                     <th>S.N</th>
                      <th>Full-name</th>
                      <th>Username</th>
                      <th>Actions</th>
                </tr>
                <?php
                //Query to get all admins
                $sql="SELECT*FROM tbl_admins";
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
              //display the value
              ?>
              <?php
              if($id==1){
                ?>
                <td><?php echo $sn++;?></td>
                      <td><?php echo $full_name; ?> </td>
                      <td><?php echo $username; ?></td>
                      <td>

              <?php  }
              else{
              ?><tr>
                     <td><?php echo $sn++;?></td>
                      <td><?php echo $full_name; ?> </td>
                      <td><?php echo $username; ?></td>
                      <td>
                          <a href ="<?php echo SITEURL; ?>admin/change-admin-password.php?id=<?php echo $id ;?>" class="btn-primary">Change password</a>
                          <a href ="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id ;?>" class="btn-secondary">Update admin</a>
                          <a href ="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id ;?>" class="btn-danger">delete admin</a>
                      </td>
                </tr>
              <?php }
              ?>
              <?php
                    }
                  }

                }
                ?>
               </table>
         </div>
  </div>
<?php include('partials/footer.php');?>