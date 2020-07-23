<body class="fp-page">
    <div class="fp-box">
        <div class="logo">
            <a href="javascript:void(0);">Ubah Password</b></a>
            <small>Website Desa Sayur Matua</small>
        </div>
        <div class="card">
            <div class="body">
                <?= $this->session->flashdata('pesan'); ?>
                <form id="forgot_password" action="<?= base_url('Auth/forget'); ?>" method="POST">
                    <div class="msg">
                        Kami akan mengirimkan email konfirmasi pergantian password hanya ke email yang telah terdaftar disistem kami
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="Email" placeholder="Email" autofocus>
                        </div>
                        <?= form_error('email', '<label id="description-error" class="error" for="description">', '</label>'); ?>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">RESET PASSWORD</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="<?= base_url('Auth'); ?>">Login!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>