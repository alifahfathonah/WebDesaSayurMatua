<section class="content">
    <div class="container-fluid">
        <div class="col-lg">
            <?= $this->session->flashdata("pesan"); ?></div>
        <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <?= $judul; ?>
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
                        <?php echo form_open_multipart('User/edit'); ?>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="username">Username</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="username" name="username" class="form-control" readonly value="<?= $admin['admin_user']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="nama">Nama Lengkap User</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="nama" name="name" class="form-control" placeholder=" Masukan nama anda" value="<?= $admin['admin_nama']; ?>">
                                    </div>
                                    <?= form_error('name', '<label id="description-error" class="error" for="description">', '</label>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class=" row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="nama">Gambar </label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="col-xs-6 col-md-3 padding-0">
                                        <a href="javascript:void(0);" class="thumbnail">
                                            <img id="preview" src="<?= base_url('assets/images/profile/') . $admin['admin_image']; ?>" class="img-responsive">
                                        </a>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" id="file" onchange="tampilkanPreview(this,'preview')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Edit</button>
                                <button type="button" class="btn btn-default m-t-15 waves-effect">Cancel</button>
                            </div>
                        </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Horizontal Layout -->