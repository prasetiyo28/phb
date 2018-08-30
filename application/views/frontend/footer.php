<script src="<?php echo base_url();?>assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
<script src="<?php echo base_url();?>assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>assets/js/libs/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/libs/spin.js/spin.min.js"></script>
<script src="<?php echo base_url();?>assets/js/libs/autosize/jquery.autosize.min.js"></script>
<script src="<?php echo base_url();?>assets/js/libs/DataTables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js"></script>
<script src="<?php echo base_url();?>assets/js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.js"></script>



<script src="<?php echo base_url();?>assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>

<script src="<?php echo base_url();?>assets/js/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>assets/js/libs/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets/js/libs/jquery-validation/dist/additional-methods.min.js"></script>
<script src="<?php echo base_url();?>assets/js/libs/jquery-validation/dist/localization/messages_id.js"></script>

<script src="<?php echo base_url();?>assets/js/libs/select2/select2.min.js"></script>
<script src="<?php echo base_url();?>assets/js/core/source/App.js"></script>
<script src="<?php echo base_url();?>assets/js/core/source/AppNavigation.js"></script>
<script src="<?php echo base_url();?>assets/js/core/source/AppCard.js"></script>
<script src="<?php echo base_url();?>assets/js/core/source/AppForm.js"></script>
<script src="<?php echo base_url();?>assets/js/core/source/AppNavSearch.js"></script>
<script src="<?php echo base_url();?>assets/js/core/source/AppVendor.js"></script>
<script src="<?php echo base_url();?>assets/js/core/demo/Demo.js"></script>

<script src="<?php echo base_url();?>assets/js/libs/toastr/toastr.js"></script>

<script src="<?php echo base_url();?>assets/js/libs/summernote/summernote.min.js"></script>



<script src="<?php echo base_url();?>assets/js/libs/moment/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/js/libs/moment/moment-with-langs.min.js"></script>
<?php if ($chart==true): ?>
      <script src="<?php echo base_url();?>assets/js/libs/flot/jquery.flot.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/libs/flot/jquery.flot.time.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/libs/flot/jquery.flot.resize.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/libs/flot/jquery.flot.orderBars.js"></script>
      <script src="<?php echo base_url();?>assets/js/libs/flot/jquery.flot.pie.js"></script>
      <script src="<?php echo base_url();?>assets/js/libs/flot/curvedLines.js"></script>
      <script src="<?php echo base_url();?>assets/js/libs/jquery-knob/jquery.knob.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/libs/sparkline/jquery.sparkline.min.js"></script>
<?php endif; ?>

<?php if ($map==true): ?>
<script src="<?php echo base_url();?>assets/js/libs/jquery-ui/jquery-ui.min.js"></script>
<?php endif; ?>

<!-- <script src="<?php echo base_url();?>assets/js/core/demo/DemoDashboard.js"></script> -->
<script type="text/javascript">
  $(function() {
    moment.locale('id');
    $.validator.addMethod("badWords", function(value,element) {
      var balik;
      var data = new FormData();
      data.append('text', value);
      $.ajax(
        {
          type: "POST",
          data: data,
          async: false,
          processData: false,
          contentType: false,
          url: "<?php echo base_url('Auth/find_bad_words/'); ?>",
          success: function(data)
        {
          if (data=="1") {
              balik= false;
            }else {
              balik= true;
            }
          },
        error:function(data)
       {alert("Terjadi kesalahan!!! Coba lagi. Cek setiap inputan");}
      });
      return balik;

    }, $.validator.format("Terdapat kata yang tidak pantas, harap benarkan kolom ini."));


})

function NewToastStyle() {
        toastr.clear();
        toastr.options.closeButton = false;
        toastr.options.progressBar = true;
        toastr.options.debug = false;
        toastr.options.positionClass = 'toast-top-right';
        toastr.options.showDuration = 333;
        toastr.options.hideDuration = 333;
        toastr.options.timeOut = 5000;
        toastr.options.extendedTimeOut = 1000;
        toastr.options.showEasing = 'swing';
        toastr.options.hideEasing = 'swing';
        toastr.options.showMethod = 'slideDown';
        toastr.options.hideMethod = 'slideUp';
}

</script>
