<?php
	session_start();
	include 'common/koneksi.php';

	if (!isset($_SESSION['username'])) {
		die("<script>alert('Silahkan masuk terlebih dahulu'); window.location= 'masuk.php'; </script>");
	}else{		
		session_destroy();
		echo "<script>window.location = 'index.php'</script>";
	}
?>