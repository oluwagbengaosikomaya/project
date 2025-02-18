<?php
session_start();
require_once "user_guard.php";
require_once "partials/header.php";
 

?>
		
                  
    

      <div class="container-fluid ms-0 ps-0 mt-5">
        <div class="row">
          <div class="col-md-3">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;height: 100vh;">

              <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                  <a href="index.php" class="nav-link active" aria-current="page">
                    <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                    Home
                  </a>
                </li>
                <li>
                  <a href="#" class="nav-link text-white">
                    <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                    Dashboard
                  </a>
                </li>
                <li>
                  <a href="#" class="nav-link text-white">
                    <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                    Orders
                  </a>
                </li>
                <li>
                  <a href="#" class="nav-link text-white">
                    <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                    Projects
                  </a>
                </li>
                <li>
                  <a href="#" class="nav-link text-white">
                    <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                    Donors
                  </a>
                </li>
              </ul>
              <hr>
              <!-- <div class="dropdown">
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
          <div class="col-md-9 p-4"> -->
            <h1>DONATION</h1>






          </div>
        </div>
      </div>


      <?php

require_once "partials/footer.php";

?>

        
