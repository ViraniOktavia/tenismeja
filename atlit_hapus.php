<?php
// buka koneksi dengan MySQL
  include("config.php");

  //mengecek apakah di url ada GET id
  if (isset($_GET["id_atlit"])) {

    // menyimpan variabel id dari url ke dalam variabel $id
    $id_atlit = $_GET["id_atlit"];

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM atlit WHERE id_atlit='$id_atlit' ";
    $hasil_query = pg_query($db, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".pg_errno($db).
           " - ".pg_error($db));
    }
  }
  // melakukan redirect ke halaman index.php
  header("location:atlit.php");
?>