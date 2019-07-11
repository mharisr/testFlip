<?php
  include "model.php";

  class controller
  {
      public $model;
      function __construct()
      {
        $this->model= new model();
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

      function __destruct()
      {

      }

  }
?>
