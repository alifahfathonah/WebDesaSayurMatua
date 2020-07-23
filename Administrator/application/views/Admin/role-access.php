<section class="content">
    <div class="container-fluid">
        <!-- Hover Rows -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?= $this->session->flashdata("pesan"); ?>
                <div class="card">
                    <div class="header">
                        <h2>
                            ROLE
                        </h2>
                    </div>

                    <div class="body table-responsive">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 padding-0 ">
                            <div class="info-box" style="margin: 0;">
                                <div class="icon bg-red">
                                    <i class="material-icons">account_box</i>
                                </div>
                                <div class="content">
                                    <div class="text">Role</div>
                                    <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20"><?= $role['role'] . '(' . $role['role_id'] . ')'; ?></div>
                                </div>
                            </div>
                        </div>

                        <table class="table table-hover m-t-50">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Menu</th>
                                    <th>Akses</th>
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
                                            <div class="form-check">
                                                <input class="form-check-input changeacc" type="checkbox" value="" id="defaultCheck<?= $no; ?>" <?= check_access($role['role_id'], $sm['id']); ?> data-role="<?= $role['role_id']; ?>" data-menu="<?= $sm['id']; ?>">
                                                <label class="form-check-label" for="defaultCheck<?= $no; ?>">

                                                </label>
                                            </div>
                                        </td>
                                        <!-- <td><input type="checkbox" class=" check-input" <?= check_access($role['role_id'], $sm['id']); ?> data-role="<?= $role['role_id']; ?>" data-menu1="<?= $sm['id']; ?>" />
                                        </td> -->

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