<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'config.php';

// mengecek apakah tombol input dari form telah diklik
if (isset($_POST['pelatih_tambah'])) {

	// membuat variabel untuk menampung data dari form
	$nama = $_POST['nama_pelatih'];
  $alamat = $_POST['alamat_pelatih'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $pendidikan = $_POST['pendidikan'];
  $no_hp = $_POST['no_hp'];


  // jalankan query INSERT untuk menambah data ke database
  $query = "INSERT INTO pelatih VALUES ('$nama_pelatih', 
                                      '$alamat_pelatih',
                                      '$tempat_lahir',
                                      '$tanggal_lahir',
                                      '$no_hp')";
  $result = pg_query($db, $query);
  // periska query apakah ada error
  if(!$result){
      die ("Query gagal dijalankan: ".pg_errno($db).
           " - ".pg_error($db));
  }
}

// melakukan redirect (mengalihkan) ke halaman index.php
header("location:pelatih.php");
?>