<?php
		//iclude file koneksi ke database
		include('config.php');
		include('index.php');
		?>

<div>
	<h2>Welcome</h2>
	<p>Selamat datang di PTM Pegadaian. PTM Pegadaian merupakan tempat sebuah tempat pelatihan tenis meja yang ada di kota Padang. </p>
</div>

<!DOCTYPE html>
<html>
<head>

	<title>PTM Pegadaian</title>

	<link rel="stylesheet" type="text/css" href="table.css">
</head>

<body>
<br><center>
	<h3>Jadwal Latihan</h3>

	
	<table cellpadding="20" cellspacing="0" border="2">
		<tr bgcolor="#CCCCCC">
			<th>No.</th>
			<th>Hari</th>
			<th>Jam</th>
			<th>Kategori</th>

		</tr>
		
		<?php
		
		//query ke database dg SELECT table siswa diurutkan berdasarkan NIS paling besar
		$query = pg_query($db,"SELECT * FROM latihan 
			INNER JOIN jadwal ON latihan.id_jadwal = jadwal.id_jadwal
			INNER JOIN kategori ON latihan.id_kategori = kategori.id_kategori
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
					echo '<td>'.$data['hari'].'</td>';
					echo '<td>'.$data['jam'].'</td>';
					echo '<td>'.$data['nama_kategori'].'</td>';
					

						//menampilkan data jurusan dari database
						//menampilkan link edit dan hapus dimana tiap link terdapat GET id -> ?id=siswa_id
				echo '</tr>';
					//menambah jumlah nomor urut setiap row
				
			}
			
		}
		?>
	</table>
	</center>
</body>
</html>