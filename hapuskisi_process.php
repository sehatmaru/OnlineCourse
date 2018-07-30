<?php
	session_start();

	include 'common/koneksi.php';

	if (!isset($_SESSION['username'])) {
		die("<script>alert('Anda belum masuk. Silahkan masuk terlebih dahulu'); window.location='masuk.php'; </script>");
	}

	if ($_SESSION['role']!="guru") {
		die("<script>alert('Anda bukan guru'); window.location=history.go(-1)</script>");
	}

	if (!isset($_GET['id_kisi'])) {
		die("<script> window.location=history.go(-1)</script>");
	}else{
		$id_kisi	= $_GET['id_kisi'];
		
		$hapus_kisi		= mysql_query("DELETE FROM kisi WHERE id_kisi='$id_kisi'");
		$hapus_soal		= mysql_query("DELETE FROM soal WHERE id_kisi='$id_kisi'");

		if (($hapus_soal) && ($hapus_kisi)) {
			echo("<script>alert('Berhasil dihapus.'); window.location=history.go(-1)</script>");
		}
	}
?>