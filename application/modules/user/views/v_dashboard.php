<!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h2 class="display-4">Selamat Datang <?php
                                                            if ($user_session['level'] == "admin") {
                                                                echo $user_session['username'], '..!<br> Status Anda Admin';
                                                            } elseif ($user_session['level'] == "BPM") {
                                                                echo $user_session['username'], '..!<br>Status Anda BPM';
                                                            } elseif ($user_session['level'] == "prodi") {
                                                                echo $user_session['username'], '..!<br>Status Anda Prodi';
                                                            } elseif ($user_session['level'] == "dosen") {
                                                                echo $user_session['username'], '..!<br>Anda seorang Dosen';
                                                            } elseif ($user_session['level'] == "mahasiswa") {
                                                                echo $user_session['username'], '..!<br>Anda seorang Mahasiswa';
                                                            } else
                                                                echo 'Tidak terdaftar';
                                                            ?></h2>
                    <p class="lead">SISTEM EVALUASI KINERJA DOSEN
                        UNIVERSITAS ALMUSLIM </p>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- ./wrapper -->