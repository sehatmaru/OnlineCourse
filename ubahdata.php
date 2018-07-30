<?php
	include 'common/header.php';

	if (!isset($_SESSION['username'])) {
		die("<script>alert('Silahkan login terlebih dahulu'); window.location= 'masuk.php'; </script>");
	}

	if (!isset($_POST['username'])) {
		die("<script>window.location=history.go(-1); </script>");
	}

	$username 	= $_POST['username'];

	$query		= mysql_query("SELECT * FROM user WHERE username='$username'");
	$data 		= mysql_fetch_array($query);
?>
<head>
	<title>Online Course</title>
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
			<h3>Ubah Data</h3>
			<form action="ubahdata_process.php?op=ubah" method="post">
				<div class="input-group">
				  	<span class="input-group-addon"><i class="fa fa-address-book fa-fw"></i></span>
				  	<input class="form-control" name="nama" type="text" value="<?php echo($data['nama']) ?>" required="">
				</div>
				<div class="input-group">
				  	<span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
				  	<input class="form-control" name="email" type="text" value="<?php echo($data['email']) ?>" required="email">
				</div>
				<div class="input-group">
				  	<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
				  	<input class="form-control" name="username" type="text" value="<?php echo($data['username']) ?>" required="" disabled>
				</div>
				<input style="margin-top: 20px;" type="submit" value="Ubah">
			</form>
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