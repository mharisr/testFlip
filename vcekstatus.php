<html>
  <head>
    <title>test input user</title>
  </head>
  <body>
    <form action="" method="POST">
      ID:<input type="text" name="id"><br>
      <input type="submit" name="submit">
    </form>
  </body>
</html>
<?php
  if(isset($_POST['submit']))
  {
    $main = new controller();
    $main->cekstatus();
  }
?>
