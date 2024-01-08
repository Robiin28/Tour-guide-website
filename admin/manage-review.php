<?php include('partials/menu.php');?>
<div class="main-content">
         <div class="wrapper">
               <h1> manage Reviews</h1>
               <br>
               <br>
               <?php
          if(isset($_SESSION['delete-reviews']))
             {
              echo $_SESSION['delete-reviews'];
              unset($_SESSION['delete-reviews']);//Redirect and message will be lost

             }
             if(isset($_SESSION['update-review']))
             {
              echo $_SESSION['update-review'];
              unset($_SESSION['update-review']);//Redirect and message will be lost

             }
             ?>
             <br>
             <br>

               <table class="tbl-last">
                <tr>
                     <th>S.N</th>
                      <th>f.name</th>
                      <th>l.name</th>
                      <th>email</th>
                      <th>phone</th>
                      <th>types</th>
                      <th>choice </th>
                      <th>message</th>
                      <th>status</th>
                      <th>Action</th>
                </tr> 
                <?php
                //Query to get all admins
                $sql="SELECT*FROM tbl_review";
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
              $fname=$rows['fname'];
              $lname=$rows['lname'];
              $email=$rows['email'];
              $phone=$rows['phone'];
              $types=$rows['types'];
              $choice=$rows['choice'];
              $message=$rows['message'];
              $status=$rows['status'];

              //display the value
              ?>
              <tr>
                     <td><?php echo $sn++;?></td>
                     <td><?php echo $fname;?></td>
                     <td><?php echo $lname;?></td>
                     <td><?php echo $email;?></td>
                      <td><?php echo $phone; ?> </td>
                      <td><?php echo $types; ?></td>
                      <td><?php echo $choice ?></td>
                        <td><?php echo $message; ?></td> 
                      <td style="color:blue ; font-style:bold"><?php echo $status; ?></td>
                      <td>
                          <a href ="<?php echo SITEURL; ?>admin/update-review.php?id=<?php echo $id ;?>" class="btn-secondary">Update status</a>
                          <a href ="<?php echo SITEURL; ?>admin/delete-review.php?id=<?php echo $id ;?>" class="btn-danger">Delete </a>
                          
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
<?php include('partials/footer.php');?>