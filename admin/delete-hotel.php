<?php include('../config/constant.php');?>
<?php 
if(isset($_SESSION['user']))//login is not set
   {
        //user is login
         //redirect to login page

   }
      else{
         $_SESSION['no-login']="<div class='error text-center'>PLEASE LOGIN TO ACCESS ADMIN PANAL</div>";
          //redirect
        header('location:'.SITEURL.'admin/login-admin.php');
         }
if(isset($_GET['id']) AND isset($_GET['image_name']))
   {
        //get the value
        $id=$_GET['id'];
        $image_name=$_GET['image_name'];
        //remove
        if($image_name != "")
             {

               //image is available
               $path="../assets/images/hotel/".$image_name;
            //    $path2="../assets/images/tours/".$image2_name;
               //remove image 
               $remove=unlink($path);
            //    $remove2=unlink($path2);
               //if failed to remove image
               if($remove==false)
                   {
                      //set the session 
                       $_SESSION['remove-hotel']="<div class='error'>Failed to remove image</div>";
                       //redirect to manage tour
                        header('location:'.SITEURL.'admin/manage-hotel.php');
                      //stop the process
                       die();

                    } 
                   
                }

                $sql="DELETE FROM tbl_hotel WHERE id=$id";
                $res=mysqli_query($conn,$sql);
                if($res==true)
                {
                    $_SESSION['delete-hotel']="<div class='success'>Hotel deleted successfully</div>";
                    header('location:'.SITEURL.'admin/manage-hotel.php');
                }
                else
                {
                    $_SESSION['delete-hotel']="<div class='error'>Failed to delete Hotel</div>";
                    header('location:'.SITEURL.'admin/manage-hotel.php'); 

                }
            }
else
{
    //redirect to manage tour
header('location:'.SITEURL.'/admin/manage-hotel.php');
}



