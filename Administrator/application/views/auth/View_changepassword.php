<body class="fp-page">
    <div class="fp-box">
        <div class="logo">
            <a href="javascript:void(0);">Ganti Password</a>
            <small>
            </small>
        </div>
        <div class="card">
            <div class="body">
                <?= $this->session->flashdata('pesan'); ?>
                <form id="forgot_password" action="<?= base_url('Auth/changePassword'); ?>" method="POST">
                    <div class="msg">
                        <h3><?= $this->session->userdata('reset'); ?></h3>
                        <?= $this->session->userdata('name'); ?>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="Password1" placeholder="Password" autofocus>
                        </div>
                        <?= form_error('Password1', '<label id="description-error" class="error" for="description">', '</label>'); ?>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="Password2" placeholder="Konfirmasi Password">
                        </div>
                        <?= form_error('Password2', '<label id="description-error" class="error" for="description">', '</label>'); ?>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">RESET PASSWORD</button>


                </form>
            </div>
        </div>
    </div>