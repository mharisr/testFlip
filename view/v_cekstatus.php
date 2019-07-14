<html>
  <head>
    <title>CEK STATUS PENCAIRAN</title>
  </head>
  <body>
    <a href="index.php">MENU UTAMA</a>
    <center>
      <h1>STATUS TRANSAKSI</h1>
      <form action="" method="POST">
        MASUKKAN ID  :<input type="text" name="id">
        <input type="submit" name="submit" value="CEK STATUS">
      </form>
    </center>
  </body>
</html>

<?php

  if (isset($_POST['submit'])){//jika submit diklik
    $trans = new transaksi();
    $trans->cekstatus();
  }
?>
