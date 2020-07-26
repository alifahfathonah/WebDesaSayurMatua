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
                <h4 class="text-themecolor">Daftar Pekerjaan</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#defaultModal"><i class="fa fa-plus-circle"></i> Tambah Pekerjaan</button>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row">

            <div class="col-12">
                <?= $this->session->flashdata("pesan"); ?>

                <?= form_error("namaPekerjaan", "<div class='alert alert-warning alert-rounded mb-3'>", "
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>×</span> </button></div>
                <div class='card'>"); ?>
                <?= form_error("namaPekerjaan_edit",  "<div class='alert alert-warning alert-rounded mb-3'>", "
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>×</span> </button></div>
                <div class='card'>");  ?>


                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daftar Pekerjaan</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>ID PEKERJAAN</th>
                                        <th>NAMA PEKERJAAN</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $key => $value) { ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $value->pekerjaan_id; ?></td>
                                            <td><?= $value->pekerjaan_nama; ?></td>
                                            <td>
                                                <a href="#">
                                                    <button type="button" class="btn btn-info btn-circle edit" data-toggle="modal" data-target="#editModal" data-id="<?= $value->pekerjaan_id; ?>" data-job="<?= $value->pekerjaan_nama; ?>"><i class="fa fa-edit" alt="EDIT"></i></button>
                                                </a>
                                                <a href="<?= base_url('Pekerjaan/delete/') . $value->pekerjaan_id; ?>">
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
    </div>


    <!-- INSERT -->
    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Form Pekerjaan</h4>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="idPekerjaan" id="idPekerjaan" class="form-control" placeholder="Masukan ID pekerjaan" value="PKJ<?php echo sprintf("%04s", $kode_barang) ?>" readonly>
                            </div>
                            <?= form_error('idPekerjaan', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="namaPekerjaan" class="form-control" placeholder="Masukan nama pekerjaan" value="<?= set_value('namaPekerjaan'); ?>">
                            </div>
                            <?= form_error('namaPekerjaan', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect">Tambah</button>
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- INSERT -->

    <!-- FORM EDIT -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Form Edit Pekerjaan</h4>
                </div>
                <form method="POST" action="<?= base_url('Pekerjaan/edit'); ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="idPekerjaan_edit" id="idPekerjaan_edit" class="form-control" readonly>
                            </div>
                            <?= form_error('idPekerjaan_edit', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class=" form-group">
                            <div class="form-line">
                                <input type="text" name="namaPekerjaan_edit" id="namaPekerjaan_edit" class="form-control" placeholder="Masukan nama pekerjaan" value="<?= set_value('namaPekerjaan'); ?>">
                            </div>
                            <?= form_error('namaPekerjaan_edit', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect">Edit</button>
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END FORM EDIT -->
</div>