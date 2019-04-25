<!DOCTYPE html>
<html>
<head>
<!--   <link rel="stylesheet" type="text/css" href="style.css"> -->
<style>
<div>
  

        .button-success,
        .button-error,
        .button-warning,
        .button-secondary {
            color: white;
            border-radius: 4px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
        }

        .button-success {
            background: rgb(28, 184, 65); /* this is a green */
        }

        .button-error {
            background: rgb(202, 60, 60); /* this is a maroon */
        }

        .button-warning {
            background: rgb(223, 117, 20); /* this is an orange */
        }

        .button-secondary {
            background: rgb(66, 184, 221); /* this is a light blue */
        }
</div>
div.halaman{
    border: 2px solid grey;
    text-align: center;
    padding: 25px 20px  ; 
}


ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a, .dropbtn {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
  background-color: #049372;
}

li.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}

</style>
</head>
<body>

<div class="content">
  <header>
    <center> 
    <div class="halaman">
        <h1 class="judul" >PTM PEGADAIAN</h1>
         <h3 class="deskripsi">Private Tenis Meja PTM Pegadaian Parak Gadang</h3>
    </div>
  
    </center>
  </header>
<div class="menu">
<ul>
  <li><a href="home.php">Beranda</a></li>
  <li><a href="atlit.php">Atlit</a></li>
  <li><a href="pelatih.php">Pelatih</a></li>
  <li><a href="prestasi.php">Prestasi</a></li>
  <li><a href="pembayaran.php">Pembayaran</a></li>

  <li style="float:right"><a  href="login.php">Logout</a></li>
</ul>
</div>
<div class="badan">
   <?php 
    include 'config.php';
  if(isset($_GET['page'])){
    $page = $_GET['page'];

    switch ($page) {
      case 'home':
        include "home.php";
        break;
      case 'atlit':
        include "atlit.php";
        break;
      case 'pelatih':
        include "pelatih.php";
        break;   
       case 'prestasi':
        include "prestasi.php";
        break;  
      case 'logout':
        include "login.php";
        break;   
      default:
        echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
        break;
    }
  }
   ?>
</div>

</body>
</html>
