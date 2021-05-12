<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <a href="<?= base_url('rekap-data') ?>" class="badge progress-bar-primary">
                                Cetak <i class="fa fa-print" aria-hidden="true"></i></a>
                            <br>
                            <center>
                                <h3 class="box-title" id="judul">Data Evaluasi Kinerja Dosen <br>
                                    <?= $user_prodi['nama_prodi']; ?> Universiats Amuslim<br>
                                    Smester </h3>
                            </center>
                            <br>
                            <form action="" method="post">
                                <div class="col-sm-3">
                                    <div class="form-group form-inline">
                                        <select name="smester" id="smester" class="form-control">
                                            <option selected="true" disabled="disabled">Filter Semester</option>
                                            <option value="Genap">Genap</option>
                                            <option value="Ganjil">Ganjil</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-inline">
                                        <select name="tahun_ajaran" id="tahun_ajaran" class="form-control">
                                            <option selected="true" disabled="disabled">Filter TA</option>
                                            <?php
                                            $tahun_satu = date('Y') - 1;
                                            $tahun_dua = date('Y');
                                            $tahun_batas = 2010;

                                            while (True) {
                                            ?>
                                            <option value="<?= $tahun_satu . '/' . $tahun_dua ?>">
                                                <?= $tahun_satu . '/' . $tahun_dua ?></option>
                                            <?php
                                                $tahun_satu = $tahun_satu - 1;
                                                $tahun_dua = $tahun_dua - 1;

                                                if ($tahun_satu == $tahun_batas) {
                                                    break;
                                                }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <a href="<?= base_url('rekap-data-test') ?>" class="btn btn-warning"><i
                                            class="fa fa-search"></i>
                                        Cari</a>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?= $this->session->flashdata('message1'); ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIDN</th>
                                            <th>Nama Dosen</th>
                                            <th>Matakuliah</th>
                                            <th>Nilai</th>
                                            <th>Bobot</th>
                                            <th>Smester</th>
                                            <th>TA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //var_dump($all_prdin); 
                                        ?>
                                        <?php
                                        $no = 0;
                                        foreach ($laporan as $nl) :
                                            $no++ ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $nl->NIDN; ?></td>
                                            <td><?= $nl->nama_dosen; ?></td>
                                            <td><?= $nl->nama_matakuliah; ?></td>
                                            <?php $kd_prodi = $this->session->userdata('kd_prodi');
                                                //$pert =  $this->db->count_all_results('pertanyaan');

                                                foreach ($nidn as $jmlh) :
                                                    $nilaiCalc = $nl->nilai / $jmlh->total;
                                                endforeach;
                                                ?>
                                            <td><?= round($nilaiCalc, 2); ?></td>
                                            <td><?php if ($nilaiCalc >= 3.60) {
                                                        echo 'A';
                                                    } elseif ($nilaiCalc >= 3.00 && $nilaiCalc >= 3.59) {
                                                        echo 'B';
                                                    } elseif ($nilaiCalc >= 2.40 && $nilaiCalc >= 2.99) {
                                                        echo 'C';
                                                    } else {
                                                        echo 'D';
                                                    }

                                                    ?>
                                            </td>
                                            <td><?= $nl->smester; ?></td>
                                            <td><?= $nl->tahun_ajaran; ?></td>
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