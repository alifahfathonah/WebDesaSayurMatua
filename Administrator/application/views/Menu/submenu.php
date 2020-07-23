<section class="content">
    <div class="container-fluid">
        <!-- Hover Rows -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?= $this->session->flashdata("pesan"); ?>

                <?= form_error("judul", "<div class='alert bg-orange alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>", "</div>"); ?>
                <?= form_error("menu_id", "<div class='alert bg-orange alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>", "</div>"); ?>
                <?= form_error("url", "<div class='alert bg-orange alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>", "</div>"); ?>
                <?= form_error("icon", "<div class='alert bg-orange alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>", "</div>"); ?>

                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-lg-8">

                                <h2>
                                    DAFTAR SUBMENU
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
                                    <th>Judul</th>
                                    <th>Menu</th>
                                    <th>Url</th>
                                    <th>Icon</th>
                                    <th>Aktif</th>
                                    <th>ACTION</th>
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
                                        <td><?= $m['is_active']; ?></td>
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
                <h4 class="modal-title" id="defaultModalLabel">Form Tambah Sub Menu</h4>
            </div>
            <form method="POST" action="<?= base_url('Menu/submenu'); ?>">
                <div class="modal-body">
                    <!-- INPUTAN NAMA SUB MENU -->
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="judul" class="form-control" placeholder="Masukan judul sub menu" value="<?= set_value('judul'); ?>">

                        </div>
                        <?= form_error('judul', '<label id="description-error" class="error" for="description">', '</label>'); ?>
                    </div>
                    <!-- END INPUTAN NAMA SUB MENU -->

                    <!-- INPUTAN MENU -->
                    <div class="form-group">
                        <div class="form-line">
                            <?php
                            echo combobox('menu_id', 'admin_menu', 'menu', 'id', '');
                            ?>
                        </div>
                        <?= form_error('menu_id', '<label id="description-error" class="error" for="description">', '</label>'); ?>
                    </div>
                    <!-- END INPUTAN MENU -->

                    <!-- INPUTAN URL -->
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="url" class="form-control" placeholder="Masukan url sub menu" value="<?= set_value('url'); ?>">

                        </div>
                        <?= form_error('url', '<label id="description-error" class="error" for="description">', '</label>'); ?>
                    </div>
                    <!-- END INPUTAN URL MENU -->

                    <!-- INPUTAN ICON -->
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="icon" class="form-control" placeholder="Masukan icon sub menu" value="<?= set_value('icon'); ?>">

                        </div>
                        <?= form_error('icon', '<label id="description-error" class="error" for="description">', '</label>'); ?>
                    </div>
                    <!-- END INPUTAN URL MENU -->

                    <!-- INPUTAN ICON -->

                    <input type="checkbox" id="basic_checkbox_2" class="filled-in" name="is_active" value="1" />
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