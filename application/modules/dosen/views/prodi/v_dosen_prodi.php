<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" id="judul">Data Semua Dosen</h3><br>
                            <a href="<?= base_url('tambah-dosen-prodi') ?>" class="badge progress-bar-primary">Tambah
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
                                            <th>Foto</th>
                                            <th>NIDN</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Prodi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //var_dump($all_dsnin); 
                                        ?>
                                        <?php
                                        $no = 0;
                                        foreach ($dosen_prodi as $dsn) :
                                            $no++ ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><img src="<?= base_url('assets/'); ?>img/users/default.png"
                                                    class="img-rounded" width="40" height="40">
                                            </td>
                                            <td><?= $dsn->NIDN; ?></td>
                                            <td><?= $dsn->nama_dosen; ?></td>
                                            <td><?= $dsn->alamat_dosen; ?></td>
                                            <td><?= $dsn->nama_prodi; ?></td>
                                            <td>
                                                <a href="<?= base_url('edit-dosen-prodi/' . $dsn->NIDN) ?>"
                                                    class="badge progress-bar-primary">Edit</a>
                                                <a href="<?= base_url('dosen/Dosen/delete_dosen_prodi/' . $dsn->NIDN); ?>"
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