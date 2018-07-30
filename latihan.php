<?php
	include 'common/header.php';
    
	if (!isset($_SESSION['username'])) {
    	die("<script>alert('Silahkan masuk terlebih dahulu'); window.location= 'masuk.php'; </script>");
    }

    if ($_SESSION['role']=="admin") {
        die("<script>alert('Anda tidak memiliki akses'); window.location=history.go(-1)</script>");
    }

    if (!isset($_SESSION['pertanyaan'])) {
        die("<script>window.location=history.go(-1)</script>");
    }

    $kisi = $_SESSION['pertanyaan'];
    $no = $_SESSION['no'];

    if(isset($_POST['next'])){
        $_SESSION['jawab'][] = $_POST['option'];
    }

    if(isset($kisi[$no-1])){
?>
<head>
    <title>Online Course</title>
</head>

<body>
<div class="login">
	<div class="main-agileits" style="margin-bottom: 35px;">
		<div class="form-w3agile">
			<h2>Soal No. <?php echo($no) ?></h2>
    		<form action="" method="POST">
        <?php
        	$_SESSION['no']++;
            $jawaban = $_SESSION['opsi'][$no-1];
            shuffle($jawaban);
        ?>

        <div class="card" style="width: 100%;">
		  	<ul class="list-group list-group-flush">
		    	<li class="list-group-item"><b><?php echo $kisi[$no-1]['pertanyaan']; ?></b></li>
		    	
        <?php for ($i=0; $i < 4; $i++) { ?>
        	<li class="list-group-item">
        		<input type="radio" name="option" value="<?php echo $jawaban[$i]; ?>" required/> <?php echo $jawaban[$i]; ?></br>
        	</li>
        <?php } ?>

        	</ul>
		</div>

        	<input class="btn btn-info" type="submit" name="next" value="Selanjutnya">

			</form>
		</div>
	</div>
</div>
</body>

<?php
    }else{
    	header("location:hasillatihan.php");
    }

    include 'common/footer.php';
?>