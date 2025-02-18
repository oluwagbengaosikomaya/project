<?php
session_start();
require_once "../user_guard.php";
require_once "../classes/Payment.php";


if(isset($_POST['btnconfirm']) && isset($_SESSION['refno'])){
    $p = new Payment;
    $paypay  = $p->payment_ref($_SESSION['refno']);
    $amt = $paypay['payment_amount_paid'];
    $email = $paypay['donor_email'];
    $donorf = $paypay['donor_fname'];
    $donorl = $paypay['donor_lname'];
    $reference = $_SESSION['refno'];
    $payrsp = $p->paystack_initialize_step_one($amt,$email,$reference);

    if($payrsp && $payrsp->status == true){
       
      $auth_url = $payrsp->data->authorization_url;
      header("location:$auth_url");
      exit();
        }else{
            $_SESSION['errormsg'] = "payment clould not be initiated, Try again".$payrsp->message;
            header("location:../donor_pay.php");
            exit();
    }


}else{
    header("location:../confirm.php");
    exit();
}


?>