<?php
	include 'common/header.php';

	if (!isset($_SESSION['username'])) {
		die("<script>alert('Anda belum masuk. Silahkan masuk terlebih dahulu'); window.location='masuk.php'; </script>");
	}

	if ($_SESSION['role']!="admin") {
		die("<script>alert('Anda bukan admin'); window.location=history.go(-1)</script>");
	}
?>
<head>
	<title>Tambah Soal</title>
</head>
<div class="login">
	<div class="main-agileits" style="margin-top: 50px;">
		<div class="form-w3agile">
			<h3>Tambah Mapel</h3>
			<form action="tambahmapel_process.php?op=tambah" method="post" enctype="multipart/form-data">
				<div class="form-group1">
				    <label>Nama Mapel</label>
				    <textarea class="form-control" name="nama" required="" rows="3"></textarea>
				</div>
				<input style="margin-top: 20px;" type="submit" value="Tambah">
			</form>
		</div>
	</div>
</div>