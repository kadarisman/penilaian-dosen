<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 ">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Dosen</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="post">

                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" name="NIDN" value="<?= $dosen->username ?>">
                                <span class=" glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('NIDN', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" name="nama_dosen" placeholder="Nama Dosen">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('nama_dosen', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" name="alamat_dosen" placeholder="Alamat">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('alamat_dosen', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="social-auth-links text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-primary hapus">Hapus</a>
                                <a href="<?= base_url('user-dosen-prodi') ?>" class="btn btn-primary">Close</a>
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