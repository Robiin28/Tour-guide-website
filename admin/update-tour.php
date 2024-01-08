<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper ">
              <h1> Update Tour</h1>
              <br><br>
<?php
ob_start();
 if(isset($_SESSION['update_tour']))
 {
 echo $_SESSION['update_tour'];
 unset($_SESSION['update_tour']);//Redirect and message will be lost

}
if(isset($_SESSION['upload-tour']))
 {
 echo $_SESSION['upload-tour'];
 unset($_SESSION['upload-tour']);//Redirect and message will be lost

}
if(isset($_SESSION['upload-tour2']))
 {
 echo $_SESSION['upload-tour2'];
 unset($_SESSION['upload-tour2']);//Redirect and message will be lost

}
if(isset($_SESSION['failed-remove']))
{
echo $_SESSION['failed-remove'];
unset($_SESSION['failed-remove']);//Redirect and message will be lost

}
if(isset($_SESSION['failed-remove2']))
{
echo $_SESSION['failed-remove2'];
unset($_SESSION['failed-remove2']);//Redirect and message will be lost

}

?>


              <?php
              // get the id of selected admin
              $id=$_GET['id'];
              //create sql query to get the details
              $sql="SELECT * FROM tours WHERE id=$id";
              //execute the query
              $res=mysqli_query($conn,$sql);
              //check whether it is executed or not
              if($res==true)
              {
                //check whether the data is available
                $count=mysqli_num_rows($res);
                //check whether we have admin data or not
                    if($count==1)
                    {
                         //get the details
                         $row=mysqli_fetch_assoc($res);
                         $tour_name=$row['tour_name'];
                         $tour_description=$row['tour_description'];
                         $current_image=$row['image_name'];
                         $current_image2=$row['image2_name'];
                         $featured=$row['featured'];
                         $active=$row['active'];


                    }
                    else
                    {
                    //redirect to manage admin page
                    header("location:".SITEURL.'admin/manage-user.php');
                    }
              }
              ?>
              <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30"> 
                <tr>
                    <td>Tour Name: </td>
                    <td>
                        <!-- <input type="text" name="full_name" placeholder="Enter Your Name"> -->
                        <input type="text" name="tour_name" placeholder="Enter tour name "  value="<?php echo $tour_name?>"/>
                    </td>
                </tr>
                <tr>
                    <td>tour description: </td>
                    <td>
                        <textarea name="tour_description"> <?php echo $tour_description ?> </textarea>
                    </td>
                </tr>
                 <tr>
                    <td> Current image 1: </td>
                    <td>
                        <?php
                        if($current_image != ""){
                            ?><img src="<?php echo SITEURL; ?>assets/images/tours/<?php echo $current_image; ?>"width="100px">
                         <?php    
                           }
                        else{
                            echo "NO image 1";
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
                           ?> <img src="<?php echo SITEURL; ?>assets/images/tours/<?php echo $current_image2; ?>" width="100px">
                    <?php    
                    }
                        else{
                            echo "NO image 2";
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
                        
                        <input type="submit"  name="submit" class='btn-secondary' value="Update Tour">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>"> 
                        <input type="hidden" name="current_image2" value="<?php echo $current_image2; ?>">
                    </td>
                </tr>
                </table>
</form>
<?php
//check submit button is clicked or not
if(isset($_POST['submit']))
{
//get th value 
$id=$_POST['id'];
$tour_name=$_POST['tour_name'];
$tour_description=$_POST['tour_description'];
$current_image=$_POST['current_image'];
$current_image2=$_POST['current_image2'];
$featured=$_POST['featured'];
$active=$_POST['active'];


if(isset($_FILES['image_name']['name']))
 
  {
          $image_name=$_FILES['image_name']['name'];
         if($image_name != "")
          {
           //   echo"image selected";
           //upload the image
           $tmp=explode('.',$image_name);
           $ext=end($tmp);
           $image_name="tour_".rand(0000,9999).'.'.$ext;
           //  echo $image_name;
           $source_path=$_FILES['image_name']['tmp_name'];
           //   echo $source_path;
           $destination_path="../assets/images/tours/".$image_name;
           $upload=move_uploaded_file($source_path, $destination_path);


        if($upload==FALSE)
        {
           // echo"success";
           // echo $image_name;
            $_SESSION['upload_tour']="<div class='success'>Failed To Upload Image 1 </div>";
            header('location:'.SITEURL.'/admin/update-tour.php');
            die();
        }
        if($current_image != "")
         {
           //remove the current image
           $remove_path="../assets/images/tours/".$current_image;
           $remove=unlink($remove_path);
           //check if image is removed or not
           //if failed stop the process
           if($remove==false)
                 {
                    $_SESSION['failed-remove']="<div class='success'>Failed To remove current Image 1 </div>";
                    header('location:'.SITEURL.'/admin/update-tour.php');
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
           $image2_name="tour_".rand(0000,9999).'.'.$ext2;
           //  echo $image_name;
           $source_path2=$_FILES['image2_name']['tmp_name'];
           //   echo $source_path;
           $destination_path2="../assets/images/tours/".$image2_name;
           $upload2=move_uploaded_file($source_path2, $destination_path2);


        if($upload2==FALSE)
        {
           // echo"success";
           // echo $image_name;
            $_SESSION['upload_tour2']="<div class='success'>Failed To Upload Image 2 </div>";
            header('location:'.SITEURL.'/admin/update-tour.php');
            die();
        }
        if($current_image2 != "")
         {
           //remove the current image
           $path="../assets/images/tours/".$current_image2;
           $remove=unlink($path);
           //check if image is removed or not
           //if failed stop the process
           if($remove==false)
                 {
                    $_SESSION['failed-remove2']="<div class='error'>Failed To remove current Image 2 </div>";
                    header('location:'.SITEURL.'/admin/update-tour.php');
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



    //update the query
$sql2="UPDATE tours SET
   tour_name='$tour_name',
   tour_description='$tour_description',
   image_name='$image_name',
   image2_name='$image2_name',
   featured='$featured',
   active='$active'
    WHERE id='$id'
    ";
$res2=mysqli_query($conn,$sql2);
if($res2==true)
  {
    $_SESSION['update_tour']="<div class='success'>Tour Updated Successfully</div>";
    header('location:'.SITEURL.'/admin/manage-tour.php');
ob_end_flush();
  }

    else{
        $_SESSION['update_tour']="<div class='error'>Failed to Update tour</div>";
        header('location:'.SITEURL.'/admin/update-tour.php');

        }


// check th image is selected or not 
print_r($_FILES['image_name']);
die();

    }
?>
</div>
</div>
<?php include('partials/footer.php');?>