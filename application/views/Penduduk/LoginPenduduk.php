<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<section id="wrapper">
    <div class="login-register" style="background-image:url(<?= base_url(); ?>/assets/images/background/login-register.jpg);">
        <div class="login-box card">

            <div class="card-body">
                <form class="form-horizontal form-material" id="loginform" method="POST">
                    <h3 class="box-title m-b-20 align-center">Website Desa Sayur Matua</h3>
                    <?= $this->session->flashdata('pesan'); ?>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input type="text" class="form-control" name="username" placeholder="Username" value="<?= set_value('username'); ?>" autofocus>
                        </div>
                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>

                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <a href="<?= base_url('Auth/forget'); ?>" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> lupa password?</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <div class="col-xs-12 p-b-20">
                            <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">Log In</button>
                        </div>
                    </div>


                </form>
                <form class="form-horizontal" id="recoverform" action="index.html">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recover Password</h3>
                            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" placeholder="Email"> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->