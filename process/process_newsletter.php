<?php
session_start();
require_once "../classes/Newsletter.php";
require_once "../classes/Library.php";

if(isset($_POST['btnregister'])){
    

//       echo"<pre>";
//   print_r($newfname);
//   echo"</pre>";


    $newfname = sanitize($_POST['news_fname']);
    $newlname = sanitize($_POST['news_lname']);
    $newemail = sanitize($_POST['news_email']);
   
    if(trim($newfname) =="" ||trim($newlname) =="" || trim($newemail) ==""){
        $_SESSION['errormsg'] = "All fields required";
        header('location:../index.php');
        
    }else{
        $d = new Newsletter;
        $d->insert_newsletter($newfname,$newlname,$newemail);
        $_SESSION['feedback'] = "Subscription successful";
        header('location:../index.php');
        exit();
    }
} else {
    $_SESSION['errormsg'] = "Please go back and click the button";
    header('location:../index.php#mailsection');
}


