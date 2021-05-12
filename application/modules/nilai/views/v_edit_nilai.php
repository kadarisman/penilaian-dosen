<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form action="" method="post">
                                <div class="box-body">
                                    <input type="hidden" class="form-control" name="id_nilai"
                                        value="<?= $nilai->id_nilai ?>">
                                    <div class="form-group has-feedback" style="width: 50%;">
                                        <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                                            name="kd_matakuliah">
                                            <option value="<?= $nilai->kd_matakuliah ?>"><?= $nilai->nama_matakuliah ?>
                                            </option>
                                            <?php foreach ($matakuliah as $mk) : ?>
                                            <option value="<?= $mk->kd_matakuliah ?>"><?= $mk->nama_matakuliah ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group has-feedback" style="width: 50%;">
                                        <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                                            name="smester">
                                            <option value="<?= $nilai->smester ?>"><?= $nilai->smester ?>
                                            </option>
                                            <option value="Ganjil">Ganjil</option>
                                            <option value="Genap">Genap</option>
                                        </select>
                                    </div>
                                    <div class="form-group has-feedback" style="width: 50%;">
                                        <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                                            name="NIDN">
                                            <option value="<?= $nilai->NIDN ?>"><?= $nilai->nama_dosen ?>
                                                <?php foreach ($dosen as $ds) : ?>
                                            <option value="<?= $ds->NIDN ?>"><?= $ds->nama_dosen ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <p>Jawablah pertanyaan dibawah ini dengan memilih angka 1 sampai 5</p>
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Aplikasi </th>
                                                <th>
                                                    <center>1</center>
                                                </th>
                                                <th>
                                                    <center>2</center>
                                                </th>
                                                <th>
                                                    <center>3</center>
                                                </th>
                                                <th>
                                                    <center>4</center>
                                                </th>
                                                <th>
                                                    <center>5</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd gradeX">
                                                <td><strong>
                                                        1</strong></td>
                                                <td colspan="6"><strong>
                                                        Kesiapan Mengajar (KM)
                                                    </strong></td>
                                            </tr>
                                            <?php $no = 0;
                                            foreach ($pertanyaan1 as $prt1) : $no++;  ?>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <div style="float:right; font-weight: normal;"><?= $no ?></div>
                                                </td>
                                                <td style=" font-weight: normal;" class="pr"><?= $prt1->pertanyaan ?>
                                                </td>
                                                <td>
                                                    <div align="center">
                                                        <input type="radio"
                                                            name="1[<?php print $prt1->id_pertanyaan; ?>]" value="1"
                                                            id="p1km">
                                                    </div>
                                                </td>
                                                <td class="center">
                                                    <div align="center">
                                                        <input type="radio"
                                                            name="1[<?php print $prt1->id_pertanyaan; ?>]" value="2"
                                                            id="p2km">
                                                    </div>
                                                </td>
                                                <td class="center">
                                                    <div align="center">
                                                        <input type="radio"
                                                            name="1[<?php print $prt1->id_pertanyaan; ?>]" value="3"
                                                            id="p3km">
                                                    </div>
                                                </td>
                                                <td class="center">
                                                    <div align="center">
                                                        <input type="radio"
                                                            name="1[<?php print $prt1->id_pertanyaan; ?>]" value="4"
                                                            id="p4km">
                                                    </div>
                                                </td>
                                                <td class="center">
                                                    <div align="center">
                                                        <input type="radio"
                                                            name="1[<?php print $prt1->id_pertanyaan; ?>]" value="5"
                                                            id="p5km">
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>


                                            <tr class="odd gradeX">
                                                <td><strong>
                                                        2</strong></td>
                                                <td colspan="6"><strong>
                                                        Materi Pengajaran (MP)
                                                    </strong></td>
                                            </tr>
                                            <?php $no = 0;
                                            foreach ($pertanyaan2 as $prt2) : $no++;
                                            ?>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <div style="float:right; font-weight: normal;"><?= $no ?></div>
                                                </td>
                                                <td style=" font-weight: normal;" class="pr"><?= $prt2->pertanyaan ?>
                                                </td>
                                                <td>
                                                    <div align="center">
                                                        <input type="radio"
                                                            name="1[<?php print $prt2->id_pertanyaan; ?>]" value="1"
                                                            id="p1km">
                                                    </div>
                                                </td>
                                                <td class="center">
                                                    <div align="center">
                                                        <input type="radio"
                                                            name="1[<?php print $prt2->id_pertanyaan; ?>]" value="2"
                                                            id="p2km">
                                                    </div>
                                                </td>
                                                <td class="center">
                                                    <div align="center">
                                                        <input type="radio"
                                                            name="1[<?php print $prt2->id_pertanyaan; ?>]" value="3"
                                                            id="p3km">
                                                    </div>
                                                </td>
                                                <td class="center">
                                                    <div align="center">
                                                        <input type="radio"
                                                            name="1[<?php print $prt2->id_pertanyaan; ?>]" value="4"
                                                            id="p4km">
                                                    </div>
                                                </td>
                                                <td class="center">
                                                    <div align="center">
                                                        <input type="radio"
                                                            name="1[<?php print $prt2->id_pertanyaan; ?>]" value="5"
                                                            id="p5km">
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <tr class="odd gradeX">
                                                <td><strong>
                                                        3</strong></td>
                                                <td colspan="6"><strong>
                                                        Disiplin Mengajar (DM)
                                                    </strong></td>
                                            </tr>
                                            <?php $no = 0;
                                            foreach ($pertanyaan3 as $prt3) : $no++;
                                            ?>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <div style="float:right; font-weight: normal;"><?= $no ?></div>
                                                </td>
                                                <td style=" font-weight: normal;" class="pr"><?= $prt3->pertanyaan ?>
                                                </td>
                                                <td>
                                                    <div align="center">
                                                        <input type="radio"
                                                            name="1[<?php print $prt3->id_pertanyaan; ?>]" value="1"
                                                            id="p1km">
                                                    </div>
                                                </td>
                                                <td class="center">
                                                    <div align="center">
                                                        <input type="radio"
                                                            name="1[<?php print $prt3->id_pertanyaan; ?>]" value="2"
                                                            id="p2km">
                                                    </div>
                                                </td>
                                                <td class="center">
                                                    <div align="center">
                                                        <input type="radio"
                                                            name="1[<?php print $prt3->id_pertanyaan; ?>]" value="3"
                                                            id="p3km">
                                                    </div>
                                                </td>
                                                <td class="center">
                                                    <div align="center">
                                                        <input type="radio"
                                                            name="1[<?php print $prt3->id_pertanyaan; ?>]" value="4"
                                                            id="p4km">
                                                    </div>
                                                </td>
                                                <td class="center">
                                                    <div align="center">
                                                        <input type="radio"
                                                            name="1[<?php print $prt3->id_pertanyaan; ?>]" value="5"
                                                            id="p5km">
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <tr class="odd gradeX">
                                                <td><strong>
                                                        4</strong></td>
                                                <td colspan="6"><strong>
                                                        Evaluasi Mengajar (EMJ)
                                                    </strong></td>
                                            </tr>
                                            <?php $no = 0;
                                            foreach ($pertanyaan4 as $prt4) : $no++;
                                            ?>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <div style="float:right; font-weight: normal;"><?= $no ?></div>
                                                </td>
                                                <td style=" font-weight: normal;" class="pr"><?= $prt4->pertanyaan ?>
                                                </td>
                                                <td>
                                                    <div align="center">
                                                        <input type="radio"
                                                            name="1[<?php print $prt4->id_pertanyaan; ?>]" value="1"
                                                            id="p1km">
                                                    </div>
                                                </td>
                                                <td class="center">
                                                    <div align="center">
                                                        <input type="radio"
                                                            name="1[<?php print $prt4->id_pertanyaan; ?>]" value="2"
                                                            id="p2km">
                                                    </div>
                                                </td>
                                                <td class="center">
                                                    <div align="center">
                                                        <input type="radio"
                                                            name="1[<?php print $prt4->id_pertanyaan; ?>]" value="3"
                                                            id="p3km">
                                                    </div>
                                                </td>
                                                <td class="center">
                                                    <div align="center">
                                                        <input type="radio"
                                                            name="1[<?php print $prt4->id_pertanyaan; ?>]" value="4"
                                                            id="p4km">
                                                    </div>
                                                </td>
                                                <td class="center">
                                                    <div align="center">
                                                        <input type="radio"
                                                            name="1[<?php print $prt4->id_pertanyaan; ?>]" value="5"
                                                            id="p5km">
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <tr class="odd gradeX">
                                                <td><strong>
                                                        5</strong></td>
                                                <td colspan="6"><strong>
                                                        Kepribadian Dosen (KD)
                                                    </strong></td>
                                            </tr>
                                            <?php $no = 0;
                                            foreach ($pertanyaan5 as $prt5) : $no++;
                                            ?>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <div style="float:right; font-weight: normal;"><?= $no ?></div>
                                                </td>
                                                <td style=" font-weight: normal;" class="pr"><?= $prt5->pertanyaan ?>
                                                </td>
                                                <td>
                                                    <div align="center">
                                                        <input type="radio"
                                                            name="1[<?php print $prt5->id_pertanyaan; ?>]" value="1"
                                                            id="p1km">
                                                    </div>
                                                </td>
                                                <td class="center">
                                                    <div align="center">
                                                        <input type="radio"
                                                            name="1[<?php print $prt5->id_pertanyaan; ?>]" value="2"
                                                            id="p2km">
                                                    </div>
                                                </td>
                                                <td class="center">
                                                    <div align="center">
                                                        <input type="radio"
                                                            name="1[<?php print $prt5->id_pertanyaan; ?>]" value="3"
                                                            id="p3km">
                                                    </div>
                                                </td>
                                                <td class="center">
                                                    <div align="center">
                                                        <input type="radio"
                                                            name="1[<?php print $prt5->id_pertanyaan; ?>]" value="4"
                                                            id="p4km">
                                                    </div>
                                                </td>
                                                <td class="center">
                                                    <div align="center">
                                                        <input type="radio"
                                                            name="1[<?php print $prt5->id_pertanyaan; ?>]" value="5"
                                                            id="p5km">
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <tr class="odd gradeX">
                                                <td colspan="6"><strong>
                                                        Total :
                                                    </strong></td>
                                                <td>

                                                    <input type="text" name="nilai" maxlength="2" size="2" id="nilai"
                                                        value="<?= $nilai->nilai ?>" readonly required>
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                    <div style=" font-weight: normal;">Jika Anda memiliki masukan untuk memperbaiki
                                        proses belajar mengajar di jurusan
                                        tulislah dikolom dibawah ini:</div>
                                    <textarea name="pesan"
                                        style="width:800px;  font-weight: normal;"><?= $nilai->pesan ?></textarea><br>
                                    <?= form_error('pesan', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <div class="social-auth-links text-center">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <button type="button" class="btn btn-danger" id="hapusnilai">Hapus</button>
                                        <?php if (($user_session['level'] == 'mahasiswa')) { ?>
                                        <a href="<?= base_url('nilai') ?>" class="btn btn-success">Close</a>
                                        <?php } else if (($user_session['level'] == 'prodi')) { ?>
                                        <a href="<?= base_url('nilai-prd') ?>" class="btn btn-success">Close</a>
                                        <?php } else if (($user_session['level'] == 'prodi')) { ?>
                                        <a href="<?= base_url('nilai-prd') ?>" class="btn btn-success">Close</a>
                                        <?php } else if (($user_session['level'] == 'BPM')) { ?>
                                        <a href="<?= base_url('nilai-bpm') ?>" class="btn btn-success">Close</a>
                                        <?php } else { ?>
                                        <a href="<?= base_url('nilai-dosen') ?>" class="btn btn-success">Close</a>
                                        <?php   } ?>
                                    </div>
                            </form>
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