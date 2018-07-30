<?php
	session_start();
	include 'common/koneksi.php';

    $id_ujian = $_GET['ujian'];
    $_SESSION['id_ujian'] = $id_ujian;
    $id_user = $_SESSION['id_user'];

    $query_nilai = mysql_query("SELECT * FROM nilai WHERE id_ujian='$id_ujian' AND id_user='$id_user'");
    $cek = mysql_num_rows($query_nilai);

    if ($cek != NULL) {
        die("<script>alert('Anda sudah pernah mengikuti ujian ini'); window.location=history.go(-1)</script>");
    }

    $query = mysql_query("SELECT * FROM soal WHERE id_ujian='$id_ujian'") or die (mysql_error());

    $_SESSION['pertanyaan'] = array();
    $_SESSION['no'] = 1;
    $_SESSION['opsi'] = array();
    $_SESSION['jawaban'] = array();
    $i=0;
 
    while($row = mysql_fetch_assoc($query)){
        $_SESSION['pertanyaan'][] = $row;
        $_SESSION['opsi'][] = array($_SESSION['pertanyaan'][$i]['opsi1'],
        $_SESSION['pertanyaan'][$i]['opsi2'],
        $_SESSION['pertanyaan'][$i]['opsi3'], 
        $_SESSION['pertanyaan'][$i]['opsi4']);
        $i++;
    }

    header('location:ujian.php');
?>