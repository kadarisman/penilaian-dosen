<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 ">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Mahasiswa <?= $prodi_1->nama_prodi ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <input type="text" name="kd_prodi" id="kd_prodi" readonly
                                    value="<?= $prodi_1->kd_prodi ?>">
                                <span class="glyphicon glyphicon-home form-control-feedback"></span>
                                <?= form_error('kd_prodi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="NPM" name="NPM" id="NPM"
                                    value="<?= set_value('NPM'); ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('NPM', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Nama Mahasiswa"
                                    name="nama_mahasiswa" id="nama_mahasiswa"
                                    value="<?= set_value('nama_mahasiswa'); ?>">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                <?= form_error('nama_mahasiswa', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Alamat Mahasiswa"
                                    name="alamat_mahasiswa" id="alamat_mahasiswa"
                                    value="<?= set_value('alamat_mahasiswa'); ?>">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                <?= form_error('alamat_mahasiswa', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="social-auth-links text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-primary hapus">Hapus</a>
                                <a href="<?= base_url('detail-mahasiswa/' . $prodi_1->kd_prodi) ?>"
                                    class="btn btn-primary">CLose</a>
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