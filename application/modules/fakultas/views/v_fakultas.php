<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <a href="<?= base_url('tambah-fakultas') ?>" class="badge progress-bar-primary">Tambah
                                Data</a>
                            <br>
                            <center>
                                <h3 class="box-title" id="judul">Daftar Fakultas Universitas Almuslim Bireuen</h3>
                            </center>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?= $this->session->flashdata('message1'); ?>
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Fakultas</th>
                                            <th>Nama Fakultas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //var_dump($all_fksin); 
                                        ?>
                                        <?php
                                        $no = 0;
                                        foreach ($fakultas as $fks) :
                                            $no++ ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $fks->kd_fakultas; ?></td>
                                            <td><?= $fks->nama_fakultas; ?></td>
                                            <td>
                                                <a href="<?= base_url('edit-fakultas/' . $fks->kd_fakultas) ?>"
                                                    class="badge progress-bar-primary">Edit</a>
                                                <a href="<?= base_url('fakultas/Fakultas/delete_fakultas/' . $fks->kd_fakultas); ?>"
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