<?php 
 require './templates/header.php';
 require './functions/pertanyaan.php';
$id_auth = $_SESSION['id_auth'];
 
// begin::CRUD data pertanyaan
// begin::read
$dataPertanyaan = $Pertanyaan->get_data_question();
// end::read
$num_rows_question = $Pertanyaan->count_num_rows_question();
// begin::create, update and delete
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // begin::create
    if(isset($_POST['save_question']))
    {
       $pertanyaan = htmlspecialchars($_POST['pertanyaan']);
       if($pertanyaan != "")
       {
           $Pertanyaan->create_data_question($pertanyaan);
       }
       else 
       {
         return $_SESSION['error'] = 'Tidak ada data yang dikirim!';
       }    
    }
    // end::create
    // begin::update
    if(isset($_POST['update_question']))
    {
       $id_pertanyaan = htmlspecialchars($_POST['id_pertanyaan']);
       $pertanyaan = htmlspecialchars($_POST['pertanyaan']);

        if($id_pertanyaan != "" && $pertanyaan != "")
        {
            $dataQuestion = [
                'id_pertanyaan' => $id_pertanyaan,
                'pertanyaan' => $pertanyaan
            ];
            $Pertanyaan->update_data_question($dataQuestion);
        }
        else {
            return $_SESSION['error'] = 'Tidak ada data yang dikirim!';
        }
        
    }
    // end::update
    // begin::delete
    if(isset($_POST['delete_question']))
    {
       $id_question = htmlspecialchars($_POST['id_pertanyaan']);
       $Pertanyaan->delete_data_question($id_question);
    }
    // end::delete
}
// end::create, update and delete
// end::CRUD data pertanyaan
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
                            <span class="card-label fw-bolder fs-3 mb-1">Daftar Pertanyaan</span>
                            <span class="text-muted mt-1 fw-bold fs-7"><?= $num_rows_question;?>
                                pertanyaan</span>
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
                                        <th class="p-0"></th>
                                        <th class="p-0 min-w-200px"></th>
                                        <?php if($_SESSION['level'] == 0):?>
                                        <th class="p-0 min-w-100px text-end"></th>
                                        <?php endif;?>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    <?php $i = 0;?>
                                    <?php foreach ($dataPertanyaan as $key => $pertanyaan):?>
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
                                        <td class="text-muted fw-bold">
                                            <?= $_SESSION['level'] == 0 ? substr($pertanyaan['pertanyaan'], 0, 50).'...':$pertanyaan['pertanyaan'];?>
                                        </td>
                                        <?php if($_SESSION['level'] == 0):?>
                                        <td class="text-end">
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#editPertanyaan<?=$pertanyaan['id_pertanyaan'];?>"
                                                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3"
                                                            d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                            fill="black" />
                                                        <path
                                                            d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#hapusPertanyaan<?=$pertanyaan['id_pertanyaan'];?>"
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
                                        <?php endif;?>
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
<!-- begin::edit modal pertanyaan -->
<?php foreach ($dataPertanyaan as $key => $pertanyaan):?>
<div class="modal fade" id="editPertanyaan<?=$pertanyaan['id_pertanyaan'];?>" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pertanyaan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="id_pertanyaan" value="<?=$pertanyaan['id_pertanyaan'];?>">
                        <label for="pertanyaan" class="form-label">Pertanyaan <small
                                class="text-danger">*</small></label>
                        <textarea class="form-control form-control-sm" id="pertanyaan" required name="pertanyaan"
                            rows="9"><?=$pertanyaan['pertanyaan'];?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="update_question" class="btn btn-sm btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>
<!-- end::edit modal pertanyaan -->
<!-- begin::hapus modal pertanyaan -->
<?php foreach ($dataPertanyaan as $key => $pertanyaan):?>
<div class="modal fade" id="hapusPertanyaan<?=$pertanyaan['id_pertanyaan'];?>" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Aplikasi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="id_pertanyaan" value="<?=$pertanyaan['id_pertanyaan'];?>">
                        <span>Anda yakin ingin hapus pertanyaan <strong><?=$pertanyaan['pertanyaan'];?></strong>
                            ?</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="delete_question" class="btn btn-sm btn-primary">Delete</button>
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