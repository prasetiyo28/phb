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
<div id="modal_vemail" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <form class="form form-validate" novalidate="novalidate" method="post" action="<?php echo base_url('User/verifikasi_email') ?>">
      <div class="card">
       <div class="card-head style-primary">
        <header>Verifikasi Email</header>
        <div class="tools">
          <div class="btn-group">
            <a class="btn btn-icon-toggle" data-dismiss="modal"><i class="md md-close"></i></a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="q alert alert-callout alert-success" role="alert" style="display:none;">
         <strong>Kode terkirim!</strong> Cek email anda dan masukkan kode verifikasi. Kode verifikasi akan kadaluarsa dalam 5 menit.
         <strong class="pull-right" id="timer"></strong>
         <br>
         Tidak menerima pesan? <a href="javascript:void(0)" class="text-primary" onclick="kirim_kode_vemail()"><strong>KIRIM ULANG</strong></a>
       </div>
       <div class="qa alert alert-callout alert-info" role="alert">
        Klik tombol dibawah untuk mengirim kode verifikasi email anda.
      </div>
      <div class="q form-group" style="display:none;">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="text" class="form-control" name="kode" data-rule-minlength="6" required data-rule-digits="true">
        <label for="Username">Masukkan Kode</label>
      </div>
      <div class="qa form-group text-center">
        <button type="button" class="btn ink-reaction btn-raised btn-primary btn-loading-state" onclick="kirim_kode_vemail()" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Sedang mengirim...">Kirim Kode<div class="ink" style="top: 22px; left: 70.5156px;"></div></button>
      </div>
    </div><!--end .card-body -->
    <div class="card-actionbar">
      <div class="q card-actionbar-row" style="display:none;">

        <button type="submit" class="btn btn-flat btn-primary ink-reaction">Verifikasi</button>
      </div>
    </div>
  </div><!--end .card -->
</form>
</div>
</div>

<div id="modal_vtelp" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <form class="form form-validate" novalidate="novalidate" method="post" action="<?php echo base_url('User/verifikasi_telp') ?>" target="_blank">
      <div class="card">
       <div class="card-head style-primary">
        <header>Verifikasi Nomor Telepon (HP)</header>
        <div class="tools">
          <div class="btn-group">
            <a class="btn btn-icon-toggle" data-dismiss="modal"><i class="md md-close"></i></a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="qx alert alert-callout alert-success" role="alert" style="display:none;">
         <strong>Kode terkirim!</strong> Cek pesan masuk telepon anda dan masukkan kode verifikasi. Kode verifikasi akan kadaluarsa dalam 5 menit.
         <strong class="pull-right" id="timer1"></strong>
         <br>
         Tidak menerima pesan? <a href="javascript:void(0)" class="text-primary" onclick="kirim_kode_vtelp()"><strong>KIRIM ULANG</strong></a>
       </div>
       <div class="qax alert alert-callout alert-info" role="alert">
        Klik tombol dibawah untuk mengirim kode verifikasi nomor telepon anda.
      </div>
      <div class="qx form-group" style="display:none;">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="text" class="form-control" name="kode" data-rule-minlength="6" required data-rule-digits="true">
        <label >Masukkan Kode</label>
      </div>
      <div class="qax form-group text-center">
        <button type="button" class="btn ink-reaction btn-raised btn-primary btn-loading-state" onclick="kirim_kode_vtelp()" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Sedang mengirim...">Kirim Kode<div class="ink" style="top: 22px; left: 70.5156px;"></div></button>
      </div>
    </div><!--end .card-body -->
    <div class="card-actionbar">
      <div class="qx card-actionbar-row" style="display:none;">

        <button type="submit" class="btn btn-flat btn-primary ink-reaction">Verifikasi</button>
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

function kirim_kode_vemail() {
  $.ajax({
    type:"GET",
    url: "<?php echo base_url('User/kirim_kode_vemail') ?>/",
  }).done(function(data) {
    if (data==1) {
      toastr.info("Kode verifikasi berhasil dikirim ke email anda.", "");
      $(".q").show();
      $(".qa").hide();
      document.getElementById('timer').innerHTML =
      05 + ":" + 00;
      startTimer();
    }else {
      toastr.info("Gagal mengirim kode verifikasi", "");
    }
  });
}
function back_email() {
  toastr.info("Kode verifikasi kedaluarsa.", "");
  $(".qa").show();
  $(".q").hide();
}

function startTimer() {
  var presentTime = document.getElementById('timer').innerHTML;
  var timeArray = presentTime.split(/[:]+/);
  var m = timeArray[0];
  var s = checkSecond((timeArray[1] - 1));
  if(s==59){m=m-1}
    if(m<0){
      back_email();
    }else {
      document.getElementById('timer').innerHTML =
      m + ":" + s;
      setTimeout(startTimer, 1000);
    }


  }

  function checkSecond(sec) {
  if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
  if (sec < 0) {sec = "59"};
  return sec;
}

function kirim_kode_vtelp() {
  $.ajax({
    type:"GET",
    url: "<?php echo base_url('User/kirim_kode_vtelp') ?>/",
  }).done(function(str) {
    var url=String(str);
    $.ajax({
      url : url,
      type: "GET",
      success: function(data)
      {
        var respon = xmlToJson(data)['response']['message']['text']
        if (respon=='Success') {
          toastr.info("Kode verifikasi berhasil dikirim ke nomor telepon anda.", "");
          $(".qx").show();
          $(".qax").hide();
          document.getElementById('timer1').innerHTML =
          05 + ":" + 00;
          startTimer1();
        }else {
          toastr.info("Gagal mengirim kode verifikasi", "");
        }
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        toastr.error('Error get API SMS. Coba beberapa saat lagi.', '');
      }
    });
  });
}
function back_telp() {
  toastr.info("Kode verifikasi kedaluarsa.", "");
  $(".qax").show();
  $(".qx").hide();
}

function startTimer1() {
  var presentTime = document.getElementById('timer1').innerHTML;
  var timeArray = presentTime.split(/[:]+/);
  var m = timeArray[0];
  var s = checkSecond((timeArray[1] - 1));
  if(s==59){m=m-1}
    if(m<0){
      back_telp();
    }else {
      document.getElementById('timer1').innerHTML =
      m + ":" + s;
      setTimeout(startTimer1, 1000);
    }


  }
  function xmlToJson(xml) {

	// Create the return object
	var obj = {};

	if (xml.nodeType == 1) { // element
		// do attributes
		if (xml.attributes.length > 0) {
      obj["@attributes"] = {};
      for (var j = 0; j < xml.attributes.length; j++) {
        var attribute = xml.attributes.item(j);
        obj["@attributes"][attribute.nodeName] = attribute.nodeValue;
      }
    }
	} else if (xml.nodeType == 3) { // text
		obj = xml.nodeValue;
	}

	// do children
	// If just one text node inside
	if (xml.hasChildNodes() && xml.childNodes.length === 1 && xml.childNodes[0].nodeType === 3) {
		obj = xml.childNodes[0].nodeValue;
	}
	else if (xml.hasChildNodes()) {
		for(var i = 0; i < xml.childNodes.length; i++) {
			var item = xml.childNodes.item(i);
			var nodeName = item.nodeName;
			if (typeof(obj[nodeName]) == "undefined") {
				obj[nodeName] = xmlToJson(item);
			} else {
				if (typeof(obj[nodeName].push) == "undefined") {
					var old = obj[nodeName];
					obj[nodeName] = [];
					obj[nodeName].push(old);
				}
				obj[nodeName].push(xmlToJson(item));
			}
		}
	}
	return obj;
}
</script>
