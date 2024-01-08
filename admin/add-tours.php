<?php include('partials/menu.php');?>


<div class="main-content">
    <div class="wrapper ">
        
        <h1> Add Tour</h1>
        <br>
        <br>
        <?php
   if(isset($_SESSION['add-tour']))
  {
  echo $_SESSION['add-tour'];
  unset($_SESSION['add-tour']);//Redirect and message will be lost

}
if(isset($_SESSION['upload-image']))
  {
  echo $_SESSION['upload-image'];
  unset($_SESSION['upload-image']);//Redirect and message will be lost

}
if(isset($_SESSION['upload2-image']))
  {
  echo $_SESSION['upload2-image'];
  unset($_SESSION['upload2-image']);//Redirect and message will be lost

}
 ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-10"> 
                <tr>
                    <td>Tour Name: </td>
                    <td>
                        <!-- <input type="text" name="full_name" placeholder="Enter Your Name"> -->
                        <input type="text" name="tour_name" placeholder="Enter tour name "/>
                    </td>
                </tr>
                <tr>
                    <td>tour description: </td>
                    <td>
                        <!-- <input type="text" name="username" placeholder="User-name"></td> -->
                        <textarea name="tour_description"></textarea>
                    </td>
                </tr>
                 <tr>
                    <td>Select image 1: </td>
                    <td>
                        <input type="file" name="image_name">
                    </td>
                </tr>
                <tr>
                    <td>Select image 2: </td>
                    <td>
                        <input type="file" name="image2_name">
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
                        
                        <input type="submit"  name="submit" class='btn-secondary' value="Add Tour">
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
$tour_name=$_POST['tour_name'];
$tour_description=$_POST['tour_description'];
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
$ext=end(explode('.',$image_name));
//rename the image
$image_name="tour_".rand(000,999).'.'.$ext;//eg. tour_23.jpg


$source_path=$_FILES['image_name']['tmp_name'];
$destination_path="../assets/images/tours/".$image_name;
//finally upload the image
$upload=move_uploaded_file($source_path,$destination_path);
//check whether the image is uploaded or not
//if image cant move we will stop the process
if($upload==false){
    // $_SESSION['upload-image']="<div class='error'>Failed to add image</div>";
    // header('location:'.SITEURL.'admin/add-tours.php');
    // //stop th process
    // die();
    $image_name="";
}
}
// else{

//     //don't upload the image
//     $image_name="";
// }
if(isset($_FILES['image2_name']['name'])){
    //upload the image
    //to upload the image needs image name and source path and destination path
    $image2_name=$_FILES['image2_name']['name'];
    //auto renaming
    //get extension of our img(jpg)
    $ext2=end(explode('.',$image2_name));
    //rename the image
    $image2_name="tour_".rand(000,999).'.'.$ext2;//eg. tour_23.jpg
    
    
    $source_path2=$_FILES['image2_name']['tmp_name'];
    $destination2_path="../assets/images/tours/".$image2_name;
    //finally upload the image
    $upload2=move_uploaded_file($source_path2,$destination2_path);
    //check whether the image is uploaded or not
    //if image cant move we will stop the process
    if($upload2==false){
        // $_SESSION['upload2-image']="<div class='error'>Failed to add image 2</div>";
        // header('location:'.SITEURL.'admin/add-tours.php');
        // //stop th process
        // die();
        $image2_name="";
    }
    // else{
    
    //     //don't upload the image
    //     $image2_name="";
    // }
}
//create sql query
$sql="INSERT INTO tours SET
tour_name='$tour_name',
image_name='$image_name',
image2_name='$image2_name',
tour_description='$tour_description',
featured='$featured',
active='$active'
";
//execute the query
$res=mysqli_query($conn,$sql);
//check whether it is executed or not
if($res==TRUE){
    //success
    //set session message
    $_SESSION['add-tour']="<div class='success'> Tour Added Successfully</div>'";
    //redirect
    header('location:'.SITEURL.'admin/manage-tour.php');
    
}
else{
    //failed to add tour
    $_SESSION['add-tour']="<div class='error'> Failed To Add Tour</div>'";
    //redirect
    header('location:'.SITEURL.'admin/add-tour.php');
}

}



?>   


 <?php include('partials/footer.php');?>