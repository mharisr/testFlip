<?php
  $url="https://nextar.flip.id/disburse/5535152564";
  $password="";

  $curl = curl_init();
  $opsi = array
  (
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_URL => $url,
    CURLOPT_USERPWD => "HyzioY7LP6ZoO7nTYKbG8O4ISkyWnX1JvAEVAhtWKZumooCzqp41:".$password,
    CURLOPT_RETURNTRANSFER => 1
  );
  curl_setopt_array($curl,$opsi);

  $json = curl_exec($curl);
  curl_close($curl);

  $hasil = json_decode($json);

  print_r($hasil);
  foreach ($hasil as $key => $value)
  {
    echo $key. " - " .$value. "<br>";
  }
?>
