<?php
	include 'common/header.php';

	if (($_SESSION['role']=="siswa")) {
		die("<script>alert('Anda bukan guru atau admin'); window.location= 'index.php'; </script>");
	}

	$query_kisi = mysql_query("SELECT * FROM kisi");
	$no = 1;
?>
<head>
	<title>Online Course</title>
</head>
<body>
<div class="check-out">	 
	<div class="container">	 
		<div class="spec" style="margin-left: 250px; margin-right: 250px;">
			<h3>Daftar Kisi</h3>
			<table style="margin-bottom: 10px;">
				<tr>
					<td>
						<a class="btn btn-success" href="pilihmapel.php?tipe=kisi"><i class="fa fa-plus fa-md"></i> Tambah Kisi</a>
					</td>
				</tr>
			</table>
			<table class="table">
				<tr>
					<th class="t-head" width="10"><center>No</center></th>
					<th class="t-head"><center>Nama</center></th>
					<th class="t-head"><center>Mata Pelajaran</center></th>
					<th class="t-head"><center>Jumlah Soal</center></th>
					<th class="t-head" width="210"><center>Operasi</center></th>
		  		</tr>
		  		<?php if (mysql_num_rows($query_kisi)==0) { ?>
		  		<tr><td colspan="6" class="t-data">Tidak ada Mapel.</td></tr>
		  		<?php }else{
				  		while ($detail = mysql_fetch_array($query_kisi,MYSQL_ASSOC) ) {
				  			$id_mapel = $detail['id_mapel'];

				  			$query_mapel 	= mysql_query("SELECT * FROM mapel WHERE id_mapel='$id_mapel'");
				  			$data_mapel		= mysql_fetch_array($query_mapel);
							$mapel 			= $data_mapel['nama'];
				  			?>
				  		<tr class="cross">
				  			<td class="t-data"><center><?php echo $no; $no++ ?></center></td>
					 		<td class="t-data"><center><?php echo($detail['nama_kisi']) ?></center></td>
					 		<td class="t-data"><center><?php echo($mapel) ?></center></td>
					 		<td class="t-data"><center><b><?php echo($detail['total']) ?></b></center></td>
							<td class="t-data">
								<a class="btn btn-primary btn-sm" href="daftarsoal.php?mapel=<?php echo($detail['id_mapel']) ?>&id_kisi=<?php echo($detail['id_kisi']) ?>"><i class="fa fa-eye fa-lg"></i> Daftar Soal
								</a>
								<a class="btn btn-danger btn-sm" href="hapuskisi_process.php?id_kisi=<?php echo($detail['id_kisi']) ?>"><i class="fa fa-trash fa-lg"></i> Hapus
								</a>
							</td>
				  		</tr>
		  		<?php }} ?>
			</table>
		 </div>
	</div>
</div>