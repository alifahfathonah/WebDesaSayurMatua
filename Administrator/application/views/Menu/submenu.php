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
                <h4 class="text-themecolor">Daftar Submenu</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#defaultModal"><i class="fa fa-plus-circle"></i> Tambah Sub Menu</button>
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
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Judul</th>
                                        <th>Menu</th>
                                        <th>Url</th>
                                        <th>Icon</th>
                                        <th class="text-center">Aktif</th>
                                        <th class="text-center">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($subMenu as $m) { ?>
                                        <tr>

                                            <td><?= ++$no ?></td>
                                            <td><?= $m['title']; ?></td>
                                            <td><?= $m['menu']; ?></td>
                                            <td><?= $m['url']; ?></td>
                                            <td><?= $m['icon']; ?></td>
                                            <td class="text-center"><?= $m['is_active']; ?></td>
                                            <td class="text-nowrap text-center">
                                                <a href="#">
                                                    <button type="button" class="btn btn-info btn-circle"><i class="fa fa-edit" alt="EDIT"></i></button>
                                                </a>
                                                <a href="#">
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
                    <h4 class="modal-title" id="defaultModalLabel">Form Tambah Sub Menu</h4>
                </div>
                <form method="POST" action="<?= base_url('Menu/submenu'); ?>">
                    <div class="modal-body">
                        <!-- INPUTAN NAMA SUB MENU -->
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="judul" class="form-control" placeholder="Masukan judul sub menu" value="<?= set_value('judul'); ?>">

                            </div>
                            <?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <!-- END INPUTAN NAMA SUB MENU -->

                        <!-- INPUTAN MENU -->
                        <div class="form-group">
                            <div class="form-line">
                                <?php
                                echo combobox('menu_id', 'menu', 'admin_menu', 'menu', 'id', '');
                                ?>
                            </div>
                            <?= form_error('menu_id', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <!-- END INPUTAN MENU -->

                        <!-- INPUTAN URL -->
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="url" class="form-control" placeholder="Masukan url sub menu" value="<?= set_value('url'); ?>">

                            </div>
                            <?= form_error('url', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <!-- END INPUTAN URL MENU -->

                        <!-- INPUTAN ICON -->
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="icon" class="form-control" placeholder="Masukan icon sub menu" value="<?= set_value('icon'); ?>">

                            </div>
                            <?= form_error('icon', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <!-- END INPUTAN URL MENU -->

                        <!-- INPUTAN ICON -->

                        <input type="checkbox" id="basic_checkbox_2" class="filled-in" name="is_active" value="0" />
                        <label for="basic_checkbox_2">
                            <p class="font-bold">Aktif ?</p>
                        </label>
                        <!-- END INPUTAN URL MENU -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect">Tambah</button>
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>