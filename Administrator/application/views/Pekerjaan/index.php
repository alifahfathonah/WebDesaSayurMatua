<section class="content">
    <div class="container-fluid">
        <!-- Hover Rows -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?= $this->session->flashdata("pesan"); ?>

                <?= form_error("namaPekerjaan", "<div class='alert bg-orange alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>", "</div>"); ?>
                <?= form_error("namaPekerjaan_edit", "<div class='alert bg-orange alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>", "</div>"); ?>
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-lg-8">
                                <h2>
                                    DAFTAR PEKERJAAN
                                </h2>
                            </div>
                            <div class="col-lg-4">
                                <button type="button" class="btn btn-primary waves-effect float-right" data-toggle="modal" data-target="#defaultModal">
                                    <i class="material-icons">add</i>
                                    <span>Tambah Pekerjaan</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="body table-responsive m-t-20">
                        <table class="table table-hover">
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
                                            <button type="button" class="btn bg-light-blue btn-circle waves-effect waves-circle waves-float edit" data-toggle="modal" data-target="#editModal" data-id="<?= $value->pekerjaan_id; ?>" data-job="<?= $value->pekerjaan_nama; ?>">
                                                <a href="#">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                            </button>

                                            <button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                                                <a href="<?= base_url('Pekerjaan/delete/') . $value->pekerjaan_id; ?>">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Hover Rows -->
    </div>
</section>


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
                        <?= form_error('idPekerjaan', '<label id="description-error" class="error" for="description">', '</label>'); ?>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="namaPekerjaan" class="form-control" placeholder="Masukan nama pekerjaan" value="<?= set_value('namaPekerjaan'); ?>">
                        </div>
                        <?= form_error('namaPekerjaan', '<label id="description-error" class="error" for="description">', '</label>'); ?>
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
                        <?= form_error('idPekerjaan_edit', '<label id="description-error" class="error" for="description">', '</label>'); ?>
                    </div>
                    <div class=" form-group">
                        <div class="form-line">
                            <input type="text" name="namaPekerjaan_edit" id="namaPekerjaan_edit" class="form-control" placeholder="Masukan nama pekerjaan" value="<?= set_value('namaPekerjaan'); ?>">
                        </div>
                        <?= form_error('namaPekerjaan_edit', '<label id="description-error" class="error" for="description">', '</label>'); ?>
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