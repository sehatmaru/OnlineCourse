<?php
	session_start();

	include 'common/koneksi.php';

	$id_kisi	= $_POST['kisi'];
	$pertanyaan	= $_POST['pertanyaan'];
	$opsi1		= $_POST['opsi1'];
	$opsi2		= $_POST['opsi2'];
	$opsi3		= $_POST['opsi3'];
	$opsi4		= $_POST['opsi4'];
	$jawaban	= $_POST['jawaban'];
	$op			= $_GET['op'];

	if($op=="edit"){
		$query = mysql_query("UPDATE kisi SET pertanyaan='$pertanyaan', opsi1='$opsi1', opsi2='$opsi2', opsi3='$opsi3', opsi4='$opsi4', jawaban='$jawaban' WHERE id_kisi='$id_kisi'");

		echo "<script>alert('Berhasil diubah'); window.location=history.go(-2); </script>";
	}
?>