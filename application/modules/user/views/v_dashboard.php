<!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <p>SISTEM EVALUASI KINERJA DOSEN
                        UNIVERSITAS ALMUSLIM </p>
                    <h3 class="display-4">Selamat Datang
                        <?php
                        if ($user_session['level'] == "admin") {
                            echo $user_session['username'], '..!<br> Status Anda Admin';
                        } elseif ($user_session['level'] == "BPM") {
                            echo $user_session['username'], '..!<br>Status Anda BPM';
                        } elseif ($user_session['level'] == "prodi") {
                            echo '...!<br>Status Anda sebagai Ka Prodi ', $user_prodi['nama_prodi']; ?>
                            <!-- <a href="<?= base_url('nilai-prd') ?>" type="button" class="btn btn-primary"><?= $total_nilai_prodi; ?>
                                Data penilaian <i class="fa fa-arrow-right"></i></a>
                            <a href="<?= base_url('rekapitulasi-prodi') ?>" type="button" class="btn btn-success">
                                Laporan <i class="fa fa-arrow-right"></i></a><br> -->
                        <?php } elseif ($user_session['level'] == "dosen") {
                            echo $user_dosen['nama_dosen'], '..!<br><p>Anda seorang Dosen Prodi ', $user_dosen['nama_prodi'], '</p>';
                        } elseif ($user_session['level'] == "mahasiswa") {
                            echo $user_mahasiswa['nama_mahasiswa'], '..!<br><p>Anda seorang Mahasiswa Prodi ', $user_mahasiswa['nama_prodi'], '</p><br>'; ?>
                            <!-- <a href="<?= base_url('nilai') ?>" type="button" class="btn btn-primary"><?= $total_nilai_mahasiswa ?>
                                Dosen ternilai <i class="fa fa-arrow-right"></i></a> -->
                            <a href="<?= base_url('penilaian-dosen') ?>" type="button" class="btn btn-success">
                                Buat Penilaian <i class="fa fa-arrow-right"></i></a>
                        <?php } else
                            echo 'Tidak terdaftar';
                        ?>
                    </h3>

                </div>
                <div class="container">
                    <?php if ($user_session['level'] == "prodi") { ?>
                        <h4>Nilai dosen untuk semseter Genap per matakuliah tahun ajaran <?php echo date('Y') - 1, ' / ', date('Y') ?></h4>
                        <?php foreach ($matakuliah_prodi as $mk) : ?>
                            <div class="col-md-3">
                                <div class="info-box">
                                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text"><?= $mk->nama_matakuliah ?></span>
                                        <span class="info-box-number">
                                            <?php
                                            //$kd_prodi = $this->session->userdata('kd_prodi');
                                            // $kd_prodi =  $user_prodi['nama_prodi'];
                                            $this->db->from('nilai');
                                            $this->db->join('dosen', 'dosen.NIDN = nilai.NIDN', 'left');


                                            $this->db->where('kd_prodi', $user_prodi['kd_prodi']);
                                            $this->db->where('kd_matakuliah', $mk->kd_matakuliah);
                                            $this->db->where('smester', 'Genap');
                                            $hsl = $this->db->count_all_results();

                                            $this->db->from('dosen');
                                            $this->db->where('kd_prodi', $user_prodi['kd_prodi']);
                                            $dos = $this->db->count_all_results();

                                            $per = $hsl / $dos * 100;
                                            ?>

                                            <?php echo '<small>', $per, '%' ?>
                                            <?php if ($per != 0) { ?>
                                                sudah ternilai
                                            <?php } else {
                                                echo 'ternilai';
                                            } ?> </small><br>
                                            <small><a href="<?= base_url('detail_genap/' . $mk->kd_matakuliah) ?>" class="badge progress-bar-primary">Detail</a></small>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                </div>
                <div class="container">
                    <h4>Nilai dosen untuk semseter Ganjil per matakuliah tahun ajaran <?php echo date('Y') - 1, ' / ', date('Y') ?></h4>
                    <?php foreach ($matakuliah_prodi as $mk) : ?>
                        <div class="col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="ion ion-ios-gear-outline"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><?= $mk->nama_matakuliah ?></span>
                                    <span class="info-box-number">
                                        <?php

                                        $this->db->from('nilai');
                                        $this->db->join('dosen', 'dosen.NIDN = nilai.NIDN', 'left');
                                        $this->db->where('kd_prodi', $user_prodi['kd_prodi']);
                                        $this->db->where('kd_matakuliah', $mk->kd_matakuliah);
                                        //$this->db->group_by('nilai.kd_matakuliah');
                                        $this->db->where('smester', 'Ganjil');
                                        $hsl_ganjil = $this->db->count_all_results();

                                        $this->db->from('dosen');
                                        $this->db->where('kd_prodi', $user_prodi['kd_prodi']);
                                        $dosen = $this->db->count_all_results();

                                        $persen = $hsl_ganjil / $dosen * 100;
                                        ?>


                                        <?php echo '<small>', $persen, '%' ?>
                                        <?php if ($persen != 0) { ?>
                                            sudah ternilai
                                        <?php } else {
                                            echo 'ternilai';
                                        } ?> </small><br>
                                        <small><a href="<?= base_url('detail_ganjil/' . $mk->kd_matakuliah) ?>" class="badge progress-bar-primary">Detail</a></small>

                                    </span>
                                </div>
                            </div>
                        </div>
                <?php
                        endforeach;
                    } ?>

                </div>


                <div class="container">
                <?php if ($user_session['level'] == "mahasiswa") { ?>
                    <h4>Nilai dosen untuk semseter Genap per matakuliah tahun ajaran <?php echo date('Y')-1,' / ', date('Y')?></h4>
                    <?php foreach ($matakuliah_prodi as $mk) : ?>
                        <div class="col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><?= $mk->nama_matakuliah ?></span>
                                    <span class="info-box-number">
                                        <?php
                                        //$kd_prodi = $this->session->userdata('kd_prodi');
                                        // $kd_prodi =  $user_prodi['nama_prodi'];
                                        $this->db->from('nilai');
                                        $this->db->join('dosen', 'dosen.NIDN = nilai.NIDN', 'left');

                                        
                                        $this->db->where('NPM', $user_mahasiswa['NPM']);
                                        $this->db->where('kd_matakuliah', $mk->kd_matakuliah);
                                        $this->db->where('smester', 'Genap');
                                        $hsl = $this->db->count_all_results();

                                        // $this->db->from('dosen');                                      
                                        // $this->db->where('kd_prodi', $user_prodi['kd_prodi']);
                                        // $dos = $this->db->count_all_results();
                                        // //echo $hsl;

                                        // $per = $hsl / $dos * 100;
                                        ?>

                                        <?php echo '<small>',$hsl,' '?>
                                        <?php if ($hsl != 0){?>                                            
                                        sudah Anda nilai
                                        <?php }else{
                                            echo 'ternilai';
                                        } ?> </small><br>
                                        <small><a href="<?= base_url('detail_genap_mhs/' . $mk->kd_matakuliah) ?>" class="badge progress-bar-primary" >Detail</a></small>
                                    </span>
                                </div>
                            </div>
                        </div>              
                <?php endforeach; }?>

                </div>      


                <div class="container">
                <?php if ($user_session['level'] == "mahasiswa") { ?>
                    <h4>Nilai dosen untuk semseter Ganjil per matakuliah tahun ajaran <?php echo date('Y')-1,' / ', date('Y')?></h4>
                    <?php foreach ($matakuliah_prodi as $mk) : ?>
                        <div class="col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-red"><i class="ion ion-ios-gear-outline"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><?= $mk->nama_matakuliah ?></span>
                                    <span class="info-box-number">
                                        <?php
                                        //$kd_prodi = $this->session->userdata('kd_prodi');
                                        // $kd_prodi =  $user_prodi['nama_prodi'];
                                        $this->db->from('nilai');
                                        $this->db->join('dosen', 'dosen.NIDN = nilai.NIDN', 'left');

                                        
                                        $this->db->where('NPM', $user_mahasiswa['NPM']);
                                        $this->db->where('kd_matakuliah', $mk->kd_matakuliah);
                                        $this->db->where('smester', 'Ganjil');
                                        $hsl_gjl = $this->db->count_all_results();

                                        // $this->db->from('dosen');                                      
                                        // $this->db->where('kd_prodi', $user_prodi['kd_prodi']);
                                        // $dos = $this->db->count_all_results();
                                        // //echo $hsl;

                                        // $per = $hsl / $dos * 100;
                                        ?>

                                        <?php echo '<small>',$hsl_gjl,' '?>
                                        <?php if ($hsl_gjl != 0){?>                                            
                                        sudah Anda nilai
                                        <?php }else{
                                            echo 'ternilai';
                                        } ?> </small><br>
                                        <small><a href="<?= base_url('detail_ganjil_mhs/' . $mk->kd_matakuliah) ?>" class="badge progress-bar-primary" >Detail</a></small>
                                    </span>
                                </div>
                            </div>
                        </div>              
                <?php endforeach; }?>

                </div>      



            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- ./wrapper -->

<!-- <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nilai untuk Matakuliah <?= 'here' ?></h4>
            </div>
            <div class="modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div> -->