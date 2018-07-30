<?php
	session_start();
	include 'common/koneksi.php';

	$user 		= $_POST['user'];
	$username 	= $_POST['username'];
	$password 	= $_POST['password'];
	$op = $_GET['op'];

	if($op=="in"){
	$cek = mysql_query("SELECT * FROM user WHERE username='$username' AND password='$password' AND id_role='$user'");
		if(mysql_num_rows($cek)==1){
			$c = mysql_fetch_array($cek);
			$id_role = $c['id_role'];
			$nama = $c['nama'];

			$query 	= mysql_query("SELECT * FROM role WHERE id_role='$id_role'");
			$data 	= mysql_fetch_array($query);
			$role 	= $data['keterangan'];

			$_SESSION['username'] = $c['username'];
			$_SESSION['id_user'] = $c['user_id'];
			$_SESSION['role'] = $role;
			$_SESSION['nama'] = $nama;

			if($role=="admin"){
				header('location: index-admin.php');
			}else if($role=="siswa"){
				header('location: index.php');
			}else if($role=="guru"){
				header('location: index-guru.php');
			}
		}else{
			echo("<script>alert('Username atau password salah');window.location=history.go(-1);</script>");
		}
	}
?>