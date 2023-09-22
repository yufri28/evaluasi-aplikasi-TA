<?php require './templates/header.php';?>
<?php 

require './functions/aplikasi.php';
$id_auth = $_SESSION['id_auth'];
 

$dataHasilAplikasi = $Aplikasi->get_hasil_aplikasi($id_auth);
$jumlahAplikasi = $Aplikasi->count_aplikasi($id_auth);
$num_rows_app = 0;
$num_rows_user = 0;
if($_SESSION['level'] == 0){
    $num_rows_app = $Aplikasi->num_rows_app_admin();
    $num_rows_user = $Aplikasi->num_rows_user();
}else{
    $num_rows_app = $Aplikasi->count_num_rows_app($id_auth);
    $num_rows_user = $Aplikasi->num_rows_responden($id_auth);
}
function filterKategori($nilai){
    $kategori = "";
    switch ($nilai) {
        case $nilai > 70:
            $kategori = "badge-light-success";
            break;
        case $nilai >= 50 && $nilai <= 70:
                $kategori = "badge-light-warning";
                break;
        case $nilai < 50:
                $kategori = "badge-light-danger";
            break;
        default:
    }
    
    return $kategori;
}

?>
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Row-->
            <div class="row g-5 g-xl-8">
                <div class="col-xl-6">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                            <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                    class="bi bi-app" viewBox="0 0 16 16">
                                    <path
                                        d="M11 2a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V5a3 3 0 0 1 3-3h6zM5 1a4 4 0 0 0-4 4v6a4 4 0 0 0 4 4h6a4 4 0 0 0 4-4V5a4 4 0 0 0-4-4H5z" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <div class="text-white fw-bolder fs-2 mb-2 mt-5">
                                <?=$jumlahAplikasi;?>
                            </div>
                            <div class="fw-bold text-white">
                                Jumlah Aplikasi
                            </div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
                <div class="col-xl-6">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                            <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                    class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <div class="text-white fw-bolder fs-2 mb-2 mt-5">
                                <?= $num_rows_user ;?>
                            </div>
                            <div class="fw-bold text-white">
                                Jumlah <?= $_SESSION['level'] == 0 ? 'Pengguna':'Responden';?>
                            </div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
            </div>
            <!--end::Row-->
            <?php if($_SESSION['level'] == 1): ;?>
            <div class="card">
                <!--begin::Body-->
                <div class="card-body pt-3">
                    <div class="d-flex justify-content-end">
                        <h5 class="badge badge-light-success m-1">Acceptable</h5>
                        <h5 class="badge badge-light-warning m-1">Marginal</h5>
                        <h5 class="badge badge-light-danger m-1">Not Acceptable</h5>
                    </div>
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table id="myTable" class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="border-0">
                                    <th class="p-0">No</th>
                                    <th class="p-0">Gambar | Nama Aplikasi</th>
                                    <th class="p-0 min-w-150px">Jumlah Responden</th>
                                    <th class="p-0 min-w-150px">Skor Akhir</th>
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                                <?php 
                                         $i = 0;
                                        ?>
                                <?php foreach ($dataHasilAplikasi as $key => $hasil):?>
                                <tr>
                                    <td class="text-muted fw-bold">
                                        <?= ++$i;?>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-45px me-5">
                                                <img alt="Pic" src="../img/uploads/<?=$hasil['gambar'];?>" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Name-->
                                            <div class="d-flex justify-content-start flex-column">
                                                <a href="#"
                                                    class="text-dark fw-bolder text-hover-primary mb-1 fs-6"><?=$hasil['nama_aplikasi'];?></a>
                                            </div>
                                            <!--end::Name-->
                                        </div>
                                    </td>
                                    <td class="text-start">
                                        <span
                                            class="badge <?=filterKategori(round($hasil['nilai_jumlah'],2));?>"><?= $hasil['jumlah_responden'];?></span>
                                    </td>
                                    <td class="text-start">
                                        <span
                                            class="badge <?=filterKategori(round($hasil['nilai_jumlah'],2));?>"><?= round($hasil['nilai_jumlah'],2);?></span>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
                <!--begin::Body-->
            </div>
            <?php endif;?>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Content-->
    <!--end::Page-->
</div>
<!--end::Root-->
<!--begin::Drawers-->
<!--end::Drawers-->
<!--begin::Modals-->
<!--begin::Modal - Create App-->
<?php require './templates/modals.php';?>
<!--end::Modal - Select Location-->
<!--end::Modals-->
<?php require './templates/footer.php';?>