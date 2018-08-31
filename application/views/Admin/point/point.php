<div id="content">
  <section>
    <div class="section-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Admin'); ?>">home</a></li>
        <li class="active">Point</li>
      </ol>
    </div><!--end .section-header -->
    <div class="section-body contain-lg">
      <!-- BEGIN INTRO -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="text-primary">Point</h1>
        </div><!--end .col -->
        <div class="col-lg-8">
          <article class="margin-bottom-xxl">
            <p class="lead">
              Mengatur point dan konfirmasi penukaran point .
            </p>
          </article>
        </div><!--end .col -->
      </div><!--end .row -->
      <!-- END INTRO -->

      <!-- BEGIN BASIC ELEMENTS -->
      <div class="row">
        <div class="col-lg-12">
          <h4>Tukar Point</h4>
        </div><!--end .col -->
        <div class="col-lg-2 col-md-3">
          <article class="margin-bottom-xxl">
            <ul class="list-divided">
              <li>
                Penukaran Point
              </li>
            </ul>
          </article>
        </div><!--end .col -->
        <div class="col-lg-offset-1 col-md-9 col-sm-6">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table id="datatable1" class="table table-striped table-hover no-margin">
                  <thead>
                    <tr>
                      <th class="sort-numeric">No</th>
                      <th>Nama</th>
                      <th>Tukar Hadiah</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach ($tukar_point as $g): $no++;?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $g->id_user ?></td>
                      <td><?php echo $g->hadiah ?></td>
                      <td>
                        <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-success" onclick="terima(<?php echo $g->id_tukar_point; ?>)" ><i class="fa fa-check"></i></button>
                        <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-danger" onclick="tolak(<?php echo $g->id_tukar_point; ?>)"><i class="fa fa-close"></i></button>
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
                <input type="hidden" name="hal" value="2">
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
                  <input type="hidden" name="hal" value="2">
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

  $('#btn_batal_hadiah').click(function() {
    $("#form_hadiah").attr('action',"<?php echo base_url('Admin/tambah_hadiah'); ?>");
    $('#form_hadiah')[0].reset();
    $('#btn_batal_hadiah').hide();
  });

})


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
function terima(id) {
  NewToastStyle();
  			var message = 'Anda akan menerima penukaran ini?. <button type="button" onclick="tukarAct('+id+',1)" class="btn btn-flat btn-primary toastr-action">YA</button>';
  			toastr.info(message, '');
}
function tolak(id) {
  NewToastStyle();
  			var message = 'Anda akan menolak penukaran ini?. <button type="button" onclick="tukarAct('+id+',2)" class="btn btn-flat btn-primary toastr-action">YA</button>';
  			toastr.info(message, '');
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
function tukarAct(id,str) {
  var data = new FormData();

    data.append('id', id);
    data.append('str', str);
    var url = "<?php echo base_url('Admin/tukarAct/'); ?>";

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
