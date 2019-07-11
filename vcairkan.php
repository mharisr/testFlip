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
  </body>
</html>
<?php
  if(isset($_POST['submit']))
  {
    $main = new controller();
    $main->kirim();
  }
?>
