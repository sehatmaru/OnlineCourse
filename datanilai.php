<?php
	include 'common/header.php';

	if (!isset($_SESSION['username'])) {
		die("<script>alert('Silahkan login terlebih dahulu'); window.location=history.go(-1)</script>");
	}

	if (($_SESSION['role']!="siswa")) {
		die("<script>alert('Anda bukan guru atau admin'); window.location=history.go(-1)</script>");
	}

	$username	= $_SESSION['username'];

	$query_user 	= mysql_query("SELECT * FROM user WHERE username='$username'");
	$data_user  	= mysql_fetch_array($query_user);
	$id_user		= $data_user['user_id'];

	$query_nilai 	= mysql_query("SELECT * FROM nilai WHERE id_user='$id_user'");

	$no = 1;
?>
<head>
	<title>Online Course</title>
</head>
<body>
<div class="check-out">	 
	<div class="container">	 
		<div class="spec" style="margin-left: 100px; margin-right: 100px;">
			<h3>Data nilai</h3>
			<table class="table">
				<tr>
					<th class="t-head" width="10"><center>No</center></th>
					<th class="t-head"><center>Nama Ujian</center></th>
					<th class="t-head"><center>Mata Pelajaran</center></th>
					<th class="t-head" width="50"><center>Skor</center></th>
					<th class="t-head" width="150"><center>Status</center></th>
		  		</tr>
		  		<?php if (mysql_num_rows($query_nilai)==0) { ?>
		  		<tr><td colspan="6" class="t-data">Tidak ada Nilai.</td></tr>
		  		<?php }else{
				  		while ($detail = mysql_fetch_array($query_nilai,MYSQL_ASSOC) ) {
				  				$id_ujian = $detail['id_ujian'];

				  				$query_ujian 	= mysql_query("SELECT * FROM ujian WHERE id_ujian='$id_ujian'");
								$data_ujian  	= mysql_fetch_array($query_ujian);
								$nama_ujian		= $data_ujian['nama_ujian'];
								$id_mapel		= $data_ujian['id_mapel'];

								$query_mapel 	= mysql_query("SELECT * FROM mapel WHERE id_mapel='$id_mapel'");
								$data_mapel  	= mysql_fetch_array($query_mapel);
								$nama_mapel		= $data_mapel['nama'];

						if ($detail['nilai'] > 75) { ?>
							<tr class="cross alert-success">
						<?php }else { ?>
							<tr class="cross alert-danger">
						<?php } ?>
				  			<td class="t-data"><center><?php echo $no; $no++ ?></center></td>
					 		<td class="t-data"><center><?php echo($nama_ujian) ?></center></td>
					 		<td class="t-data"><center><?php echo($nama_mapel) ?></center></td>
							<td class="t-data"><center><b><?php echo($detail['nilai']) ?></b></center></td>
							<?php if ($detail['nilai'] > 75) { ?>
								<td class="t-data"><h4><label class="label label-success"><i class="fa fa-check-circle fa-fw"></i> Lulus</label></h4></td>
							<?php } else { ?>
								<td class="t-data"><h4><label class="label label-danger"><i class="fa fa-ban fa-fw"></i> Remedial</label></h4></td>
							<?php } ?>
				  		</tr>
		  		<?php }} ?>
			</table>
		 </div>
	</div>
</div>
