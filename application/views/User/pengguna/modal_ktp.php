<div id="modal_ktp" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <form class="form form-validate" id="form_ktp" novalidate="novalidate" method="post" action="<?php echo base_url('User/update_foto_ktp') ?>"  enctype="multipart/form-data">
				<div class="card">
					<div class="card-head style-primary">
						<header>Ganti Foto KTP</header>
            <div class="tools">
              <div class="btn-group">
                <a class="btn btn-icon-toggle" data-dismiss="modal"><i class="md md-close"></i></a>
              </div>
            </div>
					</div>
					<div class="card-body">
            <div id="div_alert2">
              <div class="form-group ">
                <center>
                    <img id="uploadPreviewsp2" src="<?php echo base_url('assets/uploads').'/'.$foto_ktp?>" class="img-responsive img-circle" style="right: 9em;" alt="Foto KTP" style="max-width: 200px;">
                  <div class="btn ink-reaction btn-raised btn-primary">
                    <center>
                    <i class="fa fa-paperclip fa-lg"></i> <span id="filename2">Foto</span>
                    <input type="file" id="img2" name="img" value="" style=" position: absolute;top: 0;right: 0;left: 0;bottom: 0;width: 100%;margin: 0;padding: 0;font-size: 20px;cursor: pointer;opacity: 0;filter: alpha" onchange="PreviewImagesp2();">
                  </center>
                 </div>
                 <br>
                 <span class="text-danger" id="s2"></span>

               </center>
               <input type="hidden" name="foto_lama" value="<?php echo $foto_ktp; ?>">
               <input type="hidden" name="id" value="<?php echo $id; ?>">
               <input type="hidden" id="parm2" name="parm1">
             </div>
            </div>
  				</div><!--end .card-body -->
          <div class="card-actionbar">
            <div class="card-actionbar-row">
              <button type="submit" class="btn btn-flat btn-primary ink-reaction">Perbaharui</button>
            </div>
          </div>
        </div><!--end .card -->
  	</form>
  </div>
</div>
<script type="text/javascript">
function PreviewImagesp2() {
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("img2").files[0]);
  oFReader.onload = function (oFREvent)
  {
    document.getElementById("uploadPreviewsp2").src = oFREvent.target.result;
  };
  var filename = $('#img2').val().replace(/.*(\/|\\)/, '');
  $('#filename2').text(filename);
  if (filename!="") {
    var ext =filename.split('.').pop().toLowerCase();
     switch(ext) {
     case 'jpg':
     case 'png':
     case 'jpeg':
      $('#parm2').val('1');
      $('#div_alert2').removeClass('card card-outlined style-danger');
      $('#s2').text('');

     break;
     default:
     $('#div_alert2').addClass('card card-outlined style-danger');
     $('#s2').text('Harap masukkan ekstensi yang benar.');
     }
  }else {
    $('#parm1').val('');
  }
}

$(function() {
  $('#form_foto').submit(function(e) {

    if ($('#parm2').val()=='') {
      $('#div_alert2').addClass('card card-outlined style-danger');
      $('#s2').text('Isian ini harus di isi.');
      e.preventDefault(); // Cancel the submit

    }else {
      $('#div_alert2').removeClass('card card-outlined style-danger');
      $('#s2').text('');
    }
  });
})

</script>
