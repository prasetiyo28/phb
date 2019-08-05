<div id="content">
  <section>
    <div class="section-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Xyz'); ?>">home</a></li>
        <li class="active">wirausahawan</li>
      </ol>
    </div><!--end .section-header -->
    <div class="section-body contain-lg">


      <!-- BEGIN INTRO -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="text-primary">Data Wirausahwan</h1>
        </div><!--end .col -->
        <div class="col-lg-8">
          <article class="margin-bottom-xxl">
            <p class="lead">
              Mengelola Data Wirausahawan yang bermitra dengan aplikasi ini.
            </p>
          </article>
        </div><!--end .col -->
      </div><!--end .row -->
      <!-- END INTRO -->




      <!-- BEGIN BASIC ELEMENTS -->
      <div class="row">
        <div class="col-lg-12">
          <h4>Data Wirausahawan</h4>
        </div><!--end .col -->
        <div class="col-lg-2 col-md-3">
          <article class="margin-bottom-xxl">
            <ul class="list-divided">
              <li>
                Data Wirausahawan 
              </li>
            </ul>
          </article>
        </div><!--end .col -->
        <div class="col-lg-offset-1 col-md-3 col-sm-6">
          <form class="form form-validate" novalidate="novalidate" method="post" id="form_wirausahawan">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <input type="hidden" id="id_wirausahawan" name="id_wirausahawan" value="">
                  <input type="text" id="nama" name="nama" class="form-control" required>
                  <label for="value1">Nama</label>
                </div>
                <div class="form-group">
                  <input type="text" id="toko" name="toko" class="form-control" required>
                  <label for="value1">Nama Toko</label>
                </div>
                <div class="form-group">
                  <input type="text" id="alamat" name="alamat" class="form-control" required>
                  <label for="value1">Alamat</label>
                </div>
                <div class="form-group">
                  <input type="text" id="email" name="email" class="form-control" required>
                  <label for="value1">Email</label>
                </div>
              </div><!--end .card-body -->
              <div class="card-actionbar">
                <div class="card-actionbar-row">
                  <button type="submit" id="btn_simpan_wirausahawan" class="btn btn-flat btn-primary ink-reaction">Simpan</button>
                  <button type="button" id="btn_batal_wirausahawan" class="btn btn-flat btn-danger ink-reaction" style="display:none;">Batal</button>
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
                      <th>Nama</th>
                      <th>Nama Toko</th>
                      <th>Alamat</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach ($wirausahawan as $g): $no++;?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $g->nama ?></td>
                      <td><?php echo $g->toko ?></td>
                      <td><?php echo $g->alamat ?></td>
                      <td><?php echo $g->email ?></td>
                      <td>
                        <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-primary" onclick="edit_wirausahawan(<?php echo $g->id_wirausahawan; ?>)" ><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-danger" onclick="deleteWirausahawan(<?php echo $g->id_wirausahawan; ?>)"><i class="fa fa-trash"></i></button>
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
    $("#form_wirausahawan").attr('action',"<?php echo base_url('Xyz/tambah_wirausahawan'); ?>");

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
    $('#btn_batal_wirausahawan').click(function() {
      $("#form_wirausahawan").attr('action',"<?php echo base_url('Xyz/tambah_wirausahawan'); ?>");
      $('#form_wirausahawan')[0].reset();
      $('#btn_batal_wirausahawan').hide();
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
  function edit_wirausahawan(id) {
    $.ajax(
    {
      type: "GET",
      url: "<?php echo base_url('Xyz/edit_wirausahawan'); ?>/"+id,
      dataType:"JSON"
    }
    ).done(function( data )
    {
      $('#form_wirausahawan')[0].reset();
      $('#id_wirausahawan').val(data.id_wirausahawan);
      $('#nama').val(data.nama);
      $('#toko').val(data.toko);
      $('#alamat').val(data.alamat);
      $('#email').val(data.email);
      $('#btn_batal_wirausahawan').show();
      $("#form_wirausahawan").removeAttr("action");
      $("#form_wirausahawan").attr('action',"<?php echo base_url('Xyz/update_wirausahawan'); ?>");

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
  function deleteWirausahawan(id) {
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
      data.append('id_wirausahawan', id);
      var url = "<?php echo base_url('Xyz/deleteWirausahawan/'); ?>";
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
