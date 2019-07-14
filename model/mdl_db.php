<?php

  class database{
    public $conn;

    function __construct(){
      $this->conn = new mysqli(HOST,UNAME,PSWD);//koneksi ke mysql
      if ($this->conn->connect_error) {
          die("Koneksi gagal: " . $this->conn->connect_error);
      }
      $this->conn->select_db(DB);//pilih database
    }

    //simpan ke database
    function simpandata($data){
      $values=implode("', '",$data);
      $query = "INSERT INTO transaksi VALUES ('$values')";
      return $this->conn->query($query);
    }
    //update data trransaksi database
    function updatedata($id,$newdata){
      $query = "UPDATE transaksi SET
                 status='".$newdata['status']."',
                 receipt='".$newdata['receipt']."',
                 time_served='".$newdata['time_served']."'
               WHERE id_trans='$id'";
      return $this->conn->query($query);
    }
    //cek dan ambil data dari database
    function cekdata($data){
      $query = "SELECT * FROM transaksi WHERE id_trans='$data'";
      $hasil=$this->conn->query($query);
      return $hasil->fetch_assoc();
    }

    function __destruct(){

    }
  }
?>
