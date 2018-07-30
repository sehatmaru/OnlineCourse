<?php
	session_start();

	include 'common/koneksi.php';

	if (!isset($_SESSION['username'])) {
		die("<script>alert('Anda belum masuk. Silahkan masuk terlebih dahulu'); window.location='masuk.php'; </script>");
	}

	if ($_SESSION['role']!="guru") {
		die("<script>alert('Anda bukan guru'); window.location=history.go(-1)</script>");
	}

	if (!isset($_GET['soal'])) {
		die("<script> window.location=history.go(-1)</script>");
	}else{
		$soal		= $_GET['soal'];

		$query_soal = mysql_query("SELECT * FROM soal WHERE id_soal='$soal'");
		$data_soal	= mysql_fetch_array($query_soal);
		$mapel		= $data_soal['id_mapel'];

		if (isset($_GET['id_ujian'])) {
			$id_ujian	= $data_soal['id_ujian'];
		} elseif (isset($_GET['id_kisi'])){
			$id_kisi	= $data_soal['id_kisi'];
		}

		if ($data_soal['id_ujian']!=NULL) {
			$query_ujian	= mysql_query("SELECT * FROM ujian WHERE id_ujian='$id_ujian'");
			$data_ujian		= mysql_fetch_array($query_ujian);
			$total			= $data_ujian['total'];
			$total--;

			$update_ujian	= mysql_query("UPDATE ujian SET total='$total' WHERE id_ujian='$id_ujian'");
		} elseif ($data_soal['id_kisi']!=NULL) {
			$query_kisi		= mysql_query("SELECT * FROM kisi WHERE id_kisi='$id_kisi'");
			$data_kisi		= mysql_fetch_array($query_kisi);
			$total			= $data_kisi['total'];
			$total--;

			$update_kisi	= mysql_query("UPDATE kisi SET total='$total' WHERE id_kisi='$id_kisi'");
		}

		$hapus_soal		= mysql_query("DELETE FROM soal WHERE id_soal='$soal'");

		echo("<script>alert('Berhasil dihapus.'); window.location=history.go(-1)</script>");
	}
?>