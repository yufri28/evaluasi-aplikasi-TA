<!-- begin::modal aplikasi -->
<!-- begin::create modal aplikasi -->
<div class="modal fade" id="addAplikasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Aplikasi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="id_auth" value="<?=$_SESSION['id_auth'];?>">
                        <label for="nama_aplikasi" class="form-label">Nama Aplikasi <small
                                class="text-danger">*</small></label>
                        <input type="text" name="nama_aplikasi" class="form-control form-control-sm" required
                            id="nama_aplikasi">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi <small class="text-danger">*</small></label>
                        <textarea class="form-control form-control-sm" id="deskripsi" required name="deskripsi"
                            rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar <small class="text-danger">*</small></label>
                        <input type="file" required name="gambar" class="form-control form-control-sm" id="gambar">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="save_app" class="btn btn-sm btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end::create modal aplikasi -->
<!-- end::modal aplikasi -->

<!-- begin::modal pertanyaan -->
<!-- begin::create modal pertanyaan -->
<div class="modal fade" id="addPertanyaan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pertanyaan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="pertanyaan" class="form-label">Pertanyaan <small
                                class="text-danger">*</small></label>
                        <textarea class="form-control form-control-sm" id="pertanyaan" required name="pertanyaan"
                            rows="9"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="save_question" class="btn btn-sm btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end::create modal pertanyaan -->
<!-- end::modal pertanyaan -->