# MINI PROJECT FLIP

## Yang Dibutuhkan

* XAMPP (berjalan dengan baik di v3.2.4)
* Web Browser ( berjalan dengan baik di Chrome v75.0.3770.100)

## Mempersiapkan Program

 - Pastikan Server Apache dan MySQL di XAMPP sudah berjalan
 - Unduh program ini dalam ZIP atau atau lakukan `clone` repository.
 - Ekstrak ZIP. Salin folder `testFlip` ke direktori htdocs XAMPP.
 - Pada folder `testFlip`, buka file `config.php` pada folder `config`. Ubah konfigurasi yang dibutuhkan (misal: nama database yang digunakan).
- Buat database baru dengan nama sesuai yang di tuliskan di dalam file `config.php`.
- Tambahkan tabel yang dibutuhkan ke database dengan cara :
Salin jalankan link berikut `http://localhost/testFlip/migration.php` di browser

## Menjalankan Layanan

- Salin dan jalankan link berikut `http://localhost/testFlip/` di browser
- Akan muncul menu  `PENCAIRAN DANA` dan `CEK STATUS PENCAIRAN DANA`. Terdapat pula menu `TAMPILKAN SEMUA TRANSAKSI` untuk membantu pengecekan isi database

#### Permintaan Pencairan Dana
- Pilih menu `PENCAIRAN DANA`
- Isi form yang disediakan kemudian klik tombol `KIRIM`
- Akan muncul pesan sukses dan detail transaksi yang dibuat
- Daftar semua transaksi dimunculkan di bagian bawah untuk memudahkan pengecekan database

#### Cek Status Pencairan Dana
- Pilih menu `CEK STATUS PENCAIRAN DANA`
- Isi `ID` transaksi yang akan dicek statusnya kemudian klik tombol `CEK STATUS` (ID transaksi harus terdaftar di database)
- Akan muncul detail transaksi sesuai ID yang dimasukkan
- Daftar semua transaksi dimunculkan di bagian bawah untuk memudahkan pengecekan database

## Catatan
- Usahakan semua input diisi sesuai dengan data yang diminta
- Daftar semua transaksi dimunculkan untuk memudahkan pengecekan jalannya program
