<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper ">
        
        <h1> Add Destination</h1>
        <br>
        <br>
        <?php
        ob_start();
          if(isset($_SESSION['add-dest']))
             {
              echo $_SESSION['add-dest'];
              unset($_SESSION['add-dest']);//Redirect and message will be lost

             }
             ?>
             <br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-50"> 
                <tr>
                    <td>Destination Name: </td>
                    <td>
                        <!-- <input type="text" name="full_name" placeholder="Enter Your Name"> -->
                        <input type="text" name="destination_name" placeholder="Enter hotel name "/>
                    </td>
                </tr>
                <tr>
                    <td>destination description: </td>
                    <td>
                        <!-- <input type="text" name="username" placeholder="User-name"></td> -->
                        <textarea name="description"></textarea>
                    </td>
                </tr>
                 <tr>
                    <td>destination_image 1 : </td>
                    <td>
                        <input type="file" name="image_name">
                    </td>
                </tr>
                <tr>
                    <td>destination_image 2 : </td>
                    <td>
                        <input type="file" name="image2_name">
                    </td>
                </tr>
                <tr>
                    <td>tours: </td>
                    <td>
                        <select name='tours_id'>
                    <?php    
                    $sql ="SELECT*FROM tours WHERE active='YES'";
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
                $tour_name=$row['tour_name'];
                ?>
                <option value="<?php echo $id; ?>"><?php echo $tour_name; ?></option> 
                <?php

             }
                    }
                    else
                    {
                      //we don't have tour
                      ?>
                      <option value="0">No Tour found</option>
                      <?php
                    }
                    ?>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>location : </td>
                    <td>
                        <input type="text" name="location">
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
                        
                        <input type="submit"  name="submit" class='btn-secondary' value="Add Destination">
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
$destination_name=$_POST['destination_name'];
$description=$_POST['description'];
$location=$_POST['location'];
$tours_id=$_POST['tours_id'];
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
$image_name="destination_".rand(0000,9999).'.'.$ext;//eg. destination_23.jpg


$source_path=$_FILES['image_name']['tmp_name'];
$destination_path="../assets/images/destination/".$image_name;
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
    $dxi=explode('.',$image2_name);
    $ext2=end($dxi);
    //rename the image
    $image2_name="destination_".rand(000,999).'.'.$ext2;//eg. tour_23.jpg
    
    
    $source_path2=$_FILES['image2_name']['tmp_name'];
    $destination2_path="../assets/images/destination/".$image2_name;
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
$sql2="INSERT INTO destination SET
destination_name='$destination_name',
image_name='$image_name',
image2_name='$image2_name',
tours_id='$tours_id',
location='$location',
description='$description',
featured='$featured',
active='$active'
";
//execute the query
$res2=mysqli_query($conn,$sql2);
//check whether it is executed or not
if($res2==TRUE){
    //success
    //set session message
    $_SESSION['add-dest']="<div class='success'> Destination Added Successfully</div>'";
    //redirect
    header('location:'.SITEURL.'admin/manage-destination.php');
    ob_end_flush();
}
else{
    //failed to add tour
    $_SESSION['add-dest']="<div class='error'> Failed To Add destination</div>'";
    //redirect
    header('location:'.SITEURL.'admin/add-destination.php');
}

}



?>   


 <?php include('partials/footer.php');?>