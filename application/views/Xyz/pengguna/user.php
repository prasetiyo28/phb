<div class="margin-bottom-xxl">
  <span class="text-light text-lg">Total Pengguna <strong><?php echo total_user() ?></strong></span>
  <div class="btn-group btn-group-sm pull-right">
    <button type="button" class="btn btn-default-light dropdown-toggle" data-toggle="dropdown">
      <span class="glyphicon glyphicon-arrow-down"></span> Sortir
    </button>
    <ul class="dropdown-menu dropdown-menu-right animation-dock" role="menu">
      <li><a href="#" id="sort_nama">Nama</a></li>
      <li><a href="#" id="sort_wilayah">Wilayah</a></li>
      <li><a href="#" id="sort_email">Email</a></li>
    </ul>
  </div>
</div><!--end .margin-bottom-xxl -->

<div id="list">

</div>


<!-- BEGIN SEARCH RESULTS LIST -->

<!-- BEGIN SEARCH RESULTS PAGING -->
<div class="text-center" id="test-list">

</div><!--end .text-center -->

<script src="<?php echo base_url();?>assets/plugin/paginationJs/jquery.twbsPagination.js"></script>
<script type="text/javascript">

$(function () {

  loadData(sort,find,find_value);
  $('#sort_nama').click(function() {
    $("#viewdata").hide();
    loadUser(2);
  });
  $('#sort_wilayah').click(function() {
    $("#viewdata").hide();
    loadUser(3);
  });
  $('#sort_email').click(function() {
    $("#viewdata").hide();
    loadUser(4);
  });

  $('#value_cari1').keyup(function() {
    $("#viewdata").hide();
    loadUser(1,1,$('#value_cari1').val());

  });
  $('#btn_next').click(function() {
    var txt = $("#btn_next").text();
    if (txt=="YA") {
      $('#modal_add_user').modal('hide');
      setTimeout(function(){ $('#modal_add_user1').modal('show'); }, 1000);
      $('[name="nik"]').val($("#nik").val());
    }else {
      $('#modal_add_user').modal('hide');
      setTimeout(function(){ $('#modal_add_user2').modal('show'); }, 1000);
      $('[name="nik"]').val($("#nik").val());
      $('[name="nama"]').val($("#nama").val());
      $('[name="jk"]').val($("#jk").val());
      $('[name="tmpt_lahir"]').val($("#tmpt_lahir").val());
      $('[name="tgl_lahir"]').val($("#tgl_lahir").val());
      $('[name="agama"]').val($("#agama").val());
      $('[name="pendidikan"]').val($("#pendidikan").val());
      $('[name="alamat"]').val($("#alamat").val());
    }
  });
  $('#btn_clear').click(function() {
    $('#cari_nik').removeClass('has-error has-success has-feedback');
    $('#cari_nik_icon').removeClass('glyphicon glyphicon-remove glyphicon-ok form-control-feedback');
    $('#cari_nik_p').text('');
    $('#btn_cek').show();
    $('#btn_clear').hide();
    $('#btn_next').hide();
    $('#got_user').hide();
    $('#got_people').hide();
    $('#form_add_user')[0].reset();
    $('#pesan_nik').hide();
    $('#btn_clear').text('BERSIHKAN');
  });

  $('#btn_cek').click(function() {
    $('#btn_cek').hide();
    $('#btn_clear').show();
    var nik = $('#nik').val();
    var pjg_nik = nik.length;

    if (nik!='' && pjg_nik >= 16) {
      $('.preload1').show();
      $('.preload-text').text('Mencari NIK...');
      $.ajax(
        {
          type: "GET",
          url: "<?php echo base_url('Xyz/cek_nik'); ?>/"+nik,
          dataType:"JSON"
        }
      ).done(function( data )
      {
        if (data.result==1) {
          $('#got_user').show();
          $('#cari_nik').addClass('form-group has-error has-feedback');
          $('#cari_nik_icon').addClass('glyphicon glyphicon-remove form-control-feedback');
          $('#cari_nik_p').text('Akun dengan NIK ini sudah ada.');
          $('#text_nama').text(data.data.nama);
          $('#text_email').text(data.data.email);
          $('#btn_clear').text('BERSIHKAN');
          $('.preload1').hide();
          document.getElementById("uploadPreviewsp2").src = "<?php echo base_url() ?>/assets/uploads/"+data.data.foto;
        }else {
          $.ajax({
            type:"GET",
            url: "<?php echo base_url('Xyz/api_nik'); ?>/"+nik,
            dataType:"JSON"
          }).done(function(data) {
            if (data.result==1) {
              $('#got_people').show();
              $('#cari_nik').addClass('form-group has-success has-feedback');
              $('#cari_nik_icon').addClass('glyphicon glyphicon-ok form-control-feedback');
              $('#cari_nik_p').text('Akun siap di buat.')
              $('#text_nama1').text(data.data.NAMA);
              $('#text_email1').text(data.data.ALAMAT);
              $('#nama').val(data.data.NAMA);
              $('#jk').val(data.data.JK);
              $('#tmpt_lahir').val(data.data.TMPT_LHR);
              $('#tgl_lahir').val(data.data.TGL_LHR);
              $('#agama').val(data.data.AGAMA);
              $('#pendidikan').val(data.data.PDDK_AKHIR);
              $('#alamat').val(data.data.ALAMAT);
              $('#btn_next').show();
              $('#btn_clear').text('BERSIHKAN');
              $('.preload1').hide();

            }else {
              $('.preload-text').text('Mencari NIK di DISDUKCAPIL Kota Tegal...');
              $.ajax({
                type:"GET",
                url: "<?php echo base_url('Api_capil/get_api_capil'); ?>/"+nik,
                dataType:"JSON"
              }).done(function(data) {
                if (data.status=="1") {
                  var a = data.data.replace(/&quot;/g,'"');
                  var str = a.replace(/[\r\n]+/g," ");
                  var jsonObj = JSON.parse(str);
                  $('#got_people').show();
                  $('#cari_nik').addClass('form-group has-success has-feedback');
                  $('#cari_nik_icon').addClass('glyphicon glyphicon-ok form-control-feedback');
                  $('#cari_nik_p').text('Akun siap di buat.')
                  $('#text_nama1').text(jsonObj[0].NAMA);
                  $('#text_email1').text(jsonObj[0].ALAMAT);
                  $('#nama').val(jsonObj[0].NAMA);
                  $('#jk').val(jsonObj[0].JK);
                  $('#tmpt_lahir').val(jsonObj[0].TMPT_LHR);
                  $('#tgl_lahir').val(jsonObj[0].TGL_LHR);
                  $('#agama').val(jsonObj[0].AGAMA);
                  $('#pendidikan').val(jsonObj[0].PDDK_AKHIR);
                  $('#alamat').val(jsonObj[0].ALAMAT);
                  $('#btn_next').show();
                  $('#btn_clear').text('BERSIHKAN');
                  $('.preload1').hide();
                }else {
                  $('#cari_nik').addClass('form-group has-error has-feedback');
                  $('#cari_nik_icon').addClass('glyphicon glyphicon-remove form-control-feedback');
                  $('#cari_nik_p').text('NIK tidak ditemukan.');
                  $('#btn_next').show();
                  $('#pesan_nik').show();
                  $('#btn_next').text('YA');
                  $('#btn_clear').text('TIDAK');
                  $('.preload1').hide();
                }
              });
            }
          });
        }
      });
    }else {
      $('#cari_nik').addClass('form-group has-error has-feedback');
      $('#cari_nik_icon').addClass('glyphicon glyphicon-remove form-control-feedback');
      $('#cari_nik_p').text('Isian kurang dari 16 karakter!');
      $('#btn_clear').text('BERSIHKAN');
      $('.preload1').hide();
    }

  });


});

