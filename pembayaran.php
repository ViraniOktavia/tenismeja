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
	<h2>Biodata pembayaran</h2>
</center>
	

	<p> <a href="pembayaran_tambah.php">(+) Pembayaran</a></p>
	<button onclick="window.print()">Print Halaman Web</button>
	<br>
	<br>
		<center>
	
	<table cellpadding="20" cellspacing="0" border="2">
		<tr bgcolor="#CCCCCC">
			<th>No.</th>
			<th>Jenis Pembayaran</th>
			<th>Nama Atlit</th>
			<th>Tgl Bayar</th>
			<th>Bulan</th>
			<th>Biaya</th>
			<th>Opsi</th>

		</tr>
		
		<?php
		
		//query ke database dg SELECT table siswa diurutkan berdasarkan NIS paling besar
		$query = pg_query($db,"SELECT * FROM pembayaran 
			INNER JOIN jenis_pembayaran ON pembayaran.id_jenis_pembayaran = jenis_pembayaran.id_jenis_pembayaran
				INNER JOIN atlit ON pembayaran.id_atlit = atlit.id_atlit
			ORDER BY id_pembayaran ASC") or die(pg_error());
		
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
					echo '<td>'.$data['id_pembayaran'].'</td>';	
					echo '<td>'.$data['nama_jenis_pembayaran'].'</td>';
					echo '<td>'.$data['nama_atlit'].'</td>';
					echo '<td>'.$data['tgl_pembayaran'].'</td>';
					echo '<td>'.$data['bulan'].'</td>';
					echo '<td>'.$data['biaya'].'</td>';

						//menampilkan data jurusan dari database
					echo '<td>
								<a href="edit_ pembayaran.php?id='.$data['id_pembayaran'].'">Edit</a>
					 				/ 
					 			<a href="pembayaran_hapus.php?id='.$data['id_pembayaran'].'" onclick="return confirm(\'Yakin?\')">Hapus</a></td>';	//menampilkan link edit dan hapus dimana tiap link terdapat GET id -> ?id=siswa_id
				echo '</tr>';
				
				$no++;	//menambah jumlah nomor urut setiap row
				
			}
			
		}
		?>
	</table>
	</center>
</body>
</html>