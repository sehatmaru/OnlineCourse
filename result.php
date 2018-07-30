<?php
    include 'common/header.php';
    $jawab = $_SESSION['jawab'];
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Hasil Test</title>
	
 <link rel="stylesheet" href="css/bootstrap.css" />
</head>
 
<body>
   <div class="row">
	<div class="col-md-12">
			<nav class="navbar navbar-default navbar-default">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> 
	</a><a class="brand" href="#">
	<h3>Hasil Ujian Online</h3></a>
      
    </div>
    </div>
    </div>
<br>
   <div class="row">
	<div class="col-md-12">
			<nav class="navbar navbar-default navbar-default">
<div style="margin-top:50px; margin-left:100px ">
    <h2>SCORE ANDA: <?php echo $_SESSION['score']; ?></h2>
   <table class="table-striped table-bordered table-hover ">
				 
        <tr>
            <td>NO</td>
            <td>Jawaban Anda</td>
            <td>Status</td>
        </tr>
 
        <?php
            $i = 0;
            $benar = $salah = 0;
            $sql = mysql_query("select * from tanya");
            while($key = mysql_fetch_array($sql)){
        ?>
 
        <tr>
            <td><?php echo $i+1; ?></td>
            <td><?php echo $jawab[$i] ?></td>
            <td>
                <?php
                    if ($jawab[$i] == $key['kunci']) {
                        echo "Benar";
                        $benar++;
                    }else{
                        echo "Salah";
                        $salah++;
                    }
                 ?>
            </td>
        </tr>
        <?php
                $i++;
            }
         ?>
    </table>
 
    <h3>Benar: <?php echo $benar; ?>
    Salah: <?php echo $salah; ?></h3>
    <a href="index.php">Kembali</a>
	
	
</div>
</div>

	<div class="row">
		<div class="col-md-12">
			<footer class="well"><p align="center"><b><a href="https://www.webphpmysql.com"a>aziz husen &copy; <?php echo date('Y'); ?> </b></p></footer>
		</div>
	</div>
</body>
</html>