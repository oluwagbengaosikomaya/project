<?php
session_start();
require_once "classes/Donation.php";

$d = new Donation;
$d->logout();
header("location:login.php");



?>