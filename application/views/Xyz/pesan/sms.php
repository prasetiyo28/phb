<!-- BEGIN CONTENT-->
<div id="content">
  <section class=" style-default-bright">

    <!-- BEGIN INBOX -->
    <div class="section-body">
      <div class="row">

        <!-- BEGIN INBOX NAV -->
        <div class="col-sm-4 col-md-3 col-lg-2">
          <form class="navbar-search margin-bottom-xxl" role="search">
            <div class="form-group">
              <input type="text" class="form-control" name="contactSearch" placeholder="Enter your keyword">
            </div>
            <button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
          </form>
          <ul class="nav nav-pills nav-stacked nav-icon">
            <li><small>SMS GATEWAY</small></li>
            <li id="liba"><a href="javascript:void(0)" onclick="new_sms()"><span class="glyphicon glyphicon-plus"></span>Baru</a></li>
            <li id="libr"><a href="javascript:void(0)" onclick="new_broadcast()"><span class="fa fa-bullhorn"></span>Broadcast</a></li>
            <li id="lik" class="active"><a  href="<?php echo base_url('Xyz/sms') ?>"><span class="glyphicon glyphicon-inbox"></span>Kotak Keluar</a></li>
          </ul>
        </div><!--end . -->
        <!-- END INBOX NAV -->

        <div class="col-sm-8 col-md-9 col-lg-10">
          <div class="text-divider visible-xs"><span>Kotak keluar</span></div>
          <div class="row">

            <!-- BEGIN INBOX EMAIL LIST -->
            <div id="divTabel" class="col-md-6 col-lg-12 height-6 scroll-sm">
              <div class="list-group list-email list-gray">
                <table id="datatable1" class="table">
                  <thead>
                    <th>
                      List
                    </th>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach ($sms as $c):
                      $no++;
                      ?>

                    <tr>
                      <td style="padding:0px;">
                        <a  href="javascript:void(0)" onclick="viewsms('<?php echo $c->id_sms; ?>','<?php echo tampil_user_sms($c->id_user); ?>','<?php echo tampil_admin_by_id($c->id_admin); ?>','#t_m<?php echo $no ?>','<?php echo waktu_lalu2($c->cdate); ?>')" class="list-group-item">
                          <h4 id="namea"><?php echo substr(tampil_user_sms($c->id_user),0,20); ?>...</h4>
                          <div class="stick-top-right small-padding text-default-light text-sm"><?php echo waktu_lalu2($c->cdate) ?></div>
                          <p class="hidden-xs hidden-sm"><?php echo substr($c->message,0,100); ?>...</p>
                          <p id="t_m<?php echo $no ?>" style="display:none;"><?php echo $c->message ?></p>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>

                  </tbody>
                </table>
              </div>
            </div><!--end .col -->
            <!-- END INBOX EMAIL LIST -->
            <div id="divBroadcast" class="col-md-6 col-lg-12 height-6 scroll-sm"  style="display:none;">
                <h2 class="no-margin">Broadcast SMS</h2>
                <div class="col-md-6 col-sm-6">
                  <form class="form" id="form_broadcast">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group floating-label">
                          <textarea name="message_broadcast" class="form-control autosize" rows="6" data-rule-badWords="true" required></textarea>
                          <label>Isi Pesan</label>
                        </div>
                      </div>
                      <div class="pull-right col-sm-1">
                        <button type="button" onclick="send_broadcast()" class="btn ink-reaction btn-floating-action btn-primary"><i class="md md-send"></i></button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-offset-1 col-md-5 col-sm-6">
                  <div class="alert alert-info" role="alert">
                    <strong>NOTICE!</strong> <br>
                    Pesan akan dikirim ke seluruh penguna (user). Anda dapat menyisipkan nama dan berita terbaru dengan kode unik sebagai berikut :
                    <br>
                    <ul>
                      <li>
                        <strong>[nama]</strong> akan menampilkan nama pengguna sesuai akun.
                      </li>
                      <li>
                        <strong>[terbaru]</strong> akan menampilkan link berita terbaru hari ini.
                      </li>
                      <li>
                        <strong>[terbaru-pertanian]</strong> akan menampilkan link berita terbaru pada bidang pertanian.
                      </li>
                      <li>
                        <strong>[terbaru-perikanan]</strong> akan menampilkan link berita terbaru pada bidang perikanan.
                      </li>
                      <li>
                        <strong>[terbaru-peternakan]</strong> akan menampilkan link berita terbaru pada bidang peternakan.
                      </li>

                    </ul>
                  </div>

                </div>
            </div><!--end .col -->

            <!-- BEGIN EMAIL CONTENT -->
            <div id="box_chat" class="col-md-6 col-lg-7" style="display:none;">
              <input type="hidden" id="id_sms" value="">
                <div class="card-body">
                    <div class="text-divider hidden-md hidden-lg"><span>SMS</span></div>
                    <h3 class="no-margin" id="dari">Dari : </h3>
                    <div class="btn-group stick-top-right">
                      <a href="javascript:void(0)" onclick="hapus_sms()" class="btn btn-icon-toggle btn-default"><i class="md md-delete"></i></a>
                      <a href="javascript:void(0)" onclick="closeSMS()" class="btn btn-icon-toggle btn-default"><i class="md md-clear"></i></a>
                    </div>
                    <span class="pull-right text-default-light" id="waktu"></span>

                    <strong id="kepada">Kepada :
                    </strong>
                    <hr/>
                    <p id="isi">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                      </p>

                </div>
                <!-- END OFFCANVAS CHAT -->
            </div><!--end .col -->
            <!-- END EMAIL CONTENT -->

            <div id="divSMS" class="col-md-6 col-lg-12 height-6 scroll-sm" style="display:none;" >
                <h2 class="no-margin">Kirim SMS</h2>
                <div class="col-md-6 col-sm-6">
                  <form class="form" id="form_sms">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <select class="form-control select2-list" data-placeholder="Pilih" name="to[]" multiple>
                            <optgroup label="Pengguna">
                              <?php foreach ($user as $p): ?>
                                <option value="<?php echo $p->id_user?>"><?php echo $p->nama ?></option>
                              <?php endforeach; ?>
                            </optgroup>
                          </select>
                          <label>To</label>
                        </div><!--end .form-group -->

                        <div class="form-group floating-label">
                          <textarea name="message_sms" class="form-control autosize" rows="6" data-rule-badWords="true" required></textarea>
                          <label>Isi Pesan</label>
                        </div>
                      </div>
                      <div class="pull-right col-sm-1">
                        <button type="button" onclick="send_sms()" class="btn ink-reaction btn-floating-action btn-primary"><i class="md md-send"></i></button>
                      </div>
                    </div>
                  </form>


                </div>
                <div class="col-md-offset-1 col-md-5 col-sm-6">
                  <div class="alert alert-info" role="alert">
                    <strong>NOTICE!</strong> <br>
                    Pesan akan dikirim ke penguna (user) yang dituju. Anda dapat menyisipkan nama dan berita terbaru dengan kode unik sebagai berikut :
                    <br>
                    <ul>
                      <li>
                        <strong>[nama]</strong> akan menampilkan nama pengguna sesuai akun.
                      </li>
                      <li>
                        <strong>[terbaru]</strong> akan menampilkan link berita terbaru hari ini.
                      </li>
                      <li>
                        <strong>[terbaru-pertanian]</strong> akan menampilkan link berita terbaru pada bidang pertanian.
                      </li>
                      <li>
                        <strong>[terbaru-perikanan]</strong> akan menampilkan link berita terbaru pada bidang perikanan.
                      </li>
                      <li>
                        <strong>[terbaru-peternakan]</strong> akan menampilkan link berita terbaru pada bidang peternakan.
                      </li>

                    </ul>
                  </div>

                </div>

            </div><!--end .col -->


          </div><!--end .row -->
        </div><!--end .col -->
      </div><!--end .row -->
    </div><!--end .section-body -->
    <!-- END INBOX -->

  </section>
