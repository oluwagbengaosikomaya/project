<?php
 
if((isset($_SESSION['guest_id']))){
    $_SESSION['errormsg'] = "";
  header("location:index.php");
}



?>