<html>
  <head>
    <title>test input user</title>
  </head>
  <body>
    <form action="" method="POST">
      BANK:<input type="text" name="bank"><br>
      AKUN:<input type="text" name="akun"><br>
      AMOUNT:<input type="text" name="amount"><br>
      REMARK:<input type="text" name="remark"><br>
      <input type="submit" name="submit">
    </form>
    <a href="index.php">balik menu</a>
  </body>
</html>

<?php
  include "controller/ct_transaksi.php";

  if (isset($_POST['submit'])){
    $trans = new transaksi();
    $trans->cairkan();
  }
?>
