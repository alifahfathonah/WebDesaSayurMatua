<!-- Horizontal Layout -->
<section class="content">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Input Admin
                    </h2>

                </div>
                <div class="body">
                    <form class="form-horizontal" method="POST" action="<?= site_url('Admin/create_action'); ?>">
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="Name_user">Nama Admin</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="hidden" name="id_user" value="<?php if (isset($user->id_user)) {
                                                                                        echo $user->id_user;
                                                                                    } ?>">

                                        <input type="text" id="Name_user" class="form-control" placeholder="Masukan nama anda" name="nameuser" required value="<?php if (isset($user->nama_user)) {
                                                                                                                                                                    echo $user->nama_user;
                                                                                                                                                                } ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="email_address_2">Email </label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="email_address_2" class="form-control" placeholder="Masukan email anda" name="email" required value="<?php if (isset($user->email_user)) {
                                                                                                                                                                        echo $user->email_user;
                                                                                                                                                                    } ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="password_2">Password</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" id="password_2" class="form-control" placeholder="Masukan password anda  
                                        " name="password" value="<?php if (isset($user->password)) {
                                                                        echo $user->password;
                                                                    } ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Daftar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- #END# Horizontal Layout -->