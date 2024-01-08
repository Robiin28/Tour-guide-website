<?php include('partials/menu.php');?>
<div class="main-content">
         <div class="wrapper">
               <h1> manage Booking</h1>
               <br>
               <br>
               <?php
          if(isset($_SESSION['delete-book']))
             {
              echo $_SESSION['delete-book'];
              unset($_SESSION['delete-book']);//Redirect and message will be lost

             }
             if(isset($_SESSION['update-book']))
             {
              echo $_SESSION['update-book'];
              unset($_SESSION['update-book']);//Redirect and message will be lost

             }
             ?>
             <br>
             <br>

               <table class="tbl-last">
                <tr>
                     <th>S.N</th>
                      <th>name</th>
                      <th>email</th>
                      <th>phone</th>
                      <th>tour</th>
                      <th>de-name</th>
                      <th>hotel </th>
                      <th>guest</th>
                      <th>option</th>
                      <th>guide</th>
                      <th>Arrival</th>
                      <th>leaving</th>
                      <th>status</th>
                      <th>Action</th>
                </tr> 
                <?php
                //Query to get all admins
                $sql="SELECT*FROM book";
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
              $tour_name=$rows['tour_name'];
              $hotel_name=$rows['hotel_name'];
              $guests=$rows['guests'];
              $options=$rows['options'];
              $guide=$rows['guide'];
              $arrival=$rows['arrival'];
              $leaving=$rows['leaving'];
              $status=$rows['status'];
              $name=$rows['name'];
              $email=$rows['email'];
              $phone_no=$rows['phone_no'];

              //display the value
              ?>
              <tr>
                     <td><?php echo $sn++;?></td>
                     <td><?php echo $name;?></td>
                     <td><?php echo $email;?></td>
                     <td><?php echo $phone_no;?></td>
                      <td><?php echo $tour_name; ?> </td>
                      <td><?php echo $destination_name; ?></td>
                      <td><?php echo $hotel_name ?></td>
                        <td><?php echo $guests; ?></td>
                        <td><?php echo $options; ?></td>
                        <td><?php echo $guide; ?></td>
                      <td><?php echo $arrival; ?></td>
                      <td><?php echo $leaving; ?></td>
                      <td style="color:blue ; font-style:bold"><?php echo $status; ?></td>
                      <td>
                          <a href ="<?php echo SITEURL; ?>admin/update-book.php?id=<?php echo $id ;?>" class="btn-secondary">Update status</a>
                          <a href ="<?php echo SITEURL; ?>admin/delete-book.php?id=<?php echo $id ;?>" class="btn-danger">Delete </a>
                          
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