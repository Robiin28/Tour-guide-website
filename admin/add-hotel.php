<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper ">
        
        <h1> Add Hotel</h1>
        <br>
        <br><br>
        <?php
         ob_start();
          if(isset($_SESSION['add-hotel']))
             {
               
              echo $_SESSION['add-hotel'];
              unset($_SESSION['add-hotel']);//Redirect and message will be lost

             }
             ?>
             <br><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30"> 
                <tr>
                    <td>Hotel Name: </td>
                    <td>
                        <!-- <input type="text" name="full_name" placeholder="Enter Your Name"> -->
                        <input type="text" name="hotel_name" placeholder="Enter hotel name "/>
                    </td>
                </tr>
                <tr>
                    <td>Hotel description and Address: </td>
                    <td>
                        <!-- <input type="text" name="username" placeholder="User-name"></td> -->
                        <textarea name="hotel_desc"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Destination: </td>
                    <td>
                        <select name='destination_id'>
                    <?php    
                    $sql ="SELECT*FROM destination";
                    $res=mysqli_query($conn,$sql);
                    //count rows
                    $count=mysqli_num_rows($res);
                    //if count is greater than 0
                    if($count>0)
                    {

             // have tour
             while($row=mysqli_fetch_assoc($res))
             {
                //get the details
                $id=$row['id'];
                $destination_name=$row['destination_name'];
                ?>
                <option value="<?php echo $id; ?>"><?php echo $destination_name; ?></option> 
                <?php

             }
                    }
                    else
                    {
                      //we don't have tour
                      ?>
                      <option value="0">No Destination found</option>
                      <?php
                    }
                    ?>
                    </select>
                    </td>
                    
                </tr>

                 <tr>
                    <td>Hotel image : </td>
                    <td>
                        <input type="file" name="image_name">
                    </td>
                </tr>
                <tr>
                    <td>price_range: </td>
                    <td>
                        <input type="text" name="price_range">
                    </td>
                </tr>
               
                <tr>
                    <td>rating: in star</td>
                    <td>
                        <input type="radio"  name="rating" value="3-star" >3-Star
                        <input type="radio"  name="rating" value="4-star" >4-Star
                        <input type="radio"  name="rating" value="5-star" >5-Star
                        <input type="radio"  name="rating" value="6-star" >6-Star
                        <input type="radio"  name="rating" value="7-star" >7-Star
                        <input type="radio"  name="rating" value="8-star" >8-Star
                       
                    </td>
                </tr>
                <tr>
                    <td>featured: </td>
                    <td>
                        <input type="radio"  name="featured" value="YES" >YES
                        <input type="radio"  name="featured" value="NO" >NO
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio"  name="active" value="YES" >YES
                        <input type="radio"  name="active" value="NO" >NO
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        
                        <input type="submit"  name="submit" class='btn-secondary' value="Add Hotel">
                    </td>
                </tr>
                
                
</table>
</form>
</div>
</div>
<?php
//check submit button is clicked or not
if(isset($_POST['submit'])){
//get th value 
$hotel_name=$_POST['hotel_name'];
$hotel_desc=$_POST['hotel_desc'];
$destination_id=$_POST['destination_id'];
$price_range=$_POST['price_range'];
$rating=$_POST['rating'];
//for radio input we need to check it is formed correctly
if(isset($_POST['featured'])){
    //gt value from form
    $featured=$_POST['featured'];

}
else
{
    $featured="NO";

}
if(isset($_POST['active'])){
    //gt value from form
    $active=$_POST['active'];

}
else
{
    $active="NO";

}

//check th image is selected or not 
// print_r($_FILES['image_name']);
// die();
if(isset($_FILES['image_name']['name'])){
//upload the image
//to upload the image needs image name and source path and destination path
$image_name=$_FILES['image_name']['name'];
//auto renaming
//get extension of our img(jpg)
$dmp=explode('.',$image_name);
$ext=end($dmp);
//rename the image
$image_name="hotel_".rand(0000,9999).'.'.$ext;//eg. destination_23.jpg


$source_path=$_FILES['image_name']['tmp_name'];
$destination_path="../assets/images/hotel/".$image_name;
//finally upload the image
$upload=move_uploaded_file($source_path,$destination_path);
//check whether the image is uploaded or not
//if image cant move we will stop the process
if($upload==false){
    // $_SESSION['upload-image']="<div class='error'>Failed to add image</div>";
    // header('location:'.SITEURL.'admin/add-hotel.php');
    // //stop th process
    // die();
    $image_name="";
}
}
else{

//     //don't upload the image
    $image_name="";
}
//create sql query
$sql2="INSERT INTO tbl_hotel SET
hotel_name='$hotel_name',
image_name='$image_name',
price_range='$price_range',
rating='$rating',
destination_id='$destination_id',
hotel_desc='$hotel_desc',
featured='$featured',
active='$active'
";
//execute the query
$res2=mysqli_query($conn,$sql2);
//check whether it is executed or not
if($res2==TRUE){
    //success
    //set session message
    $_SESSION['add-hotel']="<div class='success'> Hotel Added Successfully</div>'";
    //redirect
    header('location:'.SITEURL.'admin/manage-hotel.php');
    ob_end_flush();
}
else{
    //failed to add tour
    $_SESSION['add-hotel']="<div class='error'> Failed To Add hotel</div>'";
    //redirect
    header('location:'.SITEURL.'admin/manage-hotel.php');
   
}

}



?>   


 <?php include('partials/footer.php');?>

