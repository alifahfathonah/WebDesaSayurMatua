<!-- Horizontal Layout -->
<section class="content">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Tambah Data Penduduk
                    </h2>

                </div>

                <div class="body">
                    <?php
                    if (validation_errors()) {
                        echo "<div class='alert alert-danger'>" . validation_errors() . "</div>";
                    }
                    ?>


                    <form class="form-horizontal" method="POST" action="">
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="nik">NIK</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <!-- <input type="hidden" name="nik_hidden" value="<?php
                                                                                            // if (isset($user->id_user)) {
                                                                                            //                                                         echo $user->id_user;}
                                                                                            ?>"> -->

                                        <input type="text" id="Name_user" class="form-control" placeholder="Masukan NIK anda" name="nik">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- NKK -->
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="nkk">NKK</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="nkk" class="form-control" placeholder="Masukan NKK anda" name="nkk">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Nama -->
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="nama">Nama</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="nama" class="form-control" placeholder="Masukan nama panjang anda" name="nama">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sex -->
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label>Jenis Kelamin</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <input type="radio" name="gender" id="laki" class="with-gap" value="L">
                                    <label for="laki">Laki-laki</label>

                                    <input type="radio" name="gender" id="perempuan" class="with-gap" value="P">
                                    <label for="perempuan" class="m-l-20">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <!--Agama -->
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label>Agama</label>
                            </div>
                            <div class="col-lg-4 col-md-10 col-sm-8 col-xs-7">
                                <?php
                                echo combobox('agama', 'tb_agama', 'agama_nama', 'agama_id', '');
                                ?>
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="alamat">Alamat</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea name="alamat" rows="4" id="alamat" class="form-control no-resize" placeholder="Masukan alamat anda..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tempat Lahir -->
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="tmptlahir">Tempat Lahir</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="tmptlahir" class="form-control" placeholder="Masukan tempat lahir anda" name="tmptlahir">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tanggal Lahir -->

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="tgllahir">Tanggal Lahir</label>
                            </div>
                            <div class="col-lg-4 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line" id="bs_datepicker_container">
                                        <input type="text" class="form-control" placeholder="Please choose a date..." name="tgllahir">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Pekerjaan -->
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label>Pekerjaan </label>
                            </div>
                            <div class="col-lg-4 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php
                                        echo combobox('pekerjaan', 'tb_pekerjaan', 'pekerjaan_nama', 'pekerjaan_id', '');
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!--Pendidikan -->
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label>Pendidikan Terakhir </label>
                            </div>
                            <div class="col-lg-4 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" name="Pendidikan">
                                            <option value="">-- PILIH --</option>
                                            <option value="TIDAK TAMAT">TIDAK TAMAT</option>
                                            <option value="TK">10</option>
                                            <option value="SD/SEDERAJAT">SD/SEDERAJAT</option>
                                            <option value="SMP/SEDERAJAT">SMP/SEDERAJAT</option>
                                            <option value="SMA/SEDERAJAT">SMA/SEDERAJAT</option>
                                            <option value="D1">D1</option>
                                            <option value="D3">D3</option>
                                            <option value="S1/SEDERAJAT">S1/SEDERAJAT</option>
                                            <option value="S2/SEDERJAT">S2/SEDERJAT</option>
                                            <option value="S3">S3</option>
                                        </select>
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
    </div>
</section>