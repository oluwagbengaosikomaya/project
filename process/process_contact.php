<?php
session_start();
require_once "../classes/Contact.php";
require_once "../classes/Library.php";


if(isset($_POST['sub'])){
    $f = sanitize($_POST["fullname"]);
    $e = sanitize($_POST["email"]);
    $s = sanitize($_POST["subject"]);
    $m = sanitize($_POST["message"]);
    if(empty($f) || empty($e) || empty($s) || empty($m)){
        $_SESSION["errormsg"] = "All fields required";
        header("location:../index.php");    
    }else{
        $r = new Contact;
        $xr = $r->contact_register($f,$e,$s,$m);
        $_SESSION['feedback'] = "Message Received";
        header('location:../index.php');
        exit();
    }



}


?>