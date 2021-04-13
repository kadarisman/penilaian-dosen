<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 ">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Pertanyaan</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="post">

                        <div class="box-body">
                            <input type="hidden" class="form-control" name="id_pertanyaan"
                                value="<?= $pertanyaan->id_pertanyaan ?>">
                            <div class="form-group has-feedback">
                                <label>Pertanyaan</label>
                                <input type="text" class="form-control" name="pertanyaan" id="pertanyaan"
                                    value="<?= $pertanyaan->pertanyaan ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('pertanyaan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Kriteria</label>
                                <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                                    name="kd_kriteria">
                                    <option value="<?= $pertanyaan->kd_kriteria ?>"><?= $pertanyaan->nama_kriteria ?>
                                    </option>
                                    <?php foreach ($kriteria as $krtr) : ?>
                                    <option value="<?= $krtr->kd_kriteria ?>"><?= $krtr->nama_kriteria ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="social-auth-links text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="<?= base_url('pertanyaan') ?>" class="btn btn-primary">Batal</a>
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