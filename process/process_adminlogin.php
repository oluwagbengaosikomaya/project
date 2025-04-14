<?php

session_start();
require_once "../classes/Admin.php";
require_once "../classes/Library.php";

if (isset($_POST["btnlog"])) {
    $user = sanitize($_POST["user"]);
    $pass = $_POST["pass"];
    if (trim($user) ==""|| trim($pass) =="") {
        $_SESSION['errormsg'] = "Only Registered Admin are Allowed";
        header("location:../adminlogin.php");     
    } else {
        $a = new Admin;
        $app = $a->admin_login($user,$pass);
        if ($app) {
            $_SESSION["admin_id"] = $app;
            header("location: ../admindash.php");
            exit();
        } else {
            $_SESSION["errormsg"] = "Wrong e-mail or password";
            header("location: ../adminlogin.php");
        }
    }
} else {
    $_SESSION["errormsg"] = "Please login the proper way";
    header("location: ../adminlogin.php");
    exit();
}






?>