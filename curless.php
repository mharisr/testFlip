<?php
  $url="https://nextar.flip.id/disburse";

  $username="HyzioY7LP6ZoO7nTYKbG8O4ISkyWnX1JvAEVAhtWKZumooCzqp41";
  $password="";
  $sKey=base64_encode("$username:$password");

  function req($url,$sKey,$method)
  {
    if($method=="get")
    {
      $tId=$_GET['id'];
      $opsi=array
      (
        'http'=>array
        (
            'method'=>'GET',
            'header'=>"Content-Type: application/x-www-form-urlencoded\r\n".
                      "Authorization: Basic $sKey\r\n"
        )
      );
      $url=$url."/".$tId;
    }
    else {
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
                      "Authorization: Basic $sKey\r\n",
            'content'=>$postData
        )
      );
    }
      $context=stream_context_create($opsi);
      $json=file_get_contents($url,false,$context);

      $hasil=json_decode($json);

      foreach ($hasil as $key => $value) {
        echo $key."----".$value."<br>";
      }
  }

?>
