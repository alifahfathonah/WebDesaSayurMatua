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
                <h4 class="text-themecolor">Edit Data Penduduk</h4>
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
                if (validation_errors()) {
                    echo "<div class='alert alert-danger'>" . validation_errors() . "</div>";
                }
                ?>
                <div class="card border-primary">
                    <div class="card-body">
                        <h4 class="card-title">Form Edit Data Penduduk</h4>
                        <h6 class="card-subtitle "> Mohon data diisi dengan sebenar-benarnya</h6>
                        <hr class="mb-4" />
                        <form class="form" method="POST">
                            <div class="form-group row">
                                <label for="nik" class="col-2 col-form-label">NIK</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" readonly placeholder="Masukan NIK anda" name="nik" id="nik" value="<?php if (isset($warga->NIK)) {
                                                                                                                                                    echo $warga->NIK;
                                                                                                                                                } ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nkk" class="col-2 col-form-label">NKK</label>
                                <div class="col-10">
                                    <input type="text" id="nkk" class="form-control" placeholder="Masukan Nomor Kartu Keluarga (NKK) anda" name="nkk" value="<?php if (isset($warga->NKK)) {
                                                                                                                                                                    echo $warga->NKK;
                                                                                                                                                                } ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-2 col-form-label">Nama</label>
                                <div class="col-10">
                                    <input type="text" id="nama" class="form-control" placeholder="Masukan lengkap anda" name="nama" value="<?php if (isset($warga->NKK)) {
                                                                                                                                                echo $warga->Nama;
                                                                                                                                            } ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-2">

                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="laki" name="gender" class="custom-control-input" value="L" <?php
                                                                                                                                    if ($warga->Sex == "L") {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?>>
                                                <label class="custom-control-label" for="laki">Laki-laki</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="perempuan" name="gender" class="custom-control-input" value="P" <?php
                                                                                                                                        if ($warga->Sex == "P") {
                                                                                                                                            echo "checked";
                                                                                                                                        } ?>>
                                                <label class="custom-control-label" for="perempuan">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="agama" class="col-2 col-form-label">Agama</label>
                                <div class="col-10">
                                    <?php
                                    echo combobox('agama', 'agama', 'tb_agama', 'agama_nama', 'agama_id', $warga->Agama);
                                    ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Alamat</label>
                                <div class="col-10">
                                    <textarea class="form-control" name="alamat" rows="5" id="alamat" placeholder="Masukan alamat anda..." value=""><?= $warga->Alamat; ?></textarea></div>
                            </div>

                            <div class="form-group row">
                                <label for="tmptlahir" class="col-2 col-form-label">Tempat lahir</label>
                                <div class="col-2">
                                    <input class="form-control" type="text" id="tmptlahir" name="tmptlahir" placeholder="Masukan tempat lahir anda" value="<?= $warga->TempatLahir; ?>">
                                </div>
                                <label for="tgllahir" class="col-1 col-form-label">Tanggal Lahir</label>
                                <div class="col-4">
                                    <input class="form-control" type="date" name="tgllahir" id="tgllahir" value="<?= $warga->TglLahir; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="job" class="col-2 col-form-label">Pekerjaan</label>
                                <div class="col-10">
                                    <?php
                                    echo combobox('pekerjaan', 'job', 'tb_pekerjaan', 'pekerjaan_nama', 'pekerjaan_id', $warga->Pekerjaan);
                                    ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="pendidikan" class="col-2 col-form-label">Pendidikan terakhir</label>
                                <div class="col-10">
                                    <?php
                                    echo comboboxmanual('pendidikan', 'pendidikan', $job, $job, $warga->PendidikanTerakhir); ?>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-block btn-lg btn-info">Ubah data</button>
                                </div>

                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>