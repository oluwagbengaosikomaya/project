<?php
         require_once "Db.php";

         class Payment1 extends Db{

            private $dbcon;
            public function __construct(){
                
                $this->dbcon = $this->connect();  
            }



            public function paystack_initialize_step_one($amt,$email,$reference){
                
                $postRequest = array("amount" =>$amt*100, "email" =>$email, "reference" =>$reference, "callback_url" => "http://localhost/donation/paystack_redirect2.php");
    
               
                $headers = ["authorization: Bearer sk_test_d265bc76fd00c19e6c0d4abe534f7e3f817602aa", "content-type:application/json"];
                $url = "https://api.paystack.co/transaction/initialize";
    
                
                $curlobj = curl_init($url);
                
                
                curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curlobj, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($curlobj, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curlobj, CURLOPT_CUSTOMREQUEST, 'POST');
                curl_setopt($curlobj, CURLOPT_POSTFIELDS, json_encode($postRequest));
    
         
                $apirsp = curl_exec($curlobj);
                if($apirsp){
                        curl_close($curlobj);
                        return json_decode($apirsp);
                }else{
    
                    $r = curl_error($curlobj);
                 
                    return $r;
                }
    
    
            }
    



            public function paystack_verify_step_two($reference){

                
                $headers = ["authorization: Bearer sk_test_d265bc76fd00c19e6c0d4abe534f7e3f817602aa", "content-type:application/json"];
                $url = "https://api.paystack.co/transaction/verify/$reference";
    
              
                $curlobj = curl_init($url);
                
                
                curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curlobj, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($curlobj, CURLOPT_SSL_VERIFYPEER, false);
    
             
    
                $apirsp = curl_exec($curlobj);
                if($apirsp){
                    curl_close($curlobj);
                    return json_decode($apirsp);
    
                }else{
                    
                    return false;
                }
    
    
    
            }
    



            public function payment1_ref($ref){


                $sql ="SELECT * FROM payment1 JOIN guest_donor ON payment1.payment1_id = guest_donor.guest_id WHERE payment1_refno=?";
                $stmt = $this->dbcon->prepare($sql);
                $stmt->execute([$ref]);
                $record = $stmt->fetch(PDO::FETCH_ASSOC);
                return $record;
            }


            public function payment1_record($amt,$guest_email,$refno){
                $sql = "INSERT INTO payment1 SET paymen1_method=?,payment1_amount_paid=?,payment1_guest_email=?, payment1_refno=?";
                $stmt = $this->dbcon->prepare($sql);
                $stmt->execute(['card',$amt,$guest_email,$refno]);
                return true;
            }




            public function get_payment1_amount(){
                $sql = "SELECT guest_amount	 FROM guest_donor LIMIT 1";
                $stmt = $this->dbcon->prepare($sql);
                $stmt->execute();
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                return $data;
            }


            public function payment1_update($status,$ref){

             
                if($status){
                    $payment_status = "completed";
                }else{
                    $payment_status = "failed";
                }
                $sql = "UPDATE 	payment1  SET payment1_status=? WHERE payment1_refno=?";
                $stmt = $this->dbcon->prepare($sql);
                $stmt->execute([$payment_status,$ref]);
                return true;
                    }




                    public function guest_donor($gfname,$glname,$gemail,$gphone,$gamount){
                  
            
                        $sql = "INSERT INTO guest_donor SET guest_fname=?,guest_lname=?, guest_email=?, guest_phoneno=?, guest_amount=?";
                        $stmt = $this->dbcon->prepare($sql);
                        $stmt->execute([$gfname,$glname,$gemail,$gphone,$gamount]);
                         $id = $this->dbcon->lastInsertId();
                         return $id;
                
                    }


                    public function get_guest($gfname,$glname,$gemail,$gphone,$gamount){


                        $sql = "SELECT * FROM guest_donor";
                        $stmt = $this->dbcon->prepare($sql);
                        $stmt->execute($gfname,$glname,$gemail,$gphone,$gamount);
                        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        return $records;
        
        
        
                    }


                    public function get_user($id){
                

                        $sql = "SELECT * FROM guest_donor WHERE guest_id=?";
                        $stmt = $this->dbcon->prepare($sql);
                        $stmt->execute([$id]);
                        $record = $stmt->fetch(PDO::FETCH_ASSOC);
                        return $record;
        
        
                    }


                    public function guest_details($guest_fname,$guest_lname,$guest_email,$guest_phoneno,$guest_amount){

                        $sql = "INSERT INTO guest_donor SET guest_fname=?,guest_lname=?, guest_email=?, guest_phoneno=?, guest_amount=?";
                        $stmt = $this->dbcon->prepare($sql);
                        $stmt->execute([$guest_fname,$guest_lname,$guest_email,$guest_phoneno,$guest_amount]);
                         $id = $this->dbcon->lastInsertId();
                         return $id;
                
                    }

                    public function fetch_guest(){
                    $sql = "SELECT * FROM guest_donor";
                    $stmt = $this->dbcon->prepare($sql);
                    $stmt->execute();
                    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return $records;
                    }


                    public function delete_guestdonor($id){

                        $sql = "DELETE FROM guest_donor WHERE guest_id=?";
                        $stmt = $this->dbcon->prepare($sql);
                        $stmt->execute([$id]);
                        $del = $stmt->fetch(PDO::FETCH_ASSOC);
                        return $del;
                       
                        }
                    





                }

               