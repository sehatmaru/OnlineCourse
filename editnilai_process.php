<?php
	session_start();

	include 'common/koneksi.php';

	$id_nilai	= $_POST['nilai'];
	$nilai		= $_POST['skor'];
	$op			= $_GET['op'];

	if($op=="edit"){
		$query = mysql_query("UPDATE nilai SET nilai='$nilai' WHERE id_nilai='$id_nilai'");

		if ($query) {
			echo "<script>alert('Berhasil diubah'); window.location=history.go(-2); </script>";
		} else{
			echo "<script>alert('Gagal'); window.location=history.go(-1); </script>";
		}
	}
?>