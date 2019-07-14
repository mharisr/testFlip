<?php
    include "config/config.php";
    include "model/mdl_db.php";

    $database = new database();

    //buat tabel baru di database(tabel transaksi)
    $query = $database->conn->query(
      "CREATE TABLE transaksi(
        id_trans varchar(10) NOT NULL,
        amount int UNSIGNED NOT NULL,
        status varchar(15) NOT NULL,
        timestamp datetime NOT NULL,
        bank_code varchar(30) NOT NULL,
        account_number varchar(15) NOT NULL,
        beneficiary_name varchar(25) NOT NULL,
        remark varchar(25) NOT NULL,
        receipt varchar(200) NOT NULL,
        time_served datetime NOT NULL,
        fee int UNSIGNED NOT NULL
      )"
    );
    if ($database->takErr($query)){//jika tidak error
      echo "TABEL TRANSAKSI BERHASIL DIBUAT";
      $database->conn->close();
    }
?>
