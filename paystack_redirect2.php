<?php
session_start();
require_once "user_guard2.php";
require_once "classes/Payment1.php";

$ref = $_SESSION['refno'];  
if(isset($_SESSION['refno'])){
    $p = new Payment1;
    $data = $p->paystack_verify_step_two($ref);
    $status = $data->status;

    // echo "pre";
    // print_r($data);
    // echo "/pre";
    // exit();

    $actual_amt = $data->data->amount;
    $response =  $data->data->gateway_response;
    $p->payment1_update($status,$ref);
    $_SESSION['feedback']= "";
   header("location:payment_success.php");



}else{
    $_SESSION['errormsg']= "please start the payment process";
  //  header("location:donor_pay.php");
}



?>