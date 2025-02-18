<?php
 
if(!(isset($_SESSION['DonorID']))){
    $_SESSION['errormsg'] = "You must be logged in to access this page";
  header("location:login.php");
}



?>