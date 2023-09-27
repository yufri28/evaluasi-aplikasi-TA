<?php 
 require './templates/header.php';
 require './functions/aplikasi.php';
$id_app = 0;
 

// begin::delete
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // begin::delete
    if(isset($_POST['delete_resp']))
    {
       $id_responden = htmlspecialchars($_POST['id_skor_asli']);
       $Aplikasi->delete_data_responden($id_responden);
    }
    // end::delete
}
// end::delete

$jumlahResponden = 0;
$dataResponden = array();
if(isset($_GET['app'])){
    $id_app = base64_decode($_GET['app']);
    $jumlahResponden = $Aplikasi->num_rows_responden_byApp($id_app);
    $dataResponden = $Aplikasi->get_responden($id_app);
}else{
    echo "<script>window.location.href='.index.php'</script>";
}
?>

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

<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Row-->
            <div class="g-5 gx-xxl-8">
                <!--begin::Tables Widget 10-->
                <div class="card">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">Daftar Responden</span>
                            <span class="text-muted mt-1 fw-bold fs-7"><?=$jumlahResponden;?>
                                responden</span>
                        </h3>
                        <div class="card-toolbar">
                            <?php if($_SESSION['level'] == 0):?>
                            <!--begin::Menu-->
                            <button type="button" data-bs-toggle="modal" data-bs-target="#addPertanyaan"
                                class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                data-kt-menu-placement="bottom-end">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </button>
                            <!--end::Menu-->
                            <?php endif;?>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-3">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table id="myTable"
                                class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-5">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="border-0">
                                        <th class="p-0 text-muted fw-bold">No</th>
                                        <th class="p-0 text-muted fw-bold min-w-100px">Nama</th>
                                        <th class="p-0 text-muted fw-bold min-w-60px">Q1</th>
                                        <th class="p-0 text-muted fw-bold min-w-60px">Q2</th>
                                        <th class="p-0 text-muted fw-bold min-w-60px">Q3</th>
                                        <th class="p-0 text-muted fw-bold min-w-60px">Q5</th>
                                        <th class="p-0 text-muted fw-bold min-w-60px">Q6</th>
                                        <th class="p-0 text-muted fw-bold min-w-60px">Q7</th>
                                        <th class="p-0 text-muted fw-bold min-w-60px">Q8</th>
                                        <th class="p-0 text-muted fw-bold min-w-60px">Q9</th>
                                        <th class="p-0 text-muted fw-bold min-w-60px">Q10</th>
                                        <th class="p-0 text-muted fw-bold min-w-60px">Jumlah</th>
                                        <th class="p-0 text-muted fw-bold min-w-60px">Nilai Akhir</th>
                                        <th class="p-0 text-muted fw-bold min-w-60px">Nama Aplikasi</th>
                                        <th class="p-0 text-muted fw-bold min-w-100px text-end">Aksi</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    <?php $i = 0;?>
                                    <?php foreach ($dataResponden as $key => $responden):?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="#"
                                                        class="text-dark fw-bolder text-hover-primary mb-1 fs-6"><?=++$i;?></a>
                                                </div>
                                                <!--end::Name-->
                                            </div>
                                        </td>
                                        <td class="text-dark fw-bold">
                                            <?= $_SESSION['level'] == 0 ? '-':$responden['nama_responden'];?>
                                        </td>
                                        <td class="text-dark fw-bold">
                                            <?= $_SESSION['level'] == 0 ? '-':$responden['q1'];?>
                                        </td>
                                        <td class="text-dark fw-bold">
                                            <?= $_SESSION['level'] == 0 ? '-':$responden['q3'];?>
                                        </td>
                                        <td class="text-dark fw-bold">
                                            <?= $_SESSION['level'] == 0 ? '-':$responden['q4'];?>
                                        </td>
                                        <td class="text-dark fw-bold">
                                            <?= $_SESSION['level'] == 0 ? '-':$responden['q5'];?>
                                        </td>
                                        <td class="text-dark fw-bold">
                                            <?= $_SESSION['level'] == 0 ? '-':$responden['q6'];?>
                                        </td>
                                        <td class="text-dark fw-bold">
                                            <?= $_SESSION['level'] == 0 ? '-':$responden['q7'];?>
                                        </td>
                                        <td class="text-dark fw-bold">
                                            <?= $_SESSION['level'] == 0 ? '-':$responden['q8'];?>
                                        </td>
                                        <td class="text-dark fw-bold">
                                            <?= $_SESSION['level'] == 0 ? '-':$responden['q9'];?>
                                        </td>
                                        <td class="text-dark fw-bold">
                                            <?= $_SESSION['level'] == 0 ? '-':$responden['q10'];?>
                                        </td>
                                        <td class="text-dark fw-bold">
                                            <?= $_SESSION['level'] == 0 ? '-':$responden['jumlah'];?>
                                        </td>
                                        <td class="text-dark fw-bold">
                                            <?= $_SESSION['level'] == 0 ? '-':$responden['nilai_jumlah'];?>
                                        </td>
                                        <td class="text-dark fw-bold">
                                            <?= $_SESSION['level'] == 0 ? '-':$responden['nama_aplikasi'];?>
                                        </td>
                                        <td class="text-end">
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#hapusResp<?=$responden['id_skor_asli'];?>"
                                                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                            fill="black" />
                                                        <path opacity="0.5"
                                                            d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                            fill="black" />
                                                        <path opacity="0.5"
                                                            d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
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
                <!--end::Tables Widget 10-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Content-->
    <!--end::Page-->
</div>
<!--end::Root-->
<!--end::Drawers-->
<!--begin::Modals-->
<!--begin::Modal - Create App-->
<?php require './templates/modals.php';?>
<!-- begin::hapus modal pertanyaan -->
<?php foreach ($dataResponden as $key => $responden):?>
<div class="modal fade" id="hapusResp<?=$responden['id_skor_asli'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Responden</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="id_skor_asli" value="<?=$responden['id_skor_asli'];?>">
                        <span>Anda yakin ingin hapus pertanyaan <strong><?=$responden['nama_responden'];?></strong>
                            ?</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="delete_resp" class="btn btn-sm btn-primary">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>
<!-- end::hapus modal aplikasi -->
<!--end::Modal - Select Location-->
<!--end::Modals-->
<?php require './templates/footer.php';?>