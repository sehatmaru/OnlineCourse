<?php
	include 'common/header.php';

	if (!isset($_SESSION['username'])) {
		die("<script>alert('Silahkan masuk terlebih dahulu'); window.location= 'masuk.php'; </script>");
	}

	if ($_SESSION['role']=="admin") {
        die("<script>alert('Anda tidak memiliki akses'); window.location=history.go(-1)</script>");
    }

	if (isset($_SESSION['jawaban']) || isset($_SESSION['jawab'])) {
        unset($_SESSION['jawaban']);
        unset($_SESSION['jawab']);
    }

	$query_ujian = mysql_query("SELECT * FROM ujian WHERE status='1' AND total > 0");
?>
<head>
    <title>Online Course</title>
    <style type="text/css">
        footer{
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            color: #FFF;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="login" style="line-height: 100%;">
	<div class="main-agileits">
		<div class="form-w3agile">
			<h2>Pilih Ujian</h2><br>
			<?php if (mysql_num_rows($query_ujian)==0) { ?>
				<div class="alert alert-info" role="alert">
					<h4 class="alert-heading">Pemberitahuan</h4>
					<center><p>Untuk saat ini daftar ujian sedang kosong. Jika anda merasa ada kesalahan silahkan hubungi guru atau admin.</p></center>
					<hr>
					<center><p>Daftar ujian kosong.</p></center>
				</div>
			<?php } else { ?>
		        <div class="card" style="width: 100%;">
				  	<ul class="list-group list-group-flush">
		        <?php while ($ujian = mysql_fetch_array($query_ujian,MYSQL_ASSOC)) {
		        	$id_mapel = $ujian['id_mapel'];

		        	$query_mapel 	= mysql_query("SELECT * FROM mapel WHERE id_mapel='$id_mapel'");
					$data_mapel		= mysql_fetch_array($query_mapel);
		        	echo "<li class='list-group-item'>" . $data_mapel['nama'] . "  - <a href=mulaiujian_process.php?ujian=".$ujian['id_ujian'].">" . $ujian['nama_ujian'] . "</a></li>" ;
		        } ?>
		        	</ul>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
</body>
<footer>
    <div class="footer" style="background-color: #006DB6;">
        <div class="container">
            <div class="col-md-12">
                <center><b>Copyright 2018</b></center>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</footer>