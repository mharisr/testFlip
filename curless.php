<?php
  $url="https://nextar.flip.id/disburse";

  $username="HyzioY7LP6ZoO7nTYKbG8O4ISkyWnX1JvAEVAhtWKZumooCzqp41";
  $password="";
  $sKey=base64_encode("$username:$password");

  $data=array("bank_code" => "bri", "account_number" => "6666", "amount" => 700000, "remark" => "coba");
  $tId="5535152564";

  function req($url,$sKey,$data,$method)
  {
    if($method=="get")
    {
      $opsi=array
      (
        'http'=>array
        (
            'method'=>'GET',
            'header'=>"Content-Type: application/x-www-form-urlencoded\r\n".
                      "Authorization: Basic $sKey\r\n"
        )
      );
      $url=$url."/".$data;
    }
    else {
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
      
      echo "<br><br>";
      print_r($hasil);

  }

  req($url,$sKey,$tId,"get");
  req($url,$sKey,$data,"post");

?>
