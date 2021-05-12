<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <button onclick="window.print()" class="badge progress-bar-primary phide">
                                Cetak <i class="fa fa-print" aria-hidden="true"></i></button>
                            <form action="<?= base_url('filter-tahun1') ?>" method="post" class="phide">
                                <br>
                                Filter :
                                <select name="smester" id="sm_p" required>
                                    <option value="" selected disabled>Smester</option>
                                    <option value="Genap">Genap</option>
                                    <option value="Ganjil">Ganjil</option>
                                </select>
                                <select name="tahun_ajaran" id="th_p" required>
                                    <option value="" selected disabled>Tahun Ajaran</option>
                                    <?php
                                    $tahun_satu = date('Y');
                                    $tahun_dua = date('Y') + 1;
                                    $tahun_batas = 2010;

                                    while (True) {; ?>
                                    <option value="<?= $tahun_satu . ' / ' . $tahun_dua ?>">
                                        <?= $tahun_satu . '/' . $tahun_dua ?></option>
                                    <?php
                                        $tahun_satu = $tahun_satu - 1;
                                        $tahun_dua = $tahun_dua - 1;

                                        if ($tahun_satu == $tahun_batas) {
                                            break;
                                        }
                                    }
                                    ?>
                                </select>
                                <button type="submit" class="badge progress-bar-primary" id="crsmth_p">Cari</button>
                            </form>
                            <center>
                                <h3 class="box-title" id="judul">Semua Data Evaluasi Kinerja Dosen <br>
                                    <?= $user_prodi['nama_prodi']; ?> Universitas Amuslim</h3>
                            </center>
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
                                        foreach ($rekap_prodi as $nl) :
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
                        <div class="row tndtgn">
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                <center>
                                    Matangglumpangdua, <?php echo date('d-m-Y'); ?>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    Ka Prodi <?= $user_prodi['nama_prodi']; ?>
                                    <br>
                                    <br>
                                </center>
                            </div>
                        </div>
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