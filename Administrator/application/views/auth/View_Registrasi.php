<!-- Horizontal Layout -->
<!-- <section class="content"> -->
<div class="row clearfix m-t-105">
    <div class="col-lg-3">
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="card">
            <div class="header bg-blue">
                <h2>
                    Input Admin
                </h2>

            </div>

            <div class="body">



                <form class="form-horizontal" method="POST" action="">
                    <?= $this->session->flashdata('pesan'); ?>

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
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Username">Username</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="Username" class="form-control" placeholder="Masukan Username anda" name="Username" value="<?= set_value('Username'); ?>">
                                </div>
                                <?= form_error('Username', '<label id="description-error" class="error" for="description">', '</label>'); ?>
                            </div>
                        </div>
                    </div>

                    <!-- NKK -->
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Username">Email</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="Email" class="form-control" placeholder="Masukan Email anda" name="Email" value="<?= set_value('Email'); ?>">
                                </div>
                                <?= form_error('Email', '<label id="description-error" class="error" for="description">', '</label>'); ?>
                            </div>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Password">Password</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="Password" class="form-control" placeholder="Masukan Password" name="Password">
                                </div>
                                <?= form_error('Password', '<label id="description-error" class="error" for="description">', '</label>'); ?>
                            </div>
                        </div>
                    </div>
                    <!-- Password -->
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Password2">Konfirmasi Password</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="Password2" class="form-control" placeholder="Konfirmas password" name="Password2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Daftar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
    </div>
</div>
<!-- </section> -->