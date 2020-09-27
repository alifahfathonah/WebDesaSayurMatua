<div class="page-wrapper" style="min-height: 618px;">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Beranda</h4>
            </div>

        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
            </div>
        </div>
        <div class="row ">
            <div class="col-12">
                <div class="card ">
                    <div class="card-body  ml-3 mt-2">
                        <h1 class="card-title" id="1">Halaman Pengajuan Surat Pengatar KTP</h1>
                        <hr>
                        <p> Saya yang bertandan tangan di bawah ini : </p>
                        <div class="row">
                            <div class="col-12 ml-5">
                                <div class="row mb-3">
                                    <div class="col-2 ">
                                        <h5 class="font-weight-bold">Nama</h5>
                                    </div>
                                    <div class="col-1">
                                        <h5 class="font-weight-bold">:</h5>
                                    </div>
                                    <div class="col">
                                        <h5 class="font-weight-bold"><?= $penduduk['Nama']; ?></h5>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-2 ">
                                        <h5 class="font-weight-bold">Tempat/Tanggal Lahir</h5>
                                    </div>
                                    <div class="col-1">
                                        <h5 class="font-weight-bold">:</h5>
                                    </div>
                                    <div class="col">
                                        <h5 class="font-weight-bold"><?= $penduduk['TempatLahir'] . ' / ' . tgl_indo($penduduk['TglLahir']); ?></h5>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-2 ">
                                        <h5 class="font-weight-bold">Jenis Kelamin</h5>
                                    </div>
                                    <div class="col-1">
                                        <h5 class="font-weight-bold">:</h5>
                                    </div>
                                    <div class="col">
                                        <h5 class="font-weight-bold"><?php if ($penduduk == "L") {
                                                                            echo "Laki-laki";
                                                                        } else {
                                                                            echo "Perempuan";
                                                                        }; ?></h5>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-2 ">
                                        <h5 class="font-weight-bold">Pekerjaan</h5>
                                    </div>
                                    <div class="col-1">
                                        <h5 class="font-weight-bold">:</h5>
                                    </div>
                                    <div class="col">
                                        <h5 class="font-weight-bold"><?= $pekerjaan->pekerjaan_nama; ?></h5>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-2 ">
                                        <h5 class="font-weight-bold">Alamat</h5>
                                    </div>
                                    <div class="col-1">
                                        <h5 class="font-weight-bold">:</h5>
                                    </div>
                                    <div class="col">
                                        <h5 class="font-weight-bold"><?= $penduduk['Alamat']; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p> Dengan ini saya menyatakan sebenar-benarnya telah melakukan request Surat Pengatar KTP</p>
                        <a href="<?= base_url('Penduduk/sendktp'); ?> "> <button type=" button" class="btn btn-lg btn-success btn-block "><i class="fa fa-send"></i> Kirim</button></a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->