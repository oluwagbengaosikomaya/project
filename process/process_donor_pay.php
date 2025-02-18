<?php
session_start();
require_once "../user_guard.php";
require_once "../classes/Payment.php";


if(isset($_POST['btnpay'])){

    $p = new payment;
  
    $amt_paypay = $p->get_donor_amount();
    $amt = $amt_paypay['donor_amt_amount'];
    $donorid = $_SESSION['DonorID'];
    $ref = time().rand();

    $_SESSION['refno'] = $ref ;

    $rsp = $p->payment_record($amt,$donorid,$ref);
    header("location:../confirm.php");
    exit;

}else{
    $_SESSION['errormsg'] = "you need to click the button";
    header("location../donor_pay.php");
    exit();
}

?>