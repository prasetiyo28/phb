<div id="content">
  <section>
    <div class="section-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Xyz'); ?>">home</a></li>
        <li class="active">Pengaturan</li>
      </ol>
    </div><!--end .section-header -->
    <div class="section-body contain-lg">


      <!-- BEGIN INTRO -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="text-primary">Pengaturan Master Data</h1>
        </div><!--end .col -->
        <div class="col-lg-8">
          <article class="margin-bottom-xxl">
            <p class="lead">
              Mengatur realtime chat, server email gateway, server sms gateway, sensor kata, bloklir kata kasar dan icon map.
            </p>
          </article>
        </div><!--end .col -->
      </div><!--end .row -->
      <!-- END INTRO -->
      <!-- BEGIN BASIC ELEMENTS -->
      <div class="row">
        <div class="col-lg-12">
          <h4>Realtime chat</h4>
        </div><!--end .col -->
        <div class="col-lg-2 col-md-3">
          <article class="margin-bottom-xxl">
            <ul class="list-divided">
              <li>
                 Mengatur realtime chat aktif dan durasi realtime.
              </li>
            </ul>
          </article>
        </div><!--end .col -->
        <div class="col-lg-offset-1 col-md-3 col-sm-6">
          <form class="form form-validate" novalidate="novalidate" method="post" id="form_realtime" action="<?php echo base_url('Xyz/update_realtime_chat/') ?>">
          <div class="card">
            <div class="card-body">
                <div class="form-group">
                  <input type="hidden" name="id" value="<?php echo chatRealtime()[2] ?>">
                  <br>
                  <?php if (chatRealtime()[0]=='true'): ?>
                  <div class="radio radio-styled">
										<label>
											<input type="radio" name="value1[]" value="true" checked>
											<span>On</span>
										</label>
									</div>
                  <div class="radio radio-styled">
										<label>
											<input type="radio" name="value1[]" value="false" >
											<span>Off</span>
										</label>
									</div>
                  <?php else: ?>
                    <div class="radio radio-styled">
  										<label>
  											<input type="radio" name="value1[]" value="true" >
  											<span>On</span>
  										</label>
  									</div>
                    <div class="radio radio-styled">
  										<label>
  											<input type="radio" name="value1[]" value="false" checked>
  											<span>Off</span>
  										</label>
  									</div>
                  <?php endif; ?>
                  <label for="value1">Realtime chat</label>
                </div>
                <div class="form-group">
                  <input type="text"  name="value2" class="form-control" value="<?php echo chatRealtime()[1] ?>" required>
                  <label for="password1">Durasi realtime (detik)</label>
                </div>
            </div><!--end .card-body -->
            <div class="card-actionbar">
              <div class="card-actionbar-row">
                <button type="submit" id="btn_realtime" class="btn btn-flat btn-primary ink-reaction">Simpan</button>
              </div>
            </div>
          </div><!--end .card -->
        </form>
        </div><!--end .col -->
        <div class="col-md-6 col-sm-6">
        </div><!--end .col -->
      </div><!--end .row -->
      <!-- END BASIC ELEMENTS -->

      <!-- BEGIN BASIC ELEMENTS -->
      <div class="row">
        <div class="col-lg-12">
          <h4>Server Gateway</h4>
        </div><!--end .col -->
        <div class="col-lg-2 col-md-3">
          <article class="margin-bottom-xxl">
            <ul class="list-divided">
              <li>
                Server email gateway. <br> Value 1 : smtp_user, Value 2 : password, Value 3 : smtp_host.
              </li>
              <li>
                Server sms gateway menggunakan zenziva. <br> Value 1 : username, Value 2 : password, Value 3 : kosongkan.
              </li>
            </ul>
          </article>
        </div><!--end .col -->
        <div class="col-lg-offset-1 col-md-3 col-sm-6">
          <form class="form form-validate" novalidate="novalidate" method="post" action="<?php echo base_url() ?>/Xyz/update_gateway" id="form_gtwy">
          <div class="card">
            <div class="card-body">
                <div class="form-group">
                  <input type="hidden" id="id_gtwy" name="id_config" value="">
                  <input type="text" id="value1" name="value1" class="form-control" required>
                  <label for="value1">Value 1</label>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="value2" name="value2" required>
                  <label for="password1">Value 2</label>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="value3" name="value3">
                  <label for="placeholder1">Value 3</label>
                </div>
            </div><!--end .card-body -->
            <div class="card-actionbar">
              <div class="card-actionbar-row">
                <button type="submit" id="btn_simpan_gtwy" class="btn btn-flat btn-primary ink-reaction" style="display:none;">Simpan</button>
                <button type="button" id="btn_batal_gtwy" class="btn btn-flat btn-danger ink-reaction" style="display:none;">Batal</button>
              </div>
            </div>
          </div><!--end .card -->
        </form>
          <em class="text-caption" id="nama_gateway"></em>
        </div><!--end .col -->
        <div class="col-md-6 col-sm-6">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover no-margin">
                  <thead>
                    <tr>
                      <th class="sort-numeric">No</th>
                      <th>Nama</th>
                      <th>Value 1</th>
                      <th>Value 2</th>
                      <th>Value 3</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach ($gateway as $g): $no++;?>
                      <?php if ($g->nama!='Chat Realtime'): ?>
                        <tr onclick="edit_gateway(<?php echo $g->id_config ?>)">
                          <td><?php echo $no; ?></td>
                          <td><?php echo $g->nama ?></td>
                          <td><?php echo $g->value1 ?></td>
                          <td><?php echo $g->value2 ?></td>
                          <td><?php echo $g->value3 ?></td>
                        </tr>
                      <?php endif; ?>
                  <?php endforeach; ?>
                  </tbody>
                </table>

              </div>
            </div><!--end .card-body -->
          </div><!--end .card -->
        </div><!--end .col -->
      </div><!--end .row -->
      <!-- END BASIC ELEMENTS -->

      <!-- BEGIN BASIC ELEMENTS -->
      <div class="row">
        <div class="col-lg-12">
          <h4>Sensor Text</h4>
        </div><!--end .col -->
        <div class="col-lg-2 col-md-3">
          <article class="margin-bottom-xxl">
            <ul class="list-divided">
              <li>
                Sensor kata kotor. <br> Membuat kata yang masuk menjadi di sensor. <br> Ex: Bodoh > Bo***
              </li>
            </ul>
          </article>
        </div><!--end .col -->
        <div class="col-lg-offset-1 col-md-3 col-sm-6">
          <form class="form form-validate" novalidate="novalidate" method="post" id="form_sensor">
          <div class="card">
            <div class="card-body">
                <div class="form-group">
                  <input type="hidden" id="id_sensor" name="id_sensor" value="">
                  <input type="text" id="kata_sensor" name="_text" class="form-control" required>
                  <label for="value1">Kata</label>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="hasil_sensor" name="_replace" required>
                  <label for="password1">Sensor</label>
                </div>
            </div><!--end .card-body -->
            <div class="card-actionbar">
              <div class="card-actionbar-row">
                <button type="submit" id="btn_simpan_sensor" class="btn btn-flat btn-primary ink-reaction">Simpan</button>
                <button type="button" id="btn_batal_sensor" class="btn btn-flat btn-danger ink-reaction" style="display:none;">Batal</button>
              </div>
            </div>
          </div><!--end .card -->
        </form>
        </div><!--end .col -->
        <div class="col-md-6 col-sm-6">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table id="datatable1" class="table table-striped table-hover no-margin">
                  <thead>
                    <tr>
                      <th class="sort-numeric">No</th>
                      <th>Kata</th>
                      <th>Sensor</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach ($sensor as $g): $no++;?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $g->_text ?></td>
                      <td><?php echo $g->_replace ?></td>
                      <td>
                        <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-primary" onclick="edit_sensor(<?php echo $g->id_sensor; ?>)" ><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-danger" onclick="deleteSensor(<?php echo $g->id_sensor; ?>)"><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>

              </div>
            </div><!--end .card-body -->
          </div><!--end .card -->
        </div><!--end .col -->
      </div><!--end .row -->
      <!-- END BASIC ELEMENTS -->

      <!-- BEGIN BASIC ELEMENTS -->
      <div class="row">
        <div class="col-lg-12">
          <h4>Block Text</h4>
        </div><!--end .col -->
        <div class="col-lg-2 col-md-3">
          <article class="margin-bottom-xxl">
            <ul class="list-divided">
              <li>
                Blokir kata kotor. <br> Membuat kata kotor yang masuk benar-benar tidak akan masuk kedalam database.
              </li>
            </ul>
          </article>
        </div><!--end .col -->
        <div class="col-lg-offset-1 col-md-3 col-sm-6">
          <form class="form form-validate" novalidate="novalidate" method="post" id="form_blok">
          <div class="card">
            <div class="card-body">
                <div class="form-group">
                  <input type="hidden" id="id_blok" name="id_sensor" value="">
                  <input type="text" id="kata_blok" name="_text" class="form-control" required>
                  <label for="value1">Blokir Kata</label>
                </div>
            </div><!--end .card-body -->
            <div class="card-actionbar">
              <div class="card-actionbar-row">
                <button type="submit" id="btn_simpan_blok" class="btn btn-flat btn-primary ink-reaction">Simpan</button>
                <button type="button" id="btn_batal_blok" class="btn btn-flat btn-danger ink-reaction" style="display:none;">Batal</button>
              </div>
            </div>
          </div><!--end .card -->
        </form>
        </div><!--end .col -->
        <div class="col-md-6 col-sm-6">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table id="datatable2" class="table table-striped table-hover no-margin">
                  <thead>
                    <tr>
                      <th class="sort-numeric">No</th>
                      <th>Kata</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach ($blok as $g): $no++;?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $g->_text ?></td>
                      <td>
                        <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-primary" onclick="edit_blok(<?php echo $g->id_sensor; ?>)" ><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-danger" onclick="deleteSensor(<?php echo $g->id_sensor; ?>)"><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>

              </div>
            </div><!--end .card-body -->
          </div><!--end .card -->
        </div><!--end .col -->
      </div><!--end .row -->
      <!-- END BASIC ELEMENTS -->

      <!-- BEGIN BASIC ELEMENTS -->
      <div class="row">
        <div class="col-lg-12">
          <h4>Icon Map</h4>
        </div><!--end .col -->
        <div class="col-lg-2 col-md-3">
          <article class="margin-bottom-xxl">
            <ul class="list-divided">
              <li>
                Data pilihan untuk ikon maps produksi.
              </li>
            </ul>
          </article>
        </div><!--end .col -->
        <div class="col-lg-offset-1 col-md-3 col-sm-6">
          <form class="form form-validate" novalidate="novalidate" method="post" id="form_icon" enctype="multipart/form-data" >
          <div class="card">
            <div class="card-body">
                <div class="form-group">
                  <input type="hidden" id="id_icon" name="id_icon" value="">
                  <input type="text" id="nama_icon" name="nama" class="form-control" required>
                  <label for="value1">Nama</label>
                </div>
                <div class="form-group">
                  <div id="div_alert">
                  <div class="form-group ">
                    <center>
                      <div id="file-preview">

                      </div>
                      <img id="uploadPreviewsp" src="<?php echo base_url('assets/uploads/icon/1.png')?>" class="img-responsive img-circle" style="right: 9em;" alt="User profile picture" style="max-width: 200px;max-height: 200px;">
                      <div class="btn ink-reaction btn-raised btn-primary">
                        <center>
                        <i class="fa fa-paperclip fa-lg"></i> <span id="filename">ICON</span>
                        <input type="file" id="img" name="img" value="" style=" position: absolute;top: 0;right: 0;left: 0;bottom: 0;width: 100%;margin: 0;padding: 0;font-size: 20px;cursor: pointer;opacity: 0;filter: alpha" onchange="PreviewImagesp();" >
                      </center>
                     </div>
                     <br>
                     <span class="text-danger" id="s"></span>
                   </center>

                   <input type="hidden" id="parm" name="parm">
                   <input type="hidden" name="icon_lama" id="icon_lama">
                  </div>
                  </div>
                </div>
                <div>
                  <label class="radio-inline radio-styled">
                    <input type="radio" id="p1"  name="bidang" value="1" checked><span>Pertanian</span>
                  </label>
                  <br>
                  <label class="radio-inline radio-styled">
                    <input type="radio" id="p2" name="bidang" value="2"><span>Perikanan</span>
                  </label>
                  <br>
                  <label class="radio-inline radio-styled">
                    <input type="radio" id="p3" name="bidang" value="3"><span>Peternakan</span>
                  </label>

                </div>
            </div><!--end .card-body -->
            <div class="card-actionbar">
              <div class="card-actionbar-row">
                <button type="submit" id="btn_simpan_icon" class="btn btn-flat btn-primary ink-reaction">Simpan</button>
                <button type="button" id="btn_batal_icon" class="btn btn-flat btn-danger ink-reaction" style="display:none;">Batal</button>
              </div>
            </div>
          </div><!--end .card -->
        </form>
        </div><!--end .col -->
        <div class="col-md-6 col-sm-6">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table id="datatable3" class="table table-striped table-hover no-margin">
                  <thead>
                    <tr>
                      <th class="sort-numeric">No</th>
                      <th>Nama</th>
                      <th>Icon</th>
                      <th>Bidang</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach ($icon as $g): $no++;?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $g->nama ?></td>
                      <td>
                        <img src="<?php echo base_url('assets/uploads/icon/'.$g->icon )?>" class="img-responsive img-circle" >
                      </td>
                      <td>
                        <?php if ($g->bidang=='1'): ?>
                          <strong class="text-success"><?php echo bidang($g->bidang) ?></strong>
                        <?php elseif ($g->bidang=='2'): ?>
                          <strong class="text-info"><?php echo bidang($g->bidang) ?></strong>
                        <?php else: ?>
                          <strong class="text-warning"><?php echo bidang($g->bidang) ?></strong>
                        <?php endif; ?>

                        </td>
                      <td>
                        <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-primary" onclick="edit_icon(<?php echo $g->id_icon; ?>)" ><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-danger" onclick="deleteicon(<?php echo $g->id_icon; ?>)"><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>

              </div>
            </div><!--end .card-body -->
          </div><!--end .card -->
        </div><!--end .col -->
      </div><!--end .row -->
      <!-- END BASIC ELEMENTS -->




    </div><!--end .section-body -->
  </section>
