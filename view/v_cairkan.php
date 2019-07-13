<html>
  <head>
    <title>PENCAIRAN DANA</title>
  </head>
  <body>
    <a href="index.php">MENU UTAMA</a>
    <center>
      <h1>PENCAIRAN DANA</h1>
      </br></br>
      <form action="" method="POST">
        KODE BANK        :<input type="text" name="bank">
        NOMOR AKUN       :<input type="text" name="akun">
        JUMLAH PENCAIRAN :<input type="text" name="amount">
        CATATAN          :<input type="text" name="remark">
        <input type="submit" name="submit" value="KIRIM">
      </form>
      </br></br>
    </center>
  </body>
</html>

<?php
  include "controller/ct_transaksi.php";//class transaksi

  if (isset($_POST['submit'])){//jika submit diklik
    $trans = new transaksi();//objek baru dari class transaksi
    $trans->cairkan();
  }
?>
