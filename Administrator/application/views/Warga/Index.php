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
                <h4 class="text-themecolor">Data Penduduk</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="<?= base_url('Admin/tambah'); ?>"> <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Tambah Data</button></a>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Penduduk</h4>
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
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
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->