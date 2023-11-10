<?php 
session_start();
require './config.php';

// $koneksi = new connectDatabase();
$data_aplikasi = array();
$nama = 0;
$email = 0;
$prodi = 0;
$jk = 0;
$usia = 0;
if(isset($_GET['app']))
{
    $id_app = base64_decode($_GET['app']);
    if($id_app != '')
    {
        $data_aplikasi = mysqli_fetch_assoc($koneksi->query("SELECT * FROM aplikasi a JOIN form f ON f.f_id_app=a.id_aplikasi WHERE id_aplikasi='$id_app'"));
        $nama = $data_aplikasi['nama'];
        $email = $data_aplikasi['email'];
        $prodi = $data_aplikasi['prodi'];
        $jk = $data_aplikasi['jk'];
        $usia = $data_aplikasi['usia'];
    }
}else{
    header("Location: ./index.php");
    exit;
}

$data_pertanyaan = $koneksi->query("SELECT * FROM pertanyaan");

if(isset($_POST['jawab']))
{

    // $bobot_ganjil = 0;
    // $bobot_genap = 0;
    $jawaban = array_values($_POST);
    $hasil = 0;
    // $nilai_jumlah = 0;
    // $jumlah = 0;
    // for ($i=0; $i < count($jawaban)-1; $i++) {
    //     if($i != 0 || $i < 11){
    //         if($i % 2 != 0){
    //             $hasil += (5 - intval($jawaban[$i]));
    //         }elseif($i % 2 == 0){
    //             $hasil += (intval($jawaban[$i]) - 1);
    //         }
    //     }
    // }
    // for ($i=0; $i < count($jawaban)-1; $i++) {
    //     if($i != 0 || $i < 11){
    //         $hasil += (intval($jawaban[$i]));
    //     }
    // }
    // $jumlah = $hasil;
    $nama_responden = $jawaban[0];
    $email = $jawaban[1];
    $prodi = $jawaban[2];
    $jk = $jawaban[3];
    $usia = $jawaban[4];
    $q1 = $jawaban[5];
    $q2 = $jawaban[6];
    $q3 = $jawaban[7];
    $q4 = $jawaban[8];
    $q5 = $jawaban[9];
    $q6 = $jawaban[10];
    $q7 = $jawaban[11];
    $q8 = $jawaban[12];
    $q9 = $jawaban[13];
    $q10 = $jawaban[14];
    $jumlah = ($q1+$q2+$q3+$q4+$q5+$q6+$q7+$q8+$q9+$q10);
    $nilai_jumlah = ($jumlah * 2.5);
    $insert = $koneksi->query("INSERT INTO skor_asli (id_skor_asli,nama_responden,email,prodi,jk,usia,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,jumlah,nilai_jumlah,f_id_app) VALUES(0,'$nama_responden','$email','$prodi','$jk','$usia','$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10','$jumlah','$nilai_jumlah','$id_app')");
    
    if($insert)
    {
        $_SESSION['success'] = "Jawaban anda telah dikirim. Terima Kasih";
    }else{
        $_SESSION['error'] = "Jawaban anda gagal dikirim. Silahkan isi ulang atau hubungi admin!";
    }

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
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;700;800&family=Prompt&family=Righteous&family=Roboto:wght@500&display=swap"
        rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- begin::Notification -->
    <?php if (isset($_SESSION['success'])): ?>
    <script>
    var successfuly = '<?php echo $_SESSION["success"]; ?>';
    Swal.fire({
        title: 'Sukses!',
        text: successfuly,
        icon: 'success',
        confirmButtonText: 'OK'
    }).then(function(result) {
        if (result.isConfirmed) {
            window.location.href = '';
        }
    });
    </script>
    <?php unset($_SESSION['success']); // Menghapus session setelah ditampilkan ?>
    <?php endif; ?>
    <?php if (isset($_SESSION['error'])): ?>
    <script>
    Swal.fire({
        title: 'Error!',
        text: '<?php echo $_SESSION['error']; ?>',
        icon: 'error',
        confirmButtonText: 'OK'
    }).then(function(result) {
        if (result.isConfirmed) {
            window.location.href = '';
        }
    });
    </script>
    <?php unset($_SESSION['error']); // Menghapus session setelah ditampilkan ?>
    <?php endif; ?>
    <!-- end::Notification -->
    <section class="">
        <div class="text-lg-start" style="background-color: hsl(0, 0%, 96%)">
            <div class="container">
                <div class="row gx-lg-5 justify-content-center">
                    <div class="d-flex justify-content-center col-md-7">
                        <div class="mb-5 mt-5">
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img class="rounded-start" style="width: 200px; height:200px;"
                                            src="./img/uploads/<?=$data_aplikasi['gambar'];?>" alt="" srcset="">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h4 class="text-start"><?=$data_aplikasi['nama_aplikasi'];?></h4>
                                            <p class="fs-6" style="text-align: justify;">
                                                <?=$data_aplikasi['deskripsi'];?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form class="mt-4" action="" method="post">
                                <?php if($nama == 1):?>
                                <div class="form-outline shadow-sm card p-5 mb-4">
                                    <label class="form-label" for="nama_responden">Nama Anda</label>
                                    <input type="text" class="form-control" placeholder="Masukkan nama anda"
                                        name="nama_responden">
                                </div>
                                <?php else:?>
                                <input type="hidden" value="-" class="form-control" placeholder="Masukkan nama anda"
                                    name="nama_responden">
                                <?php endif;?>
                                <?php if($email == 1 ):?>
                                <div class="form-outline shadow-sm card p-5 mb-4">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" class="form-control" placeholder="example@gmail.com"
                                        name="email">
                                </div>
                                <?php else:?>
                                <input type="hidden" value="-" class="form-control" placeholder="example@gmail.com"
                                    name="email">
                                <?php endif;?>
                                <?php if($prodi == 1):?>
                                <div class="form-outline shadow-sm card p-5 mb-4">
                                    <label class="form-label" for="prodi">Prodi</label>
                                    <input type="text" class="form-control" placeholder="Masukkan nama prodi"
                                        name="prodi">
                                </div>
                                <?php else:?>
                                <input type="hidden" value="-" class="form-control" placeholder="Masukkan nama prodi"
                                    name="prodi">
                                <?php endif;?>
                                <?php if($jk == 1):?>
                                <div class="form-outline shadow-sm card p-5 mb-4">
                                    <label class="form-label" for="jk">Jenis Kelamin
                                    </label>
                                    <div class="">
                                        <div class="form-check pe-3">
                                            <input class="form-check-input" type="radio" name="jk" id="laki-laki"
                                                value="Laki-Laki">
                                            <label class="form-check-label" for="laki-laki">
                                                Laki-Laki
                                            </label>
                                        </div>
                                        <div class="form-check pe-3">
                                            <input class="form-check-input" value="Perempuan" type="radio" name="jk"
                                                id="perempuan">
                                            <label class="form-check-label" for="perempuan">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <?php else:?>
                                <input class="form-check-input" hidden checked type="radio" name="jk" id="-" value="-">
                                <?php endif;?>
                                <?php if($usia == 1):?>
                                <div class="form-outline shadow-sm card p-5 mb-4">
                                    <label class="form-label" for="usia">Usia</label>
                                    <input type="number" class="form-control" placeholder="Masukkan usia anda"
                                        name="usia">
                                </div>
                                <?php else:?>
                                <input type="hidden" value="0" class="form-control" placeholder="Masukkan usia anda"
                                    name="usia">
                                <?php endif;?>
                                <?php 
                                 $i = 0;
                                ?>
                                <?php foreach ($data_pertanyaan as $key => $value):?>
                                <!-- Email input -->
                                <div class="form-outline shadow-sm card p-5 mb-4">
                                    <label class="form-label" for="form2Example<?=++$i;?>"><?=$key+1;?>.
                                        <?=$value['pertanyaan'];?>
                                    </label>
                                    <div class="">
                                        <div class="form-check pe-3">
                                            <input class="form-check-input" value="5" type="radio"
                                                name="jawab<?=$value['id_pertanyaan'];?>"
                                                id="<?=$value['id_pertanyaan'];?>5">
                                            <label class="form-check-label" for="<?=$value['id_pertanyaan'];?>5">
                                                Sangat setuju
                                            </label>
                                        </div>
                                        <div class="form-check pe-3">
                                            <input class="form-check-input" value="4" type="radio"
                                                name="jawab<?=$value['id_pertanyaan'];?>"
                                                id="<?=$value['id_pertanyaan'];?>4">
                                            <label class="form-check-label" for="<?=$value['id_pertanyaan'];?>4">
                                                Setuju
                                            </label>
                                        </div>
                                        <div class="form-check pe-3">
                                            <input class="form-check-input" value="3" type="radio"
                                                name="jawab<?=$value['id_pertanyaan'];?>"
                                                id="<?=$value['id_pertanyaan'];?>3">
                                            <label class="form-check-label" for="<?=$value['id_pertanyaan'];?>3">
                                                Netral
                                            </label>
                                        </div>
                                        <div class="form-check pe-3">
                                            <input class="form-check-input" value="2" type="radio"
                                                name="jawab<?=$value['id_pertanyaan'];?>"
                                                id="<?=$value['id_pertanyaan'];?>2">
                                            <label class="form-check-label" for="<?=$value['id_pertanyaan'];?>2">
                                                Tidak setuju
                                            </label>
                                        </div>

                                        <div class="form-check pe-3">
                                            <input class="form-check-input" type="radio"
                                                name="jawab<?=$value['id_pertanyaan'];?>"
                                                id="<?=$value['id_pertanyaan'];?>1" value="1">
                                            <label class="form-check-label" for="<?=$value['id_pertanyaan'];?>1">
                                                Sangat tidak setuju
                                            </label>
                                        </div>



                                    </div>
                                </div>
                                <?php endforeach;?>
                                <input type="hidden" name="f_id_app" value="<?=base64_decode($_GET['app']);?>">
                                <div class="d-flex justify-content-between">
                                    <a href="./index.php" class="btn btn-danger">Beranda</a>
                                    <button type="submit" name="jawab" class="btn btn-primary">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
</body>

</html>