<?php
// session_start();
if (!isset($_SESSION['admin_id'])) {
    $_SESSION['errormsg'] = "You must be logged in as the admin to access this page.";
    header("location: adminlogin.php");
}
