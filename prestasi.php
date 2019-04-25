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
</head>

<body>
<br><center>
	<h2>Prestasi Atlit</h2>
</center>
	

	<p> <a href="atlit_tambah.php">(+) Prestasi Atlit</a></p>
	<button onclick="window.print()">Print Halaman Web</button>
	<br><br>
		<center>
	
	<table cellpadding="20" cellspacing="0" border="2">
		<tr bgcolor="#CCCCCC">
			<th>No.</th>
			<th>Nama Atlit</th>
			<th>Nama Acara</th>
			<th>Kategori Lomba</th>
			<th>Tahun</th>
			<th>Prestasi</th>
			<th>Keterangan</th>
			<th>Opsi</th>

		</tr>
		
		<?php
		
		//query ke database dg SELECT table siswa diurutkan berdasarkan NIS paling besar
		$query = pg_query($db,"SELECT * FROM prestasi 
			INNER JOIN atlit ON prestasi.id_atlit = atlit.id_atlit
			INNER JOIN acara ON prestasi.id_acara = acara.id_acara
			INNER JOIN kategori_lomba ON prestasi.id_kategori_lomba = kategori_lomba.id_kategori_lomba
			") or die(pg_error());
		
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
					echo '<td>'.$no++.'</td>';	
					echo '<td>'.$data['nama_atlit'].'</td>';	
					echo '<td>'.$data['nama_acara'].'</td>';
					echo '<td>'.$data['nama_kategori_lomba'].'</td>';
					echo '<td>'.$data['tahun'].'</td>';
					echo '<td>'.$data['prestasi'].'</td>';
					echo '<td>'.$data['keterangan'].'</td>';

						//menampilkan data jurusan dari database
					echo '<td>
								<a href="edit_atlit.php?id='.$data['id_atlit'].'">Edit</a>
					 				/ 
					 			<a href="atlit_hapus.php?id='.$data['id_atlit'].'" onclick="return confirm(\'Yakin?\')">Hapus</a></td>';	//menampilkan link edit dan hapus dimana tiap link terdapat GET id -> ?id=siswa_id
				echo '</tr>';
				
					//menambah jumlah nomor urut setiap row
				
			}
			
		}
		?>
	</table>
	</center>
</body>
</html>