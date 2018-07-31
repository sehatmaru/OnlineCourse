<?php
    include 'common/header.php';

    if (isset($_SESSION['jawaban']) || isset($_SESSION['jawab'])) {
        unset($_SESSION['jawaban']);
        unset($_SESSION['jawab']);
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
<body>
    <div class="login">
        <div class="form-w3agile" style="margin-top: 55px;">
            <div class="alert alert-info" role="alert" style="margin-right: 300px; margin-left: 300px; line-height: 100%">
                <h3 class="alert-heading" style="color: #006DB6;">Ujian Online SMPS IT Al Hijrah</h3>
                <hr>
                <p class="mb-0">Silahkan membaca petunjuk penggunaan terlebih dahulu :</p><br>
                <ol>
                    <li><p>Untuk dapat memulai latihan maupun ujian online, anda harus login terlebih dahulu.
                        Jika anda belum terdaftar, lakukan <b><a href="daftar.php">pendaftaran</a></b> terlebih dahulu.</p></li>
                    <li><p>Ujian <b>hanya</b> dapat dilakukan 1 kali.</p></li>
                    <li><p>Latihan dapat dilakukan berulang kali.</p></li>
                    <li><p>Ketika ujian sudah dimulai, <b>dilarang</b> menekan refresh(F5) karena akan menimbulkan
                        kerusakan pada sistem dan anda akan dikenai sanksi <b>0</b> untuk skor.</p></li>
                </ol>
                <hr>
                <center>
                    <a style="width: 45%;" class="btn btn-info btn-lg" href="pilihlatihan.php"><i class="fa fa-arrow-left fa-fw"></i> Latihan Soal</a>
                    <a style="width: 45%;" class="btn btn-success btn-lg" href="pilihujian.php">Mulai Ujian <i class="fa fa-arrow-right fa-fw"></i></a>
                </center>
            </div>
        </div>
    </div>
</body>
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