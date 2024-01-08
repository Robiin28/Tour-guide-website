<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper ">
              <h1> Update Dest</h1>
              <br><br>
<?php

ob_start();
 if(isset($_SESSION['update_dest']))
 {
 echo $_SESSION['update_dest'];
 unset($_SESSION['update_dest']);//Redirect and message will be lost

}
if(isset($_SESSION['upload-dest']))
 {
 echo $_SESSION['upload-dest'];
 unset($_SESSION['upload-dest']);//Redirect and message will be lost

}
if(isset($_SESSION['upload-dest2']))
 {
 echo $_SESSION['upload-dest2'];
 unset($_SESSION['upload-dest2']);//Redirect and message will be lost

}
if(isset($_SESSION['failed-rem-dest']))
{
echo $_SESSION['failed-rem-dest'];
unset($_SESSION['failed-rem-dest']);//Redirect and message will be lost

}
if(isset($_SESSION['failed-rem-dest2']))
{
echo $_SESSION['failed-rem-dest2'];
unset($_SESSION['failed-rem-dest2']);//Redirect and message will be lost

}
?>
     <?php
     if(isset($_GET['id'])){
              // get the id of selected admin
              $id=$_GET['id'];
              //create sql query to get the details
              $max="SELECT * FROM destination WHERE id=$id";
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
                        $destination_name=$row['destination_name'];
                        $description=$row['description'];
                        $location=$row['location'];
                        $prev_tour_id=$row['tours_id'];
                        $current_image=$row['image_name'];
                        $current_image2=$row['image2_name'];
                        $featured=$row['featured'];
                        $active=$row['active'];



                    }
                    else
                    {
                    //redirect to manage admin page
                    header("location:".SITEURL.'admin/manage-destination.php');
                    }


             }

             $mid="SELECT*FROM tours WHERE id=$prev_tour_id";
             $rem=mysqli_query($conn,$mid);
             if($rem==TRUE)
             {
                 $cont=mysqli_num_rows($rem);
                 if($cont==1)
                 {
                     $row=mysqli_fetch_assoc($rem);
                     $tour_name=$row['tour_name'];
                 
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
                        <input type="text" name="destination_name" placeholder="Enter destination name "  value="<?php echo $destination_name?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Destination description: </td>
                    <td>
                        <textarea name="description"> <?php echo $description ?> </textarea>
                    </td>
                </tr>
                <tr>
                    <td>Location: </td>
                    <td>
                        <input type="text" name="location" value="<?php echo $location ?>">;
                    </td>
                </tr>
                <tr>
                    <td>tour catagories: </td>
                    <td>
            
                <?php
                echo $tour_name; 
                ?>
                    </td>
                </tr>
                <tr>
                    <td> Current image 1: </td>
                    <td>
                        <?php
                        if($current_image != ""){
                            ?><img src="<?php echo SITEURL; ?>assets/images/destination/<?php echo $current_image; ?>"width="100px">
                         <?php    
                           }
                        else{
                            echo "NO destination image 1";
                             }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Select image 1: </td>
                    <td>
                        <input type="file" name="image_name">
                    </td>
                </tr>
                <tr>
                    <td>Current image 2: </td>
                    <td>
                        <?php
                        if($current_image2!= ""){
                           ?> <img src="<?php echo SITEURL; ?>assets/images/destination/<?php echo $current_image2; ?>" width="100px">
                    <?php    
                    }
                        else{
                            echo "NO destination image 2";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Select image 2: </td>
                    <td>
                        <input type="file" name="image2_name">
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
                        
                        <input type="submit"  name="submits" class='btn-secondary' value="Update Dest">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>"> 
                        <input type="hidden" name="current_image2" value="<?php echo $current_image2; ?>">
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
$destination_name=$_POST['destination_name'];
$location=$_POST['location'];
$description=$_POST['description'];
$featured=$_POST['featured'];
$active=$_POST['active'];

$current_image=$_POST['current_image'];
$current_image2=$_POST['current_image2'];

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
           $image_name="destination_".rand(0000,9999).'.'.$ext;
           //  echo $image_name;
           $source_path=$_FILES['image_name']['tmp_name'];
           //   echo $source_path;
           $destination_path="../assets/images/destination/".$image_name;
           $upload=move_uploaded_file($source_path, $destination_path);


        if($upload==FALSE)
        {
           // echo"success";
           // echo $image_name;
            $_SESSION['upload-dest']="<div class='success'>Failed To Upload Image 1 </div>";
            header('location:'.SITEURL.'/admin/update-destination.php');
            die();
        }
        if($current_image != "")
         {
           //remove the current image
           $remove_path="../assets/images/destination/".$current_image;
           $remove=unlink($remove_path);
           //check if image is removed or not
           //if failed stop the process
           if($remove==false)
                 {
                    $_SESSION['failed-rem-dest']="<div class='success'>Failed To remove current Image 1 </div>";
                    header('location:'.SITEURL.'/admin/update-destination.php');
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

//image 2 starts here
if(isset($_FILES['image2_name']['name']))
 
  {
          $image2_name=$_FILES['image2_name']['name'];
         if($image2_name != "")
          {
           //   echo"image selected";
           //upload the image
           $tmp2=explode('.',$image2_name);
           $ext2=end($tmp2);
           $image2_name="destination_".rand(0000,9999).'.'.$ext2;
           //  echo $image_name;
           $source_path2=$_FILES['image2_name']['tmp_name'];
           //   echo $source_path;
           $destination_path2="../assets/images/destination/".$image2_name;
           $upload2=move_uploaded_file($source_path2, $destination_path2);


        if($upload2==FALSE)
        {
           // echo"success";
           // echo $image_name;
            $_SESSION['upload-dest2']="<div class='error'>Failed To Upload Image 2 </div>";
            header('location:'.SITEURL.'/admin/update-destination.php');
            die();
        }
        if($current_image2 != "")
         {
           //remove the current image
           $path="../assets/images/destination/".$current_image2;
           $remove=unlink($path);
           //check if image is removed or not
           //if failed stop the process
           if($remove==false)
                 {
                    $_SESSION['failed-rem-dest2']="<div class='error'>Failed To remove current Image 2 </div>";
                    header('location:'.SITEURL.'/admin/update-destination.php');
                    die();
                 }
          }
       }
      else
      {
       //no image
         //    echo"image not selected";
       $image2_name=$current_image2;

       }
}
else
{
    $image2_name=$current_image2;
}


$sql="UPDATE destination SET
destination_name='$destination_name',
    description='$description',
    location='$location',
    featured='$featured',
    image_name='$image_name',
    image2_name='$image2_name',
    active='$active'
     WHERE id='$id'
     ";
 $res=mysqli_query($conn,$sql);
 if($res==True)
   {
     $_SESSION['update-dest']="<div class='success'>Destination Updated Successfully</div>";
     header('location:'.SITEURL.'/admin/manage-destination.php');
 ob_end_flush();
   }

    else{
        $_SESSION['update-dest']="<div class='error'>Failed to Update Destination</div>";
        header('location:'.SITEURL.'/admin/update-destination.php');

        }
}


?>

<?php include('partials/footer.php');?>








