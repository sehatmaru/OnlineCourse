<?php
	session_start();

	include 'common/koneksi.php';

	$id_mapel	= $_POST['mapel'];
	$nama		= $_POST['nama'];
	$op			= $_GET['op'];

	if($op=="edit"){
		$query = mysql_query("UPDATE mapel SET nama='$nama' WHERE id_mapel='$id_mapel'");

		if ($query) {
			echo "<script>alert('Berhasil diubah'); window.location=history.go(-2); </script>";
		} else{
			echo "<script>alert('Gagal'); window.location=history.go(-1); </script>";
		}
	}
?>