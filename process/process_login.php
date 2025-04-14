<?php
session_start();
require_once "../classes/Donation.php";
require_once "../classes/Library.php";

if(isset($_POST['btnlogin'])){

    $email = sanitize($_POST['donoremail']);
    $password = $_POST['donorpassword'];
    if (trim($email) ==""|| trim($password) =="") {
        $_SESSION['errormsg'] = "";
        header("location:../login.php");  
    }
    $r = new Donation;
    $dor = $r->login($email,$password);
}else{
    $_SESSION['errormsg'] = "please complete the form";
    header("location:../login.php");
    exit();


}
?>