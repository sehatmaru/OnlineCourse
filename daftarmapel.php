<?php
	include 'common/header.php';

	if (($_SESSION['role']!="admin")) {
		die("<script>alert('Anda bukan guru atau admin'); window.location= 'index.php'; </script>");
	}

	$query_mapel = mysql_query("SELECT * FROM mapel");
	$no = 1;
?>
<head>
	<title>Online Course</title>
</head>
<body>
<div class="check-out">	 
	<div class="container">	 
		<div class="spec" style="margin-left: 250px; margin-right: 250px;">
			<h3>Mata Pelajaran</h3>
			<table style="margin-bottom: 10px;">
				<tr>
					<td><a class="btn btn-success" href="tambahmapel.php"><i class="fa fa-plus fa-md"></i> Tambah Mapel</a></td>
				</tr>
			</table>
			<table class="table">
				<tr>
					<th class="t-head" width="10"><center>No</center></th>
					<th class="t-head"><center>Mata Pelajaran</center></th>
					<th class="t-head"><center>Jumlah Ujian</center></th>
					<th class="t-head"><center>Jumlah Kisi</center></th>
					<th class="t-head" width="200"><center>Operasi</center></th>
		  		</tr>
		  		<?php if (mysql_num_rows($query_mapel)==0) { ?>
		  		<tr><td colspan="6" class="t-data">Tidak ada Mapel.</td></tr>
		  		<?php }else{
				  		while ($detail = mysql_fetch_array($query_mapel,MYSQL_ASSOC) ) {
				  			$id_mapel = $detail['id_mapel'];

				  			$query_ujian = mysql_query("SELECT * FROM ujian WHERE id_mapel='$id_mapel'");
				  			$total_ujian = mysql_num_rows($query_ujian);

				  			$query_kisi = mysql_query("SELECT * FROM kisi WHERE id_mapel='$id_mapel'");
				  			$total_kisi = mysql_num_rows($query_kisi);
				  			?>
				  		<tr class="cross">
				  			<td class="t-data"><center><?php echo $no; $no++ ?></center></td>
					 		<td class="t-data"><?php echo($detail['nama']) ?></td>
					 		<?php if ($total_ujian==0) { ?>
					 			<td class="t-data"><center><b>0</b></center></td>
					 		<?php } else { ?>
					 			<td class="t-data"><center><b><?php echo $total_ujian; ?></b></center></td>
					 		<?php }

					 			if ($total_kisi==0) { ?>
					 			<td class="t-data"><center><b>0</b></center></td>
					 		<?php } else { ?>
					 			<td class="t-data"><center><b><?php echo $total_kisi; ?></b></center></td>
					 		<?php } ?>
					 		<td class="t-data"><center>
								<a class="btn btn-info btn-sm" href="editmapel.php?mapel=<?php echo($detail['id_mapel']) ?>"><i class="fa fa-pencil fa-lg"></i> Edit</a>
								<a class="btn btn-danger btn-sm" href="hapusmapel_process.php?mapel=<?php echo($detail['id_mapel']) ?>"><i class="fa fa-trash fa-lg"></i> Hapus</a>
								</center>
							</td>
				  		</tr>
		  			<?php }
		  			} ?>
			</table>
		 </div>
	</div>
</div>