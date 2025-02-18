<?php
session_start();
require_once "../classes/Donation.php";
require_once "../classes/Library.php";

if(isset($_POST['btnregister'])){



    $donorfname = sanitize($_POST['donorfname']);
    $donorlname = sanitize($_POST['donorlname']);
    $donoremail = sanitize($_POST['donoremail']);
    $donorphone = sanitize($_POST['donorphone']);
    $donorpass = ($_POST['donorpassword']);
    $confirmpass = ($_POST['confirmpass']);

    if(trim($donorfname) =="" ||trim($donorlname) =="" || trim($donoremail) =="" || trim($donorphone) =="" || trim($donorpass) ==""){
        $_SESSION['errormsg'] = "please complete all fields";
        header("location:../register.php");
        exit();

    }elseif($donorpass != $confirmpass){
        $_SESSION['errormsg'] = "Password Fields must match.";
        header("location:../register.php");
        exit();

    }else{
        $d = new Donation;
        $id = $d->register($donorfname,$donorlname,$donorpass,$donoremail,$donorphone);
        if($id){
            $_SESSION['feedback'] = "Account Has Been Created.";
            header("location:../login.php");
            exit();
        }else{
            $_SESSION['errormsg'] = "error creating account ,please try again";
            header("location:../register.php");
            exit();

        }
                }
     }else{
    $_SESSION['errormsg'] = "please complete the form";
    header("location:../register.php");
    exit();

    


}






?>