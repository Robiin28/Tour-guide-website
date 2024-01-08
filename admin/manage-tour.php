<?php include('partials/menu.php');?>
<div class="main-content">
         <div class="wrapper">
               <h1> manage tour</h1>
               
               <br><br>
               <?php
          if(isset($_SESSION['add-tour']))
             {
              echo $_SESSION['add-tour'];
              unset($_SESSION['add-tour']);//Redirect and message will be lost

             }
             if(isset($_SESSION['remove-tour']))
             {
              echo $_SESSION['remove-tour'];
              unset($_SESSION['remove-tour']);//Redirect and message will be lost

             }
             if(isset($_SESSION['remove-tour2']))
             {
              echo $_SESSION['remove-tour2'];
              unset($_SESSION['remove-tour2']);//Redirect and message will be lost

             }
             if(isset($_SESSION['delete-tour']))
             {
              echo $_SESSION['delete-tour'];
              unset($_SESSION['delete-tour']);//Redirect and message will be lost

             }
             if(isset($_SESSION['update_tour']))
             {
              echo $_SESSION['update_tour'];
              unset($_SESSION['update_tour']);//Redirect and message will be lost

             }
               ?>
               <br><br>
               <a href="add-tours.php" class="btn-primary">ADD TOURS</a>
               <br> <br> <br>

                <table class="tbl-full">
                <tr>
                     <th>S.N</th>
                      <th>Tour-name</th>
                      <th>tour-description</th>
                      <th>image-name</th>
                      <th>image2-name</th>
                      <th>Feature</th>
                      <th>Active</th>
                      <th>Actions</th>
                </tr> 
                <?php
                //Query to get all admins
                $sql="SELECT*FROM tours";
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
              $tour_name=$rows['tour_name'];
              $tour_description=$rows['tour_description'];
              $image_name=$rows['image_name'];
              $image2_name=$rows['image2_name'];
              $featured=$rows['featured'];
              $active=$rows['active'];
              //display the value
              ?>
              <tr>
                     <td><?php echo $sn++;?></td>
                      <td><?php echo $tour_name; ?> </td>
                      <td><?php echo $tour_description; ?></td>
                      <td>
                        <?php
                     if($image_name!="")
                     {
                        //display image
                        ?>
                        <img src="<?php echo SITEURL; ?>assets/images/tours/<?php echo $image_name; ?>" width="100px">

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
                        <img src="<?php echo SITEURL; ?>assets/images/tours/<?php echo $image2_name; ?>" width="100px">

                        <?php

                     }
                     else
                     {
                     echo"<div class='error'>Image not added.</div>";
                     }
                        ?>
                        </td>
                        <td><?php echo $featured; ?></td>
                      <td><?php echo $active; ?></td>
                      <td>
                          <a href ="<?php echo SITEURL; ?>admin/update-tour.php?id=<?php echo $id ;?>& image_name=<?php echo $image_name;?>& image2_name=<?php echo $image2_name;?>" class="btn-secondary">Update</a>
                          <a href ="<?php echo SITEURL; ?>admin/delete-tour.php?id=<?php echo $id ;?>&image_name=<?php echo $image_name;?>&image2_name=<?php echo $image2_name;?>" class="btn-danger">Delete</a>
                          
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