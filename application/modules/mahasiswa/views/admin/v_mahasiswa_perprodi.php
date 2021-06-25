<div class="content-wrapper">
    <section class="content">
        <center>
            <h4>Jumlah Mahasiswa masing-masing prodi
            </h4>
        </center>
        <div class="row">

            <?php
            foreach ($prodi as $prd) :
            ?>
            <div class="col-xs-4">
                <div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= $prd->nama_prodi; ?></h3>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php
                            $prodi = $prd->kd_prodi;
                            $this->db->from('mahasiswa');
                            $this->db->where('kd_prodi', $prodi);
                            $jumlah = $this->db->count_all_results();
                            echo $jumlah . ' Orang';
                            ?>
                        <a href="<?= base_url('detail-mahasiswa/' . $prd->kd_prodi) ?>"
                            class="badge progress-bar-primary" style="float: right;">Lihat</a>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>