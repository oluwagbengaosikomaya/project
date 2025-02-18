<?php
session_start();
require_once "../user_guard2.php";
require_once "../classes/Payment1.php";
require_once "../classes/Donate_guest.php";

//TO DO: we want to retrieve the transcation details from the database by using the transcation reference in session

//we will then send these details to paystack's endpoint 1 - initializepayment.

if(isset($_POST['btnsub']) && isset($_SESSION['refno'])){
    $p = new Payment1;
    $deets = $p->donate_ref($_SESSION['refno']);
    $amt = $deets['guest_amount'];
    $email = $deets['guest_email'];
    $guestf = $deets['guest_fname'];
    $guestl = $deets['guest_lname'];
    $reference = $_SESSION['refno'];
    $payrsp = $p->paystack_initialize_step_one($amt,$email,$reference);

    exit();
    if($payrsp && $payrsp->status == true){
       
      $auth_url = $payrsp->data->authorization_url;
      header("location:$auth_url");
      exit();
        }else{
            $_SESSION['errormsg'] = "payment clould not be initiated, Try again".$payrsp->message;
            header("location:../donate.php");
            exit();
    }

}else{
    header("location:../confirmdonate.php");
    exit();
}


?>