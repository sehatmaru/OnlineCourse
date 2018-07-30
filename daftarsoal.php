<?php
	include 'common/header.php';

	if (($_SESSION['role']=="siswa")) {
		die("<script>alert('Anda bukan guru atau admin'); window.location= 'index.php'; </script>");
	}

	if ((!isset($_GET['id_ujian'])) && !isset($_GET['id_kisi'])) {
		die("<script>window.location=history.go(-1);</script></script>");
	}

	if (isset($_GET['id_ujian'])) {
		$mapel		= $_GET['mapel'];
		$id_ujian	= $_GET['id_ujian'];

		$query_soal = mysql_query("SELECT * FROM soal WHERE id_ujian='$id_ujian'");
	} elseif (isset($_GET['id_kisi'])) {
		$mapel		= $_GET['mapel'];
		$id_kisi	= $_GET['id_kisi'];

		$query_soal = mysql_query("SELECT * FROM soal WHERE id_kisi='$id_kisi'");
	}

	$query_mapel 	= mysql_query("SELECT * FROM mapel WHERE id_mapel='$mapel'");
	$data_mapel  	= mysql_fetch_array($query_mapel);
	$nama_mapel		= $data_mapel['nama'];

	if (isset($_GET['id_ujian'])) {
		$query_ujian 	= mysql_query("SELECT * FROM ujian WHERE id_ujian='$id_ujian'");
		$data_ujian  	= mysql_fetch_array($query_ujian);
		$nama 			= $data_ujian['nama_ujian'];
	} elseif (isset($_GET['id_kisi'])) {
		$query_kisi 	= mysql_query("SELECT * FROM kisi WHERE id_kisi='$id_kisi'");
		$data_kisi  	= mysql_fetch_array($query_kisi);
		$nama 			= $data_kisi['nama_kisi'];
	}

	$no = 1;
?>
<head>
	<title>Online Course</title>
</head>
<body>
<div class="check-out">	 
	<div class="container">	 
		<div class="spec" style="margin-left: 100px; margin-right: 100px;">
			<h3><?php echo $nama ?></h3>
			<h4><?php echo $nama_mapel ?></h4>
			<table style="margin-bottom: 10px;">
				<tr>
					<td>
						<?php if (isset($_GET['id_ujian'])) { ?>
							<a class="btn btn-success" href="tambahsoal.php?mapel=<?php echo $mapel ?>&id_ujian=<?php echo $id_ujian ?>"><i class="fa fa-plus fa-md"></i> Tambah Soal</a>
						<?php } elseif (isset($_GET['id_kisi'])) {?>
							<a class="btn btn-success" href="tambahsoal.php?mapel=<?php echo $mapel ?>&id_kisi=<?php echo $id_kisi ?>"><i class="fa fa-plus fa-md"></i> Tambah Soal</a>
						<?php } ?>
					</td>
				</tr>
			</table>
			<table class="table">
				<tr>
					<th class="t-head" width="10"><center>No</center></th>
					<th class="t-head" width="370"><center>Pertanyaan</center></th>
					<th class="t-head" width="370"><center>Jawaban</center></th>
					<th class="t-head"><center>Operasi</center></th>
		  		</tr>
		  		<?php if (mysql_num_rows($query_soal)==0) { ?>
		  		<tr><td colspan="6" class="t-data">Tidak ada Soal.</td></tr>
		  		<?php }else{
				  		while ($detail = mysql_fetch_array($query_soal,MYSQL_ASSOC) ) {?>
				  		<tr class="cross">
				  			<td class="t-data"><center><?php echo $no; $no++ ?></center></td>
					 		<td class="t-data"><?php echo($detail['pertanyaan']) ?></td>
							<td class="t-data"><?php echo($detail['jawaban']) ?></td>
							<td class="t-data"><center>
								<a class="btn btn-info btn-sm" href="editsoal.php?soal=<?php echo($detail['id_soal']) ?>"><i class="fa fa-pencil fa-lg"></i> Edit
								</a>
								<?php if (isset($_GET['id_ujian'])) { ?>
									<a class="btn btn-danger btn-sm" href="hapussoal_process.php?soal=<?php echo($detail['id_soal']) ?>&id_ujian=<?php echo $id_ujian ?>"><i class="fa fa-trash fa-lg"></i> Hapus
								<?php } elseif (isset($_GET['id_kisi'])) { ?>
									<a class="btn btn-danger btn-sm" href="hapussoal_process.php?soal=<?php echo($detail['id_soal']) ?>&id_kisi=<?php echo $id_kisi ?>"><i class="fa fa-trash fa-lg"></i> Hapus
								<?php } ?>
								</a></center>
							</td>
				  		</tr>
		  		<?php }} ?>
			</table>
		 </div>
	</div>
</div>