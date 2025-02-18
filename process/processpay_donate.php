<?php
session_start();
require_once "../user_guard2.php";
require_once "../classes/Payment1.php";


if(isset($_POST['btnpay'])){


//     echo"<pre>";

// print_r($rsp);

// echo"</pre>";


    $p = new payment1;
  
    $amt_paypay = $p->get_donate_amount();
    $amt = $amt_paypay['guest_amount'];
    $guestid = $_SESSION['guest_id'];
    $ref = time().rand();

    $_SESSION['refno'] = $ref ;
   

    $rsp = $p->donate_record($amt,$guestid,$ref);
    header("location:../confirmdonate.php");
    exit;

}else{
    $_SESSION['errormsg'] = "you need to click the button";
    header("location../donate.php");
    exit();
}

?>