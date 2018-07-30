<?php
	include 'common/header.php';

	if (!isset($_SESSION['username'])) {
		die("<script>alert('Silahkan login terlebih dahulu'); window.location= 'masuk.php'; </script>");
	}

	$nilai 	= $_GET['nilai'];

	$query_nilai	= mysql_query("SELECT * FROM nilai WHERE id_nilai='$nilai'");
	$data_nilai		= mysql_fetch_array($query_nilai);
	$id_user		= $data_nilai['id_user'];
	$id_mapel		= $data_nilai['id_mapel'];

	$query_user		= mysql_query("SELECT * FROM user WHERE user_id='$id_user'");
	$data_user		= mysql_fetch_array($query_user);

	$query_mapel	= mysql_query("SELECT * FROM mapel WHERE id_mapel='$id_mapel'");
	$data_mapel		= mysql_fetch_array($query_mapel);
?>
<head>
	<title>Online Course</title>
</head>
<div class="login">
	<div class="main-agileits" style="margin-top: 70px;">
		<div class="form-w3agile">
			<h3>Ubah nilai</h3>
			<form action="editnilai_process.php?op=edit" method="post" enctype="multipart/form-data">
				<input type="input" name="nilai" hidden="true" value="<?php echo $nilai ?>">
				<div class="input-group">
				  	<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
				  	<input class="form-control" name="nama" type="text" value="<?php echo($data_user['nama']) ?>" required="" disabled="">
				</div>
				<div class="input-group">
				  	<span class="input-group-addon"><i class="fa fa-bookmark fa-fw"></i></span>
				  	<input class="form-control" name="mapel" type="text" value="<?php echo($data_mapel['nama']) ?>" required="" disabled="">
				</div>
				<div class="input-group">
				  	<span class="input-group-addon"><i class="fa fa-check fa-fw"></i></span>
				  	<input class="form-control" name="skor" type="text" value="<?php echo($data_nilai['nilai']) ?>" required="">
				</div>
				<input style="margin-top: 20px;" type="submit" value="Ubah">
			</form>
		</div>
	</div>
</div>