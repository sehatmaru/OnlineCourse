<?php
	include 'common/header.php';

	if (!isset($_SESSION['username'])) {
		die("<script>alert('Anda belum masuk. Silahkan masuk terlebih dahulu'); window.location='masuk.php'; </script>");
	}

	if ($_SESSION['role']!="admin") {
		die("<script>alert('Anda bukan admin'); window.location=history.go(-1)</script>");
	}

	$id_role = $_GET['id_role'];
?>
<head>
	<title>Online Course</title>
</head>
<div class="login">
	<div class="main-agileits" style="margin-top: 50px;">
		<div class="form-w3agile">
			<h3>Tambah User</h3>
			<form action="tambahuser_process.php?op=tambah" method="post">
				<input type="input" name="role" hidden="true" value="<?php echo $id_role ?>">
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
				<input style="margin-top: 20px;" type="submit" value="Tambah">
			</form>
		</div>
	</div>
</div>