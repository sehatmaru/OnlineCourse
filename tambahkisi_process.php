<?php
	session_start();
	include 'common/koneksi.php';

	if ($_GET['op']!='tambah') {
		die("<script>window.location=history.go(-1)</script>");
	}else{
		$mapel		= $_POST['mapel'];
		$nama		= $_POST['nama'];

		$insert_kisi 	= mysql_query("INSERT INTO kisi (id_mapel, nama_kisi, total) VALUES ('$mapel', '$nama', 0)");

		if($insert_kisi){
			echo ("<script>alert('Berhasil ditambah.'); window.location=history.go(-3);</script>");
		}else{
			die("<script>alert('Gagal ditambah.'); window.location=history.go(-1);</script>");
		}
	}
?>