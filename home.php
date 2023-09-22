<?php 
session_start();
if(isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['role'] == 1){
    header("Location: ./user/index.php");
}else if(isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['role'] == 0) {
    header("Location: ./admin/index.php");
}
require_once './config.php';

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
            <div class="container d-flex">
                <div class="row justify-content-center card-app xxl-lg-mt-5">
                    <?php for ($i=0; $i < 10; $i++):?>
                    <div class="card col-lg-4 m-2" style="width: 18rem;">
                        <img src="./img/uploads/Screenshot (7).png" style="width: 288px; margin-left: -12px;"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up
                                the bulk of the card's content.</p>
                        </div>
                    </div>
                    <?php endfor;?>
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