<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                JQUERY DATATABLES
                <small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small>
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            BASIC EXAMPLE
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Admin</th>
                                        <th>Nama Admin</th>
                                        <th>Email Admin</th>
                                        <th>Password</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Admin</th>
                                        <th>Nama Admin</th>
                                        <th>Email Admin</th>
                                        <th>Password</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($users as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key + 1 ?></td>
                                            <td><?php echo $value->id_user; ?></td>
                                            <td><?php echo $value->nama_user; ?></td>
                                            <td><?php echo $value->email_user; ?></td>
                                            <td><?php echo $value->password; ?></td>
                                            <td>
                                                <button type="button" class="btn bg-light-blue btn-circle waves-effect waves-circle waves-float">
                                                    <a href="<?= site_url('Admin/edit/' . $value->id_user); ?>">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                </button>

                                                <button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                                                    <a href="<?= site_url('Admin/delete/' . $value->id_user); ?>">
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
        </div>
</section>
<!-- #END# Basic Examples -->