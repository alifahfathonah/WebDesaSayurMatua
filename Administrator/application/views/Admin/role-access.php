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
                <h4 class="text-themecolor">Role Akses</h4>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <?= $this->session->flashdata("pesan"); ?>
                <div class="ribbon-wrapper card">
                    <h4 class="card-title">Daftar Role</h4>
                    <div class="ribbon ribbon-default"><?= $role['role']; ?></div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Menu</th>
                                <th class="text-nowrap">Akses</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($menu as $sm) { ?>
                                <tr>
                                    <td><?= ++$no ?></td>
                                    <td><?= $sm['menu']; ?></td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input changeacc" value="" id="defaultCheck<?= $no; ?>" <?= check_access($role['role_id'], $sm['id']); ?> data-role="<?= $role['role_id']; ?>" data-menu="<?= $sm['id']; ?>">
                                            <label class=" custom-control-label" for="defaultCheck<?= $no; ?>"></label>
                                        </div>
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
<!-- #END# Hover Rows -->