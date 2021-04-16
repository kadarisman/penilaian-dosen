<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" id="judul">Semua user Dosen</h3>
                            <a href="<?= base_url('tambah-user-dosen-prodi') ?>"
                                class="badge progress-bar-primary">Tambah</a>
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
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Prodi</th>
                                            <th>Ditambahkan</th>
                                            <th>Diubah</th>
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
                                            <td><?= $dsn->username; ?></td>
                                            <td><?php if ($dsn->nama_dosen == null) {
                                                        echo '<span class="text-danger">Belum terdata</span>';
                                                    } else {
                                                        echo $dsn->nama_dosen;
                                                    } ?>
                                            </td>
                                            <td><?php if ($dsn->alamat_dosen == null) {
                                                        echo '<span class="text-danger">Belum terdata</span>';
                                                    } else {
                                                        echo $dsn->alamat_dosen;
                                                    } ?>
                                            </td>
                                            <td><?php if ($dsn->nama_prodi == null) {
                                                        echo '<span class="text-danger">Belum terdata</span>';
                                                    } else {
                                                        echo $dsn->nama_prodi;
                                                    } ?>
                                            </td>
                                            <td><?= $dsn->created; ?></td>
                                            <td><?php if ($dsn->modifed == null) {
                                                        echo 'Belum pernah';
                                                    } else {
                                                        echo $dsn->modifed;
                                                    }
                                                    ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('edit-user-1-prodi/' . $dsn->id_user) ?>"
                                                    class="badge progress-bar-primary">Edit</a>
                                                <a href="<?= base_url('user/User/delete_user_dosen_prodi/' . $dsn->id_user); ?>"
                                                    class="badge progress-bar-danger"
                                                    onclick="return confirm('Yakin..?');">Hapus</a>
                                                <?php if ($dsn->nama_dosen == null) { ?>
                                                <a href="<?= base_url('tambah-data-dosen-prodi/' . $dsn->id_user) ?>"
                                                    class="badge progress-bar-success">Tambah data</a>
                                                <?php } ?>
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
</div>section>
<!-- /.content -->
</div>