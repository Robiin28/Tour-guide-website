<?php include('partials/menu.php');?>
<div class="main-content">
         <div class="wrapper">
               <h1> manage hotel</h1>
               <br><br>
               <?php
          if(isset($_SESSION['add-hotel']))
             {
              echo $_SESSION['add-hotel'];
              unset($_SESSION['add-hotel']);//Redirect and message will be lost

             }
             if(isset($_SESSION['remove-hotel']))
             {
              echo $_SESSION['remove-hotel'];
              unset($_SESSION['remove-hotel']);//Redirect and message will be lost

             }
             if(isset($_SESSION['delete-hotel']))
             {
              echo $_SESSION['delete-hotel'];
              unset($_SESSION['delete-hotel']);//Redirect and message will be lost

             }
             if(isset($_SESSION['update-hotel']))
             {
              echo $_SESSION['update-hotel'];
              unset($_SESSION['update-hotel']);//Redirect and message will be lost

             }
             ?>
              <br> <br> <br>
               <a href="add-hotel.php" class="btn-primary">Add Hotel</a>
               <br> <br>
              
               <table class="tbl-full">
                <tr>
                     <th>S.N</th>
                      <th>name</th>
                      <th>hotel-description</th>
                      <th>I1.name</th>
                      <th>price-range</th>
                      <th>rating </th>
                      <th>destination_id</th>
                      <th>Feature</th>
                      <th>Active</th>
                      <th>Actions</th>
                </tr> 
                <?php
                //Query to get all admins
                $sql="SELECT*FROM tbl_hotel";
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
              $hotel_name=$rows['hotel_name'];
              $hotel_desc=$rows['hotel_desc'];
              $image_name=$rows['image_name'];
              $price_range=$rows['price_range'];
              $rating=$rows['rating'];
              $destination_id=$rows['destination_id'];
              $featured=$rows['featured'];
              $active=$rows['active'];
              //display the value
              ?>
              <tr>
                     <td><?php echo $sn++;?></td>
                      <td><?php echo $hotel_name; ?> </td>
                      <td><?php echo $hotel_desc; ?></td>
                      <td>
                        <?php
                     if($image_name!="")
                     {
                        //display image
                        ?>
                        <img src="<?php echo SITEURL; ?>assets/images/hotel/<?php echo $image_name; ?>" width="100px">

                        <?php

                     }
                     else
                     {
                     echo"<div class='error'>Image not added.</div>";
                     }
                        ?>
                        </td>
                        <td><?php echo $price_range; ?></td>
                        <td><?php echo $rating; ?></td>
                        <td><?php echo $destination_id; ?></td>
                        <td><?php echo $featured; ?></td>
                      <td><?php echo $active; ?></td>
                      <td>
                          <a href ="<?php echo SITEURL; ?>admin/update-hotel.php?id=<?php echo $id ;?>" class="btn-secondary">Update hotel</a>
                          <a href ="<?php echo SITEURL; ?>admin/delete-hotel.php?id=<?php echo $id ;?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete hotel</a>
                          
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