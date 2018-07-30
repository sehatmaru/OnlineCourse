<?php
	include 'common/header.php';

    if (!isset($_SESSION['jawab'])) {
        die("<script>window.location= 'index.php';</script>");
    }

	$jawab     = $_SESSION['jawab'];
    $ujian     = $_SESSION['id_ujian'];
    $id_user   = $_SESSION['id_user'];
    $query_ujian    = mysql_query("SELECT * FROM ujian WHERE id_ujian='$ujian'");
    $data_ujian     = mysql_fetch_array($query_ujian);
    $total          = $data_ujian['total'];
    $id_mapel       = $data_ujian['id_mapel'];

    $nilaibenar = 100/$total;
    $nilai      = 0;
?>

<head>
	<title>Online Course</title>
</head>
<div class="login">
	<div class="main-agileits">
		<div class="form-w3agile" style="margin-bottom: 23px;">
			<div class="alert alert-info" role="alert">
				<h4 class="alert-heading">Terima kasih!</h4>
				<center><p>Anda telah menyelesaikan semua soal ujian. Silahkan melihat detail poin soal di bawah ini. Jika ada masalah silahkan hubungi guru atau admin.</p></center>
				<hr>
				<center><h4 class="mb-0">Skor &#10004 = <?php echo number_format($nilaibenar, 2) ?></h4></center>
			</div>
	<table class="table">
        <thead>
		    <tr>
		      <th scope="col"><center>No</center></th>
		      <th scope="col"><center>Jawaban Anda</center></th>
		      <th scope="col"><center>Status</center></th>
		    </tr>
		  </thead>
 		<tbody>
        <?php
            $i = 0;
            $benar = $salah = 0;
            $sql = mysql_query("SELECT * FROM soal WHERE id_ujian='$ujian'");
            while($key = mysql_fetch_array($sql)){
        ?>
 	
 		<?php if ($jawab[$i] == $key['jawaban']) { ?>
        <tr class="success">
            <td><center><?php echo $i+1; ?></center></td>
            <td><?php echo $jawab[$i] ?></td>
            <td><center>&#10004</center></td>
        <?php $benar++; $nilai+=$nilaibenar; }else{ ?>
        <tr class="danger">
            <td><center><?php echo $i+1; ?></center></td>
            <td><?php echo $jawab[$i] ?></td>
            <td><center>&#10006</center></td>
        <?php $salah++; } ?>
        </tr>
        </tbody>
        <?php
                $i++;
            }
         ?>
    </table>
  	
  	<h2>Total Skor : <?php echo number_format($nilai, 2) ?></h2><br>
    <?php if ($_SESSION['role']=="siswa") { ?>
        <a href="index.php" class="btn btn-info btn-lg active" role="button" aria-pressed="true">Selesai &#10004</a>
    <?php } elseif ($_SESSION['role']=="guru") { ?>
        <a href="index-guru.php" class="btn btn-info btn-lg active" role="button" aria-pressed="true">Selesai &#10004</a>
    <?php } ?>
    
</div>
</div> 
</div>
</div>

<?php
    if ($_SESSION['role']=="siswa") {
        $query_nilai = mysql_query("SELECT * FROM nilai WHERE id_ujian='$ujian' AND id_user='$id_user'");
        $cek = mysql_num_rows($query_nilai);
        
        if ($cek == NULL) {
            $insert_nilai = mysql_query("INSERT INTO nilai (id_ujian, id_user, nilai) VALUES ('$ujian', '$id_user', '$nilai')");
        }
    }

	include 'common/footer.php';
?>