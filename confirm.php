<?php
session_start();
require_once "user_guard.php";
require_once "partials/header.php";
require_once "classes/Payment.php";
$p = new Payment;
$session_ref = isset($_SESSION['refno'])? $_SESSION['refno'] : 0;
$paydeets = $p->payment_ref($session_ref);

// echo"<pre>";

// print_r($paydeets);
// echo"</pre>";
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
            <h1>Donor Payment Confirmation</h1>
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


            <?php  
                if(isset($_SESSION['DonorID'])){

                    echo "<h4>please take note of your referrence no: {$_SESSION['refno']}</h4>";
                    "<p>You are about to make a donation payment:</p>";
                     
                }else{
                    $_SESSION['errormsg'] = "you need to click on this button";
                    header("location:donor_pay.php");
                }
                           

            ?>
          <table class='table'>
                <tr>
                <th>First Name</th>
                <td><?php echo $paydeets['donor_fname'] ?></td>

                </tr>

                <tr>
                <th>Last Name</th>
                <td><?php echo $paydeets['donor_lname'] ?></td>

                </tr>


                <tr>
                <th>Address</th>
                <td><?php echo $paydeets['donor_address'] ?></td>

                </tr>
                
                <tr>
                <th>Email Address</th>
                <td><?php echo $paydeets['donor_email'] ?></td>

                </tr>
                

                <tr>
                <th>Amount</th>
                <td><?php echo $paydeets['payment_amount_paid'] ?></td>

                </tr>
    
          </table>
          <form action="process/process_confirm.php" method="post">
            <p align='left'>
              <button type="submit" class='btn btn-danger noround'name="btnconfirm">Process to make payment</button>
            </p>
          </form>

          </div>
        </div>
      </div>

      <?php

require_once "partials/footer.php";

?>

      

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>