<?php

require_once "Db.php";

class Contact extends Db{

private $dbconn;
public function __construct(){

    $this->dbconn = $this->connect();
}
    public function contact_register($f,$e,$s,$m){
        $sql = "INSERT into contact set contact_name=?,contact_email=?,contact_subject=?,contact_message=?";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$f,$e,$s,$m]);
        $id = $this->dbconn->lastInsertId();
        return $id;

    }







}

?>
