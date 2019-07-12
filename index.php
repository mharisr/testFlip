<?php
  include "controller/ct_menu.php";

  $menu = new menu();

  if (isset($_GET['m'])){
    if ($_GET['m']==1){
      $menu->tampilkan_pencairan();
    } elseif ($_GET['m']==2){
      $menu->tampilkan_cekstatus();
    }
  } else {
      $menu->tampilkan_menuawal();
  }
?>
