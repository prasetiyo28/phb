<div id="modal_akun" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <form class="form form-validate" novalidate="novalidate" method="post" action="<?php echo $url ?>">
				<div class="card">
					<div class="card-head style-primary">
						<header>Konfigurasi Akun</header>
            <div class="tools">
              <div class="btn-group">
                <a class="btn btn-icon-toggle" data-dismiss="modal"><i class="md md-close"></i></a>
              </div>
            </div>
					</div>
					<div class="card-body">
                <div class="form-group">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <input type="text" class="form-control" name="username" required value="<?php echo $username ?>" data-rule-minlength="6" required data-rule-duplicatUser="true" required data-rule-duplicatAdmin="true">
                  <label for="Username">Username</label>
                </div>
                <div class="form-group">
                  <input type="password" id="password1" class="form-control" name="password" data-rule-minlength="6">
                  <label for="Password">Password</label>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password1" data-rule-equalTo="#password1">
                  <label for="Password">Ketik Ulang Password</label>
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


<div id="modal_foto" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <form class="form form-validate" id="form_foto" novalidate="novalidate" method="post" action="<?php echo $url_foto ?>"  enctype="multipart/form-data">
				<div class="card">
					<div class="card-head style-primary">
						<header>Ganti Foto</header>
            <div class="tools">
              <div class="btn-group">
                <a class="btn btn-icon-toggle" data-dismiss="modal"><i class="md md-close"></i></a>
              </div>
            </div>
					</div>
					<div class="card-body">
            <div id="div_alert1">
              <div class="form-group ">
                <center>
                    <img id="uploadPreviewsp1" src="<?php echo base_url('assets/uploads').'/'.$foto?>" class="img-responsive img-circle" style="right: 9em;" alt="User profile picture" style="max-width: 200px;">
                  <div class="btn ink-reaction btn-raised btn-primary">
                    <center>
                    <i class="fa fa-paperclip fa-lg"></i> <span id="filename1">Foto</span>
                    <input type="file" id="img1" name="img" value="" style=" position: absolute;top: 0;right: 0;left: 0;bottom: 0;width: 100%;margin: 0;padding: 0;font-size: 20px;cursor: pointer;opacity: 0;filter: alpha" onchange="PreviewImagesp1();">
                  </center>
                 </div>
                 <br>
                 <span class="text-danger" id="s1"></span>

               </center>
               <input type="hidden" name="foto_lama" value="<?php echo $foto; ?>">
               <input type="hidden" name="id" value="<?php echo $id; ?>">
               <input type="hidden" id="parm1" name="parm1">
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
function PreviewImagesp1() {
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("img1").files[0]);
  oFReader.onload = function (oFREvent)
  {
    document.getElementById("uploadPreviewsp1").src = oFREvent.target.result;
  };
  var filename = $('#img1').val().replace(/.*(\/|\\)/, '');
  $('#filename1').text(filename);
  if (filename!="") {
    var ext =filename.split('.').pop().toLowerCase();
     switch(ext) {
     case 'jpg':
     case 'png':
     case 'jpeg':
      $('#parm1').val('1');
      $('#div_alert1').removeClass('card card-outlined style-danger');
      $('#s1').text('');

     break;
     default:
     $('#div_alert1').addClass('card card-outlined style-danger');
     $('#s1').text('Harap masukkan ekstensi yang benar.');
     }
  }else {
    $('#parm1').val('');
  }
}

$(function() {
  $('#form_foto').submit(function(e) {

    if ($('#parm1').val()=='') {
      $('#div_alert1').addClass('card card-outlined style-danger');
      $('#s1').text('Isian ini harus di isi.');
      e.preventDefault(); // Cancel the submit

    }else {
      $('#div_alert1').removeClass('card card-outlined style-danger');
      $('#s1').text('');
    }
  });
})

</script>
