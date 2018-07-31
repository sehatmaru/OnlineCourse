<?php
	session_start();

	include 'common/koneksi.php';

	$id_ujian	= $_GET['id_ujian'];
	$status		= $_GET['s'];

	if(isset($_GET['s'])){
		$query_ujian	= mysql_query("SELECT * FROM ujian WHERE id_ujian='$id_ujian'");
		$data_ujian		= mysql_fetch_array($query_ujian);

		$update_ujian	= mysql_query("UPDATE ujian SET status='$status' WHERE id_ujian='$id_ujian'");

		if ($update_ujian) {
			echo "<script>window.location=history.go(-1);</script>";
		}
	}
?>