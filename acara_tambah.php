
<?php
include 'config.php';
include 'welcome.php';
?>
<!DOCTYPE html>
<html>

<head>
		<h2>Tambah Acara Tahunan</h2>	
		<link rel="stylesheet" type="text/css" href="style.css">

<title>Bootstrap Modal Popup Form Submit with Ajax & PHP by CodexWorld</title>
<!-- bootstrap css -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<!-- bootstrap js -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
.btn-success{margin: 10px;}
</style>

</head>
<body>	
	
	<form action="acara_proses.php" method="post">
		<table cellpadding="3" cellspacing="0">
			
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><input type="text" name="nama_acara" required></td>
			</tr>
			<tr>
				<td>Tingkat</td>
				<td>:</td>
				<td><input type="int" name="tingkat_acara" required></td>
			</tr>
			<tr>
				<td>Tahun</td>
				<td>:</td>
				<td><input type="int" name="tahun_acara" required></td>
			</tr>
			
			<tr>
				<td>&nbsp;</td>
				<td></td>
				<br>
				<br>
				<td><input type="submit" name="tambah" value="Tambah"></td>
			</tr>
		</table>
	</form>
</body>
</html>