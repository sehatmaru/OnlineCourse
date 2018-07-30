<?php
	session_start();
	include 'common/koneksi.php';

	if ($_GET['op']!='tambah') {
		die("<script>window.location=history.go(-1)</script>");
	}else{

		$mapel		= $_POST['mapel'];
		$pertanyaan	= $_POST['pertanyaan'];
		$opsi1		= $_POST['opsi1'];
		$opsi2		= $_POST['opsi2'];
		$opsi3		= $_POST['opsi3'];
		$opsi4 		= $_POST['opsi4'];
		$jawaban	= $_POST['jawaban'];

		if (isset($_POST['id_ujian'])) {
			$id_ujian = $_POST['id_ujian'];

			$insert = mysql_query("INSERT INTO soal (id_mapel, pertanyaan, opsi1, opsi2, opsi3, opsi4, jawaban, id_ujian) VALUES ('$mapel', '$pertanyaan', '$opsi1', '$opsi2', '$opsi3', '$opsi4', '$jawaban', '$id_ujian')");
		} elseif (isset($_POST['id_kisi'])) {
			$id_kisi = $_POST['id_kisi'];

			$insert = mysql_query("INSERT INTO soal (id_mapel, pertanyaan, opsi1, opsi2, opsi3, opsi4, jawaban, id_kisi) VALUES ('$mapel', '$pertanyaan', '$opsi1', '$opsi2', '$opsi3', '$opsi4', '$jawaban', '$id_kisi')");
		}

		if($insert){
			if (isset($_POST['id_ujian'])) {
				$query_ujian 	= mysql_query("SELECT * FROM ujian WHERE id_ujian='$id_ujian'");
				$data_ujian		= mysql_fetch_array($query_ujian);
				$total			= $data_ujian['total'];
				$total++;

				$update 	= mysql_query("UPDATE ujian SET total='$total' WHERE id_ujian='$id_ujian'");
			} elseif (isset($_POST['id_kisi'])) {
				$query_kisi 	= mysql_query("SELECT * FROM kisi WHERE id_kisi='$id_kisi'");
				$data_kisi		= mysql_fetch_array($query_kisi);
				$total			= $data_kisi['total'];
				$total++;

				$update 	= mysql_query("UPDATE kisi SET total='$total' WHERE id_kisi='$id_kisi'");
			}

			if ($update) {
				echo ("<script>alert('Berhasil ditambah.'); window.location=history.go(-2);</script>");
			}else{
				die("<script>alert('Gagal ditambah.'); window.location=history.go(-1);</script>");
			}
		}else{
			die("<script>alert('Gagal ditambah.'); window.location=history.go(-1);</script>");
		}
	}
?>