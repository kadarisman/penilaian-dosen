<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <a href="<?= base_url('tambah-user-prodi') ?>" class="badge progress-bar-primary">Tambah</a>
                            <br>
                            <center>
                                <h3 class="box-title" id="judul">Semua Pengguna Level Prodi</h3>
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
                                            <th>Prodi</th>
                                            <th>Fakultas</th>
                                            <th>Ditambahkan</th>
                                            <th>Diubah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //var_dump($all_prodiin); 
                                        ?>
                                        <?php
                                        $no = 0;
                                        foreach ($prodi as $prd) :
                                            $no++ ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $prd->username; ?></td>
                                            <td><?= $prd->level; ?></td>
                                            <td><?= $prd->nama_prodi; ?></td>
                                            <td><?= $prd->nama_fakultas; ?></td>
                                            <td><?= $prd->created; ?></td>
                                            <td><?php if ($prd->modifed == null) {
                                                        echo 'Belum pernah';
                                                    } else {
                                                        echo $prd->modifed;
                                                    }
                                                    ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('edit-user-2/' . $prd->id_user) ?>"
                                                    class="badge progress-bar-primary">Edit</a>
                                                <a href="<?= base_url('user/User/delete_user_prodi/' . $prd->id_user); ?>"
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