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
        <table>
          <tr>
            <td>KODE BANK*</td>
            <td>: <input type="text" name="bank"></td>
          </tr>
          <tr>
            <td>NOMOR AKUN*</td>
            <td>: <input type="text" name="akun"></td>
          </tr>
          <tr>
            <td>JUMLAH PENCAIRAN*</td>
            <td>: <input type="text" name="amount"></td>
          </tr>
          <tr>
            <td>CATATAN(optional)</td>
            <td>: <input type="text" name="remark"></td>
          </tr>
          <tr>
            <td>* : required</td>
          </tr>
        </table>
        </br>
        <input type="submit" name="submit" value="KIRIM">
      </form>
      </br></br>
    </center>
  </body>
</html>

<?php

  if (isset($_POST['submit'])){//jika submit diklik
    if(isset($_POST['bank'])&&($_POST['akun'])&&($_POST['amount'])){//jika semua diisi
      if(is_numeric($_POST['amount'])){
        if(empty($_POST['remark'])){
          $_POST['remark']=" ";
        }
        $trans = new transaksi();//objek baru dari class transaksi
        $trans->cairkan();
      }else{
        echo "Jumlah yang dimasukkan tidak valid(harus angka)";
      }
    }else{
      echo "Isi semua yang bertanda *";
    }
  }
?>
