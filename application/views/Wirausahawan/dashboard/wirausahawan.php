<div id="content">
  <section>
    <div class="section-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Wirausahawan'); ?>">home</a></li>
        <li class="active">wirausahawan</li>
      </ol>
    </div><!--end .section-header -->
    <div class="section-body contain-lg">


      <!-- BEGIN INTRO -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="text-primary">Wirausahawan</h1>
        </div><!--end .col -->
        <div class="col-lg-8">
          <article class="margin-bottom-xxl">
            <p class="lead">
              Mengelola Data Produk yang dimiliki Wirausahawan dan Reedem Kupon .
            </p>
          </article>
        </div><!--end .col -->
      </div><!--end .row -->
      <!-- END INTRO -->

      <!-- BEGIN BASIC ELEMENTS -->
      <div class="row">
        <div class="col-lg-12">
          <h4>Reedem Coupon</h4>
        </div><!--end .col -->

        <div class="col-lg col-md-4 col-sm-4">
          <form class="form form-validate" novalidate="novalidate" method="post" id="form_kupon">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <input type="text" id="kode" name="kode" class="form-control" required>
                  <label for="value1">Kode Coupon</label>
                </div>

              </div><!--end .card-body -->
              <div class="card-actionbar">
                <div class="card-actionbar-row">
                  <button type="submit" id="btn_simpan_kupon" class="btn btn-flat btn-primary ink-reaction">Simpan</button>
                  <button type="button" id="btn_batal_kupon" class="btn btn-flat btn-danger ink-reaction" style="display:none;">Batal</button>
                </div>
              </div>
            </div><!--end .card -->
          </form>
        </div><!--end .col -->
        <div class="col-md-8 col-sm-8">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
               <table id="datatable1" class="table table-striped table-hover no-margin">
                <thead>
                  <tr>
                    <th class="sort-numeric">No</th>
                    <th>Kode</th>
                    <th>Hadiah</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=0; foreach ($coupon as $c): $no++;?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $c->kode ?></td>
                    <td><?php echo $c->hadiah ?></td>

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
      <h4>Data Produk</h4>
    </div><!--end .col -->

    <div class="col-lg col-md-4 col-sm-4">
      <form class="form form-validate" novalidate="novalidate" method="post" id="form_produk" enctype="multipart/form-data">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <input type="hidden" id="id_produk" name="id_produk" value="">
              <input type="text" id="nama" name="nama" class="form-control" required>
              <label for="value1">Nama</label>
            </div>
            <div class="form-group">
              <input type="text" id="produsen" name="produsen" class="form-control" required>
              <label for="value1">Produsen</label>
            </div>
            <div class="form-group">
              <input type="number" id="jumlah" name="jumlah" class="form-control" required>
              <label for="value1">Jumlah</label>
            </div>
            <div class="form-group">
              <select name="satuan" required id="satuan" class="form-control">
                <option value="" disabled selected>-Pilih Satuan-</option>
                <option>buah</option>
                <option>gram</option>
                <option>kg</option>
                <option>liter</option>
                <option>mili liter</option>
              </select>
              <label for="value1">Satuan</label>
            </div>
            <div class="form-group">
              <input type="number" id="harga" name="harga" class="form-control" required>
              <label for="value1">Harga</label>
            </div>
            <div class="form-group" id="foooto">
              <input type="file" id="foto" name="foto" class="form-control" required>
              <label for="value1">Foto</label>
            </div>
          </div><!--end .card-body -->
          <div class="card-actionbar">
            <div class="card-actionbar-row">
              <button type="submit" id="btn_simpan_produk" class="btn btn-flat btn-primary ink-reaction">Simpan</button>
              <button type="button" id="btn_batal_produk" class="btn btn-flat btn-danger ink-reaction" style="display:none;">Batal</button>
            </div>
          </div>
        </div><!--end .card -->
      </form>
    </div><!--end .col -->
    <div class="col-md-8 col-sm-8">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="datatable1" class="table table-striped table-hover no-margin">
              <thead>
                <tr>
                  <th class="sort-numeric">No</th>
                  <th>Nama</th>
                  <th>Produsen</th>
                  <th>Jumlah</th>
                  <th>Satuan</th>
                  <th>Harga</th>
                  <th>Gambar</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=0; foreach ($produk as $g): $no++;?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $g->nama ?></td>
                  <td><?php echo $g->produsen ?></td>
                  <td><?php echo $g->jumlah ?></td>
                  <td><?php echo $g->satuan ?></td>
                  <td><?php echo $g->harga ?></td>
                  <td><img width="50px" src="<?php echo base_url() ?>assets/uploads/produk/<?php echo $g->foto ?>" class="thumbnail"></td>
                  <td>
                    <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-primary" onclick="edit_produk(<?php echo $g->id_produk; ?>)" ><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-danger" onclick="deleteProduk(<?php echo $g->id_produk; ?>)"><i class="fa fa-trash"></i></button>
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
    $("#form_produk").attr('action',"<?php echo base_url('Wirausahawan/tambah_produk'); ?>");
    $("#form_kupon").attr('action',"<?php echo base_url('Wirausahawan/reedem_kupon'); ?>");

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
    $('#btn_batal_produk').click(function() {
      $("#form_produk").attr('action',"<?php echo base_url('Wirausahawan/tambah_produk'); ?>");
      $('#form_produk')[0].reset();
      $('#btn_batal_produk').hide();
      $("#foooto").removeAttr("style");
      $("#foto").attr("required");
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
  function edit_produk(id) {
    $.ajax(
    {
      type: "GET",
      url: "<?php echo base_url('Wirausahawan/edit_produk'); ?>/"+id,
      dataType:"JSON"
    }
    ).done(function( data )
    {
      $('#form_produk')[0].reset();
      $('#id_produk').val(data.id_produk);
      $('#nama').val(data.nama);
      $('#produsen').val(data.produsen);
      $('#jumlah').val(data.jumlah);
      $('#harga').val(data.harga);
      $('#satuan').val(data.satuan);
      $('#btn_batal_produk').show();
      $("#form_produk").removeAttr("action");
      $("#form_produk").attr('action',"<?php echo base_url('Wirausahawan/update_produk'); ?>");
      $("#foto").removeAttr("required");
      $("#foooto").attr('style',"display: none;");

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
  function deleteProduk(id) {
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
      data.append('id_produk', id);
      var url = "<?php echo base_url('Wirausahawan/deleteProduk/'); ?>";
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
