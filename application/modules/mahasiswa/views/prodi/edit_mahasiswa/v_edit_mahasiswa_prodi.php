<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 ">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Mahasiswa</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="post">

                        <div class="box-body">
                            <input type="hidden" class="form-control" name="NPM" value="<?= $mahasiswa->NPM ?>">
                            <div class="form-group has-feedback">
                                <label>Nama Mahasiswa</label>
                                <input type="text" class="form-control" name="nama_mahasiswa" id="nama_mahasiswa"
                                    value="<?= $mahasiswa->nama_mahasiswa ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('nama_mahasiswa', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Alamat Mahasiswa</label>
                                <input type="text" class="form-control" name="alamat_mahasiswa" id="alamat_mahasiswa"
                                    value="<?= $mahasiswa->alamat_mahasiswa ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('alamat_mahasiswa', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="social-auth-links text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="<?= base_url('mahasiswa-prodi') ?>" class="btn btn-primary">Batal</a>
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