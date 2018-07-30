<?php
	include 'common/header.php';

	if (isset($_SESSION['username'])) {
		die("<script>alert('Anda sudah login. Silahkan keluar terlebih dahulu'); window.location=history.go(-1); </script>");
	}
?>
<head>
	<title>Daftar</title>
	<style type="text/css">
		footer{
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            color: white;
            text-align: center;
        }
	</style>
</head>
<div class="login">
	<div class="main-agileits">
		<div class="form-w3agile">
			<h3>Daftar</h3>
			<form action="daftar_process.php?op=daftar" method="post">
				<div class="input-group">
				  	<span class="input-group-addon"><i class="fa fa-address-book fa-fw"></i></span>
				  	<input class="form-control" name="nama" type="text" placeholder="Nama Lengkap" required="">
				</div>
				<div class="input-group">
				  	<span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
				  	<input class="form-control" name="email" type="text" placeholder="E-mail" required="email">
				</div>
				<div class="input-group">
				  	<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
				  	<input class="form-control" name="username" type="text" placeholder="Username" required="">
				</div>
				<div class="input-group">
				  	<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
				  	<input class="form-control" name="password" type="password" placeholder="Password" required="">
				</div>
				<input style="margin-top: 20px;" type="submit" value="Daftar">
			</form>
		</div>
		<div class="forg">
			Sudah punya akun ?<a href="masuk.php"> Masuk disini</a>.
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<footer>
    <div class="footer" style="background-color: #006DB6;">
        <div class="container">
            <div class="col-md-12">
                <center>Copyright 2018</center>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</footer>