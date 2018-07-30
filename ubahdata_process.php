<?php
	session_start();

	include 'common/koneksi.php';

	$nama		= $_POST['nama'];
	$email		= $_POST['email'];
	$username	= $_SESSION['username'];
	$op			= $_GET['op'];

	$_SESSION['nama'] = $nama;

	if($op=="ubah"){
		$query = mysql_query("UPDATE user SET nama='$nama', email='$email' WHERE username='$username'");
		echo "<script>alert('Data berhasil diubah.'); window.location = 'datadiri.php'</script>";
	}
?>