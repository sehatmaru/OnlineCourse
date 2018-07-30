<?php
	session_start();

	include 'common/koneksi.php';

	if (!isset($_SESSION['username'])) {
		die("<script>alert('Anda belum masuk. Silahkan masuk terlebih dahulu'); window.location='masuk.php'; </script>");
	}

	if ($_SESSION['role']!="admin") {
		die("<script>alert('Anda bukan admin'); window.location=history.go(-1)</script>");
	}

	if (!isset($_GET['mapel'])) {
		die("<script> window.location=history.go(-1)</script>");
	}else{
		$id_mapel	= $_GET['mapel'];

		$query_ujian= mysql_query("SELECT * FROM ujian WHERE id_mapel='$id_mapel'");
		while ($ujian = mysql_fetch_array($query_ujian,MYSQL_ASSOC) ) {
			$id_ujian = $ujian['id_ujian'];

			$hapus_nilai = mysql_query("DELETE FROM nilai WHERE id_ujian='$id_ujian'");

			$hapus_soal = mysql_query("DELETE FROM soal WHERE id_mapel='$id_mapel'");
		}


		$hapus_ujian = mysql_query("DELETE FROM ujian WHERE id_mapel='$id_mapel'");

		$hapus_kisi	= mysql_query("DELETE FROM kisi WHERE id_mapel='$id_mapel'");

		$hapus_mapel= mysql_query("DELETE FROM mapel WHERE id_mapel='$id_mapel'");

		if ($hapus_mapel) {
			echo "<script>alert('Berhasil dihapus'); window.location=history.go(-1); </script>";
		}else{
			die("<script>alert('Gagal'); window.location=history.go(-1); </script>");
		}
	}
?>