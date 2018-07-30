<?php
	session_start();
	include 'common/koneksi.php';

    $id_kisi = $_GET['kisi'];
    $_SESSION['id_kisi'] = $id_kisi;
    $id_user = $_SESSION['id_user'];

    $query = mysql_query("SELECT * FROM soal WHERE id_kisi='$id_kisi'") or die (mysql_error());

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

    header('location:latihan.php');
?>