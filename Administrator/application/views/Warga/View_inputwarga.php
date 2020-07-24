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
                <h4 class="text-themecolor">Datatable</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-search"></i> Lihat Data</button>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Default Basic Forms</h4>
                        <h6 class="card-subtitle"> All bootstrap element classies </h6>
                        <?php
                        if (validation_errors()) {
                            echo "<div class='alert alert-danger'>" . validation_errors() . "</div>";
                        }
                        ?>
                        <form class="form">
                            <div class="form-group row">
                                <label for="nik" class="col-2 col-form-label">NIK</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" placeholder="Masukan NIK anda" name="nik" id="nik">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nkk" class="col-2 col-form-label">NKK</label>
                                <div class="col-10">
                                    <input type="text" id="nkk" class="form-control" placeholder="Masukan Nomor Kartu Keluarga (NKK) anda" name="nkk">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-2 col-form-label">Nama</label>
                                <div class="col-10">
                                    <input type="text" id="nama" class="form-control" placeholder="Masukan lengkap anda" name="nama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="laki" name="gender" class="custom-control-input">
                                                <label class="custom-control-label" for="customgender1">Laki-laki</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="perempuan" name="gender" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio2">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="agama" class="col-2 col-form-label">Agama</label>
                                <div class="col-10">
                                    <?php
                                    echo combobox('agama', 'agama', 'tb_agama', 'agama_nama', 'agama_id', 'a');
                                    ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Alamat</label>
                                <div class="col-10">
                                    <textarea class="form-control" name="alamat" rows="5" id="alamat" placeholder="Masukan alamat anda..."></textarea></div>
                            </div>

                            <div class="form-group row">
                                <label for="tmptlahir" class="col-2 col-form-label">Tempat lahir</label>
                                <div class="col-2">
                                    <input class="form-control" type="text" id="tmptlahir" name="tmptlahir" placeholder="Masukan tempat lahir anda">
                                </div>
                                <label for="tgllahir" class="col-1 col-form-label">Tanggal Lahir</label>
                                <div class="col-4">
                                    <input class="form-control" type="date" name="tgllahir" id="tgllahir">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="job" class="col-2 col-form-label">Pekerjaan</label>
                                <div class="col-10">
                                    <?php
                                    echo combobox('pekerjaan', 'job', 'tb_pekerjaan', 'pekerjaan_nama', 'pekerjaan_id', '');
                                    ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="pendidikan" class="col-2 col-form-label">Pendidikan terakhir</label>
                                <div class="col-10">
                                    <select name="pendidikan" id="pendidikan" class="custom-select col-6">
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
                                    </select> </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-lg-2">
                                    <button type="button" class="btn btn-block btn-lg btn-info">Tambah data</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


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
                                    // echo combobox('agama', 'tb_agama', 'agama_nama', 'agama_id', '');
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
                                            <input type="text" id="tmptlahir" class="form-control" name="tmptlahir">
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
                                            // echo combobox('pekerjaan', 'tb_pekerjaan', 'pekerjaan_nama', 'pekerjaan_id', '');
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