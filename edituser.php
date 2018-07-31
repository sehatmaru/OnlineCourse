<?php
	include 'common/header.php';

	if (!isset($_SESSION['username'])) {
		die("<script>alert('Anda belum masuk. Silahkan masuk terlebih dahulu'); window.location='masuk.php'; </script>");
	}

	if ($_SESSION['role']!="admin") {
		die("<script>alert('Anda bukan admin'); window.location=history.go(-1)</script>");
	}

	$id_user = $_GET['id_user'];
	$query_user	= mysql_query("SELECT * FROM user WHERE user_id='$id_user'");
	$data_user	= mysql_fetch_array($query_user);
?>
<head>
	<title>Online Course</title>
</head>
<div class="login">
	<div class="main-agileits" style="margin-top: 50px;">
		<div class="form-w3agile">
			<h3>Edit User</h3>
			<form action="edituser_process.php?op=edit" method="post">
				<input type="input" name="user" hidden="true" value="<?php echo $id_user ?>">
				<div class="input-group">
				  	<span class="input-group-addon"><i class="fa fa-address-book fa-fw"></i></span>
				  	<input class="form-control" name="nama" type="text" value="<?php echo $data_user['nama'] ?>" required="">
				</div>
				<div class="input-group">
				  	<span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
				  	<input class="form-control" name="email" type="text" value="<?php echo $data_user['email'] ?>" required="email">
				</div>
				<div class="input-group">
				  	<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
				  	<input class="form-control" name="username" type="text" value="<?php echo $data_user['username'] ?>" required="" disabled="">
				</div>
				<input style="margin-top: 20px;" type="submit" value="Ubah">
			</form>
		</div>
	</div>
</div>