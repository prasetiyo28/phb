<div id="offcanvas-chat" class="offcanvas-pane style-default-light width-12">
  <div class="offcanvas-head style-default-bright">
    <header class="text-primary" id="namaHead"><?php if ($level!=false) {
      echo tampil_nama_user($level.'-'.$id);
    }else {
      echo tampil_nama_user('user-'.$id);
    } ?></header>
    <div class="offcanvas-tools">
      <a class="btn btn-icon-toggle btn-default-light pull-right" onclick="close_canvas('<?php echo $room_id ?>')">
        <i class="md md-close"></i>
      </a>
      <a class="btn btn-icon-toggle btn-default-light pull-right"  onclick="back_canvas('<?php echo $room_id ?>')">
        <i class="md md-arrow-back"></i>
      </a>
    </div>
    <form class="form" id="form_chat1">
      <div class="row">
        <div class="col-sm-10">
          <?php if ($room_id!=false): ?>
            <div class="form-group floating-label">
              <input type="hidden" name="to1" value="<?php echo tampil_user_id_chat($room_id) ?>">
              <input type="hidden" name="room_id1" value="<?php echo $room_id ?>">
              <textarea name="message1" class="form-control autosize" rows="1" data-rule-badWords="true" required></textarea>
              <label>Tinggalkan Pesan</label>
            </div>
            <?php else: ?>
              <div class="form-group floating-label">
                <input type="hidden" name="to1" value="<?php echo 'user-'.$id ?>">
                <input type="hidden" name="room_id1" value="">
                <textarea name="message1" class="form-control autosize" rows="1" data-rule-badWords="true" required></textarea>
                <label>Tinggalkan Pesan</label>
              </div>
          <?php endif; ?>
        </div>
        <div class="col-sm-2">
          <button type="button" onclick="send1()" style="margin-top:15px"class="pull-left btn btn-sm ink-reaction btn-floating-action btn-primary"> <i class="md md-send"></i></button>
        </div>
      </div>
    </form>
  </div>
  <div class="offcanvas-body">
<div id="isi_chat">
</div>
</div><!--end .offcanvas-body -->
</div><!--end .offcanvas-pane -->
<script type="text/javascript">
$(function() {
<?php if ($room_id!=false): ?>
isi_chat('<?php echo $room_id ?>');
<?php endif; ?>
$("#form_chat1").validate();
})
function isi_chat(room_id) {
  $.ajax(
    {
      type: "GET",
      url: "<?php echo base_url('User/isiSideChat/'); ?>"+room_id
    }
  ).done(function( data )
  {
    $('#isi_chat').html(data);

  });
}
function send1() {
  var valid = $('#form_chat1').valid();
  if(!valid) {
    $('#form_chat1').data('validator').focusInvalid();
    return false;
  }else {
    var data = new FormData
    var room_id = $('[name="room_id1"]').val();
    data.append('room_id', room_id);
    data.append('message', $('[name="message1"]').val());
    data.append('to', $('[name="to1"]').val());

    $.ajax({
      type: "POST",
      data: data,
      processData: false,
      contentType: false,
      url: "<?php echo base_url('User/send_chat')?>",
      success: function(str)
      {
        var data = JSON.parse(str);

        if (data.msg=='sukses')
        {
          toastr.info("Berhasil mengirim chat.", "");
          isi_chat(data.room_id);
          $('#form_chat1')[0].reset();
        }
        else if(data.msg=='gagal')
        {
          toastr.info("Gagal mengirim chat.", "");
          $('#form_chat1')[0].reset();

        }

        else{alert(data);}
      },
      error:function(data)
      {swal("Oops...", "Terjadi kesalahan!!! Coba lagi.", "error");}
  });
  }
}
</script>
