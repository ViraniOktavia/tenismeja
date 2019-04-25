<?php
  // memanggil file koneksi.php untuk membuat koneksi
  include 'config.php';
  include 'index.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id_atlit'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id_atlit"]);

    // menampilkan data mahasiswa dari database yang mempunyai id=$id
    $query = "SELECT * FROM atlit 
    INNER JOIN kategori ON atlit.id_kategori = kategori.id_kategori
    WHERE id_atlit='$id_atlit'";
    $result = pg_query($db, $query);
    // mengecek apakah query gagal
    if(!$result){
      die ("Query Error: ".pg_errno($db).
         " - ".pg_error($db));
    }
    // mengambil data dari database dan membuat variabel" utk menampung data
    // variabel ini nantinya akan ditampilkan pada form
    $data = pg_fetch_assoc($result);
    $nama = ['nama_atlit'];
    $alamat = ['alamat_atlit'];
    $tempat_lahir = ['tempat_lahir'];
    $tanggal_lahir = ['tanggal_lahir'];
    $no_hp = ['no_hp'];
    $pendidikan = ['pendidikan'];
    $jenis_kelamin = ['jenis_kelamin'];
    $nama_ortu = ['nama_ortu'];
    $tanggal_masuk = ['tanggal_masuk'];
    $kategori = ['id_kategori'];

  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    header("location:index.php");
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <style>
      h1{
        text-align: center;
      }
      .container{
        width: 300px;
        margin: auto;
      }
      
    a:link, a:visited {
  background-color: #049372;
  color: white;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: red;
}
    </style>
  </head>
  <body>
   <center>
      <h3>Tambah Data Atlit</h3>
    <link rel="stylesheet" type="text/css" href="table.css">
<body>  

  <br>
  <form action="atlit_tambah_proses.php" method="post">
    <table cellpadding="3" cellspacing="0">
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td><input type="text" name="nama"  value="<?php echo $nama_atlit ?>"></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><input type="text" name="alamat"  value="<?php echo $alamat_atlit ?>"></td>
      </tr>
      <tr>
        <td>Tempat Lahir</td>
        <td>:</td>
        <td><input type="text" name="tempat_lahir"  value="<?php echo $tempat_lahir ?>"></td>
      </tr>
      <tr>
        <td>Tanggal Lahir</td>
        <td>:</td>
        <td><input type="date" name="tanggal_lahir"  value="<?php echo $tanggal_lahir ?>"></td>
      </tr>
      <tr>
        <td>No. Hp</td>
        <td>:</td>
        <td><input type="int" name="no_hp"  value="<?php echo $no_hp ?>"></td>
      </tr>
      <tr>
        <td>Pendidikan</td>
        <td>:</td>
        <td>
          <select name="kelas"  value="<?php echo $pendidikan ?>">
            <option value="">Pendidikan Terakhir</option>
            <option value="SD">SD</option>
            <option value="SMP">SMP</option>
            <option value="SMA">SMA</option>
            <option value="D3">D3</option>
            <option value="S1">S1</option>
            <option value="S2">S2</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td>
          <input type="radio" name="jenis_kelamin" value="Laki">Laki-laki
          <input type="radio" name="jenis_kelamin" value="Perempuan">Perempuan
        </td>
      </tr>
      <tr>
        <td>Nama Ortu</td>
        <td>:</td>
        <td><input type="text" name="nama_ortu"  value="<?php echo $nama_ortu ?>"></td>
      </tr>
      <tr>
        <td>Tanggal Masuk</td>
        <td>:</td>
        <td><input type="date" name="tanggal_masuk"  value="<?php echo $tanggal_masuk ?>"></td>
      </tr>
      <tr>
        <td>Kategori</td>
        <td>:</td>
        <td>
          <select name="kelas"  value="<?php echo $nama_kategori ?>">
            <option value="">Kategori Atlit</option>
            <option value="umum">Umum</option>
            <option value="senior">Senior</option>
            <option value="junior">Junior</option>
            <option value="kadet">Kadet</option>
            <option value="pemula">Pemula</option>
          
          </select>
        </td>
      </tr>
          <tr>
         <td> <input type="submit" name="edit" value="Update Data"> </td>
        </tr>
        </fieldset>
       
       </table>
      </form>
  </div>
  </body>
</html>