function batal() {
  $('#cari_nik').removeClass('has-error has-success has-feedback');
  $('#cari_nik_icon').removeClass('glyphicon glyphicon-remove glyphicon-ok form-control-feedback');
  $('#cari_nik_p').text('');
  $('#btn_cek').show();
  $('#btn_clear').hide();
  $('#btn_next').hide();
  $('#got_user').hide();
  $('#got_people').hide();
  $('#form_add_user')[0].reset();
  $('#pesan_nik').hide();
  $('#btn_clear').text('BERSIHKAN');
  $('#modal_add_user2').modal('hide');
  $('#modal_add_user1').modal('hide');
  $('#modal_add_user').modal('hide');
};
  function loadData(sort,find,find_value) {
  $('.preload').show();
    window.pagObj = $('#test-list').twbsPagination({
        totalPages: "<?php echo total_page() ?>",
        visiblePages: 5,
        first:'<i class="fa fa-angle-double-left"></i>',
        prev:'<i class="fa fa-angle-left"></i>',
        next:'<i class="fa fa-angle-right"></i>',
        last:'<i class="fa fa-angle-double-right"></i>',
        onPageClick: function (event, page) {
            //console.info(page + ' (from options)');
            var id = page ;
            if (id==1) {
              id = null;
            }

            $.ajax(
              {
                type: "GET",
                url: "<?php echo base_url('Xyz/user_data'); ?>/"+find+"/"+find_value+"/"+sort+"/"+id,
              }
            ).done(function( data )
            {
              $('#list').html(data);
              $('.preload').hide();
            });
        }
    }).on('page', function (event, page) {
        //console.info(page + ' (from event listening)');
    });
  }

</script>
