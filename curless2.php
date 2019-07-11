<?php
  $url="https://nextar.flip.id/disburse";

  $data=array("bank_code" => "bri", "account_number" => "6666", "amount" => 700000, "remark" => "coba");
  $postdata=http_build_query($data);

  $username="HyzioY7LP6ZoO7nTYKbG8O4ISkyWnX1JvAEVAhtWKZumooCzqp41";
  $password="";

  $opts=array
  (
    'http'=>array
    (
      'method'=>'POST',
      'header'=>"Content-Type: application/x-www-form-urlencoded\r\n".
                "Authorization: Basic ". base64_encode("$username:$password")."\r\n",
      'content'=>$postdata
    )
  );

  $context=stream_context_create($opts);
  $json=file_get_contents($url, false, $context);

  $hasil=json_decode($json);
  echo $json;
  echo "<br><br>";
  print_r($hasil);
?>
