<?php 
session_start();
require './config.php';

// $koneksi = new connectDatabase();
$data_aplikasi = array();
if(isset($_GET['app']))
{
    $id_app = base64_decode($_GET['app']);
    if($id_app != '')
    {
        $data_aplikasi = mysqli_fetch_assoc($koneksi->query("SELECT * FROM aplikasi WHERE id_aplikasi='$id_app'"));
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
    // $hasil = 0;
    // for ($i=0; $i < count($jawaban)-1; $i++) {
    //         if($i % 2 != 0){
    //             $hasil += (5 - intval($jawaban[$i]));
    //         }elseif($i % 2 == 0){
               
    //             $hasil += (intval($jawaban[$i]) - 1);
    //         }
    //     }
        
    //     echo ($hasil * 2.5);

    $nama_responden = $jawaban[0];
    $q1 = $jawaban[1];
    $q2 = $jawaban[2];
    $q3 = $jawaban[3];
    $q4 = $jawaban[4];
    $q5 = $jawaban[5];
    $q6 = $jawaban[6];
    $q7 = $jawaban[7];
    $q8 = $jawaban[8];
    $q9 = $jawaban[9];
    $q10 = $jawaban[10];
   
    $insert = $koneksi->query("INSERT INTO skor_asli (id_skor_asli,nama_responden,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,f_id_app) VALUES(0,'$nama_responden','$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10','$id_app')");
    
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
                                <div class="form-outline shadow-sm card p-5 mb-4">
                                    <label class="form-label" for="form2Example">Nama Anda</label>
                                    <input type="text" class="form-control" placeholder="Masukkan nama anda"
                                        name="nama_responden">
                                </div>
                                <?php 
                                 $i = 0;
                                ?>
                                <?php foreach ($data_pertanyaan as $key => $value):?>
                                <!-- Email input -->
                                <div class="form-outline shadow-sm card p-5 mb-4">
                                    <label class="form-label" for="form2Example<?=++$i;?>"><?=$value['pertanyaan'];?>
                                    </label>
                                    <div class="">
                                        <div class="form-check pe-3">
                                            <input class="form-check-input" type="radio"
                                                name="jawab<?=$value['id_pertanyaan'];?>"
                                                id="<?=$value['id_pertanyaan'];?>1" value="1">
                                            <label class="form-check-label" for="<?=$value['id_pertanyaan'];?>1">
                                                Sangat tidak setuju
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
                                            <input class="form-check-input" value="3" type="radio"
                                                name="jawab<?=$value['id_pertanyaan'];?>"
                                                id="<?=$value['id_pertanyaan'];?>3">
                                            <label class="form-check-label" for="<?=$value['id_pertanyaan'];?>3">
                                                Netral
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
                                            <input class="form-check-input" value="5" type="radio"
                                                name="jawab<?=$value['id_pertanyaan'];?>"
                                                id="<?=$value['id_pertanyaan'];?>5">
                                            <label class="form-check-label" for="<?=$value['id_pertanyaan'];?>5">
                                                Sangat setuju
                                            </label>
                                        </div>
                                        <input type="hidden" name="f_id_app" value="<?=base64_decode($_GET['app']);?>">
                                    </div>
                                </div>
                                <?php endforeach;?>
                                <div class="d-flex justify-content-between">
                                    <a href="./index.php" class="btn btn-danger">Kembali</a>
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