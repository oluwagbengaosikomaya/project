<?php
session_start();
require_once "classes/Payment1.php";
$id = $_GET['guest_id'];
$gal = NEW Payment1;
$gal->delete_guestdonor($id);


header("location:guest_donor.php");

?>  