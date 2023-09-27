<?php 
require_once './user/functions/aplikasi.php';
require_once './config.php';
$dataHasilAplikasi = $Aplikasi->get_hasil_aplikasi();
$dataHighSkor = $Aplikasi->get_high_skor();


function filterKategori($nilai){
    $kategori = "";
    switch ($nilai) {
        case $nilai > 70:
            $kategori = "-success";
            break;
        case $nilai >= 50 && $nilai <= 70:
                $kategori = "-warning";
                break;
        case $nilai < 50:
                $kategori = "-danger";
            break;
        default:
    }
    
    return $kategori;
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>EVALUASI APLIKASI</title>
    <style>
    .navbar-transparent {
        background-color: hsl(0, 0%, 96%);
    }

    @media (min-width: 992px) {
        .navbar-transparent {
            margin-bottom: -40px;
        }
    }

    .card {
        position: relative;
        /* Sesuaikan lebar sesuai kebutuhan Anda */
    }

    .card-img-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.9);
        /* Warna overlay */
        opacity: 0;
        /* Set opacity awal menjadi 0 (tidak terlihat) */
        transition: opacity 0.3s ease-in-out;
        /* Animasi perubahan opacity */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: white;
        /* Warna teks */
    }

    .card:hover .card-img-overlay {
        opacity: 1;
        /* Saat dihover, opacity menjadi 1 (terlihat) */
    }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;700;800&family=Prompt&family=Righteous&family=Roboto:wght@500&display=swap"
        rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>

    <section class="">
        <!-- Section: Design Block -->
        <nav class="navbar fixed-top bg-dark" data-bs-theme="dark">
            <div class="container-fluid d-flex justify-content-end">
                <a href="./auth/login.php" class="btn btn-outline-secondary mt-3 me-md-5">LOGIN</a>
            </div>
        </nav>
        <br>
        <br>
        <br class="navbar-transparent">
        <!-- Jumbotron -->
        <div class="text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
            <div class="wrapper">
                <div class="d-flex justify-content-center">
                    <div class="col-lg-8 mx-lg-5 mt-lg-5 p-5">
                        <!-- <img src="./img/uploads/Screenshot (7).png" style="border-radius:1em;" class=" card-img-top"
                            alt="Gambar "> -->
                        <div class="card text-bg-dark banner" data-aos="flip-right">
                            <img src="./img/uploads/<?=$dataHighSkor['gambar'];?>" class="card-img" alt="...">
                            <div class="card-img-overlay">
                                <h1 class="card-title"><?=$dataHighSkor['nama_aplikasi'];?></h1>
                                <p class="card-text text-border fw-bolder">Uploader: <?=$dataHighSkor['username'];?></p>
                                <p class="card-text text-border fw-bold"><?=$dataHighSkor['jumlah_responden'];?>
                                    Reponden</p>
                                <h2 class="card-text bg<?=filterKategori(round($dataHighSkor['nilai_jumlah'],2));?> p-3"
                                    style="border-radius: 6px;">Skor 89</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container d-flex justify-content-center">
                <div class="row justify-content-center p-lg-5 card-app xxl-lg-mt-5 col-10">
                    <?php foreach ($dataHasilAplikasi as $key => $aplikasi):?>
                    <div class="card col-lg-6 m-2" style="width: 18rem;"
                        data-aos="fade<?=$key % 3 == 0?'-rigth':'-left';?>" data-aos-easing="linear"
                        data-aos-duration="1500">
                        <img src="./img/uploads/<?=$aplikasi['gambar'];?>" style="width: 288px; margin-left: -12px;"
                            class="card-img-top" alt="Gambar <?=$aplikasi['nama_aplikasi'];?>">
                        <div class="card-body">
                            <div class="text">
                                <h6 class="card-text fs-5 fw-bold"><?=$aplikasi['nama_aplikasi'];?></h6>
                                <small class="fw-semibold text-secondary">Uploader:
                                    <?=$aplikasi['username'];?></small><br>
                                <small class="card-text fw-bolder"><?=$aplikasi['jumlah_responden'];?> Responden</small>
                                <div class="progress mt-2 mb-3" role="progressbar" aria-label="Warning example"
                                    aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar text-bg<?=filterKategori(round($aplikasi['nilai_jumlah'],2));?>"
                                        style="width: 100%">Skor :
                                        <?=round($aplikasi['nilai_jumlah'],2);?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>
    <!-- Section: Design Block -->
    <footer class="bg-white text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: #F0F0F0;">
            © 2023 Copyright:
            <a href="https://www.instagram.com/yufrii__/" target="_blank"
                class="text-gray-800 text-hover-primary">yupii__</a>
        </div>
        <!-- Copyright -->
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
</body>

</html>