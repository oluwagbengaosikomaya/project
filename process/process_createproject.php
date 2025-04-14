<?php
session_start();
require_once("../classes/Project.php");
if (isset($_POST["btnproject"])) {
    $name = htmlspecialchars($_POST["name"]);
    $description = htmlspecialchars($_POST["description"]);
    $amount = htmlspecialchars($_POST["amount"]);
    $location = htmlspecialchars($_POST["location"]);
    $manager = htmlspecialchars($_POST["manager"]);
   $filename = $_FILES["image"];
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";die(); 
    if ($filename['error'] == 0) {
        $ext = pathinfo($filename['name'], PATHINFO_EXTENSION);
        $allowed = ["jpg", "png", "jpeg"];
        if (!in_array(strtolower($ext), $allowed)) {
            $_SESSION['errormsg'] = 'This type of file is not allowed';
            header('location:../createproject.php');exit();
        }
    }
    if (empty($name)||empty($description)||empty($amount)||empty($location)||empty($manager)) {
        $_SESSION['errormsg'] = "All fields are required.";
        header("location:../createproject.php");
    }
    else{
        $pro = new Project;
        $pro->insert_project($name, $description,$amount,$location,$manager, $filename) ;
        $_SESSION['feedback'] = "Success.";
        header("location:../index.php");
     }
} else {
    $_SESSION['errormsg'] = "Please submit the form.";
    header("location:../createproject.php");
}
