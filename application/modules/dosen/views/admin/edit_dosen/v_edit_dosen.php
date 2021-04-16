<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 ">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Dosen</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="post">

                        <div class="box-body">
                            <input type="hidden" class="form-control" name="NIDN" value="<?= $dosen->NIDN ?>">
                            <div class="form-group has-feedback">
                                <label>Nama dosen</label>
                                <input type="text" class="form-control" name="nama_dosen" id="nama_dosen"
                                    value="<?= $dosen->nama_dosen ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('nama_dosen', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Alamat dosen</label>
                                <input type="text" class="form-control" name="alamat_dosen" id="alamat_dosen"
                                    value="<?= $dosen->alamat_dosen ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('alamat_dosen', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Prodi</label>
                                <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                                    name="kd_prodi">
                                    <option value="<?= $dosen->kd_prodi ?>"><?= $dosen->nama_prodi ?>
                                    </option>
                                    <?php foreach ($prodi as $prd) : ?>
                                    <option value="<?= $prd->kd_prodi ?>"><?= $prd->nama_prodi ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="social-auth-links text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="<?= base_url('dosen') ?>" class="btn btn-primary">Batal</a>
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