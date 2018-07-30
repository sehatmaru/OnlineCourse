<?php
	include 'common/header.php';

	if (!isset($_SESSION['username'])) {
		die("<script>alert('Silahkan masuk terlebih dahulu'); window.location= 'masuk.php'; </script>");
	}

	if ($_SESSION['role']=="siswa") {
        die("<script>alert('Anda tidak memiliki akses'); window.location=history.go(-1)</script>");
    }

    $tipe = $_GET['tipe'];

	$query_mapel = mysql_query("SELECT * FROM mapel");
?>
<head>
    <title>Online Course</title>
</head>
<body>
<div class="login" style="line-height: 100%;">
	<div class="main-agileits">
		<div class="form-w3agile">
			<h2>Mata Pelajaran</h2><br>
			<?php if (mysql_num_rows($query_mapel)==0) { ?>
				<div class="alert alert-info" role="alert">
					<h4 class="alert-heading">Pemberitahuan</h4>
					<center><p>Untuk saat ini daftar mata pelajaran sedang kosong. Jika anda merasa ada kesalahan silahkan hubungi admin.</p></center>
					<hr>
					<center><p>Daftar mata pelajaran kosong.</p></center>
				</div>
			<?php } else { ?>
		        <div class="card" style="width: 100%;">
				  	<ul class="list-group list-group-flush">
		        <?php while ($mapel = mysql_fetch_array($query_mapel,MYSQL_ASSOC)) {
		        	if ($tipe=="ujian") {
		        		echo "<li class='list-group-item'><a href=tambahujian.php?mapel=".$mapel['id_mapel'].">" . $mapel['nama'] . "</a></li>" ;
		        	} elseif ($tipe=="kisi") {
		        		echo "<li class='list-group-item'><a href=tambahkisi.php?mapel=".$mapel['id_mapel'].">" . $mapel['nama'] . "</a></li>" ;
		        	}

		        	
		        } ?>
		        	</ul>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
</body>