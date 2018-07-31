<?php
	include 'common/header.php';

	if (($_SESSION['role']=="siswa")) {
		die("<script>alert('Anda bukan guru atau admin'); window.location=history.go(-1)</script>");
	}

	$id_role	= $_GET['id_role'];

	$query_user 	= mysql_query("SELECT * FROM user WHERE id_role='$id_role'");

	$no = 1;
?>
<head>
	<title>Online Course</title>
</head>
<body>
<div class="check-out">	 
	<div class="container">	 
		<div class="spec" style="margin-left: 150px; margin-right: 150px;">
			<h3>User</h3>
			<table style="margin-bottom: 10px;">
				<tr>
					<td>
						<a class="btn btn-success" href="tambahuser.php?id_role=<?php echo $id_role ?>"><i class="fa fa-plus fa-md"></i> Tambah User</a>
					</td>
				</tr>
			</table>
			<table class="table">
				<tr>
					<th class="t-head" width="10"><center>No</center></th>
					<th class="t-head" width="250"><center>Nama</center></th>
					<th class="t-head" width="250"><center>Email</center></th>
					<th class="t-head" width="50"><center>Username</center></th>
					<th class="t-head" width="150"><center>Operasi</center></th>
		  		</tr>
		  		<?php if (mysql_num_rows($query_user)==0) { ?>
		  		<tr><td colspan="6" class="t-data">Tidak ada Partisipan.</td></tr>
		  		<?php }else{
				  		while ($detail = mysql_fetch_array($query_user,MYSQL_ASSOC) ) { ?>
				  		<tr class="cross">
				  			<td class="t-data"><center><?php echo $no; $no++ ?></center></td>
					 		<td class="t-data"><center><?php echo($detail['nama']) ?></center></td>
					 		<td class="t-data"><center><?php echo($detail['email']) ?></center></td>
							<td class="t-data"><center><b><?php echo($detail['username']) ?></b></center></td>
							<td class="t-data"><center>
								<a class="btn btn-info btn-sm" href="edituser.php?id_user=<?php echo($detail['user_id']) ?>"><i class="fa fa-pencil fa-lg"></i> Edit</a>
								<a class="btn btn-danger btn-sm" href="hapususer_process.php?id_user=<?php echo($detail['user_id']) ?>"><i class="fa fa-trash fa-lg"></i> Hapus</a>
								</center>
							</td>
				  		</tr>
		  		<?php }} ?>
			</table>
		 </div>
	</div>
</div>
