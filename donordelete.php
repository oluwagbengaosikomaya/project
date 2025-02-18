<?php
session_start();
require_once "classes/Donation.php";
$id = $_GET['DonorID'];
$gal = NEW Donation;
$gal->deleteDonor($id);

header("location:donor.php");




?>  