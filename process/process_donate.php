<?php
session_start();
require_once "../classes/Library.php";
require_once "../classes/Payment1.php";


// echo"<pre>";
// print_r($id);
// echo"</pre>";


if(isset($_POST['btnsub'])){
 
    $guest_fname = sanitize($_POST['guest_fname']);
    $guest_lname = sanitize($_POST['guest_lname']);
    $guest_email = sanitize($_POST['guest_email']);
    $guest_phoneno = sanitize($_POST['guest_phoneno']);
    $guest_amount = sanitize($_POST['guest_amount']);
    $ref = time().rand();
    $_SESSION['refno'] = $ref;
    $_SESSION['guest_amount'] = $guest_amount;
    $_SESSION['guest_email'] = $guest_email;
    $_SESSION['guest_fname'] = $guest_fname;
    $_SESSION['guest_lname'] = $guest_lname;
    $_SESSION['guest_phoneno'] = $guest_phoneno;


    if(trim($guest_fname) =="" ||trim($guest_lname) =="" || trim($guest_email) =="" || trim($guest_phoneno) =="" || trim($guest_amount) ==""){
        $_SESSION['errormsg'] = "please complete all fields";
        header("location:../donate.php");
        exit();
    }else{
        $d = new Payment1;
        $id = $d->guest_details($guest_fname,$guest_lname,$guest_email,$guest_phoneno,$guest_amount);
        // $deets = $d->payment1_ref($_SESSION['refno']);  
    //     $amt = $id['guest_amount'];
    //     $email = $id['guest_email'];
    //    $guestf = $id['guest_fname'];
    //    $guestl = $id['guest_lname'];
    //    $phoneno = $id['guest_phoneno'];

        $p = $d->payment1_record($_SESSION['guest_amount'],$_SESSION['guest_email'],$_SESSION['refno']);
            
    //  $reference = $_SESSION['refno'];
    $payrsp = $d->paystack_initialize_step_one($_SESSION['guest_amount'],$_SESSION['guest_email'],$_SESSION['refno']);
    // exit();
    if($payrsp && $payrsp->status == true){
       
        $auth_url = $payrsp->data->authorization_url;
        header("location:$auth_url");
        exit();
    }else{
        $_SESSION['errormsg'] = "payment clould not be initiated, Try again".$payrsp->message;
        header("location:../donate.php");
        exit();
}
    }
    


}   
    



?>