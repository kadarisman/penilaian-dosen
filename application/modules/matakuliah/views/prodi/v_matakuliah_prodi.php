<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" id="judul">Data Semua Matakuliah</h3><br>
                            <a href="<?= base_url('tambah-matakuliah-prodi') ?>"
                                class="badge progress-bar-primary">Tambah
                                Data</a>
                            <br>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?= $this->session->flashdata('message1'); ?>
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Matakuliah</th>
                                            <th>Matakuliah</th>
                                            <th>SKS</th>
                                            <th>Prodi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //var_dump($all_prdin); 
                                        ?>
                                        <?php
                                        $no = 0;
                                        foreach ($matakuliah_prodi as $mk) :
                                            $no++ ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $mk->kd_matakuliah; ?></td>
                                            <td><?= $mk->nama_matakuliah; ?></td>
                                            <td><?= $mk->sks; ?></td>
                                            <td><?= $mk->nama_prodi; ?></td>
                                            <td>
                                                <a href="<?= base_url('edit-matakuliah-prodi/' . $mk->kd_matakuliah) ?>"
                                                    class="badge progress-bar-primary">Edit</a>
                                                <a href="<?= base_url('matakuliah/Matakuliah/delete_matakuliah_prodi/' . $mk->kd_matakuliah); ?>"
                                                    class="badge progress-bar-danger"
                                                    onclick="return confirm('Yakin..?');">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>