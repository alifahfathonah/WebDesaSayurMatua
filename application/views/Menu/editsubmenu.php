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
                <h4 class="text-themecolor">Edit SubMenu</h4>
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
                        <h4 class="card-title">Form Sub Menu</h4>
                        <hr class="mb-4" />
                        <form method="POST">
                            <div class="modal-body">
                                <!-- INPUTAN NAMA SUB MENU -->
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Judul</label>
                                        <input type="hidden" name="id" class="form-control" placeholder="Masukan judul sub menu" value="<?= $list->id; ?>">
                                        <input type="text" name="judul" class="form-control" placeholder="Masukan judul sub menu" value="<?= $list->title; ?>">

                                    </div>
                                    <?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <!-- END INPUTAN NAMA SUB MENU -->

                                <!-- INPUTAN MENU -->
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Menu</label><br>
                                        <?php
                                        echo combobox('menu_id', 'menu', 'admin_menu', 'menu', 'id',  $list->menu_id);
                                        ?>
                                    </div>
                                    <?= form_error('menu_id', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <!-- END INPUTAN MENU -->

                                <!-- INPUTAN URL -->
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>URL</label>
                                        <input type="text" name="url" class="form-control" placeholder="Masukan url sub menu" value="<?= $list->url; ?>">

                                    </div>
                                    <?= form_error('url', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <!-- END INPUTAN URL MENU -->

                                <!-- INPUTAN ICON -->
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Icon</label>
                                        <input type="text" name="icon" class="form-control" placeholder="Masukan icon sub menu" value="<?= $list->icon; ?>">

                                    </div>
                                    <?= form_error('icon', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <!-- END INPUTAN URL MENU -->

                                <!-- INPUTAN ICON -->

                                <input type="checkbox" id="basic_checkbox_2" class="filled-in" name="is_active" value="0" <?php if ($list->is_active == 1) {
                                                                                                                                echo "checked";
                                                                                                                            }
                                                                                                                            ?> />
                                <label for="basic_checkbox_2">
                                    <p class="font-bold">Aktif ?</p>
                                </label>
                                <!-- END INPUTAN URL MENU -->
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary waves-effect">UBAH DATA</button>
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">CLOSE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>