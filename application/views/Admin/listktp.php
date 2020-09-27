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
                <h4 class="text-themecolor">Daftar Pekerjaan</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#defaultModal"><i class="fa fa-plus-circle"></i> Tambah Pekerjaan</button>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row">

            <div class="col-12">
                <?= $this->session->flashdata("pesan"); ?>

                <?= form_error("namaPekerjaan", "<div class='alert alert-warning alert-rounded mb-3'>", "
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>×</span> </button></div>
                <div class='card'>"); ?>
                <?= form_error("namaPekerjaan_edit",  "<div class='alert alert-warning alert-rounded mb-3'>", "
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>×</span> </button></div>
                <div class='card'>");  ?>


                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daftar Pekerjaan</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered w-75">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 5%;">NO</th>
                                        <th>NIK</th>
                                        <th>NAMA</th>
                                        <th class="w-25 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($list as $key) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td><?= $key['NIK']; ?></td>
                                            <td><?= $key['Nama']; ?></td>
                                            <!-- <td><?= $value->pekerjaan_nama; ?></td> -->
                                            <td>
                                                <a href="<?= base_url('Admin/approvektp/') . $key['id_request']; ?>">
                                                    <button type="button" class="btn btn-success"><i class="fa fa-check" alt="EDIT"></i> Approve</button>
                                                </a>
                                                <a href="#">
                                                    <button type="button" class="btn btn-danger"><i class="fa fa-times" alt="EDIT"></i> Batal</button>
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
</div>