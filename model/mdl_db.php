<?php
include_once "config/config.php";
  class database
  {
    function __construct(){
      $mysqli = new mysqli(HOST,UNAME,PSWD);
    }

  //REQUEST API

  //DATABASE
    //simpan
    function simpanDB(){

    }
    //update
    function updateDB(){

    }


    function __destruct(){

    }
  }
?>
