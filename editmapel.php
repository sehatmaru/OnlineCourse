<?php
	include 'common/header.php';

	if (!isset($_SESSION['username'])) {
		die("<script>alert('Silahkan login terlebih dahulu'); window.location= 'masuk.php'; </script>");
	}

	$id_mapel 	= $_GET['mapel'];

	$query_mapel	= mysql_query("SELECT * FROM mapel WHERE id_mapel='$id_mapel'");
	$data_mapel		= mysql_fetch_array($query_mapel);
?>
<head>
	<title>Online Course</title>
</head>
<div class="login">
	<div class="main-agileits" style="margin-top: 70px;">
		<div class="form-w3agile">
			<h3>Ubah Mapel</h3>
			<form action="editmapel_process.php?op=edit" method="post" enctype="multipart/form-data">
				<input type="input" name="mapel" hidden="true" value="<?php echo $id_mapel ?>">
				<div class="input-group">
				  	<span class="input-group-addon"><i class="fa fa-bookmark fa-fw"></i></span>
				  	<input class="form-control" name="nama" type="text" value="<?php echo($data_mapel['nama']) ?>" required="">
				</div>
				<input style="margin-top: 20px;" type="submit" value="Ubah">
			</form>
		</div>
	</div>
</div>