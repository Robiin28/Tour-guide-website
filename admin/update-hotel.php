<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper ">
              <h1> Update Dest</h1>
              <br><br>
<?php

ob_start();
if(isset($_SESSION['update-hotel']))
 {
 echo $_SESSION['update-hotel'];
 unset($_SESSION['update-hotel']);//Redirect and message will be lost

}

if(isset($_SESSION['upload-hotel']))
 {
 echo $_SESSION['upload-hotel'];
 unset($_SESSION['upload-hotel']);//Redirect and message will be lost

}
if(isset($_SESSION['failed-hotel']))
{
echo $_SESSION['failed-hotel'];
unset($_SESSION['failed-hotel']);//Redirect and message will be lost

}

?>
     <?php
     if(isset($_GET['id'])){
              // get the id of selected admin
              $id=$_GET['id'];
              //create sql query to get the details
              $max="SELECT * FROM tbl_hotel WHERE id=$id";
              //execute the query
              $rex=mysqli_query($conn,$max);
              //check whether it is executed or not
              if($rex==true)
              {
                //check whether the data is available
                $countx=mysqli_num_rows($rex);
                //check whether we have admin data or not
                    if($countx==1)
                    {
                        $row=mysqli_fetch_assoc($rex);
                        $hotel_name=$row['hotel_name'];
                        $hotel_desc=$row['hotel_desc'];
                        $rating=$row['rating'];
                        $prev_dest_id=$row['destination_id'];
                        $current_image=$row['image_name'];
                        $price_range=$row['price_range'];
                        $featured=$row['featured'];
                        $active=$row['active'];



                    }
                    else
                    {
                    //redirect to manage admin page
                    header("location:".SITEURL.'admin/manage-hotel.php');
                    }


             }

             $mid="SELECT*FROM destination WHERE id=$prev_dest_id";
             $rem=mysqli_query($conn,$mid);
             if($rem==TRUE)
             {
                 $cont=mysqli_num_rows($rem);
                 if($cont==1)
                 {
                     $row=mysqli_fetch_assoc($rem);
                     $destination_name=$row['destination_name'];
                 
                 }
             }
                 
            }
            ?>

<form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30"> 
                <tr>
                    <td>Destination Name: </td>
                    <td>
                        <!-- <input type="text" name="full_name" placeholder="Enter Your Name"> -->
                        <input type="text" name="hotel_name" placeholder="Enter destination name "  value="<?php echo $hotel_name?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Destination description: </td>
                    <td>
                        <textarea name="hotel_desc"> <?php echo $hotel_desc ?> </textarea>
                    </td>
                </tr>
                <tr>
                    <td>rating: </td>
                    <td>
                        <input type="text" name="rating" value="<?php echo $rating ?>">;
                    </td>
                </tr>
                <tr>
                    <td>destination catagories: </td>
                    <td>
            
                <?php
                echo $destination_name; 
                ?>
                    </td>
                </tr>
                <tr>
                    <td> Current image 1: </td>
                    <td>
                        <?php
                        if($current_image != ""){
                            ?><img src="<?php echo SITEURL; ?>assets/images/hotel/<?php echo $current_image; ?>"width="100px">
                         <?php    
                           }
                        else{
                            echo "NO hotel image ";
                             }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Select new image </td>
                    <td>
                        <input type="file" name="image_name">
                    </td>
                </tr>
                <tr>
                    <td>price_range </td>
                    <td>
                        <input type="text" name="price_range" value="<?php echo $price_range?>">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if($featured=='YES'){echo "checked";} ?>  type="radio"  name="featured" value="YES">YES
                        <input <?php if($featured=='NO'){echo "checked";} ?>   type="radio"  name="featured" value="NO">NO
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input  <?php if($active=="YES"){echo "checked";} ?> type="radio"  name="active" value="YES" >YES
                        <input  <?php if($active=="NO"){echo "checked";} ?> type="radio"  name="active" value="NO" >NO
                    </td>
                </tr>




                <tr>
                    <td colspan="2">
                        
                        <input type="submit"  name="submits" class='btn-secondary' value="Update Hotel">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>"> 
                    </td>
                </tr>
                </table>
                    </form>
                    </div>
                    </div>
                    <?php

if(isset($_POST['submits']))
{
//get th value 
$id=$_POST['id'];
$hotel_name=$_POST['hotel_name'];
$rating=$_POST['rating'];
$hotel_desc=$_POST['hotel_desc'];
$price_range=$_POST['price_range'];
$featured=$_POST['featured'];
$active=$_POST['active'];

$current_image=$_POST['current_image'];

//   echo $destination_name;
//   echo $description;
//   echo $location;
//   echo $tours_id;
//   echo $id;
//   echo $current_image;
if(isset($_FILES['image_name']['name']))
 
  {
          $image_name=$_FILES['image_name']['name'];
         if($image_name != "")
          {
           //   echo"image selected";
           //upload the image
           $tmp=explode('.',$image_name);
           $ext=end($tmp);
           $image_name="hotel_".rand(0000,9999).'.'.$ext;
           //  echo $image_name;
           $source_path=$_FILES['image_name']['tmp_name'];
           //   echo $source_path;
           $destination_path="../assets/images/hotel/".$image_name;
           $upload=move_uploaded_file($source_path, $destination_path);


        if($upload==FALSE)
        {
           // echo"success";
           // echo $image_name;
            $_SESSION['upload-hotel']="<div class='success'>Failed To Upload Image  </div>";
            header('location:'.SITEURL.'/admin/update-hotel.php');
            die();
        }
        if($current_image != "")
         {
           //remove the current image
           $remove_path="../assets/images/hotel/".$current_image;
           $remove=unlink($remove_path);
           //check if image is removed or not
           //if failed stop the process
           if($remove==false)
                 {
                    $_SESSION['failed-hotel']="<div class='error'>Failed To remove current Image  </div>";
                    header('location:'.SITEURL.'/admin/update-hotel.php');
                    die();
                 }
          }
       }
      else
      {
       //no image
         //    echo"image not selected";
       $image_name=$current_image;

       }
}
else
{
    $image_name=$current_image;
}
$sql="UPDATE tbl_hotel SET
hotel_name='$hotel_name',
    hotel_desc='$hotel_desc',
    rating='$rating',
    featured='$featured',
    image_name='$image_name',
    price_range='$price_range',
    active='$active'
     WHERE id='$id'
     ";
 $res=mysqli_query($conn,$sql);
 if($res==True)
   {
     $_SESSION['update-hotel']="<div class='success'>Hotel Updated Successfully</div>";
     header('location:'.SITEURL.'/admin/manage-hotel.php');
 ob_end_flush();
   }

    else{
        $_SESSION['update-hotel']="<div class='error'>Failed to Update Hotel</div>";
        header('location:'.SITEURL.'/admin/update-hotel.php');

        }
}


?>

<?php include('partials/footer.php');?>








