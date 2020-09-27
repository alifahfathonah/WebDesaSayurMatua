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
                <h4 class="text-themecolor"><?= $judul; ?></h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="<?= base_url('Surat/TambahSuratMasuk'); ?>"> <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Tambah Data</button></a>
                </div>
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
                <?= $this->session->flashdata('pesan'); ?>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?= $judul; ?></h4>
                        <div class="table-responsive">
                            <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Surat</th>
                                        <th>Judul Surat</th>
                                        <th>Asal Surat </th>
                                        <th>Tanggal Masuk Surat </th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Surat</th>
                                        <th>Judul Surat</th>
                                        <th>Asal Surat </th>
                                        <th>Tanggal Masuk Surat </th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($surat as $key => $value) { ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $value->suratmasuk_no; ?></td>
                                            <td><?= $value->suratmasuk_judul; ?></td>
                                            <td><?= $value->suratmasuk_asal; ?></td>
                                            <td><?= tgl_indo($value->suratmasuk_tanggal); ?></td>

                                            <td>
                                                <a href="<?= base_url("Surat/DetailSuratMasuk/") . $value->suratmasuk_id; ?>">
                                                    <button type="button" class="btn btn-warning btn-circle"><i class="fa fa-file-text-o" alt="DETAIL"></i></button>
                                                </a>
                                                <a href="<?= base_url("Surat/EditSuratMasuk/") . $value->suratmasuk_id; ?>">
                                                    <button type="button" class="btn btn-info btn-circle"><i class="fa fa-edit" alt="EDIT"></i></button>
                                                </a>
                                                <a href="<?= base_url("Surat/DeleteSuratMasuk/") . $value->suratmasuk_id; ?>">
                                                    <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->