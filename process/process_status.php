<?php
    session_start();
    require_once "../classes/Donation.php";
    if(isset($_POST['update'])){
        $status = $_POST['status'];
        $id = $_POST['stat'];
        $err = new Donation();
        $err->get_donorStatus($status, $id);
        header('location:../donor.php');
    }else{
        header("location: ../donor.php");
    }


    if(isset($_POST['updel'])){
        $id = $_POST['del'];
        $err = new Donation();
        $err->deleteDonor($id);
        header('location:../donor.php');
    }else{
        header("location: ../donor.php");
    }
?>