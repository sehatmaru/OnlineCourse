<?php
	session_start();

	include 'common/koneksi.php';

	if (!isset($_SESSION['username'])) {
		die("<script>alert('Anda belum masuk. Silahkan masuk terlebih dahulu'); window.location='masuk.php'; </script>");
	}

	if ($_SESSION['role']!="admin") {
		die("<script>alert('Anda bukan admin'); window.location=history.go(-1)</script>");
	}

	if (!isset($_GET['id_user'])) {
		die("<script> window.location=history.go(-1)</script>");
	}else{
		$id_user	= $_GET['id_user'];

		$query_nilai	= mysql_query("SELECT * FROM nilai WHERE id_user='$id_user'");

		if (mysql_num_rows($query_nilai)!=0) {
		  	$hapus_nilai	= mysql_query("DELETE FROM nilai WHERE id_user='$id_user'");
		}

		$hapus_user	= mysql_query("DELETE FROM user WHERE user_id='$id_user'");

		echo("<script>alert('Berhasil dihapus.'); window.location=history.go(-1)</script>");
	}
?>