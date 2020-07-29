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
                <h4 class="text-themecolor">Daftar Menu</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#defaultModal"><i class="fa fa-plus-circle"></i> Tambah Menu</button>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->

        <div class="row">

            <div class="col-12">
                <?= $this->session->flashdata("pesan"); ?>
                <?= form_error("menu", "<div class='alert alert-warning alert-rounded mb-3'>", "
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>×</span> </button></div>
                <div class='card'>"); ?>


                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daftar Role</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Menu</th>
                                        <th class="text-nowrap">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($menu as $m) { ?>
                                        <tr>
                                            <td><?= ++$no ?></td>
                                            <td><?= $m['menu']; ?></td>
                                            <td class="text-nowrap">
                                                <a href="#">
                                                    <button type="button" class="btn btn-info btn-circle"><i class="fa fa-edit" alt="EDIT"></i></button>
                                                </a>
                                                <a href="<?= base_url('Menu/deletemenu/') . $m['id']; ?>">
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
                            <?= form_error('menu', '<small class="text-danger">', '</small>'); ?>
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