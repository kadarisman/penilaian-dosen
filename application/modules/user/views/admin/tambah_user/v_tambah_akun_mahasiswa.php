<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 ">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah User Dosen</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="post">
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" name="username" id="username"
                                    value="<?= $mahasiswa->NPM ?>" readonly>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" name="kd_prodi" id="kd_prodi"
                                    value="<?= $mahasiswa->kd_prodi ?>" readonly>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('kd_prodi', '<small class="text-danger pl-3">', '</small>'); ?>
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
                            <div class="social-auth-links text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-primary hapus">Hapus</a>
                                <a href="<?= base_url('mahasiswa') ?>" class="btn btn-primary">Close</a>
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