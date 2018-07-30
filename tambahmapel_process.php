<?php
	session_start();
	include 'common/koneksi.php';

	if ($_GET['op']!='tambah') {
		die("<script>window.location=history.go(-1)</script>");
	}else{
		$nama		= $_POST['nama'];

		$insert_ujian 	= mysql_query("INSERT INTO mapel (nama) VALUES ('$nama')");

		if($insert_ujian){
			echo ("<script>alert('Berhasil ditambah.'); window.location=history.go(-2);</script>");
		}else{
			die("<script>alert('Gagal ditambah.'); window.location=history.go(-1);</script>");
		}
	}
?>