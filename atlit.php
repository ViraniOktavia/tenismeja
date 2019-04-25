<?php
		//iclude file koneksi ke database
		include('config.php');
		include ('index.php');
		?>
<!DOCTYPE html>
<html>
<head>

	<title>PTM Pegadaian</title>

	<link rel="stylesheet" type="text/css" href="table.css">

	


<body>
<br><center>
	<div class="isi">
	<h2>Biodata Atlit</h2>
	</div>
	</center>
	

	
	<div class="btn btn-success" >
		<p> <a href="atlit_tambah.php">(+) Data Atlit</a></p>
	<button onclick="window.print()">Print Halaman Web</button>
	
</head>
	
	<br>
		<center>
	
	<table cellpadding="20" cellspacing="0" border="2">
		<tr bgcolor="#CCCCCC">
			<th>No.</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>No. Hp</th>
			<th>Pendidikan</th>
			<th>Jenis Kelamin</th>
			<th>Nama Ortu</th>
			<th>Tanggal Masuk</th>
			<th>Kategori</th>
			<th>Opsi</th>

		</tr>

		<br>
		</div>
	
		<?php
		
		//query ke database dg SELECT table siswa diurutkan berdasarkan NIS paling besar
		$query = pg_query($db,"SELECT * FROM atlit 
			INNER JOIN kategori ON atlit.id_kategori = kategori.id_kategori
			ORDER BY id_atlit ASC") or die(pg_error());
		
		//cek, apakakah hasil query di atas mendapatkan hasil atau tidak (data kosong atau tidak)
		if(pg_num_rows($query) == 0){	//ini artinya jika data hasil query di atas kosong
			
			//jika data kosong, maka akan menampilkan row kosong
			echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
			
		}else{	//else ini artinya jika data hasil query ada (data diu database tidak kosong)
			
			//jika data tidak kosong, maka akan melakukan perulangan while
			$no = 1;	//membuat variabel $no untuk membuat nomor urut
			while($data = pg_fetch_assoc($query)){	//perulangan while dg membuat variabel $data yang akan mengambil data di database
				
				//menampilkan row dengan data di database
				echo '<tr>';	
					echo '<td>'.$data['id_atlit'].'</td>';	
					echo '<td>'.$data['nama_atlit'].'</td>';
					echo '<td>'.$data['alamat_atlit'].'</td>';
					echo '<td>'.$data['tempat_lahir'].'</td>';
					echo '<td>'.$data['tanggal_lahir'].'</td>';
					echo '<td>'.$data['no_hp'].'</td>';
					echo '<td>'.$data['pendidikan'].'</td>';
					echo '<td>'.$data['jenis_kelamin'].'</td>';
					echo '<td>'.$data['nama_ortu'].'</td>';
					echo '<td>'.$data['tanggal_masuk'].'</td>';
					echo '<td>'.$data['nama_kategori'].'</td>';

						//menampilkan data jurusan dari database
					echo '<td>
								<a href="atlit_edit.php?id='.$data['id_atlit'].'">Edit</a>
					 				/ 
					 			<a href="atlit_hapus.php?id='.$data['id_atlit'].'" onclick="return confirm(\'Yakin?\')">Hapus</a></td>';	//menampilkan link edit dan hapus dimana tiap link terdapat GET id -> ?id=siswa_id
				echo '</tr>';
				
				$no++;	//menambah jumlah nomor urut setiap row
				
			}
			
		}
		?>


	</center>
	</table>
</body>
</html>