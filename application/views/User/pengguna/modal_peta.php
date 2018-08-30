<div id="modal_peta" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-lg">
    <!-- Modal content-->
    <center>
      <div class="col-md-12 height-12">
        <div id="mapi" style="position: absolute;top: 0;bottom: 0;right: 0;left: 0;"></div>
      </div>
    </center>
    <br> <br>
      <form action="<?php echo base_url('User/update_peta')?>" id="form_peta" method="post">
        <input type="hidden" id="lat" name="lt" >
        <input type="hidden" id="lng" name="lg" >
        <input type="hidden" id="id" name="id">
        <input type="hidden" id="lokasi1" name="lokasi">
        <div class="col-md-12" style="padding-top:15px;">
          <button id="btn_submit_peta" type="submit" class="btn ink-reaction btn-raised btn-block btn-primary text-center">Simpan</button>
        </div>
      </form>

  </div>
</div>


<script type="text/javascript">
$(function() {


})
</script>
