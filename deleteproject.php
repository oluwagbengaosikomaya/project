<?php
    require_once "classes/Project.php";
    $id = $_GET['ProjectID'];
    $pro = new Project;
    $pro->delete_project($id);
    header('location: projecthistory.php');
?>