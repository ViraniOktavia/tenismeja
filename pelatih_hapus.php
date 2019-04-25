<?php
// buka koneksi dengan MySQL
  include("config.php");

  //mengecek apakah di url ada GET id
  if (isset($_GET["id_pelatih"])) {

    // menyimpan variabel id dari url ke dalam variabel $id
    $id_pelatih = $_GET["id_pelatih"];

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM pelatih WHERE id_pelatih='$id_pelatih' ";
    $hasil_query = pg_query($db, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".pg_errno($db).
           " - ".pg_error($db));
    }
  }
  // melakukan redirect ke halaman index.php
  header("location:pelatih.php");
?>