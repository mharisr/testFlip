<html>
  </br>
  SEMUA TRANSAKSI
  <table align="center" border=1>
    <tr>
      <td>ID</td>
      <td>AMOUNT</td>
      <td>STATUS</td>
      <td>TIMESTAMP</td>
      <td>BANK.CODE</td>
      <td>ACCOUNT.NUM</td>
      <td>BENEFICIARY</td>
      <td>REMARK</td>
      <td>RECEIPT</td>
      <td>TIME.SERV</td>
      <td>FEE</td>
    </tr>
    <?php
      while ($row=$data->fetch_assoc()){
        echo "
          <tr>
            <td>".$row['id_trans']."</td>
            <td>".$row['amount']."</td>
            <td>".$row['status']."</td>
            <td>".$row['timestamp']."</td>
            <td>".$row['bank_code']."</td>
            <td>".$row['account_number']."</td>
            <td>".$row['beneficiary_name']."</td>
            <td>".$row['remark']."</td>
            <td><img src=".$row['receipt']." width='32' height='32' alt='kosong'></td>
            <td>".$row['time_served']."</td>
            <td>".$row['fee']."</td>
          </tr>
        ";
      }
    ?>
  </table>
  <a href="index.php">MENU UTAMA</a>
</html>
