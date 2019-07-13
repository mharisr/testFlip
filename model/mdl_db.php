<?php

  class database
  {
    public $conn;

    function __construct(){
      $this->conn = new mysqli(HOST,UNAME,PSWD);
      $dbpilih = $this->conn->select_db(DB);

      if ($this->conn){
        echo "koneksi sukses";
      }

      if ($dbpilih){
        echo "db ada";
      }else{
        echo "db kagak ada";
      }

    }

    function simpandata($data){
      $query = "INSERT INTO transaksi VALUES ('$data')";
      return $this->conn->query($query);
    }

    function updatedata($id,$newdata){
      $query = "UPDATE transaksi SET status='".$newdata['status']."', receipt='".$newdata['receipt']."', time_served='".$newdata['time_served']."' WHERE id_trans='$id'";
      //$query = "UPDATE transaksi SET status='$id', receipt='$id' WHERE id='".".$id'";
      echo "<br>".$query."<br>";
      var_dump($this->conn->query($query));
      return $this->conn->query($query);
    }

    function cekdata($data){
      $query = "SELECT * FROM transaksi WHERE id_trans='$data'";
      $hasil=$this->conn->query($query);
      return $hasil;
      //$hasil->fetch_assoc();
      //var_dump($hasil->fetch_assoc());
    }

    function __destruct(){

    }
  }
?>
