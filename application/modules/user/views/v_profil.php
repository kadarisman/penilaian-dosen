<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <?= $this->session->flashdata('message1'); ?>
                <!-- Widget: user widget style 1 -->
                <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-light-blue">
                        <div class="widget-user-image">
                            <?php if ($user_session['level'] == 'admin') { ?>
                            <img class="img-circle" src="<?= base_url('assets/'); ?>img/users/default.jpg"
                                alt="User Avatar">
                            <?php } else { ?>
                            <img class="img-circle" src="<?= base_url('assets/'); ?>img/users/default.png"
                                alt="User Avatar">
                            <?php } ?>
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username"><strong><?php if ($user_session['level'] == "admin") {
                                                                        echo $user_session['username'];
                                                                    } elseif ($user_session['level'] == "BPM") {
                                                                        echo $user_session['username'];
                                                                    } elseif ($user_session['level'] == "prodi") {
                                                                        echo $user_prodi['nama_prodi'];
                                                                    } elseif ($user_session['level'] == "dosen") {
                                                                        echo $user_dosen['nama_dosen'];
                                                                    } elseif ($user_session['level'] == "mahasiswa") {
                                                                        echo $user_mahasiswa['nama_mahasiswa'];
                                                                    } else
                                                                        echo 'Tidak terdaftaar';
                                                                    ?></strong></h3>
                        <h5 class="widget-user-desc"><?php if ($user_session['level'] == 'admin') {
                                                            echo 'Level Admin';
                                                        } else if ($user_session['level'] == 'BPM') {
                                                            echo 'Level BPM ';
                                                        } else if ($user_session['level'] == 'prodi') {
                                                            echo  $user_prodi['nama_fakultas'];
                                                        } elseif ($user_session['level'] == "dosen") {
                                                            echo 'Dosen Prodi ', $user_dosen['nama_prodi'];
                                                        } elseif ($user_session['level'] == "mahasiswa") {
                                                            echo 'Mahasiswa Prodi ', $user_mahasiswa['nama_prodi'];
                                                        } else
                                                            echo 'Tidak terdaftaar';
                                                        ?></h5>
                    </div>
                    <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                            <li><a>Username : <?= $user_session['username'] ?></a></li>
                            <?php if ($user_session['level'] == 'prodi') { ?>
                            <li><a>Prodi : <?= $user_prodi['nama_prodi'] ?></a></li>
                            <li><a>Fakultas : <?= $user_prodi['nama_fakultas'] ?></a></li>

                            <?php } else if ($user_session['level'] == 'dosen') { ?>
                            <li><a>NIDN : <?= $user_dosen['NIDN'] ?></a></li>
                            <li><a>Prodi : <?= $user_dosen['nama_prodi'] ?></a></li>
                            <li><a>Nama : <?= $user_dosen['nama_dosen'] ?></a></li>
                            <li><a>Alamat : <?= $user_dosen['alamat_dosen'] ?></a></li>

                            <?php } else if ($user_session['level'] == 'mahasiswa') { ?>
                            <li><a>NPM : <?= $user_mahasiswa['NPM'] ?></a></li>
                            <li><a>Prodi : <?= $user_mahasiswa['nama_prodi'] ?></a></li>
                            <li><a>Nama : <?= $user_mahasiswa['nama_mahasiswa'] ?></a></li>
                            <li><a>Alamat : <?= $user_mahasiswa['alamat_mahasiswa'] ?></a></li>
                            <?php } ?>
                            <!--
                            <center>
                                <div class="row" style="margin-bottom: 15px;;">
                                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                        Ubah Password</a>
                                </div>
                            </center>
                            <-->
                        </ul>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Password ..?</h4>
            </div>
            <div class="modal-body">
                <p>Hubungi Lia Rahmatina&hellip;</p>
                <img width="100" height="100" src=" <?= base_url('assets/'); ?>img/users/senyum.png" alt="User Avatar">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->