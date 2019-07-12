<?php
  include "model/mdl_api.php";
  include "model/mdl_db.php";
  include_once "config/config.php";

  class transaksi{
      public $db;
      public $api;

      function __construct(){
        $this->db= new database();
        $this->api= new API();
      }

      function cairkan(){
        $data= array(
          "bank_code" => $_POST['bank'],
          "account_number" => $_POST['akun'],
          "amount" => $_POST['amount'],
          "remark" => $_POST['remark'],
        );
        $postData=http_build_query($data);

        $opsi= array(
          'http'=> array(
            'method'=>'POST',
            'header'=>"Content-Type: application/x-www-form-urlencoded\r\n".
                      "Authorization: Basic ".APIKEY."\r\n",
            'content'=>$postData
          )
        );

        $respon=$this->api->ambildata(URL,$opsi);
        include "view/vresponse.php";
      }

      function cekstatus(){
        $opsi= array(
          'http'=> array(
              'method'=>'GET',
              'header'=>"Content-Type: application/x-www-form-urlencoded\r\n".
                        "Authorization: Basic ".APIKEY."\r\n"
          )
        );

        $url=URL."/".$_POST['id'];
        $respon=$this->api->ambildata($url,$opsi);
        include "view/vresponse.php";
      }

      function __destruct()
      {

      }

  }
?>
