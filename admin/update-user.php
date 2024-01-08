<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper ">
              <h1> Update User</h1>
              <br><br>
              <?php
              // get the id of selected admin
              $id=$_GET['id'];
              //create sql query to get the details
              $sql="SELECT * FROM tbl_user WHERE id=$id";
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
                        $email=$row['email'];
                        $phone_no=$row['phone_no'];
                        $address=$row['address'];


                    }
                    else
                    {
                    //redirect to manage admin page
                    header("location:".SITEURL.'admin/manage-user.php');
                    }
              }
              ?>
              <form action="" method="post">
              <table class="tbl-30">
                  <tr>
                      <td> Full name </td>
                      <td><input type="text" id="full-name" name="full_name" value="<?php echo $full_name; ?> "minlength="5"
                maxlength="100" pattern="^[a-zA-Z]{3,30}$" title="use more than three alphabet letters" required  /></td>
                  </tr>
                  <tr>
                      <td> Username </td>
                      <td>  <input type="text" id="username" name="username" value="<?php echo $username; ?>" minlength="6"
                maxlength="35"  title="use more than 5 any character" required />
                     </td>
                  </tr>
                  <tr>
                      <td> Email </td>
                      <td> <input type="email" id="email" name="email" value="<?php echo $email; ?>"
                      pattern="^[a-zA-Z0-9_]+@[a-zA-Z]+[.]+com$" title="enter a valid email address eg.someone1234@gmail.com"
                required />
                    </td>
                  </tr>
                  <tr>
                      <td> Phone_no </td>
                      <td> <input type="tel" id="phone-number" name="phone_no"
                title="please enter the country code and hyphen and the rest digits" pattern="^[+]+[0-9]{3} [0-9]{9}$"
                required  value="<?php echo $phone_no; ?>"></td>
                  </tr>
                  <tr>
                      <td> Address </td>
                      <td> <input type="text" id="address" name="address" required minlength="3"
                maxlength="50" title="please enter 3 or more than characters"  value="<?php echo $address; ?>"></td>
                  </tr>
                  <tr>
                      <td colspan="2"> 
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" class="btn-secondary" name="submit" value="Update User"></td>
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
    $full_name =$_POST['full_name'];
    $username =$_POST['username'];
    $email =$_POST['email'];
    $phone_no =$_POST['phone_no'];
    $address =$_POST['address'];
    //create sql query to update admin
    $sql="UPDATE tbl_user SET
    full_name='$full_name',
   username='$username',
   email='$email',
   phone_no='$phone_no',
   address='$address'
    WHERE id='$id'
    ";
    //execute the query
    $res=mysqli_query($conn,$sql);
    //check whether it is executed or not
    if($res==TRUE){
        //updated successfully
        $_SESSION['update-user']="<div class='success'> User Updated Successfully</div>";
        header("location:".SITEURL."admin/manage-user.php");
    }
    else{
        //does not updated successfully 
        $_SESSION['update-user']="<div class='error'> Failed to Update User</div>";
        header("location:".SITEURL."admin/manage-user.php");
    }
}
?>

<?php include('partials/footer.php');?>