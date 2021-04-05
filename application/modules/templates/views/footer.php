<footer class="main-footer">
    &copy; <?php echo date('Y'); ?><span class="font-weight-bold"> Sistem Informasi Evaluasi Kinerja
        Dosen</span>
</footer>

</div>
<!-- jQuery 3 -->
<script src="<?= base_url('assets/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/'); ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/'); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?= base_url('assets/'); ?>bower_components/raphael/raphael.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/'); ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?= base_url('assets/'); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/'); ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/'); ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?= base_url('assets/'); ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?= base_url('assets/'); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js">
</script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?= base_url('assets/'); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/'); ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/'); ?>dist/js/demo.js"></script>
<!-- Bootstrap 3.3.7 -->
<!-- SlimScroll -->
<script src="<?= base_url('assets/'); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<script>
$(function() {
    $('#example1').DataTable()
    $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': true
    })
})
</script>
<script>
$(document).ready(function() {
    $("#selectLevel").change(function() {
        if ($(this).val() == "prodi") {
            $('#level').after(
                '<div class="form-group" name="prodi"><label>Prodi</label> <select class="form-control border border-dark" tabindex="-1" aria-hidden="true" name="selectProdi"><option selected="true" disabled="disabled">Pilih Prodi</option><?php foreach ($selectProdi as $prd) : ?><option value="<?= $prd->kd_prodi; ?>"><?= $prd->nama_prodi; ?></option> <?php endforeach; ?> </select></span></div>'
            )
            $('[name ="npm_mahasiswa"]').remove();
            $("#username").val('');
        } else if ($(this).val() == "mahasiswa") {
            $('#level').after(
                '<div class="form-group" name="npm_mahasiswa"><label>NPM</label> <select class="form-control border border-dark" tabindex="-1" aria-hidden="true" id="selectNPM" name="selectNPM"><option selected="true" disabled="disabled">Pilih Mahasiswa</option><?php foreach ($selectMahasiswa as $mhs) : ?><option value="<?= $mhs->NPM; ?>"><?= $mhs->NPM, ' : ', $mhs->nama_mahasiswa, ' : ', $mhs->nama_prodi; ?></option> <?php endforeach; ?> </select></div>'
            )
            $("#selectNPM").change(function() {
                var NPM = $("#selectNPM option:selected").val();
                $("#username").val(NPM);
            })
            $('[name="prodi"]').remove();
        } else {
            $('[name="prodi"]').remove();
            $('[name ="npm_mahasiswa"]').remove();
            $("#username").val('');
        }
        $("#level").trigger("change");
    });

    $('[name ="level_U"]').change(function() {
        if ($(this).val() == 'prodi') {
            $('[name="e_l_u"]').after(
                '<div class="form-group" name="e_prodi"><label>Prodi</label> <select class="form-control border border-dark" tabindex="-1" aria-hidden="true" name="s_e_prodi"><option selected="true" disabled="disabled">Pilih Prodi</option><?php foreach ($selectProdi as $prd) : ?><option value="<?= $prd->kd_prodi; ?>"><?= $prd->nama_prodi; ?></option> <?php endforeach; ?> </select></div>'
            )
        } else {
            $('[name="e_prodi"]').remove();
        }
    });

   

    window.setTimeout(function() {
        $("#msg").fadeTo(200, 0).slideUp(200, function() {
            $(this).remove();
        });
    }, 3000);


})
</script>
</body>

</html>