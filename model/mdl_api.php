<?php

class API{
  
  function request($url,$opsi){
    $context=stream_context_create($opsi);
    $json=file_get_contents($url,false,$context);

    $hasil=json_decode($json);
    return $hasil;
  }
}
?>