</div><!--end #content-->
<!-- END CONTENT -->

<div id="viewcanvas"></div>
<script type="text/javascript">

		function kirim(url,jml,jml_kirim) { //url dari flashdata yang dikirim server php / function
						$.ajax({
				      url : url,
				      type: "GET",
				      success: function(data)
				      {
				      	var jml_kirimnya = jml_kirim+1;
						var respon = xmlToJson(data)['response']['message']['text']
				        if (respon=='Success') {

				          if (jml==jml_kirimnya) {
                    toastr.success("SMS berhasil dikirim.", '');
				          	window.location.href="<?php echo base_url('Xyz/sms') ?>";
				          }

				        }else {
                  toastr.danger("1 SMS gagal dikirim, coba lagi.", '');
				        }
				      },
				      error: function (jqXHR, textStatus, errorThrown)
				      {
                toastr.danger("Error get API SMS. Coba beberapa saat lagi.", '');
				      }
				  });

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
<script type="text/javascript">
$(document).ready(function() {
  $('select').select2();

  toastr.options.positionClass = 'toast-bottom-left';
  <?php if ($this->session->flashdata('alert')==true) {
    echo $this->session->flashdata('alert');
  } ?>

  $("#form_chat").validate();
    $('#datatable1').DataTable( {
         "button": false,
         "lengthMenu": [[3, 5, 10, -1], [3, 5, 10, "All"]]
    } );

} );
function viewsms(id_sms,id_user,id_admin,message,cdate) {

    $('#dari').text('Dari : '+id_admin);
    $('#kepada').text('Kepada : '+id_user);
    $('#waktu').text(cdate);
    $('#isi').text($(message).text());
    $('#id_sms').val(id_sms);

    $("#divTabel").removeClass('col-lg-12 ');
    $("#divTabel").addClass('col-lg-5');
    $("#box_chat").addClass('col-md-6 col-lg-7');
    $("#box_chat").show('slow');

}
function hapus_sms() {
  NewToastStyle();
  var id =$('#id_sms').val();
  var message = 'Anda akan menghapus ini?. <button type="button" onclick="deleteAct('+id+')" class="btn btn-flat btn-primary toastr-action">YA</button>';
  toastr.info(message, '');
}
function deleteAct(id) {
  var data = new FormData();
  data.append('id', id);
  $.ajax(
    {
      type: "POST",
      url: "<?php echo base_url('Xyz/deleteSMS/'); ?>",
      data: data,
      processData: false,
      contentType: false,
      success: function(data)
        {
          if (data=='1')
          {

            toastr.clear();
            toastr.options.progressBar = false;
            toastr.options.timeOut = 2000;
            toastr.success('Berhasil menghapus data', '');
            setTimeout(function () {
              window.location.reload();
            }, 2000);
          }
          else if(data=='0')
          {
            toastr.clear();
            toastr.options.progressBar = false;
            toastr.options.timeOut = 2000;
            toastr.error('Gagal menghapus data. Coba lagi.', '');
          }
          else{alert(data);}
        },
      error:function(data)
        {
          toastr.clear();
          toastr.options.progressBar = false;
          toastr.options.timeOut = 2000;
          toastr.warning('Terjadi kesalahan!!! Coba lagi.', '');
        }
      });
}
function closeSMS() {
  $("#box_chat").hide('slow');
  $("#divTabel").removeClass('col-lg-5');
  $("#divTabel").addClass('col-lg-12 ');
}

function new_broadcast() {
  $("#box_chat").hide('slow');
  $("#divTabel").hide('slow');
  $("#divSMS").hide('slow');
  $("#divBroadcast").show('slow');
  $("#lik").removeClass('active');
  $("#liba").removeClass('active');
  $("#libr").addClass('active');
}
function send_broadcast() {
  var valid = $('#form_broadcast').valid();
  if(!valid) {
    $('#form_broadcast').data('validator').focusInvalid();
    return false;
  }else {
    var data = new FormData
    data.append('message', $('[name="message_broadcast"]').val());

    $.ajax({
      type: "POST",
      data: data,
      processData: false,
      contentType: false,
      url: "<?php echo base_url('Xyz/send_broadcast_sms')?>",
      success: function(data)
      {
        var obj = JSON.parse(data);

				if (obj.length == 0) {
          toastr.warning("Tidak ada nomor yang dikirim", '');
				}else{
					for (var i = obj.length - 1; i >= 0; i--) {
						kirim(obj[i],obj.length,i);
					}
				}

      },
      error:function(data)
      {toastr.warning("Terjadi kesalahan!!! Coba lagi.", '');}
  });
  }
}

function new_sms() {
  $("#box_chat").hide('slow');
  $("#divTabel").hide('slow');
  $("#divBroadcast").hide('slow');
  $("#divSMS").show('slow');
  $("#lik").removeClass('active');
  $("#libr").removeClass('active');
  $("#liba").addClass('active');

}

function send_sms() {
  var valid = $('#form_sms').valid();
  if(!valid) {
    $('#form_sms').data('validator').focusInvalid();
    return false;
  }else {
    var data = new FormData
    data.append('message', $('[name="message_sms"]').val());
    data.append('to', $('[name="to[]"]').val());


    $.ajax({
      type: "POST",
      data: data,
      processData: false,
      contentType: false,
      url: "<?php echo base_url('Xyz/send_sms')?>",
      success: function(data)
      {
        var obj = JSON.parse(data);
				if (obj.length == 0) {
          toastr.warning("Tidak ada nomor yang dikirim", '');
				}else{
					for (var i = obj.length - 1; i >= 0; i--) {
						kirim(obj[i],obj.length,i);
					}
				}

      },
      error:function(data)
      {toastr.warning("Terjadi kesalahan!!! Coba lagi.", '');}
  });
  }
}


</script>
