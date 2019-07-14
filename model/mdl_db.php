<?php

  class database{
    public $conn;

    function __construct(){
      $this->conn = new mysqli(HOST,UNAME,PSWD);//koneksi ke mysql
      if ($this->conn->connect_error) {
          die("Koneksi gagal: " . $this->conn->connect_error);
      }

      $dbterpilih = $this->conn->select_db(DB);//pilih database
      if (!$dbterpilih) {//jika database tidak ada
          die("Error: " . $this->conn->error);
      }
    }

    //simpan ke database
    function simpandata($data){
      $values=implode("', '",$data);
      $query = "INSERT INTO transaksi VALUES ('$values')";
      $hasil = $this->conn->query($query);

      return $this->takErr($hasil);//jika eksekusi tidak error
    }
    //update data trransaksi database
    function updatedata($id,$newdata){
      $query = "UPDATE transaksi SET
                 status='".$newdata['status']."',
                 receipt='".$newdata['receipt']."',
                 time_served='".$newdata['time_served']."'
               WHERE id_trans='$id'";
      $hasil = $this->conn->query($query);

      if ($this->takErr($hasil)){
        return $hasil;
      }
    }
    //cek dan ambil data dari database
    function cekdata($data){
      $query = "SELECT * FROM transaksi WHERE id_trans='$data'";
      $hasil = $this->conn->query($query);

      if ($this->takErr($hasil)){
        return $hasil->fetch_assoc();
      }
    }
    //ambil semua data dari database
    function pilihsemua(){
      $query ="SELECT * FROM transaksi";
      $hasil = $this->conn->query($query);

      if ($this->takErr($hasil)){
        return $hasil;
      }
    }
  //TAMBAHAN
    //cek error saat eksekusi query
    function takErr($data){
      if($data){
        return true;
      }else{
        echo "<br>Error :".$this->conn->error."<br>";
        return false;
      }
    }

    function __destruct(){

    }
  }
?>
