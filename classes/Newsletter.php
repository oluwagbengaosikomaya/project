<?php
require_once "Db.php";
class Newsletter extends Db{

    private $dbconn;

    public function __construct()
    {
        $this->dbconn = $this->connect();
    }

    public function insert_newsletter($newfname,$newlname,$newemail)
    {
        $sql = "INSERT INTO newsletter SET news_fname=?,news_lname=?,news_email=?";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$newfname,$newlname,$newemail]);
        $id = $this->dbconn->lastInsertId();
        return $id;
    }


    public function check_email($email)
    {
        $sql = "SELECT * FROM newsletter WHERE news_email = ?";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$email]);
        $numofemail = $stmt->rowCount();
        if ($numofemail > 0) {
            return true;
        } else {
            return false;
        }
    }


}


?>