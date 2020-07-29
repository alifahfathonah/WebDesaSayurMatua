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
                    <a href="<?= base_url("Auth/register"); ?>"> <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Tambah Admin</button></a>
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
            <div class="col-12"> <?= $this->session->flashdata("pesan"); ?>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Halaman Admin</h4>
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Admin</th>
                                        <th>Username Admin</th>
                                        <th>Admin Email </th>
                                        <th>Hak Akses </th>
                                        <th>Photo Admin</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Admin</th>
                                        <th>Username Admin</th>
                                        <th>Admin Email </th>
                                        <th>Hak Akses </th>
                                        <th>Photo Admin</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($list as $key => $value) { ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $value->admin_nama; ?></td>
                                            <td><?= $value->admin_user; ?></td>
                                            <td><?= $value->admin_email; ?></td>
                                            <td><?= $value->role; ?></td>

                                            <td>
                                                <img src="<?= base_url() . 'assets/images/profile/' . $value->admin_image; ?>" alt="<?= $value->admin_nama; ?>" class="img-thumbnail w-50">
                                            </td>
                                            <td>

                                                <button type="button" class="btn btn-success btn-rounded changeaccadmin" data-toggle="modal" data-target="#editModal" data-id="<?= $value->admin_id; ?>" data-role="<?= $value->role_id; ?>"><i class="fa fa-gears"></i> Ganti Akses</button>
                                                <a href="<?= base_url('Admin/deleteuser/') . $value->admin_id; ?>">
                                                    <button type="button" class="btn btn-danger btn-rounded"><i class="fa fa-trash"></i> Hapus</button>
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
    <!-- FORM EDIT -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Edit Hak Akses Admin</h4>
                </div>
                <form method="POST" action="<?= base_url('Admin/changeaccessadmin'); ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="form-line">
                                <label> ID Admin </label>
                                <input type="text" name="idadmin_edit" id="idadmin_edit" class="form-control" readonly>
                            </div>
                            <?= form_error('idadmin_edit', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class=" form-group">
                            <div class="form-line">
                                <label>Hak Akses </label><br>
                                <?php
                                echo combobox('hakakses', 'hakaksesadmin', 'admin_role', 'role', 'role_id', '');
                                ?>
                            </div>
                            <?= form_error('hakakses', '<small class="text-danger">', '</small>'); ?>
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
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->