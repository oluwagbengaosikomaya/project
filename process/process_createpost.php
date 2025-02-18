<?php
session_start();
require_once("../classes/Post.php");
if (isset($_POST["btncreate"])) {
    $title = htmlspecialchars($_POST["title"]);
    $author = htmlspecialchars($_POST["author"]);
    $description = htmlspecialchars($_POST["description"]);
   $filename = $_FILES["image"];
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";die(); 
    if ($filename['error'] == 0) {
        $ext = pathinfo($filename['name'], PATHINFO_EXTENSION);
        $allowed = ["jpg", "png", "jpeg"];
        if (!in_array(strtolower($ext), $allowed)) {
            $_SESSION['errormsg'] = 'This type of file is not allowed';
            header('location:../createpost.php');exit();
        }
    }
    if (empty($title)||empty($author) || empty($description)) {
        $_SESSION['errormsg'] = "All fields are required.";
        header("location:../createpost.php");
    }
    else{
        $pos = new Post;
        $pos->insert_post($title, $author,$description, $filename) ;
        $_SESSION['feedback'] = "Blog sent successfully.";
        header("location:../index.php");
     }
} else {
    $_SESSION['errormsg'] = "Please submit the form.";
    header("location:../createpost.php");
}
