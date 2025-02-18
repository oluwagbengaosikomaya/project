<?php
        session_start();
        require_once "../user_guard.php";
        require_once "../classes/Library.php";
        require_once "../classes/Donation.php";

     


       if(isset($_POST['btnupdate'])){
      

        $donorfname = sanitize($_POST['donorfname']);
        $donorlname = sanitize($_POST['donorlname']);
        $donorphone = sanitize($_POST['donorphone']);
        $donoraddress = sanitize($_POST['donoraddress']);
       
      
    

        if(empty($donorfname) || empty($donorlname) ||empty($donorphone) ||empty($donoraddress)){
            $_SESSION['errormsg'] = "Fills cant be empty";
        header("location:../profile.php"); exit();

        }

            $d = new Donation;
        $rsp = $d->update_donor($donorfname,$donorlname,$donorphone,$donoraddress,$_SESSION['DonorID']);
        

        if($rsp){

            $_SESSION['feedback'] = "profile updated....";
        
            header("location:../profile.php"); exit();

        }else{

        $_SESSION['errormsg'] = "please complete the form";
        header("location:../profile.php"); exit();
       }
    }else{
        header("location: ../profile.php");
    }




?>