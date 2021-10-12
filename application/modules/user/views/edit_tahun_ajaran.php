<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 ">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Tahun Ajaran</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="post">

                        <div class="box-body">
                            <input type="hidden" class="form-control" name="NIDN" value="">
                            <div class="form-group">
                            <label for="exampleFormControlSelect1">Tahun</label>
                            <select class="form-control" name="tahun">
                                <?php $tahun_satu = date('Y') - 1;
                                $tahun_dua = date('Y');
                                $tahun_batas = 2010;
                                while (True) { ?>
                                    <option value="<?= $tahun_satu . ' / ' . $tahun_dua ?>">
                                        <?= $tahun_satu . '/' . $tahun_dua ?></option>
                                <?php
                                    $tahun_satu = $tahun_satu - 1;
                                    $tahun_dua = $tahun_dua - 1;
                                    if ($tahun_satu == $tahun_batas) {
                                        break;
                                    }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Smester</label>
                            <select class="form-control" name="smester">
                                <option value="<?=$ta->smester?>"><?=$ta->smester?></option>
                                <option value="Genap">Genap</option>
                                <option value="Ganjil">Ganjil</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Status</label>
                            <select class="form-control" name="status">
                                <option value="Aktif">Aktif</option>
                                <option value="Non Aktif">Non Aktif</option>
                            </select>
                        </div>
                            <div class="social-auth-links text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="<?=base_url('user')?>" class="btn btn-primary">Batal</a>
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