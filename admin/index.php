
<?php include('partials/menu.php');?>
<!-- main section -->
  <div class="main-content">
         <div class="wrapper">
         
                <h1> DASHBOARD </h1>
                <br>
                <?php
           if(isset($_SESSION['login']))
           {
           echo $_SESSION['login'];
           unset($_SESSION['login']);//Redirect and message will be lost
           } 
          ?>
          <br>
                     <div class="col-4 text-center">
                           <h1> 5 </h1>
                          <p>Catgories</p>
                     </div>
                     <div class="col-4 text-center">
                           <h1> 5 </h1>
                          <p>Catgories</p>
                     </div>
                     <div class="col-4 text-center">
                           <h1> 5 </h1>
                          <p>Catgories</p>
                     </div>
                     <div class="col-4 text-center">
                           <h1> 5 </h1>
                          <p>Catgories</p>
                     </div>
                     <div class="clear-fix"> </div>
         </div>
  </div>
  <?php include('partials/footer.php');?>

