<?php
session_start();
require_once "user_guard.php";
require_once "classes/Payment.php";

$ref = $_SESSION['refno'];  
if(isset($_SESSION['refno'])){
    $p = new Payment;
    $data = $p->paystack_verify_step_two($ref);
    $status = $data->status;
    $actual_amt = $data->data->amount;
    $response =  $data->data->gateway_response;
   
    $p->payment_update($status,$ref);

    $_SESSION['feedback']= "";
    header("location:payment_success.php");


}else{
    $_SESSION['errormsg']= "please start the payment process";
  //  header("location:donor_pay.php");
}



?>