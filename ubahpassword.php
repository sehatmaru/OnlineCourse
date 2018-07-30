<?php
	include 'common/header.php';

	if (!isset($_SESSION['username'])) {
		die("<script>alert('Silahkan login terlebih dahulu'); window.location= 'masuk.php'; </script>");
	}
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
			<h3>Ubah Ubah Password</h3>
			<form action="ubahpassword_process.php?op=ubah" method="post">
				<div class="input-group">
				  	<span class="input-group-addon"><i class="fa fa-unlock-alt fa-fw"></i></span>
				  	<input class="form-control" name="passwordlama" type="password" placeholder="Password Lama" required="">
				</div>
				<div class="input-group">
				  	<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
				  	<input class="form-control" name="passwordbaru" type="password" placeholder="Password Baru" required="">
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