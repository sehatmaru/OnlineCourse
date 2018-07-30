<?php
    include 'common/header.php';

    if ($_SESSION['role']!="guru") {
        die("<script>alert('Anda bukan guru'); window.location=history.go(-1)</script>");
    }
?>

<head>
    <title>Online Course</title>
</head>

<body>
    <div class="banner-bootom-w3-agileits">
    <div class="container">
        <h2 style="padding-bottom: 30px; margin-top: 30px;">Selamat datang, <b><?php echo($_SESSION['nama']) ?></b></h2>
        <div class="col-md-4 bb-grids bb-left-agileits-w3layouts">
            <a href="daftarnilai.php"><div class="bb-left-agileits-w3layouts-inner" style="background-color: #ff5063;">
                <h3><i class="fa fa-book"></i> DAFTAR</h3>
                <h4><span>NILAI</span></h4>
            </div></a>
        </div>
        <div class="col-md-4 bb-grids bb-left-agileits-w3layouts">
            <a href="daftarujian.php"><div class="bb-left-agileits-w3layouts-inner">
                <h3><i class="fa fa-book"></i> DAFTAR</h3>
                <h4><span>UJIAN</span></h4>
            </div></a>
        </div>
        <div class="col-md-4 bb-grids bb-left-agileits-w3layouts">
            <a href="daftarkisi.php"><div class="bb-left-agileits-w3layouts-inner" style="background-color: #f0ad4e;">
                <h3><i class="fa fa-book"></i> DAFTAR</h3>
                <h4><span>KISI</span></h4>
            </div></a>
        </div>
    </div>
    </div>
</body>