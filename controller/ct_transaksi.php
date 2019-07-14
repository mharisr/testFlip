<?php
  include "model/mdl_api.php";//berisi class api
  include "model/mdl_db.php";//berisi class database
  include_once "config/config.php";//konfigurasi berkaitan dengan database dan api

  class transaksi{
      public $db;
      public $api;

      function __construct(){
        $this->db = new database();//objek database baru
        $this->api= new API();//objek api baru
      }

    //FUNGSI UTAMA
      //permintaan pencairan dana
      function cairkan(){
        //tangkap data dari form input
        $data = array(
          "bank_code"      => $_POST['bank'],
          "account_number" => $_POST['akun'],
          "amount"         => $_POST['amount'],
          "remark"         => $_POST['remark'],
        );
        //siapkan data untuk dikirim ke api
        $postData = http_build_query($data);
        $opsi = array(
          'http'=> array(
            'method'  =>'POST',
            'header'  =>"Content-Type: application/x-www-form-urlencoded\r\n".
                        "Authorization: Basic ".APIKEY."\r\n",
            'content' =>$postData
          )
        );
        //tangkap respon dari api
        $respon = $this->api->request(URL,$opsi);
        //simpan respon ke database
        $simpan = $this->simpan($respon);

        echo "<br>Permintaan pencairan dana baru berhasil dibuat.<br><br>";
        echo "Detail transaksi :<br>";
        echo "ID          : $respon->id<br>";
        echo "Jumlah      : $respon->amount<br>";
        echo "Catatan     : $respon->remark<br>";
        echo "Waktu dibuat: $respon->timestamp<br>";
        echo "Status      : $respon->status<br>";

      }
      //permintaan cek status pencairan
      function cekstatus(){
        $data = $this->pilih($_POST['id']);//pilih transaksi untuk dicek sesuai id dari form input

        if ($data!=NULL){//cek apakah transaksi ada
          //siapkan data untuk dikirim ke api
          $opsi = array(
            'http'=> array(
                'method'=>'GET',
                'header'=>"Content-Type: application/x-www-form-urlencoded\r\n".
                          "Authorization: Basic ".APIKEY."\r\n"
            )
          );
          //menambahkan id ke url
          $url=URL."/".$_POST['id'];
          //tangkap respon dari api
          $respon=$this->api->request($url,$opsi);
          //update database berdasarkan respon api
          $this->update($respon);

          echo "Detail transaksi :<br>";
          echo "ID             : ".$_POST['id']."<br>";
          echo "Jumlah         : ".$data['status']."<br>";
          echo "Catatan        : ".$data['remark']."<br>";
          echo "Waktu dibuat   : ".$data['timestamp']."<br>";
          echo "Status         : ".$data['status']."<br>";
          echo "Terakhir dicek : ".$data['time_served']."<br>";
          echo "Receipt        : <br><img src=".$data['receipt'].">";
        } else {//jika transaksi tidak ada
          echo "<br>Transaksi dengan ID ".$_POST['id']." tidak ditemukan!<br>";
        }
      }

    //FUNGSI CRUD
      //simpan transaksi baru
      function simpan($respon){
        foreach ($respon as $value){
            $data[]=$value;
        }
        $this->db->simpandata($data);
      }
      //ambil data
      function pilih($id){
        return $this->db->cekdata($id);
      }
      //perbarui data
      function update($respon){
        $id       = $respon->id;//id transaksi yang akan diperbarui
        //siapkan data baru
        $newdata  = array(
          'status'      =>($respon->status),
          'receipt'     =>($respon->receipt),
          'time_served' =>($respon->time_served)
        );
        $this->db->updatedata($id,$newdata);
      }

      function __destruct(){

      }
  }
?>
