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
            <li><small>CHATBOXES</small></li>
            <li id="lib"><a href="javascript:void(0)" onclick="new_chat()"><span class="glyphicon glyphicon-plus"></span>Baru</a></li>
            <li id="lic" class="active"><a  href="<?php echo base_url('User/chat') ?>"><span class="glyphicon glyphicon-inbox"></span>Chatting <small id="chatNotif"></small></a></li>
            <li><a href="#"><i class="fa fa-dot-circle-o text-info"></i>Pesan Baru</a></li>
            <li><a href="#"><i class="md md-done text-info"></i>Dikirim</a></li>
            <li><a href="#"><i class="md md-done-all text-info"></i>Dibaca</a></li>
          </ul>
        </div><!--end . -->
        <!-- END INBOX NAV -->

        <div class="col-sm-8 col-md-9 col-lg-10">
          <div class="text-divider visible-xs"><span>Chat list</span></div>
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
                    <?php foreach ($chat_room as $c): ?>

                    <tr>
                      <td style="padding:0px;">
                        <?php $last_chat=get_last_chat($c->room_id) ?>
                        <?php foreach ($last_chat as $lc): ?>
                        <a  href="javascript:void(0)" onclick="viewchat('<?php echo $c->room_id; ?>','<?php echo $lc->id_chat; ?>')" class="list-group-item">
                          <?php if ($lc->to==$this->session->userdata('level')."-".$this->session->userdata('id')): ?>
                            <?php if ($lc->recd=='1'): ?>
                              <div class="stick-top-left small-padding"><i class="fa fa-dot-circle-o text-info"></i></div>
                            <?php endif; ?>
                          <?php endif; ?>
                          <h4 id="namea"><?php echo tampil_nama_user(tampil_user_id_chat($c->room_id)) ?></h4>
                          <div class="stick-top-right small-padding text-default-light text-sm"><?php echo waktu_lalu2($lc->sent) ?></div>
                          <p class="hidden-xs hidden-sm"><?php echo substr($lc->message,0,50); ?>...</p>
                          <?php if ($lc->from==$this->session->userdata('level')."-".$this->session->userdata('id')): ?>
                            <?php if ($lc->recd=='1'): ?>
                          <div class="stick-bottom-right small-padding text-info"><span class="md md-done"></span></div>
                          <?php else: ?>
                          <div class="stick-bottom-right small-padding text-info"><span class="md md-done-all"></span></div>
                        <?php endif; ?>
                      <?php endif; ?>
                        </a>
                      <?php endforeach; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>

                  </tbody>
                </table>
              </div>
            </div><!--end .col -->
            <!-- END INBOX EMAIL LIST -->
            <div id="divTabeluser" class="col-md-6 col-lg-12 height-6 scroll-sm" style="display:none;">
              <div class="list-group list-email list-gray">
                <table id="datatable2" class="table table-hover">
                  <thead>
                    <th>
                      List
                    </th>
                    <th>Level</th>
                  </thead>
                  <tbody>
                    <?php foreach ($admin as $c): ?>
                    <tr>
                      <?php if ($c->level==1) {
                        $lvl='admin';
                      }else {
                        $lvl='superadmin';
                      } ?>
                      <td style="cursor:pointer;" onclick="createChat('<?php echo $lvl.'-'.$c->id_admin; ?>','<?php echo replace_petik($c->nama); ?>')">
                          <?php echo $c->nama ?>
                      </td>
                      <td>Admin</td>
                    </tr>
                  <?php endforeach; ?>

                    <?php foreach ($user as $c): ?>
                    <tr>
                      <td style="cursor:pointer;" onclick="createChat('<?php echo 'user-'.$c->id_user; ?>','<?php echo replace_petik($c->nama); ?>')">
                          <?php echo $c->nama ?>
                      </td>
                      <td>Pengguna</td>
                    </tr>
                  <?php endforeach; ?>

                  </tbody>
                </table>
              </div>
            </div><!--end .col -->

            <!-- BEGIN EMAIL CONTENT -->
            <div id="box_chat" class="col-md-6 col-lg-7">
                <!-- END OFFCANVAS CHAT -->
            </div><!--end .col -->
            <!-- END EMAIL CONTENT -->


            <div id="new_box_chat"  style="display:none;">

                <div class="text-divider hidden-md hidden-lg"><span>Email</span></div>
                <h1 class="no-margin"><header class="text-primary" id="named">nama</header></h1>
                <span class="pull-right text-default-light"><?php echo date('H:i:s')." WIB" ?></span>
                <hr style="margin-bottom: 0;"/>
                  <!-- BEGIN OFFCANVAS CHAT -->
                  <div class="offcanvas-pane style-default-light" style="position: relative;overflow-y: auto; height:30em;">

                    <div class="offcanvas-body">
                      <ul class="list-chats">
                      </ul>
                    </div><!--end .offcanvas-body -->
                  </div><!--end .offcanvas-pane -->
                  <form class="form" id="form_chat2">
                    <div class="row">
                      <div class="col-sm-11">
                        <div class="form-group floating-label">
                          <input type="hidden" name="to2" value="">
                          <input type="hidden" name="room_id2" value="">
                          <textarea name="message2" class="form-control autosize" rows="1" data-rule-badWords="true" required></textarea>
                          <label>Tinggalkan Pesan</label>
                        </div>
                      </div>
                      <div class="col-sm-1">
                        <button type="button" onclick="send2()" style="margin-top:15px"class="btn btn-sm ink-reaction btn-floating-action btn-primary"> <i class="md md-send"></i></button>
                      </div>
                    </div>
                  </form>
            </div>
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
$(document).ready(function() {
  toastr.options.positionClass = 'toast-bottom-left';
  <?php if ($this->session->flashdata('alert')==true) {
    echo $this->session->flashdata('alert');
  } ?>

  $("#form_chat").validate();
    $('#datatable1').DataTable( {
         "button": false,
         "lengthMenu": [[3, 5, 10, -1], [3, 5, 10, "All"]]
    } );
    $('#datatable2').DataTable();
    $.ajax(
      {
        type: "GET",
        url: "<?php echo base_url('User/notifChat/'); ?>"
      }
    ).done(function( data )
    {
      var jsonObj = JSON.parse(data);
      var count = Object.keys(jsonObj).length;
      if (count!=0) {
        $('#chatNotif').text('('+count+')');
        for (var i = 0; i < count; i++) {
          toastr.info(count+" Pesan diterima dari "+jsonObj[i].nama, "");
        }
        console.log(jsonObj.pop());
      }else {
        $('#chatNotif').text('');
      }
    });

    setInterval(function(){
      $.ajax(
        {
          type: "GET",
          url: "<?php echo base_url('User/notifChat/'); ?>"
        }
      ).done(function( data )
      {
        var jsonObj = JSON.parse(data);
        var count = Object.keys(jsonObj).length;
        if (count!=0) {
          $('#chatNotif').text('('+count+')');
          for (var i = 0; i < count; i++) {
            toastr.info(count+" Pesan diterima dari "+jsonObj[i].nama, "");
          }
        }else {
          $('#chatNotif').text('');
        }
      });
    }, 20000);
} );
function send() {
  var valid = $('#form_chat').valid();
  if(!valid) {
    $('#form_chat').data('validator').focusInvalid();
    return false;
  }else {
    var data = new FormData
    var room_id = $('[name="room_id"]').val();
    data.append('room_id', room_id);
    data.append('message', $('[name="message"]').val());
    data.append('to', $('[name="to"]').val());

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
          viewchat(room_id,data.id);
        }
        else if(data.msg=='gagal')
        {
          toastr.info("Gagal mengirim chat.", "");
        }

        else{alert(data);}
      },
      error:function(data)
      {swal("Oops...", "Terjadi kesalahan!!! Coba lagi.", "error");}
  });
  }
}
function viewchat(room_id,id_chat) {
  $.ajax(
    {
      type: "GET",
      url: "<?php echo base_url('User/readChat/'); ?>"+room_id+"/"+id_chat
    }
  ).done(function( data )
  {
    $('#box_chat').html(data);
    $("#divTabel").removeClass('col-lg-12 ');
    $("#divTabel").addClass('col-lg-5');
    $("#box_chat").addClass('col-md-6 col-lg-7');
    $("#box_chat").show('slow');

  });
}
function hapus_chat(room_id) {
  NewToastStyle();
  var message = 'Anda akan menghapus ini?. <button type="button" onclick="deleteAct('+room_id+')" class="btn btn-flat btn-primary toastr-action">YA</button>';
  toastr.info(message, '');
}
function deleteAct(room_id) {
  var data = new FormData();
  data.append('room_id', room_id);
  $.ajax(
    {
      type: "POST",
      url: "<?php echo base_url('User/deleteChat/'); ?>",
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
            toastr.success('Berhasil menghapus chat', '');
            setTimeout(function () {
              window.location.reload();
            }, 2000);
          }
          else if(data=='gagal')
          {
            toastr.clear();
            toastr.options.progressBar = false;
            toastr.options.timeOut = 2000;
            toastr.error('Gagal menghapus chat. Coba lagi.', '');
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
function new_chat() {
  $("#box_chat").hide('slow');
  $("#divTabel").hide('slow');
  $("#divTabeluser").show('slow');
  $("#lic").removeClass('active');
  $("#lib").addClass('active');
}
function createChat(id,nama) {
  $("#divTabeluser").removeClass('col-lg-12 ');
  $("#divTabeluser").addClass('col-lg-5');
  $("#new_box_chat").addClass('col-md-6 col-lg-7');
  $("#new_box_chat").show('slow');
$("#named").text(nama);
$('[name="to2"]').val(id);
}
function send2() {
  var valid = $('#form_chat2').valid();
  if(!valid) {
    $('#form_chat2').data('validator').focusInvalid();
    return false;
  }else {
    var data = new FormData
    var room_id = $('[name="room_id2"]').val();
    data.append('room_id', room_id);
    data.append('message', $('[name="message2"]').val());
    data.append('to', $('[name="to2"]').val());

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
          viewchat(data.room_id);
          $("#new_box_chat").hide('slow');

        }
        else if(data.msg=='gagal')
        {
          toastr.info("Gagal mengirim chat.", "");
        }

        else{alert(data);}
      },
      error:function(data)
      {swal("Oops...", "Terjadi kesalahan!!! Coba lagi.", "error");}
  });
  }
}
</script>
