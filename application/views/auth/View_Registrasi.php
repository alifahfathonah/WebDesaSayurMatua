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
                        <?= $this->session->flashdata('pesan'); ?>
                        <h4 class="card-title">Form Data Admin</h4>
                        <h6 class="card-subtitle "> Mohon data diisi dengan sebenar-benarnya</h6>
                        <hr class="mb-4" />
                        <div class="row">
                            <div class="col-8">
                                <form class="form-horizontal" method="POST" action="">
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="Nama">Nama</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <!-- <input type="hidden" name="nik_hidden" value="<?php
                                                                                                        // if (isset($user->id_user)) {
                                                                                                        //                                                         echo $user->id_user;}
                                                                                                        ?>"> -->

                                                    <input type="text" id="Nama" class="form-control" placeholder="Masukan nama anda" name="Nama" value="<?= set_value('Nama'); ?>">
                                                </div>
                                                <?= form_error('Nama', '<label id="description-error" class="error" for="description">', '</label>'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- NKK -->
                                    <div class="row clearfix">

                                        <label for="Username" class="col-2 col-form-label">Username</label>

                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="Username" class="form-control" placeholder="Masukan Username anda" name="Username" value="<?= set_value('Username'); ?>">
                                                </div>
                                                <?= form_error('Username', '<small class="text-danger"', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- NKK -->
                                    <div class="row">

                                        <label for="Username" class="col-2 col-form-label">Email</label>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="Email" class="form-control" placeholder="Masukan Email anda" name="Email" value="<?= set_value('Email'); ?>">
                                                </div>
                                                <?= form_error('Email', '<small class="text-danger"', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Password -->
                                    <div class="row clearfix">

                                        <label for="Password" class="col-2 col-form-label">Password</label>

                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="Password" class="form-control" placeholder="Masukan Password" name="Password">
                                                </div>
                                                <?= form_error('Password', '<small class="text-danger"', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Password -->
                                    <div class="row clearfix">

                                        <label for="Password2" class="col-2 col-form-label">Konfirmasi Password</label>

                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="Password2" class="form-control" placeholder="Konfirmas password" name="Password2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <label for="Password2" class="col-2 col-form-label"></label>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">

                                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Tambah</button>
                                            <a href="<?= base_url("User"); ?>"><button type="button" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- </section> -->