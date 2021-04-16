<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 ">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit User</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="post">
                        <div class="box-body">
                            <input type="hidden" class="form-control" name="id_user" value="<?= $user1->id_user ?>">
                            <div class="form-group has-feedback">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" id="username"
                                    value="<?= $user1->username ?>" readonly>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Level</label>
                                <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                                    name="level">
                                    <option value="<?= $user1->level ?>"><?= $user1->level ?></option>
                                    <option value="dosen">Dosen</option>
                                    <option value="mahasiswa">Mahasiswa</option>

                                </select>
                            </div>
                            <div class="social-auth-links text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <?php if ($user1->level == 'mahasiswa') { ?>
                                <a href="<?= base_url('user-mahasiswa-prodi') ?>" class="btn btn-primary">Batal</a>
                                <?php } else { ?>
                                <a href="<?= base_url('user-dosen-prodi') ?>" class="btn btn-primary">Batal</a>
                                <?php } ?>
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