<?php
require_once "Db.php";
class Admin extends Db{


    private $dbconn;

    public function __construct(){
        $this->dbconn = $this->connect();
    }


    public function admin_login($user, $pass){ //used in process_adminlogin.php
        $sql = "SELECT * FROM admin WHERE admin_user=? LIMIT 1";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$user]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result){
            $hashed = $result['admin_pass'];
            $check = password_verify($pass,$hashed);
            if($check){
                return $result['admin_id'];
            }
            else{
                $_SESSION['errormsg'] = "Incorrect Password";
                return false;
            }
        }
        else{
            $_SESSION['errormsg'] = "Incorrect Email";
            return false;
        }
    }


    public function logout(){
        session_destroy();
    }

    
}




?>