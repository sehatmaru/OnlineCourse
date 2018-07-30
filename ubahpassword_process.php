<?php
	session_start();

	include 'common/koneksi.php';

	$username	= $_SESSION['username'];
	$passwordb	= $_POST['passwordbaru'];
	$passwordl	= $_POST['passwordlama'];
	$op			= $_GET['op'];

	if($op=="ubah"){
		$select_user	= mysql_query("SELECT * FROM user WHERE username='$username'");
		$data_user		= mysql_fetch_array($select_user);
		$passwordlama	= $data_user['password'];

		if ($passwordl==$passwordlama) {
			$query = mysql_query("UPDATE user SET password='$passwordb' WHERE username='$username'");
			echo "<script>alert('Password berhasil diubah.'); window.location = 'datadiri.php'</script>";
		}else{
			die("<script>alert('Password lama salah.');window.location=history.go(-1); </script>");
		}
	}
?>