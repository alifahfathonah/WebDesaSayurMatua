<div class="page-wrapper" style="min-height: 618px;">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md align-self-center">
                <h4 class="text-themecolor">Profile</h4>
            </div>

        </div>

        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-12">
                <?= $this->session->flashdata("pesan"); ?>
                <?= form_error('NewPassword', '<div class="alert alert-danger alert-rounded mb-3">', '
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>'); ?>
            </div>
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <center class="m-t-30"> <img src="<?= base_url(); ?>assets/images/profile/<?= $admin['admin_image']; ?>" class="img-circle" width="150">
                            <h4 class="card-title m-t-10"><?= $admin['admin_nama']; ?></h4>
                            <h6 class="card-subtitle"><?= $admin['admin_user']; ?></h6>
                            <div class="row text-center justify-content-md-center">
                                <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i>
                                        <font class="font-medium">254</font>
                                    </a></div>
                                <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i>
                                        <font class="font-medium">54</font>
                                    </a></div>
                            </div>
                        </center>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div class="card-body">
                        <small class="text-muted">Email </small>
                        <h6><?= $admin['admin_email']; ?></h6>
                        <small class="text-muted">Tanggal akun</small>
                        <h6><?= date('d F Y', $admin['admin_datecreate']); ?></h6>

                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs profile-tab" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Timeline</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#resetpassword" role="tab">Ganti Password</a> </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel">
                            <div class="card-body">
                                <div class="profiletimeline">
                                    <div class="sl-item">
                                        <div class="sl-left"> <img src="../assets/images/users/1.jpg" alt="user" class="img-circle"> </div>
                                        <div class="sl-right">
                                            <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                <p>assign a new task <a href="javascript:void(0)"> Design weblayout</a></p>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-6 m-b-20"><img src="../assets/images/big/img1.jpg" class="img-responsive radius"></div>
                                                    <div class="col-lg-3 col-md-6 m-b-20"><img src="../assets/images/big/img2.jpg" class="img-responsive radius"></div>
                                                    <div class="col-lg-3 col-md-6 m-b-20"><img src="../assets/images/big/img3.jpg" class="img-responsive radius"></div>
                                                    <div class="col-lg-3 col-md-6 m-b-20"><img src="../assets/images/big/img4.jpg" class="img-responsive radius"></div>
                                                </div>
                                                <div class="like-comm"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="resetpassword" role="tabpanel">
                            <div class="card-body">
                                <form class="form-horizontal form-material" method="POST" action="<?= base_url('User/changePassword'); ?>">
                                    <div class="form-group">
                                        <label class="col-md-12">Password Lama</label>
                                        <div class="col-md-12">
                                            <input type="password" class="form-control" id="OldPassword" name="OldPassword" placeholder="Masukan Password Lama" class="form-control form-control-line">
                                            <?= form_error('OldPassword', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Password Baru</label>
                                        <div class="col-md-12">
                                            <input type="password" class="form-control" id="NewPassword" name="NewPassword" placeholder="Masukan Password Baru" class="form-control form-control-line">
                                            <?= form_error('NewPassword', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="NewPasswordConfirm" class="col-md-12">Password Baru</label>
                                        <div class="col-md-12">
                                            <input type="password" class="form-control" id="NewPasswordConfirm" name="NewPasswordConfirm" placeholder="Masukan Password Konfirmasi " class="form-control form-control-line">
                                            <?= form_error('NewPasswordConfirm', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Ganti Password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->

    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>