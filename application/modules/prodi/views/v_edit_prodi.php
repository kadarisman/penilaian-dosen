<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 ">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Prodi</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="post">

                        <div class="box-body">
                            <input type="hidden" class="form-control" name="kd_prodi" value="<?= $prodi->kd_prodi ?>">
                            <div class="form-group has-feedback">
                                <label>Nama prodi</label>
                                <input type="text" class="form-control" name="nama_prodi" id="username"
                                    value="<?= $prodi->nama_prodi ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('nama_prodi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Fakultas</label>
                                <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                                    name="kd_fakultas">
                                    <option value="<?= $prodi->kd_fakultas ?>"><?= $prodi->nama_fakultas ?>
                                    </option>
                                    <?php foreach ($fakultas as $fklt) : ?>
                                    <option value="<?= $fklt->kd_fakultas ?>"><?= $fklt->nama_fakultas ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="social-auth-links text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="<?= base_url('prodi') ?>" class="btn btn-primary">Batal</a>
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