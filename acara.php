<?php
		//iclude file koneksi ke database
		include('config.php');
		include ('welcome.php');
		?>
<!DOCTYPE html>
<html>
<head>
	<title>PTM Pegadaian</title>

	<link rel="stylesheet" type="text/css" href="table.css">
</head>

<body>
	<center><h1>Acara Tahunan</h1>
	<br>
	<p> <a href="acara_tambah.php">Tambah Data Acara Tahunan</a></p>
	
	
	
	
	<table cellpadding="20" cellspacing="0" border="2">
		<tr bgcolor="#CCCCCC">
			<th>No.</th>
			<th>Nama</th>
			<th>Tingkat</th>
			<th>Tahun</th>
			<th>Opsi</th>
			

		</tr>
		
		<?php
		
		//query ke database dg SELECT table siswa diurutkan berdasarkan NIS paling besar
		$query = pg_query($db,"SELECT * FROM acara ORDER BY id_acara ASC") or die(pg_error());
		
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
					echo '<td>'.$data['id_acara'].'</td>';	
					echo '<td>'.$data['nama_acara'].'</td>';
					echo '<td>'.$data['tingkat_acara'].'</td>';
					echo '<td>'.$data['tahun_acara'].'</td>';
					

						//menampilkan data jurusan dari database
					echo '<td>
								<a href="acara_edit.php?id='.$data['id_acara'].'">Edit</a>
					 				/ 
					 			<a href="acara_hapus.php?id='.$data['id_acara'].'" onclick="return confirm(\'Yakin?\')">Hapus</a></td>';	//menampilkan link edit dan hapus dimana tiap link terdapat GET id -> ?id=siswa_id
				echo '</tr>';
				
				$no++;	//menambah jumlah nomor urut setiap row
				
			}
			
		}
		?>
	</table>
	</center>
</body>
</html>