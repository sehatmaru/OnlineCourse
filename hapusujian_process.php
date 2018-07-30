<?php
	session_start();

	include 'common/koneksi.php';

	if (!isset($_SESSION['username'])) {
		die("<script>alert('Anda belum masuk. Silahkan masuk terlebih dahulu'); window.location='masuk.php'; </script>");
	}

	if ($_SESSION['role']!="guru") {
		die("<script>alert('Anda bukan guru'); window.location=history.go(-1)</script>");
	}

	if (!isset($_GET['id_ujian'])) {
		die("<script> window.location=history.go(-1)</script>");
	}else{
		$id_ujian	= $_GET['id_ujian'];

		$query_soal		= mysql_query("SELECT * FROM soal WHERE id_ujian='$id_ujian'");
		$query_nilai	= mysql_query("SELECT * FROM nilai WHERE id_ujian='$id_ujian'");

		if (mysql_num_rows($query_soal)!=0) {
		  	$hapus_soal		= mysql_query("DELETE FROM soal WHERE id_ujian='$id_ujian'");
		}

		if (mysql_num_rows($query_nilai)!=0) {
		  	$hapus_nilai	= mysql_query("DELETE FROM nilai WHERE id_ujian='$id_ujian'");
		}

		$hapus_ujian	= mysql_query("DELETE FROM ujian WHERE id_ujian='$id_ujian'");

		echo("<script>alert('Berhasil dihapus.'); window.location=history.go(-1)</script>");
	}
?>