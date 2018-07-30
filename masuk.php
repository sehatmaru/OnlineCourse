<?php
	include 'common/header.php';

	if (isset($_SESSION['username'])) {
		die("<script>alert('Anda sudah login. Silahkan keluar terlebih dahulu'); window.location=history.go(-1); </script>");
	}
?>
<head>
	<title>Masuk</title>
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
	<div class="main-agileits" style="margin-top: 25px;">
		<div class="form-w3agile">
			<h3>Masuk</h3>
			<form action="masuk_process.php?op=in" method="post">
				<div class="input-group">
				    <span class="input-group-addon"><i class="fa fa-check-circle fa-fw"></i></i></span>
				    <select name="user" class="form-control" required="">
				      	<option value="1">Admin</option>
				      	<option value="2">Guru</option>
				      	<option value="3" selected="">Siswa</option>
				    </select>
				</div>
				<div class="input-group">
				  	<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
				  	<input class="form-control" name="username" type="text" placeholder="Username" required="">
				</div>
				<div class="input-group">
				  	<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
				  	<input class="form-control" type="password" name="password" placeholder="Password" required="">
				</div>
				<input style="margin-top: 20px;" type="submit" value="Masuk">
			</form>
		</div>
		<div class="forg">
			Belum punya akun ?<a href="daftar.php"> Daftar disini</a>.
			<div class="clearfix"></div>
		</div>
	</div>
</div>
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