<div class="content-wrapper">
    <section class="content">
        <?php $this->load->view('templates/nav_menu_table_user'); ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" id="judul">Pengguna Level Prodi <?= $total_user_prodi; ?> Orang</h3>
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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //var_dump($all_admin); 
                                        ?>
                                        <?php
                                        $no = 0;
                                        foreach ($data_user_prodi as $usr) :
                                            $no++ ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $usr->username; ?></td>
                                            <td><?= $usr->level; ?></td>
                                            <td><?= $usr->nama_prodi; ?></td>
                                            <td>
                                                <a class="badge progress-bar-primary" data-toggle="modal"
                                                    data-target="#modal_edit_user<?= $usr->id_user; ?>">Edit</a>
                                                <a href="<?= base_url('user/User/delete_user/' . $usr->id_user); ?>"
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