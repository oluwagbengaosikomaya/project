<?php
session_start();
require_once "classes/Donation.php";
header('content-Type: application/json');
try{
    $email = isset($_GET["email"]) ? trim($_GET["email"]) : '';
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo json_encode([
            "status" => "error",
            "message" => "invalid email format."
        ]);
        exit;
    }
    $mail = new Donation;
    $email_exist = $mail->check_email($email);

    if($email_exist == true){
        echo json_encode([
            "status" => "exists",
            "message" => "Email is already registered."
        ]);

    }else{
        echo json_encode([
            "status" => "available",
            "message" => "Email is available for  registration."
        ]);

    }
} catch (Exception $se){
    echo json_encode([
        "status" => "error",
        "message" => "An error occured while processing your request. Please try again later."
    ]);
    
}






?>