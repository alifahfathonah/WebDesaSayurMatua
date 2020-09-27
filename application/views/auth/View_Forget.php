<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<section id="wrapper">
    <div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">
        <div class="login-box card">
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <form class="form-horizontal form-material" id="loginform" action="<?= base_url('Auth/forget'); ?>" method="POST">
                    <h3 class="box-title m-b-20">Reset Password</h3>
                    <div class="form-group">
                        <p class="text-muted">
                            <small> Kami akan mengirimkan email konfirmasi pergantian password hanya ke email yang telah terdaftar disistem kami</small>
                        </p>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" class="form-control" name="Email" placeholder="Email" autofocus>
                        </div>
                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group text-center">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <a href="<?= base_url('Auth'); ?>" class="text-info m-l-5"><b>LOGIN</b></a>
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