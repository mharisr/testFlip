<html>
  <head>
    <title>CEK STATUS PENCAIRAN</title>
  </head>
  <body>
    <form action="" method="POST">
      ID  :<input type="text" name="id"><br>
      <input type="submit" name="submit">
    </form>
    <a href="index.php">balik menu</a>
  </body>
</html>

<?php
  include "controller/ct_transaksi.php";

  if (isset($_POST['submit'])){
    $trans = new transaksi();
    $trans->cekstatus();
  }
?>
