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
if(isset($_GET['id']) AND isset($_GET['image_name']) AND isset($_GET['image2_name']))
   {
        //get the value
        $id=$_GET['id'];
        $image_name=$_GET['image_name'];
        $image2_name=$_GET['image2_name'];
        //remove
        if($image_name != "")
             {

               //image is available
               $path="../assets/images/tours/".$image_name;
            //    $path2="../assets/images/tours/".$image2_name;
               //remove image 
               $remove=unlink($path);
            //    $remove2=unlink($path2);
               //if failed to remove image
               if($remove==false)
                   {
                      //set the session 
                       $_SESSION['remove-tour']="<div class='error'>Failed to remove image</div>";
                       //redirect to manage tour
                        header('location:'.SITEURL.'admin/manage-tour.php');
                      //stop the process
                       die();

                    } 
                   
                }
                if($image2_name != "")
                {
   
                  //image is available
                  $path2="../assets/images/tours/".$image2_name;
               //    $path2="../assets/images/tours/".$image2_name;
                  //remove image 
                  $remove2=unlink($path2);
               //    $remove2=unlink($path2);
                  //if failed to remove image
                  if($remove2==false)
                      {
                         //set the session 
                          $_SESSION['remove-tour2']="<div class='error'>Failed to remove image 2</div>";
                          //redirect to manage tour
                           header('location:'.SITEURL.'admin/manage-tour.php');
                         //stop the process
                          die();
   
                       } 
                      
                   }
        
            


                $sql="DELETE FROM tours WHERE id=$id";
                $res=mysqli_query($conn,$sql);
                if($res==true)
                {
                    $_SESSION['delete-tour']="<div class='success'>Tour deleted successfully</div>";
                    header('location:'.SITEURL.'admin/manage-tour.php');
                }
                else
                {
                    $_SESSION['delete-tour']="<div class='error'>Failed to delete tour</div>";
                    header('location:'.SITEURL.'admin/manage-tour.php'); 

                }
            }
else
{
    //redirect to manage tour
header('location:'.SITEURL.'/admin/manage-tour.php');
}



