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
                <h4 class="text-themecolor"><?= $judul; ?></h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-search"></i> Lihat Data</button>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <?php

                ?>
                <div class="card border-primary">
                    <div class="card-body">
                        <h4 class="card-title">Form Surat Masuk</h4>
                        <h6 class="card-subtitle "> Mohon data diisi dengan sebenar-benarnya</h6>
                        <hr class="mb-4" />
                        <div class="row">
                            <div class="col-8">
                                <?php echo form_open_multipart('Surat/TambahSuratMasuk'); ?>
                                <div class="form-group row">
                                    <label for="idsuratmasuk" class="col-2 col-form-label">ID Surat Masuk</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="idsuratmasuk" id="idsuratmasuk" value="SMM<?php echo sprintf("%04s", $autokode) ?>" readonly>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="nosm" class="col-2 col-form-label">Nomor Surat Masuk</label>
                                    <div class="col-10">
                                        <input type="text" id="nosm" class="form-control" placeholder="Masukan nomor surat" name="nosm">
                                        <?= form_error('nosm', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="judulsm" class="col-2 col-form-label">Judul Surat Masuk</label>
                                    <div class="col-10">
                                        <input type="text" id="judulsm" class="form-control" placeholder="Masukan judul surat" name="judulsm">
                                        <?= form_error('judulsm', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="asalsm" class="col-2 col-form-label">Asal Surat</label>
                                    <div class="col-10">
                                        <input type="text" id="asalsm" class="form-control" placeholder="Masukan asal surat" name="asalsm">
                                        <?= form_error('asalsm', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tglmasuksm" class="col-2 col-form-label">Tanggal Surat Masuk</label>
                                    <div class="col-10">
                                        <input class="form-control" type="date" name="tglmasuksm" id="tglmasuksm">
                                        <?= form_error('tglmasuksm', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Deskripsi</label>
                                    <div class="col-10">
                                        <textarea class="form-control" name="Deskripsi" rows="5" id="Deskripsi" placeholder="Masukan deskripsi..."></textarea></div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <div class="col-lg col-md col-xs">
                                        <h4 class="card-title">Upload File Surat</h4>
                                        <div class="card">
                                            <div class="card-body">
                                                <!-- <label for="input-file-now">Your so fresh input file — Default version</label> -->
                                                <input type="file" id="input-file-now" class="dropify" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group row">
                                    <label class="col-2 col-form-label"></label>
                                    <div class="col-10">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah</button>
                                        <a href="<?= base_url('Surat/SuratMasuk'); ?>"> <button type="button" class="btn btn-inverse  m-l-10">Cancel</button></a>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>