<section class="content">
    <div class="container-fluid">

        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Daftar Warga
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
                                        <th>NIK</th>
                                        <th>NKK</th>
                                        <th>Nama </th>
                                        <th>Jenis Kelamin </th>
                                        <th>Alamat</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Agama </th>
                                        <th>Pekerjaan </th>
                                        <th>Pendidikan Terakhir</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>NKK</th>
                                        <th>Nama </th>
                                        <th>Jenis Kelamin </th>
                                        <th>Alamat</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Agama </th>
                                        <th>Pekerjaan </th>
                                        <th>Pendidikan Terakhir</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($users as $key => $value) { ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $value->NIK; ?></td>
                                            <td><?= $value->NKK; ?></td>
                                            <td><?= $value->Nama; ?></td>
                                            <td><?= sex($value->Sex); ?></td>
                                            <td><?= $value->Alamat; ?></td>
                                            <td><?= $value->TempatLahir; ?></td>
                                            <td><?= tgl_indo($value->TglLahir); ?></td>
                                            <td><?= $value->Agama; ?></td>
                                            <td><?= $value->Pekerjaan; ?></td>
                                            <td><?= $value->PendidikanTerakhir; ?></td>
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
        </div>
</section>
<!-- #END# Basic Examples -->