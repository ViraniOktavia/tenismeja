<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'config.php';

// mengecek apakah tombol input dari form telah diklik
if (isset($_POST['atlit_tambah'])) {

	// membuat variabel untuk menampung data dari form
	$nama = $_POST['nama_atlit'];
  $alamat = $_POST['alamat_atlit'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $no_hp = $_POST['no_hp'];
  $pendidikan = $_POST['pendidikan'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $nama_ortu = $_POST['nama_ortu'];
  $tanggal_masuk = $_POST['tanggal_masuk'];
  $kategori = $_POST['id_kategori'];

  // jalankan query INSERT untuk menambah data ke database
  $query = "INSERT INTO atlit VALUES ('$nama_atlit', 
                                      '$alamat_atlit',
                                      '$tempat_lahir',
                                      '$tanggal_lahir',
                                      '$no_hp',
                                      '$pendidikan',
                                      '$jenis_kelamin',
                                      '$nama_ortu',
                                      '$tanggal_masuk',
                                      '$id_kategori')";
  $result = pg_query($db, $query);
  // periska query apakah ada error
  if(!$result){
      die ("Query gagal dijalankan: ".pg_errno($db).
           " - ".pg_error($db));
  }
}

// melakukan redirect (mengalihkan) ke halaman index.php
header("location:atlit.php");
?>