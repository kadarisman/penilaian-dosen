<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" id="judul">Semua user Prodi</h3>
                            <a href="<?= base_url('tambah-user-prodi') ?>" class="badge progress-bar-primary">Tambah</a>
                            <br>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Level</th>
                                            <th>Prodi</th>
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
                                        foreach ($prodi as $prodi) :
                                            $no++ ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $prodi->username; ?></td>
                                            <td><?= $prodi->level; ?></td>
                                            <td><?= $prodi->nama_prodi; ?></td>
                                            <td><?= $prodi->created; ?></td>
                                            <td><?php if ($prodi->modifed == null) {
                                                        echo 'Belum pernah';
                                                    } else {
                                                        echo $prodi->modifed;
                                                    }
                                                    ?>
                                            </td>
                                            <td>
                                                <a href="" class="badge progress-bar-primary">Edit</a>
                                                <a href="<?= base_url('user/User/delete_user/' . $prodi->id_user); ?>"
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