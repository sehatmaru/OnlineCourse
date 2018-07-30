<?php
	include 'common/header.php';

	if (!isset($_SESSION['username'])) {
		die("<script>alert('Silahkan login terlebih dahulu'); window.location= 'masuk.php'; </script>");
	}

	$username = $_SESSION['username'];

	$query 	= mysql_query("SELECT * FROM user WHERE username='$username'");
	$data   = mysql_fetch_array($query);
?>

	<head>
		<title>Data Diri</title>
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
	<div class="products">	 
		<div class="container" style="margin-bottom: 135px;">  
			<div class="single-page">
				<div class="single-page-row">
					<div class="col-md-6 single-top-left">	
						<div class="flexslider">
							<div class="thumb-image detail_images">
								<img src="images/user.png" class="img-responsive" alt="">
							</div>
						</div>
					</div>
					<div class="col-md-6 single-top-right">
						<h3 class="item_name">Informasi Data Diri</h3>
						<table>
							<tr>
								<td><p>Nama Lengkap</p></td>
								<td><p> : </p></td>
								<td><p><b><?php echo($data['nama']) ?></p></b></td>
							</tr>
							<tr>
								<td><p>Username</p></td>
								<td><p> : </p></td>
								<td><p><b><?php echo($data['username']) ?></p></b></td>
							</tr>
							<tr>
								<td><p>E-mail</p></td>
								<td><p> : </p></td>
								<td><p><b><?php echo($data['email']) ?></p></b></td>
							</tr>
						</table>
						<div class="single-rating"></div>
						<form action="ubahdata.php" method="post">
							<input type="hidden" name="username" value="<?php echo($username) ?>">
							<button type="submit" class="w3ls-cart" ><i class="fa fa-edit" aria-hidden="true"></i> Ubah Data</button>
						</form>
						<form action="ubahpassword.php" method="post">
							<button class="w3ls-cart w3ls-cart-like"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Ubah Password</button>
						</form>
					</div>
				   <div class="clearfix"> </div>  
				</div>
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