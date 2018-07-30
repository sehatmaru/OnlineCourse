<?php
	include 'common/header.php';

	if (!isset($_SESSION['username'])) {
		die("<script>alert('Silahkan login terlebih dahulu'); window.location= 'masuk.php'; </script>");
	}

	$kisi 	= $_GET['kisi'];

	$query_kisi	= mysql_query("SELECT * FROM kisi WHERE id_kisi='$kisi'");
	$data_kisi	= mysql_fetch_array($query_kisi);
?>
<head>
	<title>Online Course</title>
</head>
<div class="login">
	<div class="main-agileits">
		<div class="form-w3agile">
			<h3>Ubah Kisi</h3>
			<form action="editkisi_process.php?op=edit" method="post" enctype="multipart/form-data">
				<input type="input" name="kisi" hidden="true" value="<?php echo $kisi ?>">
				<div class="form-group1">
				    <label>Pertanyaan</label>
				    <textarea class="form-control" name="pertanyaan" required="" rows="3"><?php echo($data_kisi['pertanyaan']) ?></textarea>
				</div>
				<div class="form-group1">
				    <label>Opsi 1</label>
				    <textarea class="form-control" name="opsi1" required="" rows="2"><?php echo($data_kisi['opsi1']) ?></textarea>
				</div>
				<div class="form-group1">
				    <label>Opsi 2</label>
				    <textarea class="form-control" name="opsi2" required="" rows="2"><?php echo($data_kisi['opsi2']) ?></textarea>
				</div>
				<div class="form-group1">
				    <label>Opsi 3</label>
				    <textarea class="form-control" name="opsi3" required="" rows="2"><?php echo($data_kisi['opsi3']) ?></textarea>
				</div>
				<div class="form-group1">
				    <label>Opsi 4</label>
				    <textarea class="form-control" name="opsi4" required="" rows="2"><?php echo($data_kisi['opsi4']) ?></textarea>
				</div>
				<div class="form-group1">
				    <label>Jawaban</label>
				    <textarea class="form-control" name="jawaban" required="" rows="2"><?php echo($data_kisi['jawaban']) ?></textarea>
				</div>
				<input style="margin-top: 20px;" type="submit" value="Ubah">
			</form>
		</div>
	</div>
</div>