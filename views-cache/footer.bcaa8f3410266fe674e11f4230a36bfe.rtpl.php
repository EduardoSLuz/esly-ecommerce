<?php if(!class_exists('Rain\Tpl')){exit;}?>  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer no-print">
    <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="https://astemac.com.br" target="_blank">Astemac</a>.</strong>
    Todos os direitos reservados.
    
  </footer>

</div>
<!-- ./wrapper -->

<?php require $this->checkTemplate("modals");?>


<!-- jQuery -->
<script src="/resources/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/resources/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/resources/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/resources/admin/plugins/chart.js/Chart.min.js"></script>
<!-- bs-custom-file-input -->
<script src="/resources/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Select2 -->
<script src="/resources/admin/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="/resources/admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- Jquery Mask -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js'></script>
<!-- jQuery Knob Chart -->
<script src="/resources/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- date-range-picker -->
<script src="/resources/admin/plugins/moment/moment.min.js"></script>
<script src="/resources/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="/resources/admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/resources/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="/resources/admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="/resources/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="/resources/admin/dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="/resources/admin/dist/js/demo.js"></script>
<!-- jsGrid -->
<script src="/resources/admin/plugins/jsgrid/demos/db.js"></script>
<script src="/resources/admin/plugins/jsgrid/jsgrid.min.js"></script>

<!-- My Js -->
<script src="/resources/js/admin_global.js"></script>
<script src="/resources/js/mask.js"></script>

<?php if( isset($id) && $id > 0 || isset($stores) && $stores !== 0 ){ ?>

<script src="/resources/js/admin_stores.js"></script>
<?php } ?>


<?php if( isset($userData) ){ ?>

<script src="/resources/js/admin_users.js"></script>
<?php } ?>


<?php if( isset($orders) ){ ?>

<script src="/resources/js/admin_orders.js"></script>
<?php } ?>


<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
</script>

<script>
  $(function () {
    
    //Initialize Select2 Elements
    $('.select2').select2();

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Colorpicker 1 a 20
    $('.my-colorLy1').colorpicker()
    $('.my-colorLy1').on('colorpickerChange', function(event) {
      $('.my-colorLy1 .colorsLyFooter1').css('color', event.color.toString());
    });

    $('.my-colorLy2').colorpicker()
    $('.my-colorLy2').on('colorpickerChange', function(event) {
      $('.my-colorLy2 .colorsLyFooter2').css('color', event.color.toString());
    });

    $('.my-colorLy3').colorpicker()
    $('.my-colorLy3').on('colorpickerChange', function(event) {
      $('.my-colorLy3 .colorsLyFooter3').css('color', event.color.toString());
    });

    $('.my-colorLy4').colorpicker()
    $('.my-colorLy4').on('colorpickerChange', function(event) {
      $('.my-colorLy4 .colorsLyFooter4').css('color', event.color.toString());
    });

    $('.my-colorLy5').colorpicker()
    $('.my-colorLy5').on('colorpickerChange', function(event) {
      $('.my-colorLy5 .colorsLyFooter5').css('color', event.color.toString());
    });

    $('.my-colorLy6').colorpicker()
    $('.my-colorLy6').on('colorpickerChange', function(event) {
      $('.my-colorLy6 .colorsLyFooter6').css('color', event.color.toString());
    });

    $('.my-colorLy7').colorpicker()
    $('.my-colorLy7').on('colorpickerChange', function(event) {
      $('.my-colorLy7 .colorsLyFooter7').css('color', event.color.toString());
    });

    $('.my-colorLy8').colorpicker()
    $('.my-colorLy8').on('colorpickerChange', function(event) {
      $('.my-colorLy8 .colorsLyFooter8').css('color', event.color.toString());
    });

    $('.my-colorLy9').colorpicker()
    $('.my-colorLy9').on('colorpickerChange', function(event) {
      $('.my-colorLy9 .colorsLyFooter9').css('color', event.color.toString());
    });

    $('.my-colorLy10').colorpicker()
    $('.my-colorLy10').on('colorpickerChange', function(event) {
      $('.my-colorLy10 .colorsLyFooter10').css('color', event.color.toString());
    });

    $('.my-colorLy11').colorpicker()
    $('.my-colorLy11').on('colorpickerChange', function(event) {
      $('.my-colorLy11 .colorsLyFooter11').css('color', event.color.toString());
    });

    $('.my-colorLy12').colorpicker()
    $('.my-colorLy12').on('colorpickerChange', function(event) {
      $('.my-colorLy12 .colorsLyFooter12').css('color', event.color.toString());
    });

    $('.my-colorLy13').colorpicker()
    $('.my-colorLy13').on('colorpickerChange', function(event) {
      $('.my-colorLy13 .colorsLyFooter13').css('color', event.color.toString());
    });

    $('.my-colorLy14').colorpicker()
    $('.my-colorLy14').on('colorpickerChange', function(event) {
      $('.my-colorLy14 .colorsLyFooter14').css('color', event.color.toString());
    });

    $('.my-colorLy15').colorpicker()
    $('.my-colorLy15').on('colorpickerChange', function(event) {
      $('.my-colorLy15 .colorsLyFooter15').css('color', event.color.toString());
    });

    $('.my-colorLy16').colorpicker()
    $('.my-colorLy16').on('colorpickerChange', function(event) {
      $('.my-colorLy16 .colorsLyFooter16').css('color', event.color.toString());
    });

    $('.my-colorLy17').colorpicker()
    $('.my-colorLy17').on('colorpickerChange', function(event) {
      $('.my-colorLy17 .colorsLyFooter17').css('color', event.color.toString());
    });

    $('.my-colorLy18').colorpicker()
    $('.my-colorLy18').on('colorpickerChange', function(event) {
      $('.my-colorLy18 .colorsLyFooter18').css('color', event.color.toString());
    });

    $('.my-colorLy19').colorpicker()
    $('.my-colorLy19').on('colorpickerChange', function(event) {
      $('.my-colorLy19 .colorsLyFooter19').css('color', event.color.toString());
    });

    $('.my-colorLy20').colorpicker()
    $('.my-colorLy20').on('colorpickerChange', function(event) {
      $('.my-colorLy20 .colorsLyFooter20').css('color', event.color.toString());
    });
    
    $(function () {
        $('[data-toggle="popover"]').popover();
        $('[data-toggle="tooltip"]').tooltip();
    })

    $("#jsGrid1").jsGrid({
        height: "100%",
        width: "100%",
 
        sorting: true,
        paging: true,
 
        data: db.clients,
 
        fields: [
            { name: "Name", type: "text", width: 150 },
            { name: "Age", type: "number", width: 50 },
            { name: "Address", type: "text", width: 200 },
            { name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
            { name: "Married", type: "checkbox", title: "Is Married" }
        ]
    });
  });
</script>

</body>
</html>