</div>


<div id="viewcanvas"></div>

<script type="text/javascript">

$(function() {
  toastr.options.positionClass = 'toast-bottom-left';
  <?php if ($this->session->flashdata('alert')==true) {
    echo $this->session->flashdata('alert');
  } ?>
  <?php if ($this->session->flashdata('gagal_icon')==true) {
    echo $this->session->flashdata('gagal_icon');
  } ?>
  $("#form_sensor").attr('action',"<?php echo base_url('Xyz/tambah_sensor'); ?>");
  $("#form_blok").attr('action',"<?php echo base_url('Xyz/tambah_blok'); ?>");
  $("#form_icon").attr('action',"<?php echo base_url('Xyz/tambah_icon'); ?>");

  $("#form_icon").submit(function(e) {
    if ($('#parm').val()=='') {
      $('#div_alert').addClass('card card-outlined style-danger');
      $('#s').text('Isian ini harus di isi.');
      e.preventDefault();
      return false;
    }else {
        $('#div_alert').removeClass('card card-outlined style-danger');
        $('#s').text('');
    }
   });

  $('#datatable1').DataTable({
  "language": {
    "lengthMenu": '_MENU_ entries per page',
    "search": '<i class="fa fa-search"></i>',
    "paginate": {
      "previous": '<i class="fa fa-angle-left"></i>',
      "next": '<i class="fa fa-angle-right"></i>'
    }
  }
  });
  $('#datatable2').DataTable({
  "language": {
    "lengthMenu": '_MENU_ entries per page',
    "search": '<i class="fa fa-search"></i>',
    "paginate": {
      "previous": '<i class="fa fa-angle-left"></i>',
      "next": '<i class="fa fa-angle-right"></i>'
    }
  }
  });

  $('#datatable3').DataTable({
  "language": {
    "lengthMenu": '_MENU_ entries per page',
    "search": '<i class="fa fa-search"></i>',
    "paginate": {
      "previous": '<i class="fa fa-angle-left"></i>',
      "next": '<i class="fa fa-angle-right"></i>'
    }
  }
  });

  $('#btn_batal_gtwy').click(function() {
    $('#form_gtwy')[0].reset();
    $('#btn_simpan_gtwy').hide();
    $('#btn_batal_gtwy').hide();
    $('#nama_gateway').text('');
  });
  $('#btn_batal_sensor').click(function() {
    $("#form_sensor").attr('action',"<?php echo base_url('Xyz/tambah_sensor'); ?>");
    $('#form_sensor')[0].reset();
    $('#btn_batal_sensor').hide();
  });
  $('#btn_batal_blok').click(function() {
    $("#form_blok").attr('action',"<?php echo base_url('Xyz/tambah_blok'); ?>");
    $('#form_blok')[0].reset();
    $('#btn_batal_blok').hide();
  });
  $('#btn_batal_icon').click(function() {
    $("#form_icon").attr('action',"<?php echo base_url('Xyz/tambah_icon'); ?>");
    $('#form_icon')[0].reset();
    $('#btn_batal_icon').hide();
    $('#filename').text('ICON');
    $('#uploadPreviewsp').show();
    $('#file-preview').hide();
    document.getElementById("uploadPreviewsp").src="<?php echo base_url('assets/uploads/icon/1.png') ?>"
    $('#parm').val('');
  });
})

