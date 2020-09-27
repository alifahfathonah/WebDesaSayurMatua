<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">

            <div class="col-md align-self-center">
                <h4 class="text-themecolor">Surat Kartu Tanda Penduduk</h4>
            </div>
            <div class="col-md-5 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">

                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row ">
            <div class="col-md-12">
                <div class="card card-body printableArea  p-5">
                    <div class="row">
                        <div class="col-2">
                            <img src="<?= base_url() . 'assets/images/logo_padanglawas.png'; ?>" style="width:75%;">
                        </div>
                        <div class="col-8 text-center">
                            <h2 class="font-weight-bold">Pemerintahan Kabupaten Padang Lawas</h2>
                            <h3 class="font-weight-bold">Desan Sayur Matua</h3>
                            <h4 class="">Kantor : Jl. Sibuhuan-Riau No. 17 </h4>
                            <small class="">Email : desasayurmatua@gmail.com | No. Telp : 081127381638</small>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-5">
                        <div class="col-12 mt-5 text-center">
                            <h4 class="font-weight-bold ">Surat Pengantar
                            </h4>
                            <hr width="25%">
                            <h6 class="font-weight-light">NO : <?= $nosurat->nomorsurat; ?> </h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col">
                                    <p class="ml-3"> Yang bertanda tangan di bawah ini Kepala Desa Sayur Matua, Kecamatann Barumun Tengah, Kabupaten Padang Lawas </p>
                                    <p> ini menerangkan bahwa :</p>
                                </div>
                            </div>
                            <div class="row  mt-3">
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
                            <div class="row mt-3">
                                <div class="col">
                                    <p class="ml-3"> Orang tersebut di atas, adalah benar benar warga Desa Sayur Matua, Kecamatann Barumun Tengah, Kabupaten Padang Lawas
                                        surat pengantar ini dibuat sebagai kelengkapan pengurusan <span class="font-weight-bold">KTP (Kartu Tanda Penduduk)</span>. Surat ini berlaku dari tanggal <span class="font-weight-bold"><?= tgl_indo($tanggal->tgl_approve); ?> </span> dengan tanggal <span class="font-weight-bold"><?= tgl_indo($tanggal->tgl_habismasa); ?></span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col"></div>
                                <div class="col-md-4">
                                    <div class="pull-right m-t-30 text-center">
                                        <p>Desa Sayur Matua, <?= tgl_indo($tanggal->tgl_approve); ?> </p>
                                        <hr>
                                        <p>Tanda Tangan</p>
                                        <img src="<?= base_url() . 'assets/images/ttd.png'; ?>" style="width:50%;">
                                        <h5 class="">Ahmad Husaian Siregar</h5>
                                        <hr class="m-0">
                                        <small class="mb-0">Kepala Desa Sayur Matua</small>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <hr>
                                    <div class="text-right">
                                        <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
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
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->