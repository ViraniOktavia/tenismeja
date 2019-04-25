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
	<center><H2>Biodata Pelatih</H2></center>
	
	<p> <a href="pelatih_tambah.php">(+) Data Pelatih</a></p>
	<button onclick="window.print()">Print Halaman Web</button>
	<br>
	<br>
	
	<center>
	
	<table cellpadding="20" cellspacing="0" border="2">
		<tr bgcolor="#CCCCCC">
			<th>No.</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Pendidikan</th>
			<th>No. Hp</th>
			
			<th>Opsi</th>

		</tr>
		
		<?php
		
		//query ke database dg SELECT table siswa diurutkan berdasarkan NIS paling besar
		$query = pg_query($db,"SELECT * FROM pelatih ORDER BY id_pelatih ASC") or die(pg_error());
		
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
					echo '<td>'.$data['id_pelatih'].'</td>';	
					echo '<td>'.$data['nama_pelatih'].'</td>';
					echo '<td>'.$data['alamat_pelatih'].'</td>';
					echo '<td>'.$data['tempat_lahir'].'</td>';
					echo '<td>'.$data['tanggal_lahir'].'</td>';
					echo '<td>'.$data['pendidikan'].'</td>';
					echo '<td>'.$data['no_hp'].'</td>';
					
					

						//menampilkan data jurusan dari database
					echo '<td><a href="pelatih_edit.php?id='.$data['id_pelatih'].'">Edit</a> / <a href="pelatih.php?id='.$data['id_pelatih'].'" onclick="return confirm(\'Yakin?\')">Hapus</a></td>';	//menampilkan link edit dan hapus dimana tiap link terdapat GET id -> ?id=siswa_id
				echo '</tr>';
				
				$no++;	//menambah jumlah nomor urut setiap row
				
			}
			
		}
		?>
	</table>
</center>
</body>
</html>