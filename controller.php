<?php
  include "model.php";

  class controller
  {
      public $model;
      public $url;

      public $username;
      public $password;
      public $sKey;

      function __construct()
      {
        $this->model= new model();

        $this->url="https://nextar.flip.id/disburse";

        $this->username="HyzioY7LP6ZoO7nTYKbG8O4ISkyWnX1JvAEVAhtWKZumooCzqp41";
        $this->password="";
        $this->sKey=base64_encode("$this->username:$this->password");
      }

      function vcairkan()
      {
        include "vcairkan.php";
      }

      function vcekstatus()
      {
        include "vcekstatus.php";
      }

      function vawal()
      {
        include "vawal.php";
      }

      function cairkan()
      {
        $data=array
        (
          "bank_code" => $_POST['bank'],
          "account_number" => $_POST['akun'],
          "amount" => $_POST['amount'],
          "remark" => $_POST['remark'],
        );
        $postData=http_build_query($data);
        $opsi=array
        (
          'http'=>array
          (
              'method'=>'POST',
              'header'=>"Content-Type: application/x-www-form-urlencoded\r\n".
                        "Authorization: Basic $this->sKey\r\n",
              'content'=>$postData
          )
        );
        $kirim=$this->model->ambildata($this->url,$opsi);
        include "vresponse.php";
      }

      function cekstatus()
      {
        $opsi=array
        (
          'http'=>array
          (
              'method'=>'GET',
              'header'=>"Content-Type: application/x-www-form-urlencoded\r\n".
                        "Authorization: Basic $this->sKey\r\n"
          )
        );
        $this->url=$this->url."/".$_POST['id'];
        $kirim=$this->model->ambildata($this->url,$opsi);
        include "vresponse.php";
      }

      function __destruct()
      {

      }

  }
?>
