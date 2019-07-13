<?php
  include "model/mdl_api.php";
  include "model/mdl_db.php";
  include_once "config/config.php";

  class transaksi{
      public $db;
      public $api;

      function __construct(){
        $this->db = new database();
        $this->api= new API();
      }

      function cairkan(){
        $data = array(
          "bank_code"      => $_POST['bank'],
          "account_number" => $_POST['akun'],
          "amount"         => $_POST['amount'],
          "remark"         => $_POST['remark'],
        );
        $postData = http_build_query($data);

        $opsi = array(
          'http'=> array(
            'method'  =>'POST',
            'header'  =>"Content-Type: application/x-www-form-urlencoded\r\n".
                        "Authorization: Basic ".APIKEY."\r\n",
            'content' =>$postData
          )
        );

        $respon = $this->api->request(URL,$opsi);
        $this->simpan($respon);

        include "view/vresponse.php";
      }

      function cekstatus(){
        $data = $this->pilih($_POST['id']);
        
        echo "sudah pilih";
        if ($data->fetch_assoc()!=NULL){
          $opsi = array(
            'http'=> array(
                'method'=>'GET',
                'header'=>"Content-Type: application/x-www-form-urlencoded\r\n".
                          "Authorization: Basic ".APIKEY."\r\n"
            )
          );

          $url=URL."/".$_POST['id'];
          $respon=$this->api->request($url,$opsi);
          $this->update($respon);

          include "view/vresponse.php";

        } else {
          echo "data tidak ada";
        }
      }

      function simpan($respon){
        foreach ($respon as $value){
            $arr[]=$value;
        }
        echo "<br>".implode("', '",$arr)."<br>";
        $this->db->simpandata(implode("', '",$arr));
      }

      function pilih($id){
        return $this->db->cekdata($id);
      }

      function update($respon){
        $id       = $respon->id;
        $newdata  = array(
          'status'      =>($respon->status),
          'receipt'     =>($respon->receipt),
          'time_served' =>($respon->time_served)
        );
        //print_r($newdata);
        $this->db->updatedata($id,$newdata);
      }

      function __destruct(){

      }

  }
?>
