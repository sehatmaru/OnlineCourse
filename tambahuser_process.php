<?php
	include 'common/koneksi.php';

	$id_role	= $_POST['role'];
	$nama		= $_POST['nama'];
	$email		= $_POST['email'];
	$username 	= $_POST['username'];
	$password 	= $_POST['password'];
	$op			= $_GET['op'];

	if($op=="tambah"){
		$query = mysql_query("SELECT * FROM user WHERE username='$username'");
		$cek = mysql_num_rows($query);
	
		if ($cek == NULL) {
			$sql = "INSERT INTO user (nama, email, username, password, id_role)VALUES ('$nama', '$email', '$username', '$password', '$id_role')";
			mysql_query($sql);
			
			echo "<script>alert('Berhasil ditambahkan'); window.location=history.go(-2)</script>";
		}else{
			die ("<script>alert('Username telah terdaftar, coba username lain'); window.location=history.go(-1)</script>");
		}
	}
?>