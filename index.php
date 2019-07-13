<?php
  include "controller/ct_menu.php";//berisi class menu

  //objek baru dari class menu
  $menu = new menu();

  //cek menu yang dipilih
  if (isset($_GET['m'])){
  //tampilkan view berdasarkan menu yang dipilih
    if ($_GET['m']==1){
      $menu->tampilkan_pencairan();
    } elseif ($_GET['m']==2){
      $menu->tampilkan_cekstatus();
    }
  } else {//jika menu belum ada menu yang dipilih tampilkan menu awal
      $menu->tampilkan_menuawal();
  }
?>
