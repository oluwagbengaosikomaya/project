<?php
session_start();
require_once "user_guard2.php";
require_once "partials/header.php";
require_once "classes/Payment1.php";
$p = new Payment1;
$session_ref = isset($_SESSION['refno'])? $_SESSION['refno'] : 0;

// $paydeets = $p->donate_ref($session_ref);
$deets = $p->donate_ref($_SESSION['refno']);













// echo"<pre>";

// print_r($id);

// echo"</pre>";
?>



          <div class="col-md-9 p-4">
            <h1>Payment Confirmation</h1>
            <?php
                // if(isset($_SESSION['errormsg'])){
                //   echo "<div class='alert alert-danger'>". $_SESSION['errormsg']."</div>";
                //   unset($_SESSION['errormsg']);
                // }
                // if(isset($_SESSION['feedback'])){
                //   echo "<div class='alert alert-success'>". $_SESSION['feedback']."</div>";
                //   unset($_SESSION['feedback']);
                // }
                
                
                ?>


            <?php  
                if(isset($_SESSION['guest_id'])){

                    echo "<h4>please take note of your referrence no: {$_SESSION['refno']}</h4>";
                    "<p>You are about to make advertisement payment for the business with the following details:</p>";
                     
                
                }
                           

            ?>
          <table class='table'>
                <tr>
                <th>First name</th>
                <td><?php echo $list['guest_fname'];?></td>

                </tr>

                <tr>
                <th>Last name</th>
                <td></td>

                </tr>

                
                <tr>
                <th>Email Address</th>
                <td></td>
                </tr>
                
                 
                <tr>
                <th>Phone Number</th>
                <td></td>

                </tr>

                <tr>
                <th>Amount</th>
                <td></td>

                </tr>
    
          </table>
          <form action="process/process_confirmdonate.php" method="post">
            <p align='left'>
              <button type="submit" class='btn btn-danger noround'name="btnconfirm">Process to make payment</button>
            </p>
          </form>

          </div>
        </div>
      </div>

      <?php



?>

      

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>