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
                <?= $this->session->flashdata("pesan"); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" id="1">Selamat Datang, <?= $penduduk['Nama']; ?></h4>

                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <!-- column -->
            <div class="col-lg-3 col-md-6">
                <!-- Card -->
                <div class="card">
                    <img class="card-img-top img-responsive" src="../assets/images/big/img1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Edit Profile</h4>
                        <p class="card-text">Fasilitas untuk mengubah data pribadi anda</p>
                        <a href="<?= base_url('Penduduk/edit/') . $penduduk['NIK']; ?>" class="btn btn-primary">Edit</a>
                    </div>
                </div>
                <!-- Card -->
            </div>
            <!-- column -->
            <!-- column -->
            <div class="col-lg-3 col-md-6">
                <!-- Card -->
                <div class="card">
                    <img class="card-img-top img-responsive" src="../assets/images/big/img2.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Request Surat Pengantar KTP</h4>
                        <p class="card-text">Reques surat ini biasanya akan di kerjakan selama 7 hari kerja, apa bila siap akan muncul tombol print</p>
                        <a href="<?= base_url('Penduduk/requestktp/') . $penduduk['NIK']; ?>" class="btn btn-primary <?= $button; ?>"><?= $txtbutton; ?></a>
                        <?php
                        if ($status) { ?>
                            <a href="<?= base_url('Penduduk/KTP/') . $penduduk['NIK']; ?>" class="btn btn-success btn-circle float-right"><i class="fa fa-print"></i></a>
                        <?php } ?>
                    </div>
                </div>
                <!-- Card -->
            </div>
            <!-- column -->
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->