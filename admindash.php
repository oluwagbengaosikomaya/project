<?php
session_start();

require_once "partials/admin_header.php";
require_once "admin_guard.php";

?>



      <div class="container-fluid ms-0 ps-0 mt-5">
        <div class="row">
          <div class="col-md-3">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;height: 100vh;">

              <?php
            require_once "partials/admin_menu.php";


              ?>


              
              <hr>
              <div class="dropdown">
                <!--  -->
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
            <h1>DETAILS OF USERS</h1>


            <?php
              if(isset($_SESSION['admin_id'])){
                ?>
            
                <?php
              }else{
                ?>


                <?php
              }
              ?>
</div>

            


      

    

</body>
</html>