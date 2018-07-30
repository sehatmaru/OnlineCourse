<?php
	include 'common/header.php';

	if (!isset($_SESSION['username'])) {
		die("<script>alert('Anda belum masuk. Silahkan masuk terlebih dahulu'); window.location='masuk.php'; </script>");
	}

	if ($_SESSION['role']!="guru") {
		die("<script>alert('Anda bukan guru'); window.location=history.go(-1)</script>");
	}

	$mapel 			= $_GET['mapel'];

	if(isset($_GET['id_ujian'])){
		$id_ujian		= $_GET['id_ujian'];

		$query 		= mysql_query("SELECT * FROM ujian WHERE id_ujian='$id_ujian'");
		$data		= mysql_fetch_array($query);
	} elseif(isset($_GET['id_kisi'])){
		$id_kisi		= $_GET['id_kisi'];

		$query 		= mysql_query("SELECT * FROM kisi WHERE id_kisi='$id_kisi'");
		$data		= mysql_fetch_array($query);
	}

	$query_mapel 	= mysql_query("SELECT * FROM mapel WHERE id_mapel='$mapel'");
	$data_mapel		= mysql_fetch_array($query_mapel);
	$nama			= $data_mapel['nama'];
?>
<head>
	<title>Tambah Soal</title>
</head>
<div class="login">
	<div class="main-agileits">
		<div class="form-w3agile">
			<h3>Tambah Soal</h3>
			<h4><b><?php echo $nama ?></b></h4>
			<form action="tambahsoal_process.php?op=tambah" method="post" enctype="multipart/form-data">
				<input type="input" name="mapel" hidden="true" value="<?php echo $mapel ?>">
				<?php if (isset($_GET['id_ujian'])) { ?>
					<input type="input" name="id_ujian" hidden="true" value="<?php echo $data['id_ujian'] ?>">
				<?php } elseif (isset($_GET['id_kisi'])) { ?>
					<input type="input" name="id_kisi" hidden="true" value="<?php echo $data['id_kisi'] ?>">
				<?php } ?>
				<div class="form-group1">
				    <label>Pertanyaan</label>
				    <textarea class="form-control" name="pertanyaan" required="" rows="3" placeholder="Pertanyaan"></textarea>
				</div>
				<div class="form-group1">
				    <label>Opsi 1</label>
				    <textarea class="form-control" name="opsi1" required="" rows="2" placeholder="Opsi1"></textarea>
				</div>
				<div class="form-group1">
				    <label>Opsi 2</label>
				    <textarea class="form-control" name="opsi2" required="" rows="2" placeholder="Opsi2"></textarea>
				</div>
				<div class="form-group1">
				    <label>Opsi 3</label>
				    <textarea class="form-control" name="opsi3" required="" rows="2" placeholder="Opsi3"></textarea>
				</div>
				<div class="form-group1">
				    <label>Opsi 4</label>
				    <textarea class="form-control" name="opsi4" required="" rows="2" placeholder="Opsi4"></textarea>
				</div>
				<div class="form-group1">
				    <label>Jawaban</label>
				    <textarea class="form-control" name="jawaban" required="" rows="2" placeholder="Jawaban"></textarea>
				</div>
				<input style="margin-top: 20px;" type="submit" name="upload" value="Tambah">
			</form>
		</div>
	</div>
</div>

<?php
	include 'common/footer.php';
?>