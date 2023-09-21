<?php 
 require './templates/header.php';
 require './functions/aplikasi.php';
$id_auth = $_SESSION['id_auth'];
 
// begin::CRUD data aplikasi
// begin::read
$dataAplikasi = $Aplikasi->get_data_aplikasi($id_auth);
// end::read
$num_rows_app = $Aplikasi->count_num_rows_app();
// begin::create, update and delete
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // begin::create
    if(isset($_POST['save_app']))
    {
       $nama_aplikasi = htmlspecialchars($_POST['nama_aplikasi']);
       $id_auth = htmlspecialchars($_POST['id_auth']);
       $deskripsi = htmlspecialchars($_POST['deskripsi']);

        // Pastikan ada file gambar yang diunggah
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            $namaFile = $_FILES['gambar']['name'];
            $lokasiSementara = $_FILES['gambar']['tmp_name'];
            
            // Tentukan lokasi tujuan penyimpanan
            $targetDir = '../img/uploads/';
            $targetFilePath = $targetDir . $namaFile;

            // Cek apakah nama file sudah ada dalam direktori target
            if (file_exists($targetFilePath)) {
                $fileInfo = pathinfo($namaFile);
                $baseName = $fileInfo['filename'];
                $extension = $fileInfo['extension'];
                $counter = 1;

                // Loop hingga menemukan nama file yang unik
                while (file_exists($targetFilePath)) {
                    $namaFile = $baseName . '_' . $counter . '.' . $extension;
                    $targetFilePath = $targetDir . $namaFile;
                    $counter++;
                }
            }

            // Pindahkan file gambar dari lokasi sementara ke lokasi tujuan
            if (move_uploaded_file($lokasiSementara, $targetFilePath)) {
                $dataAplikasi = [
                    'nama_aplikasi' => $nama_aplikasi,
                    'deskripsi' => $deskripsi,
                    'id_auth' => $id_auth,
                    'gambar' => $namaFile,
                ];
                $Aplikasi->create_data_aplikasi($dataAplikasi);
            } else {
                return $_SESSION['error'] = 'Tidak ada data yang dikirim!';
            }
        } else {
            return $_SESSION['error'] = 'Tidak ada data yang dikirim!';
        }    
    }
    // end::create
    // begin::update
    if(isset($_POST['update_app']))
    {
       $id_aplikasi = htmlspecialchars($_POST['id_aplikasi']);
       $nama_aplikasi = htmlspecialchars($_POST['nama_aplikasi']);
       $id_auth = htmlspecialchars($_POST['id_auth']);
       $deskripsi = htmlspecialchars($_POST['deskripsi']);

        // Pastikan ada file gambar yang diunggah
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            $namaFile = $_FILES['gambar']['name'];
            $lokasiSementara = $_FILES['gambar']['tmp_name'];
            
            // Tentukan lokasi tujuan penyimpanan
            $targetDir = '../img/uploads/';
            $targetFilePath = $targetDir . $namaFile;

            // Cek apakah nama file sudah ada dalam direktori target
            if (file_exists($targetFilePath)) {
                $fileInfo = pathinfo($namaFile);
                $baseName = $fileInfo['filename'];
                $extension = $fileInfo['extension'];
                $counter = 1;

                // Loop hingga menemukan nama file yang unik
                while (file_exists($targetFilePath)) {
                    $namaFile = $baseName . '_' . $counter . '.' . $extension;
                    $targetFilePath = $targetDir . $namaFile;
                    $counter++;
                }
            }

            // Pindahkan file gambar dari lokasi sementara ke lokasi tujuan
            if (move_uploaded_file($lokasiSementara, $targetFilePath)) {
                // Hapus file gambar lama jika ada
                $gambarLama =  htmlspecialchars($_POST['gambar_lama']);
                $pathGambarLama = $targetDir . $gambarLama;
                if (file_exists($pathGambarLama) && is_file($pathGambarLama)) {
                    unlink($pathGambarLama); // Hapus file gambar lama
                }
                $dataAplikasi = [
                    'id_aplikasi' => $id_aplikasi,
                    'nama_aplikasi' => $nama_aplikasi,
                    'deskripsi' => $deskripsi,
                    'id_auth' => $id_auth,
                    'gambar' => $namaFile,
                ];
                $Aplikasi->update_data_aplikasi($dataAplikasi);
            } else {
                return $_SESSION['error'] = 'Tidak ada data yang dikirim!';
            }
        } else {
            $namaFile = htmlspecialchars($_POST['gambar_lama']);
            $dataAplikasi = [
                'id_aplikasi' => $id_aplikasi,
                'nama_aplikasi' => $nama_aplikasi,
                'deskripsi' => $deskripsi,
                'id_auth' => $id_auth,
                'gambar' => $namaFile,
            ];
            $Aplikasi->update_data_aplikasi($dataAplikasi);
        }    
    }
    // end::update
    // begin::delete
    if(isset($_POST['delete_app']))
    {
       $id_aplikasi = htmlspecialchars($_POST['id_aplikasi']);
       $Aplikasi->delete_data_aplikasi($id_aplikasi);
    }
    // end::delete
}
// end::create, update and delete
// end::CRUD data aplikasi
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
                            <span class="card-label fw-bolder fs-3 mb-1">Daftar Aplikasi</span>
                            <span class="text-muted mt-1 fw-bold fs-7"><?= $num_rows_app;?>
                                aplikasi</span>
                        </h3>
                        <div class="card-toolbar">
                            <!--begin::Menu-->
                            <button type="button" data-bs-toggle="modal" data-bs-target="#addAplikasi"
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
                            <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        viewBox="0 0 24 24">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                            <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000"
                                                opacity="0.3" />
                                            <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000"
                                                opacity="0.3" />
                                            <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000"
                                                opacity="0.3" />
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </button>
                            <!--begin::Menu 2-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px"
                                data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content fs-6 text-dark fw-bolder px-3 py-4">
                                        Quick Actions
                                    </div>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator mb-3 opacity-75"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">New Ticket</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">New Customer</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                    data-kt-menu-placement="right-start">
                                    <!--begin::Menu item-->
                                    <a href="#" class="menu-link px-3">
                                        <span class="menu-title">New Group</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <!--end::Menu item-->
                                    <!--begin::Menu sub-->
                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Admin Group</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Staff Group</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Member Group</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu sub-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">New Contact</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator mt-3 opacity-75"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content px-3 py-3">
                                        <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
                                    </div>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu 2-->
                            <!--end::Menu-->
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-3">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="border-0">
                                        <th class="p-0"></th>
                                        <th class="p-0"></th>
                                        <th class="p-0 min-w-200px"></th>
                                        <!-- <th class="p-0 min-w-150px"></th> -->
                                        <th class="p-0 min-w-100px text-end"></th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    <?php 
                                     $i = 0;
                                    ?>
                                    <?php foreach ($dataAplikasi as $key => $aplikasi):?>
                                    <tr>
                                        <td class="text-muted fw-bold">
                                            <?= ++$i;?>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-45px me-5">
                                                    <img alt="Pic" src="../img/uploads/<?=$aplikasi['gambar'];?>" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Name-->
                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="#"
                                                        class="text-dark fw-bolder text-hover-primary mb-1 fs-6"><?=$aplikasi['nama_aplikasi'];?></a>
                                                </div>
                                                <!--end::Name-->
                                            </div>
                                        </td>
                                        <!-- <td class="text-end">
                                            <a href="#"
                                                class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">$560,000</a>
                                            <span class="text-muted fw-bold text-muted d-block fs-7">Paid</span>
                                        </td> -->
                                        <td class="text-muted fw-bold">
                                            <?= substr($aplikasi['deskripsi'], 0, 50).'...';?>
                                        </td>
                                        <!-- <td class="text-end">
                                            <span class="badge badge-light-success">Approved</span>
                                        </td> -->
                                        <td class="text-end">
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#copyLink<?=$aplikasi['id_aplikasi'];?>"
                                                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                                                        <path fill="black"
                                                            d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                                        <path fill="black"
                                                            d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#editAplikasi<?=$aplikasi['id_aplikasi'];?>"
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
                                                data-bs-target="#hapusAplikasi<?=$aplikasi['id_aplikasi'];?>"
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
<!--begin::Drawers-->
<!--begin::Activities drawer-->
<?php require './templates/drawers.php';?>
<!--end::Chat drawer-->
<!--end::Drawers-->
<!--begin::Modals-->
<!--begin::Modal - Create App-->
<?php require './templates/modals.php';?>
<!-- begin::edit modal aplikasi -->
<?php foreach ($dataAplikasi as $key => $aplikasi):?>
<div class="modal fade" id="editAplikasi<?=$aplikasi['id_aplikasi'];?>" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Aplikasi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="id_auth" value="<?=$aplikasi['f_id_auth'];?>">
                        <input type="hidden" name="id_aplikasi" value="<?=$aplikasi['id_aplikasi'];?>">
                        <label for="nama_aplikasi" class="form-label">Nama Aplikasi <small
                                class="text-danger">*</small></label>
                        <input type="text" name="nama_aplikasi" value="<?=$aplikasi['nama_aplikasi'];?>"
                            class="form-control form-control-sm" required id="nama_aplikasi">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi <small class="text-danger">*</small></label>
                        <textarea class="form-control form-control-sm" id="deskripsi" required name="deskripsi"
                            rows="9"><?=$aplikasi['deskripsi'];?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="hidden" name="gambar_lama" value="<?=$aplikasi['gambar'];?>">
                        <input type="file" name="gambar" class="form-control form-control-sm" id="gambar">
                        <small><i>Kosongkan jika tidak ingin mengubah gambar</i></small>

                        <img src="./../img/uploads/<?=$aplikasi['gambar'];?>" class="img-fluid"
                            alt="<?=$aplikasi['nama_aplikasi'];?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="update_app" class="btn btn-sm btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>
