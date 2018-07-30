<?php
	include 'common/header.php';

	if (!isset($_SESSION['username'])) {
		die("<script>alert('Silahkan login terlebih dahulu'); window.location= 'masuk.php'; </script>");
	}

	$soal 	= $_GET['soal'];

	$query_soal	= mysql_query("SELECT * FROM soal WHERE id_soal='$soal'");
	$data_soal	= mysql_fetch_array($query_soal);
?>
<head>
	<title>Online Course</title>
</head>
<div class="login">
	<div class="main-agileits">
		<div class="form-w3agile">
			<h3>Ubah Soal</h3>
			<form action="editsoal_process.php?op=edit" method="post" enctype="multipart/form-data">
				<input type="input" name="soal" hidden="true" value="<?php echo $soal ?>">
				<div class="form-group1">
				    <label>Pertanyaan</label>
				    <textarea class="form-control" name="pertanyaan" required="" rows="3"><?php echo($data_soal['pertanyaan']) ?></textarea>
				</div>
				<div class="form-group1">
				    <label>Opsi 1</label>
				    <textarea class="form-control" name="opsi1" required="" rows="2"><?php echo($data_soal['opsi1']) ?></textarea>
				</div>
				<div class="form-group1">
				    <label>Opsi 2</label>
				    <textarea class="form-control" name="opsi2" required="" rows="2"><?php echo($data_soal['opsi2']) ?></textarea>
				</div>
				<div class="form-group1">
				    <label>Opsi 3</label>
				    <textarea class="form-control" name="opsi3" required="" rows="2"><?php echo($data_soal['opsi3']) ?></textarea>
				</div>
				<div class="form-group1">
				    <label>Opsi 4</label>
				    <textarea class="form-control" name="opsi4" required="" rows="2"><?php echo($data_soal['opsi4']) ?></textarea>
				</div>
				<div class="form-group1">
				    <label>Jawaban</label>
				    <textarea class="form-control" name="jawaban" required="" rows="2"><?php echo($data_soal['jawaban']) ?></textarea>
				</div>
				<input style="margin-top: 20px;" type="submit" value="Ubah">
			</form>
		</div>
	</div>
</div>