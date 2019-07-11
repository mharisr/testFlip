<?php
  $url="https://nextar.flip.id/disburse/5535152564";

  $username="HyzioY7LP6ZoO7nTYKbG8O4ISkyWnX1JvAEVAhtWKZumooCzqp41";
  $password="";
  $sKey=base64_encode("$username:$password");

  $opsi=array
  (
    'http'=>array
    (
        'method'=>'GET',
        'header'=>"Content-Type: application/x-www-form-urlencoded\r\n".
                  "Authorization: Basic $sKey\r\n",
    )
  );
  $context=stream_context_create($opsi);
  $json=file_get_contents($url,false,$context);

  $hasil=json_decode($json);
  echo $json;
  echo "<br><br>";
  print_r($hasil);
?>
