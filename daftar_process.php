<?php
	include 'common/koneksi.php';

	$nama		= $_POST['nama'];
	$email		= $_POST['email'];
	$username 	= $_POST['username'];
	$password 	= $_POST['password'];
	$op			= $_GET['op'];

	if($op=="daftar"){
		$query = mysql_query("SELECT * FROM user WHERE username='$username'");
		$cek = mysql_num_rows($query);
	
		if ($cek == NULL) {
			$sql = "INSERT INTO user (nama, email, username, password, id_role)VALUES ('$nama', '$email', '$username', '$password', '3')";
			mysql_query($sql);
			echo "<script>alert('Pendaftaran berhasil, Silahkan masuk'); window.location = 'masuk.php'</script>";
		}else{
			echo "<script>alert('Username telah terdaftar, coba username lain'); window.location = 'daftar.php'</script>";
		}
	}
?>