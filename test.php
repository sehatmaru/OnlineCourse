<?php
 
    session_start();
    $soal = $_SESSION['soal'];
    $no = $_SESSION['no'];
    if(isset($_POST['next'])){
        $_SESSION['jawab'][] = $_POST['option'];
        if($_POST['option'] == $soal[$no-2]['kunci']){
            $_SESSION['score'] = $_SESSION['score'] + 10;
        }
    }
    if(isset($soal[$no-1])){
?>
 
<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="css/bootstrap.css" />
    
    <title>Latihan Soal</title>
</head>
 
<body>
<div class="row">
	<div class="col-md-12">
			<nav class="navbar navbar-default navbar-default">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> 
	</a><a class="brand" href="#">
	<h3>Soal Latihan Ujian Online</h3></a>
      
    </div>
    </div>
    </div>
<br>
<div class="row">
	<div class="col-md-12">
			<nav class="navbar navbar-default navbar-default">
<div style="margin-top:50px; margin-left:400px ">
			<table border="0">
			
         <tr>
            <td colspan="2">
    <form action="" method="POST">
        <p>
        <?php
            echo $no.". "; $_SESSION['no']++;
            echo $soal[$no-1]['soal'];
            $jawaban = $_SESSION['option'][$no-1];
            shuffle($jawaban);
        ?>
			</td>
        </tr>
		
		<tr>
			
			<td>
        <?php
            for ($i=0; $i < 3; $i++) {
        ?>
            <input type="radio" name="option" value="<?php echo $jawaban[$i]; ?>" required/> <?php echo $jawaban[$i]; ?></br>
        <?php
            }
         ?>
			</td>
		</tr>
		
		<tr>
			<td colspan="2" align="center">
			<br>
        <input class="btn-warning " type="submit" name="next" value="next">
    <br>
    <br>
    <br>
	</form>
			</td>
		</tr>

    </table>
</div>
</div>
</body>
</html>
 
<?php
    }else{
        header("location:result.php");
    }
?>
         <div class="row">
		<div class="col-md-12">
			<footer class="well"><p align="center"><b>Online Course &copy; <?php echo date('Y'); ?> </b></p></footer>
		</div>
	</div>
        