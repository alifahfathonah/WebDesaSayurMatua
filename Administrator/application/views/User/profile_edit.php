<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor"> <?= $judul; ?></h4>
            </div>

        </div>

        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->


        <div class="row">
            <div class="col-sm-12">
                <?php
                if (validation_errors()) {
                    echo "<div class='alert alert-danger'>" . validation_errors() . "</div>";
                }
                ?>
                <div class="card border-primary">
                    <div class="card-body">
                        <h4 class="card-title">Form Data Penduduk</h4>
                        <h6 class="card-subtitle "> Mohon data diisi dengan sebenar-benarnya</h6>
                        <hr class="mb-4" />
                        <div class="row">
                            <div class="col-8">
                                <?php echo form_open_multipart('User/edit'); ?>
                                <div class="form-group row">
                                    <label for="username" class="col-3 col-form-label">Username</label>
                                    <div class="col">
                                        <input type="text" id="username" name="username" class="form-control" readonly value="<?= $admin['admin_user']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-3 col-form-label">Nama Lengkap User</label>
                                    <div class="col">
                                        <input type="text" id="nama" name="name" class="form-control" placeholder=" Masukan nama anda" value="<?= $admin['admin_nama']; ?>">
                                    </div>
                                    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-3 col-form-label">Upload Gambar</label>
                                    <div class="col">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file col">
                                                <input type="file" class="custom-file-input" name="image" id="file" onchange="tampilkanPreview(this,'preview')">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center">
                                    <div class="col-lg-3">
                                        <button type="submit" class="btn btn-block btn-info">Edit data</button>
                                        <!-- <button type="button" class="btn btn-block btn-lg btn-secondary">Second</button> -->
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="<?= base_url("User"); ?>"> <button type="button" class="btn btn-block btn-outline-secondary">Batal</button></a>
                                    </div>



                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <div class="text-center">
                                        <img src="<?= base_url('assets/images/profile/') . $admin['admin_image']; ?>" id="preview" class="img-thumbnail w-50">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>