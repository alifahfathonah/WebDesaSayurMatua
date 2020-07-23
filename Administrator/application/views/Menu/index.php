<section class="content">
    <div class="container-fluid">
        <!-- Hover Rows -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?= $this->session->flashdata("pesan"); ?>
                <?= form_error("menu", "<div class='alert bg-orange alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>", "</div>"); ?>
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-lg-8">

                                <h2>
                                    DAFTAR MENU
                                </h2>

                            </div>
                            <div class="col-lg-4">
                                <button type="button" class="btn btn-primary waves-effect" style="float :right;" data-toggle="modal" data-target="#defaultModal">
                                    <i class="material-icons">add</i>
                                    <span>Tambah Menu</span>
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="body table-responsive m-t-20">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Menu</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($menu as $m) { ?>
                                    <tr>

                                        <td><?= ++$no ?></td>
                                        <td><?= $m['menu']; ?></td>
                                        <td>
                                            <button type="button" class="btn bg-light-blue btn-circle waves-effect waves-circle waves-float">
                                                <a href="#">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                            </button>

                                            <button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                                                <a href="#">
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
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Form Tambah Menu</h4>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="menu" class="form-control" placeholder="Masukan nama menu" value="<?= set_value('menu'); ?>">

                        </div>
                        <?= form_error('menu', '<label id="description-error" class="error" for="description">', '</label>'); ?>
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