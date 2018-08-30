<div id="content">
  <section>
    <div class="section-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Admin'); ?>">home</a></li>
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
              Mengatur Realtime chat, point, sensor kata dan bloklir kata kasar .
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
          <form class="form form-validate" novalidate="novalidate" method="post" id="form_realtime" action="<?php echo base_url('Admin/update_realtime_chat/') ?>">
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
          <h4>Point</h4>
        </div><!--end .col -->
        <div class="col-lg-2 col-md-3">
          <article class="margin-bottom-xxl">
            <ul class="list-divided">
              <li>
                 Mengatur point yang diberikan saat user melakukan input produksi dan melakukan konfirmasi panen produksi.
              </li>
            </ul>
          </article>
        </div><!--end .col -->
        <div class="col-lg-offset-1 col-md-3 col-sm-6">
          <form class="form form-validate" novalidate="novalidate" method="post" id="form_point" action="<?php echo base_url('Admin/update_point/') ?>">
          <div class="card">
            <div class="card-body">
                <div class="form-group">
                  <input type="hidden" name="id" value="<?php echo configPoint()[1] ?>">
                </div>
                <div class="form-group">
                  <input type="text"  name="point" class="form-control" value="<?php echo configPoint()[0] ?>" required>
                  <label>Point</label>
                </div>
            </div><!--end .card-body -->
            <div class="card-actionbar">
              <div class="card-actionbar-row">
                <button type="submit" id="btn_point" class="btn btn-flat btn-primary ink-reaction">Simpan</button>
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
          <h4>Hadiah Point</h4>
        </div><!--end .col -->
        <div class="col-lg-2 col-md-3">
          <article class="margin-bottom-xxl">
            <ul class="list-divided">
              <li>
                Hadiah yang diberikan ketika user menukar point
              </li>
            </ul>
          </article>
        </div><!--end .col -->
        <div class="col-lg-offset-1 col-md-3 col-sm-6">
          <form class="form form-validate" novalidate="novalidate" method="post" id="form_hadiah">
          <div class="card">
            <div class="card-body">
                <div class="form-group">
                  <input type="hidden" id="id_hadiah" name="id_hadiah" value="">
                  <input type="text" id="hadiah" name="hadiah" class="form-control" required>
                  <label for="value1">Hadiah</label>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="point" name="point" required>
                  <label for="password1">Point</label>
                </div>
            </div><!--end .card-body -->
            <div class="card-actionbar">
              <div class="card-actionbar-row">
                <button type="submit" id="btn_simpan_hadiah" class="btn btn-flat btn-primary ink-reaction">Simpan</button>
                <button type="button" id="btn_batal_hadiah" class="btn btn-flat btn-danger ink-reaction" style="display:none;">Batal</button>
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
                      <th>Hadiah</th>
                      <th>Point</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach ($hadiah as $g): $no++;?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $g->hadiah ?></td>
                      <td><?php echo $g->point ?></td>
                      <td>
                        <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-primary" onclick="edit_hadiah(<?php echo $g->id_hadiah_point; ?>)" ><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-danger" onclick="delete_hadiah(<?php echo $g->id_hadiah_point; ?>)"><i class="fa fa-trash"></i></button>
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
  $("#form_sensor").attr('action',"<?php echo base_url('Admin/tambah_sensor'); ?>");
  $("#form_blok").attr('action',"<?php echo base_url('Admin/tambah_blok'); ?>");
  $("#form_hadiah").attr('action',"<?php echo base_url('Admin/tambah_hadiah'); ?>");

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


  $('#btn_batal_sensor').click(function() {
    $("#form_sensor").attr('action',"<?php echo base_url('Admin/tambah_sensor'); ?>");
    $('#form_sensor')[0].reset();
    $('#btn_batal_sensor').hide();
  });
  $('#btn_batal_blok').click(function() {
    $("#form_blok").attr('action',"<?php echo base_url('Admin/tambah_blok'); ?>");
    $('#form_blok')[0].reset();
    $('#btn_batal_blok').hide();
  });
  $('#btn_batal_hadiah').click(function() {
    $("#form_hadiah").attr('action',"<?php echo base_url('Admin/tambah_hadiah'); ?>");
    $('#form_hadiah')[0].reset();
    $('#btn_batal_hadiah').hide();
  });

})

function edit_sensor(id) {
  $.ajax(
    {
      type: "GET",
      url: "<?php echo base_url('Admin/edit_sensor'); ?>/"+id,
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
    $("#form_sensor").attr('action',"<?php echo base_url('Admin/update_sensor'); ?>");

  });
}
function edit_blok(id) {
  $.ajax(
    {
      type: "GET",
      url: "<?php echo base_url('Admin/edit_sensor'); ?>/"+id,
      dataType:"JSON"
    }
  ).done(function( data )
  {
    $('#form_blok')[0].reset();
    $('#kata_blok').val(data._text);
    $('#id_blok').val(data.id_sensor);
    $('#btn_batal_blok').show();
    $("#form_sensor").removeAttr("action");
    $("#form_blok").attr('action',"<?php echo base_url('Admin/update_blok'); ?>");

  });
}
function edit_hadiah(id) {
  $.ajax(
    {
      type: "GET",
      url: "<?php echo base_url('Admin/edit_hadiah'); ?>/"+id,
      dataType:"JSON"
    }
  ).done(function( data )
  {
    $('#form_hadiah')[0].reset();
    $('#hadiah').val(data.hadiah);
    $('#point').val(data.point);
    $('#id_hadiah').val(data.id_hadiah_point);
    $('#btn_batal_sensor').show();
    $("#form_hadiah").removeAttr("action");
    $("#form_hadiah").attr('action',"<?php echo base_url('Admin/update_hadiah'); ?>");

  });
}
function deleteSensor(id) {
  NewToastStyle();

  			var message = 'Anda akan menghapus data ini?. <button type="button" onclick="deleteAct('+id+',1)" class="btn btn-flat btn-primary toastr-action">YA</button>';
  			toastr.info(message, '');
}
function delete_hadiah(id) {
  NewToastStyle();

  			var message = 'Anda akan menghapus data ini?. <button type="button" onclick="deleteAct('+id+',2)" class="btn btn-flat btn-primary toastr-action">YA</button>';
  			toastr.info(message, '');
}
function deleteAct(id,str) {
  var data = new FormData();
  if (str=='1') {
    data.append('id_sensor', id);
    var url = "<?php echo base_url('Admin/deleteSensor/'); ?>";
  }else {
    data.append('id_hadiah_point', id);
    var url = "<?php echo base_url('Admin/deleteHadiah/'); ?>";
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

</script>
