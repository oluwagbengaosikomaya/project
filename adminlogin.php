<?php
    session_start();
     include_once "partials/headeradmin.php";
    
    

   $hashed = password_hash("admin000", PASSWORD_DEFAULT);

    // echo "<pre>";
    // print_r($_POST);
    //     echo "</pre>";

?>



<div class="container px-4 py-5" id="featured-3">
        <div class="row g-4 py-5">
            <div class="col-md-10 mx-auto col-lg-8">
                <h2 class="pb-2 text-center mb-3">ADMIN LOGIN</h2>

                <?php
                if(isset($_SESSION['errormsg'])){
                  echo "<div class='alert alert-danger'>". $_SESSION['errormsg']."</div>";
                  unset($_SESSION['errormsg']);
                }
                if(isset($_SESSION['feedback'])){
                  echo "<div class='alert alert-success'>". $_SESSION['feedback']."</div>";
                  unset($_SESSION['feedback']);
                }
             
                ?>
                
                <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" action="process/process_adminlogin.php" method="post">
                  
                <div class="form-floating mb-3">
                

                        <input type="user" class="form-control"  placeholder="name@example.com"name="user">
                        <label>Username</label>
                      </div>

                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="pass">
                    <label >Password</label>
                  </div>
                  
                  <button class="w-100 btn btn-lg btn-dark" name ="btnlog" type="submit">LOGIN</button>
         
                </form>
                
                
              </div>
              
        
        </div>
      </div>
