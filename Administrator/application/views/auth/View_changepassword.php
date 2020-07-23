<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<section id="wrapper">
    <div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">
        <div class="login-box card">
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <form class="form-horizontal form-material" id="loginform" action="<?= base_url('Auth/changePassword'); ?>" method="POST">
                    <h2 class=" box-title m-b-20 text-center">Reset Password</h2>
                    <h5 class="text-center font-weight-bold"><?= $this->session->userdata('reset'); ?></h5>
                    <p class="text-center"><?= $this->session->userdata('name'); ?></p>
                    <div class=" form-group">
                        <div class="col-xs-12">
                            <input type="password" class="form-control" name="Password1" placeholder="Password" autofocus>
                        </div>
                        <?= form_error('Password1', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="password" class="form-control" name="Password2" placeholder="Konfirmasi Password">
                        </div>
                        <?= form_error('Password2', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group text-center">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">RESET PASSWORD</button>
                        </div>
                    </div>

            </div>
            </form>

        </div>
    </div>
</section>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->