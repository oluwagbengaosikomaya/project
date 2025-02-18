<?php
session_start();
require_once "classes/Admin.php";

$d = new Admin;
$d->logout();
header("location:login.php");



?>