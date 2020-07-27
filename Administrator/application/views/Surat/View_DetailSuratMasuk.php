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
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-3 ">
                        <h3 class="card-title">Judul Surat</h3>
                    </div>
                    <div class="col">
                        <h3 class="card-title"><?= $detail->suratmasuk_judul; ?></h3>
                        <hr />
                    </div>
                </div>
                <div class="row mb-3 ">
                    <div class="col-3 ">
                        <h4>Nomor Surat</h4>
                    </div>
                    <div class="col">
                        <h4><?= $detail->suratmasuk_no; ?></h4>
                        <hr />
                    </div>
                </div>
                <div class="row mb-3 ">
                    <div class="col-3 ">
                        <h4>Tanggal Surat Masuk</h4>
                    </div>
                    <div class="col">
                        <h4><?= tgl_indo($detail->suratmasuk_tanggal); ?></h4>
                        <hr />
                    </div>
                </div>
                <div class="row mb-3 ">
                    <div class="col-3 ">
                        <h4>File Surat</h4>
                    </div>
                    <div class="col">
                        <h4>
                            <a href="<?= base_url("Surat/DownloadSuratMasuk/" . $detail->suratmasuk_file); ?>"><?= $detail->suratmasuk_file; ?></a>
                            <!-- <?= tgl_indo($detail->suratmasuk_tanggal); ?>-->
                        </h4>
                        <hr />
                    </div>
                </div>

                <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>