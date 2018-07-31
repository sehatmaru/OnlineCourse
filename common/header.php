<?php
	session_start();

	include $_SERVER['DOCUMENT_ROOT']."/online_course/common/koneksi.php";

	if (!isset($_SESSION['username'])) {
        $_SESSION['role'] = "siswa";
    }

    if (!isset($_SESSION['role'])) {
        $_SESSION['role'] = "siswa";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/font-awesome.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/fontawesome.css" type="text/css" media="all" />	
	
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery-1.8.3.js"></script>
	<script src="js/jquery-ui.js"></script>

	<style type="text/css">
		h1 {
			font-family: 'Helvetica Neue', sans-serif;
			color : #fff;
			font-size: 75px;
			font-weight: bold;
			letter-spacing: -1px;
			line-height: 1;
			text-align: center;
		}

		.sticky {
		    position: fixed;
		    top: 0;
		    width: 100%
		}

		.sticky + .content {
		    padding-top: 60px;
		}

		#return-to-top {
		    position: fixed;
		    bottom: 20px;
		    right: 20px;
		    background: rgb(0, 109, 182);
		    background: rgba(0, 109, 182, 0.7);
		    width: 50px;
		    height: 50px;
		    display: block;
		    text-decoration: none;
		    -webkit-border-radius: 35px;
		    -moz-border-radius: 35px;
		    border-radius: 35px;
		    display: none;
		    -webkit-transition: all 0.3s linear;
		    -moz-transition: all 0.3s ease;
		    -ms-transition: all 0.3s ease;
		    -o-transition: all 0.3s ease;
		    transition: all 0.3s ease;
		}
		#back-to-top {
		    text-align: center;
		    z-index: 9999;
		    position: fixed;
		    bottom: 40px;
		    right: 30px;
		    cursor: pointer;
		    display: none;
		    opacity: 0.7;
		    }
		#back-to-top:hover {
		    opacity: 1;
		}
		.input-group{
			padding-bottom: 10px;
		}
	</style>
</head>
<div class="clearfix"></div>
<div class="header-bottom-w3ls" id="navbar" style="z-index: 1;">
	<div class="container-fluid">
		<div class="col-md-12 navigation-agileits">
			<nav class="navbar navbar-default">
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div> 		
			  	<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
			    	<ul class="nav navbar-nav">
					<?php if ($_SESSION['role']=="siswa") { ?>
						<a href="#" class="navbar-left"><img src="images/logo.jpeg" style="width: 50%; height: 50%;"></a>
						<?php if (isset($_SESSION['username'])) { ?>
						    <li><a href="datanilai.php"><span class="glyphicon glyphicon-ok"></span> Data Nilai</a></li>
						<?php }
						} elseif ($_SESSION['role']=="guru") { ?>
						<li class=" active"><a href="index-guru.php" class="hyper "><span>Dashboard</span></a></li>
						<li><a href="pilihujian.php"><span class="glyphicon glyphicon-pencil"></span> Ujian</a></li>
						<li><a href="pilihlatihan.php"><span class="glyphicon glyphicon-pencil"></span> Latihan</a></li>
					<?php } elseif ($_SESSION['role']=="admin") { ?>
						<li class=" active"><a href="index-admin.php" class="hyper "><span>Dashboard</span></a></li>
					<?php } ?>
			    	</ul>
			    	<ul class="nav navbar-nav navbar-right">
			    			<?php
								if(!isset($_SESSION['username'])) { ?>
									<li><a href="masuk.php"><span class="glyphicon glyphicon-log-in"></span> Masuk</a></li>
									<li><a href="daftar.php"><span class="glyphicon glyphicon-user"></span> Daftar</a></li>
							<?php
								}
								else{?>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo($_SESSION['nama']) ?> <b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li><a href="datadiri.php"><i class="fa fa-user"></i> Data Diri</a></li>
											<li><a href="keluar.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Keluar</a></li>
										</ul>
									</li>
							<?php
								}
							?>
			    	</ul>
			  	</div>
			</nav>	
		</div>
	</div>
</div>