<?php
require_once "Db.php";
class Donation extends Db{
    private $dbconn;
    public function __construct(){
        $this->dbconn = $this->connect();
    }
    public function register($dfname,$dlname,$dpass,$demail,$dphone){
        $hash = password_hash($dpass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO donor SET donor_fname=?,donor_lname=?, donor_password=?, donor_email=?, donor_phoneno=?";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$dfname,$dlname,$hash,$demail,$dphone]);
         $id = $this->dbconn->lastInsertId();
         return $id;
    }
    public function check_email($email){
        $sql = "SELECT * FROM donor WHERE donor_email=? ";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$email]);
        $numofemail = $stmt->rowCount();
        if($numofemail > 0){
            return true;
        }else{
            return false;
        }
    }
    public function login($email,$password){
        $sql = "SELECT * FROM donor WHERE donor_email=? LIMIT 1";
        $stmt = $this->dbconn->prepare($sql); 
        $stmt->execute([$email]);
        $records= $stmt->fetch(PDO::FETCH_ASSOC);
        if($records){
        $hashed = $records['donor_password'];
        $check = password_verify($password,$hashed);
        if($check){
            if ($records['donor_status'] == 'Active') {
                $_SESSION["DonorID"] = $records['DonorID'];
                $_SESSION["feedback"] = "Login Successful";
                header("location: ../profile.php");exit();
            } else {
                $_SESSION["errormsg"] = "Account is flagged. Please contact the admin.";
                header("location: ../login.php");exit();
            }
        }else {
            $_SESSION["errormsg"] = "Incorrect Password";
            header("location: ../login.php");exit();
        }
    }else{
        $_SESSION['errormsg'] = "Incorrect email";
        return false;
    }
    }
    public function get_donor($id){
        $sql = "SELECT * FROM donor WHERE DonorID=?";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$id]);
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        return $record;
    }
    public function update_donor($donorfname,$donorlname,$donorphone,$donoraddress,$id){
        $sql = "UPDATE donor SET donor_fname=?,donor_lname=?,donor_phoneno=?,donor_address=? WHERE DonorID=?";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$donorfname,$donorlname,$donorphone,$donoraddress,$id]);
        return true;
}
public function fetch_donor()
    {
        $sql = "SELECT * FROM donor";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }
    public function deleteDonor($id){
        $sql = "DELETE FROM donor WHERE DonorID=?";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$id]);
        $del = $stmt->fetch(PDO::FETCH_ASSOC);
        return $del;
        }
    public function logout(){
        session_destroy();
    }
    public function get_donorStatus($status, $id)
    { 
        $sql = "UPDATE donor SET donor_status = ? WHERE DonorID = ?";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$status, $id]);
    }
}
?>