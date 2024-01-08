<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper ">
              <h1> Update Admin</h1>
              <br><br>
              <?php
              // get the id of selected admin
              $id=$_GET['id'];
              //create sql query to get the details
              $sql="SELECT * FROM tbl_admins WHERE id=$id";
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
                        $full_name=$row['full_name'];
                        $username=$row['username'];


                    }
                    else
                    {
                    //redirect to manage admin page
                    header("location:".SITEURL.'admin/manage-admin.php');
                    }
              }
              ?>
              <form action="" method="post">
              <table class="tbl-30">
                  <tr>
                      <td> Full name </td>
                      <td> <input type="text" name="full_name" value="<?php echo $full_name; ?>"></td>
                  </tr>
                  <tr>
                      <td> Username </td>
                      <td> <input type="text" name="username" value="<?php echo $username; ?>"></td>
                  </tr>
                  <tr>
                      <td colspan="2"> 
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" class="btn-secondary" name="submit" value="update"></td>
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
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];
    //create sql query to update admin
    $sql="UPDATE tbl_admins SET
    full_name='$full_name',
    username='$username'
    WHERE id='$id'
    ";
    //execute the query
    $res=mysqli_query($conn,$sql);
    //check whether it is executed or not
    if($res==TRUE){
        //updated successfully
        $_SESSION['update']="<div class='success'> Admin Updated Successfully</div>";
        header("location:".SITEURL."admin/manage-admin.php");
    }
    else{
        //does not updated successfully 
        $_SESSION['update']="<div class='error'> Failed to Update</div>";
        header("location:".SITEURL."admin/manage-admin.php");
    }
}
?>

<?php include('partials/footer.php');?>