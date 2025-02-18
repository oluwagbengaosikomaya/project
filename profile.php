<?php
session_start();
require_once "classes/Donation.php";
require_once "user_guard.php";
require_once "partials/header2.php";

$b = new Donation;
$dona = $b->get_donor($_SESSION['DonorID']);



?>

<div class="container-fluid ms-0 ps-0 mt-5">
        <div class="row">
          <div class="col-md-3">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;height: 100vh;">

              <?php
            require_once "partials/menu.php";


              ?>


              
              <hr>
              <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                  <strong>mdo</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                  <li><a class="dropdown-item" href="#">New project...</a></li>
                  <li><a class="dropdown-item" href="#">Settings</a></li>
                  <li><a class="dropdown-item" href="#">Profile</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 p-4">
            <h1>Profile</h1>

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
            
                <form action="process/process_update.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                   <label for="donorfname">Enter Last Name<span class="text-danger">*</span></label>
                   <input type="text" name="donorfname" class="form-control border-dark noround" id="donorfname" value="<?php echo $dona['donor_fname'];?>">

                </div>

                <div class="mb-3">
                   <label for="donorlname">Enter Last Name<span class="text-danger">*</span></label>
                   <input type="text" name="donorlname" class="form-control border-dark noround" id="donorlname" value="<?php echo $dona['donor_lname'];?>">

                </div>

                <div class="mb-3">
                   <label for="donorphone">Enter Phone No<span class="text-danger">*</span></label>
                   <input type="text" name="donorphone" class="form-control border-dark noround" id="donorphone" value="<?php echo $dona['donor_phoneno'];?>">

                </div>

                <div class="mb-3">
                   <label for="donoraddress">Enter Address</label>
                   <textarea name="donoraddress" id="donoraddress" class="form-control border-dark noround"></textarea>
                </div>

               
                <div class="mb-3">
                  
                   <button type="submit" name="btnupdate" class="btn btn-success">Update</button>
                   

                </div>




                </form>

          </div>
        </div>
      </div>

      <?php

require_once "partials/footer.php";

?>

      

    
<script></script>
</body>
</html>