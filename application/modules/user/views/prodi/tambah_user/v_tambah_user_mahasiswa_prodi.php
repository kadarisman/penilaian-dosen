<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 ">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah User Mahasiswa</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="post">
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="NPM" name="username"
                                    id="username" value="<?= set_value('username'); ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" class="form-control" placeholder="Password" name="password"
                                    id="password" value="<?= set_value('password'); ?>">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" class="form-control" placeholder="Ulangi Password"
                                    name="password2" id="password2">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?><br>
                                <label>
                                    <input type="checkbox" class="chck"> Show Password
                                </label>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Nama" name="nama_mahasiswa"
                                    id="nama_mahasiswa" value="<?= set_value('nama_mahasiswa'); ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('nama_mahasiswa', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Alamat" name="alamat_mahasiswa"
                                    id="alamat_mahasiswa" value="<?= set_value('alamat_mahasiswa'); ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('alamat_mahasiswa', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="social-auth-links text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="<?= base_url('user-mahasiswa-prodi') ?>" class="btn btn-primary">Batal</a>
                                <!-- <a href="#" class="btn btn-block btn-success">Daftar</a> -->
                            </div>
                        </div>
                    </form>

                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>