<?php
	include 'common/header.php';

	if (($_SESSION['role']!="admin")) {
		die("<script>alert('Anda bukan guru atau admin'); window.location= 'index.php'; </script>");
	}

	$query_role = mysql_query("SELECT * FROM role");
	$no = 1;
?>
<head>
	<title>Online Course</title>
</head>
<body>
<div class="check-out">	 
	<div class="container">	 
		<div class="spec" style="margin-left: 250px; margin-right: 250px;">
			<h3>User</h3>
			<table class="table">
				<tr>
					<th class="t-head"><center>Role</center></th>
					<th class="t-head"><center>Jumlah</center></th>
					<th class="t-head" width="200"><center>Operasi</center></th>
		  		</tr>
		  		<?php if (mysql_num_rows($query_role)==0) { ?>
		  		<tr><td colspan="6" class="t-data">Tidak ada User.</td></tr>
		  		<?php }else{
				  		while ($detail = mysql_fetch_array($query_role,MYSQL_ASSOC) ) {
				  			$id_role = $detail['id_role'];

				  			$query_user = mysql_query("SELECT * FROM user WHERE id_role='$id_role'");
				  			$total_user = mysql_num_rows($query_user);
				  			?>
				  		<tr class="cross">
				  			<?php if ($id_role==1) { ?>
				  				<td class="t-data"><center><b>Admin</b></center></td>
				  			<?php } elseif ($id_role==2) { ?>
				  				<td class="t-data"><center><b>Guru</b></center></td>
					 		<?php } elseif ($id_role==3) { ?>
					 			<td class="t-data"><center><b>Siswa</b></center></td>
					 		<?php }

					 			if ($total_user==0) { ?>
					 			<td class="t-data"><center><b>0</b></center></td>
					 		<?php } else { ?>
					 			<td class="t-data"><center><b><?php echo $total_user; ?></b></center></td>
					 		<?php } ?>

					 		<td class="t-data"><center>
								<a class="btn btn-primary btn-sm" href="detailuser.php?id_role=<?php echo($detail['id_role']) ?>"><i class="fa fa-eye fa-lg"></i> Daftar User</a>
								</center>
							</td>
				  		</tr>
		  			<?php }
		  			} ?>
			</table>
		 </div>
	</div>
</div>