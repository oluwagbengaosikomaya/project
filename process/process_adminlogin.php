<?php

session_start();
require_once "../classes/Admin.php";
require_once "../classes/Library.php";

if(isset($_POST['btnlog'])){

    $user = sanitize($_POST["user"]);
    $pass = $_POST["pass"];
    if(empty($user) || empty($pass)){
        $_SESSION["errormsg"] = "username or password field cannot be empty";
        header("location:../adminlogin.php");
        exit;
    }else{
    $r = new Admin;
    $dor = $r->Admin_login($user,$pass);
    if($dor){
        $_SESSION['admin_id'] = $dor;
        header("location:../dashboard.php");
        exit();
    }else{
        // header("location:../login.php"); exit();
    }
    }
}else{
    $_SESSION['errormsg'] = "please complete the form";
    // header("location:../login.php");
    exit();


}



?>