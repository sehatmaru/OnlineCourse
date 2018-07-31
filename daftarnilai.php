<?php
	include 'common/header.php';

	if (($_SESSION['role']=="siswa")) {
		die("<script>alert('Anda bukan guru atau admin'); window.location= 'index.php'; </script>");
	}

	$query_ujian = mysql_query("SELECT * FROM ujian");
	$no = 1;
?>
<head>
	<title>Online Course</title>
</head>
<body>
<div class="check-out">	 
	<div class="container">	 
		<div class="spec" style="margin-left: 250px; margin-right: 250px;">
			<h3>Nilai</h3>
			<table class="table">
				<tr>
					<th class="t-head" width="10"><center>No</center></th>
					<th class="t-head"><center>Nama</center></th>
					<th class="t-head"><center>Mata Pelajaran</center></th>
					<th class="t-head"><center>Status</center></th>
					<th class="t-head"><center>Jumlah Partisipan</center></th>
					<th class="t-head" width="100"><center>Operasi</center></th>
		  		</tr>
		  		<?php if (mysql_num_rows($query_ujian)==0) { ?>
		  		<tr><td colspan="6" class="t-data">Tidak ada Mapel.</td></tr>
		  		<?php }else{
				  		while ($detail = mysql_fetch_array($query_ujian,MYSQL_ASSOC) ) {
				  			$id_ujian 	= $detail['id_ujian'];
				  			$id_mapel	= $detail['id_mapel'];

				  			$query_nilai 	= mysql_query("SELECT * FROM nilai WHERE id_ujian='$id_ujian'");
				  			$total			= mysql_num_rows($query_nilai);

							$query_mapel 	= mysql_query("SELECT * FROM mapel WHERE id_mapel='$id_mapel'");
				  			$data_mapel		= mysql_fetch_array($query_mapel);
				  			?>
				  		<tr class="cross">
				  			<td class="t-data"><center><?php echo $no; $no++ ?></center></td>
					 		<td class="t-data"><center><?php echo($detail['nama_ujian']) ?></center></td>
					 		<td class="t-data"><center><?php echo($data_mapel['nama']) ?></center></td>

					 		<?php if ($detail['status']=='1') { ?>
					 			<td class="t-data"><h4><label class="label label-success"><i class="fa fa-check-circle fa-fw"></i> Aktif</label></h4></td>
					 		<?php }else{  ?>
					 			<td class="t-data"><h4><label class="label label-danger"><i class="fa fa-ban fa-fw"></i> Tidak Aktif</label></h4></td>
					 		<?php }
					 		
					 			if ($total==0) { ?>
					 			<td class="t-data"><center><b>0</b></center></td>
					 		<?php } else { ?>
					 			<td class="t-data"><center><b><?php echo($total) ?></b></center></td>
					 		<?php } ?>

							<td class="t-data">
								<a class="btn btn-primary btn-sm" href="detailnilai.php?id_ujian=<?php echo($detail['id_ujian']) ?>"><i class="fa fa-eye fa-lg"></i> Daftar Nilai
								</a>
							</td>
				  		</tr>
		  		<?php }} ?>
			</table>
		 </div>
	</div>
</div>