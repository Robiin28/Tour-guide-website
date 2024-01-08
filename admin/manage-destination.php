<?php include('partials/menu.php');?>
<div class="main-content">
         <div class="wrapper">
               <h1> Manage Destination</h1>
               <?php
          if(isset($_SESSION['add-dest']))
             {
              echo $_SESSION['add-dest'];
              unset($_SESSION['add-dest']);//Redirect and message will be lost

             }
             if(isset($_SESSION['delete-dest']))
             {
              echo $_SESSION['delete-dest'];
              unset($_SESSION['delete-dest']);//Redirect and message will be lost

             }
             if(isset($_SESSION['remove-dest']))
             {
              echo $_SESSION['remove-dest'];
              unset($_SESSION['remove-dest']);//Redirect and message will be lost

             }
             if(isset($_SESSION['remove-dest2']))
             {
              echo $_SESSION['remove-dest2'];
              unset($_SESSION['remove-dest2']);//Redirect and message will be lost

             }
             if(isset($_SESSION['update-dest']))
             {
              echo $_SESSION['update-dest'];
              unset($_SESSION['update-dest']);//Redirect and message will be lost

             }
             ?>
             <br><br>


               <a href="add-destination.php" class="btn-primary">Add Destination</a>
               <br> <br> <br>
               <table class="tbl-full">
                <tr>
                     <th>S.N</th>
                      <th>name</th>
                      <th>Dest-description</th>
                      <th>I1.name</th>
                      <th>I2-name</th>
                      <th>location </th>
                      <th>tour_id</th>
                      <th>Feature</th>
                      <th>Active</th>
                      <th>Actions</th>
                </tr> 
                <?php
                //Query to get all admins
                $sql="SELECT*FROM destination";
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
              $destination_name=$rows['destination_name'];
              $description=$rows['description'];
              $image_name=$rows['image_name'];
              $image2_name=$rows['image2_name'];
              $location=$rows['location'];
              $tours_id=$rows['tours_id'];
              $featured=$rows['featured'];
              $active=$rows['active'];
              //display the value
              ?>
              <tr>
                     <td><?php echo $sn++;?></td>
                      <td><?php echo $destination_name; ?> </td>
                      <td><?php echo $description; ?></td>
                      <td>
                        <?php
                     if($image_name!="")
                     {
                        //display image
                        ?>
                        <img src="<?php echo SITEURL; ?>assets/images/destination/<?php echo $image_name; ?>" width="100px">

                        <?php

                     }
                     else
                     {
                     echo"<div class='error'>Image not added.</div>";
                     }
                        ?>
                        </td>
                        <td>
                        <?php
                     if($image2_name!="")
                     {
                        //display image
                        ?>
                        <img src="<?php echo SITEURL; ?>assets/images/destination/<?php echo $image2_name; ?>" width="100px">

                        <?php

                     }
                     else
                     {
                     echo"<div class='error'>Image not added.</div>";
                     }
                        ?>
                        </td>
                        <td><?php echo $location; ?></td>
                        <td><?php echo $tours_id; ?></td>
                        <td><?php echo $featured; ?></td>
                      <td><?php echo $active; ?></td>
                      <td>
                          <a href ="<?php echo SITEURL; ?>admin/update-destination.php?id=<?php echo $id ;?>" class="btn-secondary">Update dest</a>
                          <a href ="<?php echo SITEURL; ?>admin/delete-dest.php?id=<?php echo $id ;?>&image_name=<?php echo $image_name;?>&image2_name=<?php echo $image2_name;?>" class="btn-danger">Delete dest</a>
                          
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