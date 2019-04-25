<?php
// mengecek apakah tombol edit telah diklik
if (isset($_POST['atlitedit'])) {
  // buat koneksi dengan database
  include("config.php");

  // membuat variabel untuk menampung data dari form edit
  $id = $_POST['id'];
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


  //buat dan jalankan query UPDATE
 // $query  = "UPDATE barang SET ";
 //  $query .= "id = '$id', nama = '$nama' ";
 //  $query .= "WHERE id = '$id'";
  $query = "UPDATE atlit SET '$nama_atlit', 
                                      '$alamat_atlit',
                                      '$tempat_lahir',
                                      '$tanggal_lahir',
                                      '$no_hp',
                                      '$pendidikan',
                                      '$jenis_kelamin',
                                      '$nama_ortu',
                                      '$tanggal_masuk',
                                      '$id_kategori' WHERE id='$id'";




  $result = pg_query($db, $query);

  //periksa hasil query apakah ada error
  if(!$result) {
    die ("Query gagal dijalankan: ".pg_errno($db).
       " - ".pg_error($db));
  }
}

//lakukan redirect ke halaman index.php
header("location:index.php");

?>