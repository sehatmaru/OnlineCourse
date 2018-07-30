<?php
	include 'common/header.php';

	if (!isset($_SESSION['username'])) {
		die("<script>alert('Anda belum masuk. Silahkan masuk terlebih dahulu'); window.location='masuk.php'; </script>");
	}

	if ($_SESSION['role']!="guru") {
		die("<script>alert('Anda bukan guru'); window.location=history.go(-1)</script>");
	}

	$mapel = $_GET['mapel'];

	$query_mapel 	= mysql_query("SELECT * FROM mapel WHERE id_mapel='" . $mapel . "'");
	$data_mapel		= mysql_fetch_array($query_mapel);
	$nama			= $data_mapel['nama'];
?>
<head>
	<title>Tambah Soal</title>
</head>
<div class="login">
	<div class="main-agileits" style="margin-top: 50px;">
		<div class="form-w3agile">
			<h3>Tambah Ujian</h3>
			<h4><b><?php echo $nama ?></b></h4>
			<form action="tambahujian_process.php?op=tambah" method="post" enctype="multipart/form-data">
				<input type="input" name="mapel" hidden="true" value="<?php echo $mapel ?>">
				<div class="form-group1">
				    <label>Nama Ujian</label>
				    <textarea class="form-control" name="nama" required="" rows="3"></textarea>
				</div>
				<input style="margin-top: 20px;" type="submit" value="Tambah">
			</form>
		</div>
	</div>
</div>