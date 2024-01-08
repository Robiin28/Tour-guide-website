<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper ">
              <h1> Update status</h1>
              <br><br>
              <?php
              // get the id of selected admin
              $id=$_GET['id'];
              //create sql query to get the details
              $sql="SELECT * FROM tbl_review WHERE id=$id";
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
                        //  echo"admin available"; 
                        $row=mysqli_fetch_assoc($res);
                        $status=$row['status'];
                    


                    }
                    else
                    {
                    //redirect to manage admin page
                    header("location:".SITEURL.'admin/manage-review.php');
                    }
              }
              ?>
              <form action="" method="post">
              <table class="tbl-30">
                  <tr>
                      <th> status </th>
                      <td>
                        wait to checked:<input type="radio" name="status" value="wait to checked">
                        
                        positive:<input type="radio"  name="status" value="positive"> 
                    
                        negative:<input type="radio" name="status"  value="negative">

            </tr>
                  </tr>
                  <tr>
                      <td colspan="2"> 
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" class="btn-secondary" name="submit" value="Update status"></td>
                  </tr>

              </table>
              </form>


</div>
</div>
<?php
//check the submit button is clicked or not
if(isset($_POST['submit']))
{
    //get all the values form the form
    $id=$_POST['id'];
    $status =$_POST['status'];
   
    //create sql query to update admin
    $sql="UPDATE tbl_review SET
  
   status='$status'
    WHERE id='$id'
    ";
    //execute the query
    $res=mysqli_query($conn,$sql);
    //check whether it is executed or not
    if($res==TRUE){
        //updated successfully
        $_SESSION['update-review']="<div class='success'> Status Updated Successfully</div>";
        header("location:".SITEURL."admin/manage-review.php");
    }
    else{
        //does not updated successfully 
        $_SESSION['update-review']="<div class='error'> Failed to Update Status</div>";
        header("location:".SITEURL."admin/manage-review.php");
    }
}
?>

<?php include('partials/footer.php');?>