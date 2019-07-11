<?php
  include "controller.php";

  $main=new controller();

  //<a href='index.php?m=1'>Tambah Data</a>
  if(isset($_GET['m']))
  {
    if($_GET['m']==1)
    {
      $main->vcairkan();
    }
    else if ($_GET['m']==2)
    {
      $main->vcekstatus();
    }
  }
  else
  {
      $main->vawal();
  }
?>
