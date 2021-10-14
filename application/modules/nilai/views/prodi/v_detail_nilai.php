<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <button onclick="window.print()" class="badge progress-bar-primary">Cetak</button>
                <?php $no = 0;
                foreach ($dosen_get as $nl2) : $no++ ?>
                    <div class="box">
                        <div class="box-header">
                            <center>
                                <?php $tahun1 = date('Y');
                                $tahun2 = date('Y') + 1;
                                $ta = $tahun1 . ' / ' . $tahun2; ?>
                                <h5 class="box-title" id="judul">Laporan Nilai <?= $nl2->nama_dosen; ?><br>
                                    Tahun Ajaran : <?= $ta.' Matakuliah '.$nl2->nama_matakuliah ?>
                                </h5>
                            </center>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Page</th>
                                        <th>NIDN</th>
                                        <th>Nama</th>
                                        <th>Nilai</th>
                                        <th>Bobot</th>
                                        <th>Smester</th>
                                        <th>TA</th>
                                        <!-- <th></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $nl2->NIDN; ?></td>
                                        <td><?= $nl2->nama_dosen; ?></td>
                                        <?php $kd_prodi = $this->session->userdata('kd_prodi');
                                        //$pert =  $this->db->count_all_results('pertanyaan');

                                        foreach ($nidn as $jmlh) :
                                            $nilaiCalc = $nl2->nilai / $jmlh->total;
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
                                        <td><?= $nl2->smester; ?></td>
                                        <td><?= $nl2->tahun_ajaran; ?></td>
                                        <!-- <td><a href="<?=base_url('nilai/Nilai/print/'.$nl2->id)?>" class="badge progress-bar-primary">Cetak</a></td> -->
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                <?php endforeach; ?>
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
        </div>
    </section>
</div>