function edit_gateway(id) {
  $.ajax(
    {
      type: "GET",
      url: "<?php echo base_url('Xyz/edit_gateway'); ?>/"+id,
      dataType:"JSON"
    }
  ).done(function( data )
  {
    $('#form_gtwy')[0].reset();
    $('#value1').val(data.value1);
    $('#value2').val(data.value2);
    $('#value3').val(data.value3);
    $('#nama_gateway').text(data.nama);
    $('#id_gtwy').val(data.id_config);
    $('#btn_simpan_gtwy').show();
    $('#btn_batal_gtwy').show();
  });
}
function edit_sensor(id) {
  $.ajax(
    {
      type: "GET",
      url: "<?php echo base_url('Xyz/edit_sensor'); ?>/"+id,
      dataType:"JSON"
    }
  ).done(function( data )
  {
    $('#form_sensor')[0].reset();
    $('#kata_sensor').val(data._text);
    $('#hasil_sensor').val(data._replace);
    $('#id_sensor').val(data.id_sensor);
    $('#btn_batal_sensor').show();
    $("#form_sensor").removeAttr("action");
    $("#form_sensor").attr('action',"<?php echo base_url('Xyz/update_sensor'); ?>");

  });
}
function edit_blok(id) {
  $.ajax(
    {
      type: "GET",
      url: "<?php echo base_url('Xyz/edit_sensor'); ?>/"+id,
      dataType:"JSON"
    }
  ).done(function( data )
  {
    $('#form_blok')[0].reset();
    $('#kata_blok').val(data._text);
    $('#id_blok').val(data.id_sensor);
    $('#btn_batal_blok').show();
    $("#form_sensor").removeAttr("action");
    $("#form_blok").attr('action',"<?php echo base_url('Xyz/update_blok'); ?>");

  });
}
function edit_icon(id) {
  var base_url = '<?php echo base_url();?>';
  $.ajax(
    {
      type: "GET",
      url: "<?php echo base_url('Xyz/edit_icon'); ?>/"+id,
      dataType:"JSON"
    }
  ).done(function( data )
  {
    $('#form_icon')[0].reset();
    $('#nama_icon').val(data.nama);
    $('#file-preview').html('<img src="'+base_url+'assets/uploads/icon/'+data.icon+'" class="img-responsive img-circle" style="right: 9em;" alt="User profile picture" style="max-width: 200px;max-height: 200px;">'); // show photo
    $('#icon_lama').val(data.icon);
    if (data.bidang=='1') {
      $('#p1').prop('checked', true);
    }else if (data.bidang=='2') {
      $('#p2').prop('checked', true);
    }else {
      $('#p3').prop('checked', true);
    }
    $('#filename').text(data.icon);
    $('#id_icon').val(data.id_icon);
    $('#uploadPreviewsp').hide();
    $('#file-preview').show();
    $('#btn_batal_icon').show();
    $('#parm').val('2');
    $("#form_icon").removeAttr("action");
    $("#form_icon").attr('action',"<?php echo base_url('Xyz/update_icon'); ?>");

  });
}
function deleteSensor(id) {
  NewToastStyle();

  			var message = 'Anda akan menghapus data ini?. <button type="button" onclick="deleteAct('+id+',1)" class="btn btn-flat btn-primary toastr-action">YA</button>';
  			toastr.info(message, '');
}
function deleteicon(id) {
  NewToastStyle();

  			var message = 'Anda akan menghapus icon ini?. Jika data berelasi maka akan terjadi ganguan dalam sistem. <button type="button" onclick="deleteAct('+id+',2)" class="btn btn-flat btn-primary toastr-action">YA</button>';
  			toastr.info(message, '');
}
function deleteAct(id,str) {
  var data = new FormData();
  if (str=='1') {
    data.append('id_sensor', id);
    var url = "<?php echo base_url('Xyz/deleteSensor/'); ?>";
  }else {
    data.append('id_icon', id);
    var url = "<?php echo base_url('Xyz/deleteIcon/'); ?>";
  }
  $.ajax(
    {
      type: "POST",
      url: url,
      data: data,
      processData: false,
      contentType: false,
      success: function(data)
        {
          if (data=='sukses')
          {

            toastr.clear();
            toastr.options.progressBar = false;
            toastr.options.timeOut = 2000;
            toastr.success('Berhasil menghapus data', '');
            setTimeout(function () {
              window.location.reload();
            }, 2000);
          }
          else if(data=='gagal')
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

function PreviewImagesp() {
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("img").files[0]);
  oFReader.onload = function (oFREvent)
  {
    document.getElementById("uploadPreviewsp").src = oFREvent.target.result;
    $('#uploadPreviewsp').show();
    $('#file-preview').hide();
  };
  var filename = $('#img').val().replace(/.*(\/|\\)/, '');
  $('#filename').text(filename);
  if (filename!="") {
    var ext =filename.split('.').pop().toLowerCase();
     switch(ext) {
     case 'jpg':
     case 'png':
     case 'jpeg':
     case 'ico':
      $('#parm').val('1');
      $('#div_alert').removeClass('card card-outlined style-danger');
      $('#s').text('');

     break;
     default:
     $('#div_alert').addClass('card card-outlined style-danger');
     $('#s').text('Harap masukkan ekstensi yang benar.');
     }

  }else {
    $('#parm').val('');
  }
}
</script>
