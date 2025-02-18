<?php
session_start();
    include_once "partials/header2.php";

?>   

<div class="container px-4 py-5" id="featured-3">
        <div class="row g-4 py-5">
            <div class="col-md-10 mx-auto col-lg-5">
                <h2 class="pb-2 text-center mb-3">Sign In</h2>
                <?php
                if(isset($_SESSION['errormsg'])){
                  echo "<div class='alert alert-danger'>". $_SESSION['errormsg']. "</div>";
                  unset($_SESSION['errormsg']);
                }
                if(isset($_SESSION['feedback'])){
                  echo "<div class='alert alert-success'>". $_SESSION['feedback']. "</div>";
                  unset($_SESSION['feedback']);
                }
                
                
                ?>

                <form action="process/process_login.php" method="post"class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="donoremail" placeholder="name@example.com">
                    <label >Email address</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="donorpassword" placeholder="Password">
                    <label >Password</label>
                  </div>
                  <div class="checkbox mb-3">
                    
                  </div>
                  <button class="w-100 btn btn-lg btn-primary" type="submit" name="btnlogin">Sign In</button>
                  <hr class="my-4">
                  <small class="text-body-secondary">Don't have an account? <a href="register.php">Sign Up</a></small>
                </form>
              </div>
        
        </div>
      </div>



                    
      <?php
include_once "partials/footer.php";


?>