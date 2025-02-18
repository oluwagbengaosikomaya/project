<?php
    require_once "classes/Post.php";
    $id = $_GET['id'];
    $blo = new Post;
    $blo->delete_post($id);
    header('location: posthistory.php');
?>