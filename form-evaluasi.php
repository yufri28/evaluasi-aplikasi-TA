<?php 

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

    $bobot_ganjil = 0;
    $bobot_genap = 0;
    $jawaban = array_values($_POST);
    $hasil = 0;
    for ($i=0; $i < count($jawaban)-1; $i++) {
            if($i % 2 != 0){
                $hasil += (5 - intval($jawaban[$i]));
            }elseif($i % 2 == 0){
               
                $hasil += (intval($jawaban[$i]) - 1);
            }
        }
        
        echo ($hasil * 2.5);
        

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
</head>

<body>

    <section class="">
        <div class="text-lg-start" style="background-color: hsl(0, 0%, 96%)">
            <div class="container">
                <div class="row gx-lg-5 justify-content-center">
                    <div class="d-flex justify-content-center col-md-7">
                        <div class="mb-5 mt-5">
                            <div class="form-outline card p-5 mb-4">
                                <h4 class="text-center"><?=$data_aplikasi['nama_aplikasi'];?></h4>
                                <div class="d-flex">
                                    <img class="me-3 mt-3 rounded-circle" style="width: 200px; height:200px;"
                                        src="./img/uploads/<?=$data_aplikasi['gambar'];?>" alt="" srcset="">
                                    <p class="fs-6" style="text-align: justify;"><?=$data_aplikasi['deskripsi'];?></p>
                                </div>
                            </div>
                            <form class="mt-4" action="" method="post">
                                <?php 
                                 $i = 0;
                                ?>
                                <?php foreach ($data_pertanyaan as $key => $value):?>
                                <!-- Email input -->
                                <div class="form-outline card p-5 mb-4">
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
                                    </div>
                                </div>
                                <?php endforeach;?>
                                <!-- Register buttons -->
                                <div class="text-end">
                                    <button type="submit" name="jawab"
                                        class="btn btn-primary btn-block mb-4">Kirim</button>
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