<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                        <a href="<?=base_url('Dashboard')?>" class="badge progress-bar-primary mr-5">Kembali</a>
                        <br>
                            <center>
                                <?php if($detail_genap_mhs) {?>
                                <h3 class="box-title" id="judul">Data Penilaian Pengajar Matakuliah <?=$mk->nama_matakuliah?><br>
                                    Smester Genap tahun ajaran <?= date('Y')-1, ' / ', date('Y')?>
                                </h3>
                                <?php }else{ ?>
                                <h3 class="box-title" id="judul">Belum ada Penilaian Pengajar Matakuliah <?=$mk->nama_matakuliah?><br>
                                Smester Genap tahun ajaran <?= date('Y')-1, ' / ', date('Y')?>
                                </h3>
                                <?php } ?>
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
                                            <th>NIDN</th>
                                            <th>Nama Dosen</th>
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
                                        foreach ($detail_genap_mhs as $nl) :
                                            $no++ ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $nl->NIDN; ?></td>
                                            <td><?= $nl->nama_dosen; ?></td>
                                            <td><?= $nl->nilai; ?></td>
                                            <td><?php if ($nl->nilai >= 3.60) {
                                                        echo 'A';
                                                    } elseif ($nl->nilai >= 3.00 && $nl->nilai >= 3.59) {
                                                        echo 'B';
                                                    } elseif ($nl->nilai >= 2.40 && $nl->nilai >= 2.99) {
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