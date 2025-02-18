<?php
require_once "Db.php";
class Admin extends Db{


    private $dbconn;

    public function __construct(){
        $this->dbconn = $this->connect();
    }



    public function Admin_login($user, $pass){
     
        $sql = "SELECT * FROM admin WHERE admin_pass=? LIMIT 1";
        $stmt = $this->dbconn->prepare($sql); 
        $stmt->execute([$user]);
        $records= $stmt->fetch(PDO::FETCH_ASSOC);
        if($records){
            $hashed = $records['admin_pass'];
            $check = password_verify($pass,$hashed);
            if($check){
                    return $records['admin_id'];
            }else{
                $_SESSION['errormsg'] = "Incorrect Password";
                return false;
    
            }
        }else{
            $_SESSION['errormsg'] = "Incorrect user";
            return false;
        }




    }


    public function logout(){
        session_destroy();
    }

    
}




?>