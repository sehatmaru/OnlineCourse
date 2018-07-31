<?php
	session_start();

	include 'common/koneksi.php';

	$id_user	= $_POST['user'];
	$nama		= $_POST['nama'];
	$email		= $_POST['email'];
	$op			= $_GET['op'];

	if($op=="edit"){
		$query = mysql_query("UPDATE user SET nama='$nama', email='$email' WHERE user_id='$id_user'");

		if ($query) {
			echo "<script>alert('Berhasil diubah'); window.location=history.go(-2); </script>";
		} else{
			die("<script>alert('Gagal'); window.location=history.go(-1); </script>");
		}
	}
?>