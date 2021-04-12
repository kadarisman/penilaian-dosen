<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li><a href="<?= base_url('Dashboard') ?>"><i class="fa fa-users"></i> Dashboard
                    <span class="pull-right-container">
                    </span>
                </a>

                <!--untuk admin-->
            </li><?php if ($user_session['level'] == 'admin') { ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Pengguna</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('admin') ?>"><i class="fa fa-circle-o"></i> Admin
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red"><?= $total_user_admin; ?></small>
                            </span>
                        </a>
                    </li>
                    <li><a href="<?= base_url('BPM') ?>"><i class="fa fa-circle-o"></i> BPM
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red"><?= $total_user_bpm; ?></small>
                            </span>
                        </a>
                    </li>
                    <li><a href="<?= base_url('user-prodi') ?>"><i class="fa fa-circle-o"></i> Prodi
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red"><?= $total_user_prodi; ?></small>
                            </span>
                        </a>
                    </li>
                    <li><a href="<?= base_url('user-dosen') ?>"><i class="fa fa-circle-o"></i> Dosen
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red"><?= $total_user_dosen ?></small>
                            </span>
                        </a>
                    </li>
                    <li><a href="<?= base_url('user-mahasiswa') ?>"><i class="fa fa-circle-o"></i> Mahasiswa
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red"><?= $total_user_mahasiswa; ?></small>
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-database"></i>
                    <span>Master Data</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('fakultas') ?>"><i class="fa fa-circle-o"></i>Data Fakultas
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red"><?= $total_fakultas; ?></small>
                            </span>
                        </a>
                    </li>
                    <li><a href="<?= base_url('prodi') ?>"><i class="fa fa-circle-o"></i>Data Prodi
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red"><?= $total_prodi; ?></small>
                            </span>
                        </a>
                    </li>
                    <li><a href="<?= base_url('dosen') ?>"><i class="fa fa-circle-o"></i>Data Dosen
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red"><?= $total_dosen ?></small>
                            </span>
                        </a>
                    </li>
                    <li><a href="<?= base_url('mahasiswa') ?>"><i class="fa fa-circle-o"></i>Data Mahasiswa
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red"><?= $total_mahasiswa; ?></small>
                            </span>
                        </a>
                    </li>
                    <li><a href="<?= base_url('pertanyaan') ?>"><i class="fa fa-circle-o"></i> Data Pertanyaan
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red"><?= $total_pertanyaan; ?></small>
                            </span>
                        </a>
                    </li>
                    <li><a href="<?= base_url('matakuliah') ?>"><i class="fa fa-circle-o"></i> Data Matakuliah
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red"><?= $total_matakuliah; ?></small>
                            </span>
                        </a>
                    </li>
                    <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i>Data Jawaban
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red">12</small>
                            </span>
                        </a>
                    </li>
                </ul>
            </li>

            <!--untuk BPM-->
            <?php } else if (($user_session['level'] == 'BPM')) { ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Pengguna</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('Prodi') ?>"><i class="fa fa-circle-o"></i> Prodi
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red"><?= $total_user_prodi; ?></small>
                            </span>
                        </a>
                    </li>
                    <li><a href="<?= base_url('Dosen') ?>"><i class="fa fa-circle-o"></i> Dosen
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red"><?= $total_user_dosen ?></small>
                            </span>
                        </a>
                    </li>
                    <li><a href="<?= base_url('Mahasiswa') ?>"><i class="fa fa-circle-o"></i> Mahasiswa
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red"><?= $total_user_mahasiswa; ?></small>
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-database"></i>
                    <span>Master Data</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('Prodi') ?>"><i class="fa fa-circle-o"></i>Data Fakultas
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red"><?= $total_prodi; ?></small>
                            </span>
                        </a>
                    </li>
                    <li><a href="<?= base_url('Prodi') ?>"><i class="fa fa-circle-o"></i>Data Prodi
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red"><?= $total_prodi; ?></small>
                            </span>
                        </a>
                    </li>
                    <li><a href="<?= base_url('Dosen') ?>"><i class="fa fa-circle-o"></i>Data Dosen
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red"><?= $total_dosen ?></small>
                            </span>
                        </a>
                    </li>
                    <li><a href="<?= base_url('Mahasiswa') ?>"><i class="fa fa-circle-o"></i>Data Mahasiswa
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red"><?= $total_mahasiswa; ?></small>
                            </span>
                        </a>
                    </li>
                    <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Data Pertanyaan
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red">12</small>
                            </span>
                        </a>
                    </li>
                    <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Data Matakuliah
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red">12</small>
                            </span>
                        </a>
                    </li>
                    <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i>Data Jawaban
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red">12</small>
                            </span>
                        </a>
                    </li>
                </ul>
            </li>

            <!--untuk prodi-->
            <?php } else if (($user_session['level'] == 'prodi')) { ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-database"></i>
                    <span>Pengguna</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('Dosen') ?>"><i class="fa fa-circle-o"></i> Dosen
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red"><?= $total_user_dosen ?></small>
                            </span>
                        </a>
                    </li>
                    <li><a href="<?= base_url('Mahasiswa') ?>"><i class="fa fa-circle-o"></i> Mahasiswa
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red"><?= $total_user_mahasiswa; ?></small>
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Master Data</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('dosen') ?>"><i class="fa fa-circle-o"></i>Data Dosen
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red"><?= $total_dosen ?></small>
                            </span>
                        </a>
                    </li>
                    <li><a href="<?= base_url('mahasiswa') ?>"><i class="fa fa-circle-o"></i>Data Mahasiswa
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red"><?= $total_mahasiswa; ?></small>
                            </span>
                        </a>
                    </li>
                    <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Data Pertanyaan
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red">12</small>
                            </span>
                        </a>
                    </li>
                    <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Data Matakuliah
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red">12</small>
                            </span>
                        </a>
                    </li>
                    <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i>Data Jawaban
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red">12</small>
                            </span>
                        </a>
                    </li>
                </ul>
            </li>

            <!--untuk dosen dan mahasiswa-->
            <?php } else { ?>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i>Data Jawaban
                    <span class="pull-right-container">
                        <small class="label pull-right bg-red">12</small>
                    </span>
                </a>
            </li>

            <?php   } ?>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>