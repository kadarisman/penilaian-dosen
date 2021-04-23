<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <a href="<?= base_url('tambah-user-dosen') ?>" class="badge progress-bar-primary">Tambah</a>
                            <br>
                            <center>
                                <h3 class="box-title" id="judul">Semua Pengguna Level Dosen</h3>
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
                                            <th>Username</th>
                                            <th>Level</th>
                                            <th>Nama</th>
                                            <th>Prodi</th>
                                            <th>Alamat</th>
                                            <th>Ditambahkan</th>
                                            <th>Diubah</th>
                                            <th>Kedosenan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //var_dump($all_dsnin); 
                                        ?>
                                        <?php
                                        $no = 0;
                                        foreach ($dosen as $dsn) :
                                            $no++ ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $dsn->username; ?></td>
                                            <td><?= $dsn->level; ?></td>
                                            <td><?php if ($dsn->nama_dosen == null) {
                                                        echo '<span class="text-danger">Belum terdata</span>';
                                                    } else {
                                                        echo $dsn->nama_dosen;
                                                    } ?>
                                            </td>
                                            <td><?php if ($dsn->nama_prodi == null) {
                                                        echo '<span class="text-danger">Belum terdata</span>';
                                                    } else {
                                                        echo $dsn->nama_prodi;
                                                    } ?>
                                            </td>
                                            <td><?php if ($dsn->alamat_dosen == null) {
                                                        echo '<span class="text-danger">Belum terdata</span>';
                                                    } else {
                                                        echo $dsn->alamat_dosen;
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
                                            <td><?php if ($dsn->nama_dosen == null) { ?>
                                                <i class="fa fa-fw fa-close" style="color: red;"></i>
                                                <?php } else { ?>
                                                <i class="fa fa-fw fa-check" style="color: green;"></i>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('edit-user-2/' . $dsn->id_user) ?>"
                                                    class="badge progress-bar-primary">Edit</a>
                                                <a href="<?= base_url('user/User/delete_user_dosen/' . $dsn->id_user); ?>"
                                                    class="badge progress-bar-danger"
                                                    onclick="return confirm('Yakin..?');">Hapus</a>
                                                <?php if ($dsn->nama_dosen == null) { ?>
                                                <a href="<?= base_url('tambah-data-dosen/' . $dsn->id_user) ?>"
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