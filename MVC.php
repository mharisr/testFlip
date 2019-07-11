<?php
  include "controller.php";

  $main=new controller();

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
