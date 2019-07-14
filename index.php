<?php
  include "controller/controller.php";//berisi class transaksi

  //objek baru dari class transaksi
  $menu = new transaksi();

  //cek menu yang dipilih
  if (isset($_GET['m'])){
  //tampilkan view berdasarkan menu yang dipilih
    if ($_GET['m']==1){
      $menu->tampilkan_pencairan();
    } elseif ($_GET['m']==2){
      $menu->tampilkan_cekstatus();
    } elseif ($_GET['m']==3){
      $menu->tampilkan_semua();
    }
  } else {//jika menu belum ada menu yang dipilih tampilkan menu awal
      $menu->tampilkan_menuawal();
  }
?>