<!-- end::edit modal aplikasi -->
<!-- begin::hapus modal aplikasi -->
<?php foreach ($dataAplikasi as $key => $aplikasi):?>
<div class="modal fade" id="hapusAplikasi<?=$aplikasi['id_aplikasi'];?>" tabindex="-1"
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
                        <input type="hidden" name="id_aplikasi" value="<?=$aplikasi['id_aplikasi'];?>">
                        <span>Anda yakin ingin hapus aplikasi <strong><?=$aplikasi['nama_aplikasi'];?></strong> ?</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="delete_app" class="btn btn-sm btn-primary">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>
<!-- end::hapus modal aplikasi -->
<!-- begin::copy modal aplikasi -->
<?php foreach ($dataAplikasi as $key => $aplikasi):?>
<div class="modal fade" id="copyLink<?=$aplikasi['id_aplikasi'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Aplikasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <span>Silahkan salin link aplikasi
                        <strong><?=$aplikasi['nama_aplikasi'];?></strong> berikut untuk dibagikan kepada responden!
                        <pre><code class="language-python"><?=BASE_URL.'form-evaluasi.php?app='.base64_encode($aplikasi['id_aplikasi']);?></code></pre>
                    </span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-sm btn-primary copy-button"
                    data-id="<?=$aplikasi['id_aplikasi'];?>">Copy</button> -->
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>

<!-- Tambahkan library clipboard.js dari CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Inisialisasi Clipboard.js dengan tombol "Copy" yang memiliki kelas "copy-button"
    const copyButtons = document.querySelectorAll('.copy-button');

    copyButtons.forEach(copyButton => {
        const id = copyButton.getAttribute('data-id');

        const clipboard = new ClipboardJS(copyButton, {
            text: function() {
                // Gantilah ini dengan teks yang sesuai untuk setiap aplikasi
                return 'https://www.contoh.com/link-anda/' + id;
            }
        });

        clipboard.on('success', function(e) {
            // Saat penyalinan berhasil, ganti teks tombol menjadi "Copied"
            copyButton.innerText = 'Copied';
        });
    });
});
</script>



<!-- end::hapus modal aplikasi -->
<!--end::Modal - Select Location-->
<!--end::Modals-->
<?php require './templates/footer.php';?>