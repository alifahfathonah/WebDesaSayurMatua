<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-10 align-self-center">
                <h4 class="text-themecolor"><?= $judul . " ( " . $detail->suratmasuk_no . " )"; ?></h4>
            </div>
            <div class="col-md-2 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="<?= base_url('Surat/SuratMasuk'); ?>" <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-search"></i> Lihat Data</button></a>
                </div>
            </div>
        </div>
        <div class="card border-dark">
            <div class="card-header bg-dark m-b-15">
                <h4 class="m-b-0 text-white">Detail</h4>
            </div>
            <div class="card-body ">
                <div class="row mb-3">
                    <div class="col-3 ">
                        <h3 class="card-title">Judul Surat</h3>
                    </div>
                    <div class="col-5">
                        <h3 class="card-title"><?= $detail->suratmasuk_judul; ?></h3>
                        <hr />
                    </div>
                </div>
                <div class="row mb-3 ">
                    <div class="col-3 ">
                        <h4>Nomor Surat</h4>
                    </div>
                    <div class="col-5">
                        <h4><?= $detail->suratmasuk_no; ?></h4>
                        <hr />
                    </div>
                </div>
                <div class="row mb-3 ">
                    <div class="col-3 ">
                        <h4>Tanggal Surat Masuk</h4>
                    </div>
                    <div class="col-5">
                        <h4><?= tgl_indo($detail->suratmasuk_tanggal); ?></h4>
                        <hr />
                    </div>
                </div>
                <div class="row mb-3 ">
                    <div class="col-3 ">
                        <h4>File Surat</h4>
                    </div>
                    <div class="col-5">
                        <h4>
                            <a href="<?= base_url("Surat/DownloadSuratMasuk/" . $detail->suratmasuk_file); ?>"><?= $detail->suratmasuk_file; ?></a>
                            <!-- <?= tgl_indo($detail->suratmasuk_tanggal); ?>-->
                        </h4>
                        <hr />
                    </div>
                </div>
                <div class="row mb-3 ">
                    <div class="col-3 ">
                        <h4>Deskirpsi Surat</h4>
                    </div>
                    <div class="col-5">
                        <h4 class="text-justify"><?= $detail->suratmasuk_deskripsi; ?></h4>
                        <hr />
                    </div>
                </div>
                <div class="row mb-3 ">
                    <div class="col-3 ">

                    </div>
                    <div class="col-5">
                        <a href="<?= base_url("Surat/DeleteSuratMasuk/") . $detail->suratmasuk_id; ?>">
                            <button type="button" class="btn btn-danger btn-rounded"><i class="fa fa-trash"></i> Hapus Surat</button>
                        </a>
                        <a href="<?= base_url("Surat/EditSuratMasuk/") . $detail->suratmasuk_id; ?>">
                            <button type="button" class="btn btn-info btn-rounded"><i class="fa fa-edit" alt="EDIT"></i> Edit Surat</button>
                        </a>
                        <a href="<?= base_url("Surat/SuratMasuk"); ?>">
                            <button type="button" class="btn btn-rounded btn-rounded  btn-outline-secondary"><i class="fa fa-arrow-circle-left"></i> Kembali</button>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>