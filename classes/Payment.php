<?php
require_once "Db.php";
class Payment extends Db
{
    private $dbcon;
    public function __construct()
    {
        $this->dbcon = $this->connect();
    }
    public function paystack_initialize_step_one($amt, $email, $reference)
    {
        $postRequest = array("amount" => $amt * 100, "email" => $email, "reference" => $reference, "callback_url" => "http://localhost/donation/paystack_redirect.php");
        $headers = ["authorization: Bearer sk_test_d265bc76fd00c19e6c0d4abe534f7e3f817602aa", "content-type:application/json"];
        $url = "https://api.paystack.co/transaction/initialize";
        $curlobj = curl_init($url);
        curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlobj, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curlobj, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curlobj, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curlobj, CURLOPT_POSTFIELDS, json_encode($postRequest));
        $apirsp = curl_exec($curlobj);
        if ($apirsp) {
            curl_close($curlobj);
            return json_decode($apirsp);
        } else {
            $r = curl_error($curlobj);
            return $r;
        }
    }
    public function paystack_verify_step_two($reference)
    {
        $headers = ["authorization: Bearer sk_test_d265bc76fd00c19e6c0d4abe534f7e3f817602aa", "content-type:application/json"];
        $url = "https://api.paystack.co/transaction/verify/$reference";
        $curlobj = curl_init($url);
        curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlobj, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curlobj, CURLOPT_SSL_VERIFYPEER, false);
        $apirsp = curl_exec($curlobj);
        if ($apirsp) {
            curl_close($curlobj);
            return json_decode($apirsp);
        } else {
            return false;
        }
    }
    public function payment_ref($ref)
    {
        $sql = "SELECT * FROM payment JOIN donor ON payment.payment_donorId = donor.DonorID WHERE payment_refno=?";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute([$ref]);
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        return $record;
    }
    public function payment_record($amt, $DonorID, $refno)
    {
        $sql = "INSERT INTO payment SET payment_method=?,payment_amount_paid=?,payment_donorId=?,payment_refno=?";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute(['card', $amt, $DonorID, $refno]);
        return true;
    }
    public function get_donor_amount()
    {
        $sql = "SELECT donor_amt_amount	 FROM donor_amount LIMIT 1";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    public function payment_update($status, $ref)
    {
        if ($status) {
            $payment_status = "completed";
        } else {
            $payment_status = "failed";
        }
        $sql = "UPDATE payment  SET payment_status=? WHERE payment_refno=?";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute([$payment_status, $ref]);
        return true;
    }
    //getting reference number for guest donor.
    public function guest_donor_ref($ref)
    {
        $sql = "SELECT * FROM payment JOIN guest_donor ON payment.payment_donorId = guest_donor.guest_donor_id WHERE payment_refno=?";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute([$ref]);
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        return $record;
    }
    public function get_donor_bypaymentId($id)
    {
        $sql = "SELECT * FROM payment WHERE payment_donorId=?";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute([$id]);
        $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $record;
    }
    public function guest_donor_record($amt, $guest_donor_id, $refno)
    {
        $sql = "INSERT INTO payment SET payment_method=?,payment_amount_paid=?,payment_donorId=?,payment_refno=?";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute(['card', $amt, $guest_donor_id, $refno]);
        return true;
    }
    public function get_guest_donor($id)
    {
        $sql = "SELECT * FROM guest_donor WHERE guest_donor_id=?";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute([$id]);
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        return $record;
    }
    public function guest_payment_update($status, $ref)
    {
        if ($status) {
            $payment_status = "completed";
        } else {
            $payment_status = "failed";
        }
        $sql = "UPDATE payment  SET payment_status=? WHERE payment_refno=?";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute([$payment_status, $ref]);
        return true;
    }
}
// $po = new Payment();
// $post = $po->get_donor_bypaymentId(8);
// echo '<pre>';
// print_r($post);
// echo '</pre>';
