
  <div class="text-divider hidden-md hidden-lg"><span>Email</span></div>
  <h1 class="no-margin"><header class="text-primary" id="nameb"><?php echo tampil_nama_user(tampil_user_id_chat($room_id)) ?></header></h1>
  <div class="btn-group stick-top-right">
    <a href="javascript:avoid(0)" class="btn btn-icon-toggle btn-default" onclick="hapus_chat(<?php echo $room_id; ?>)"><i class="md md-delete"></i></a>
  </div>
  <span class="pull-right text-default-light"><?php echo date('H:i:s')." WIB" ?></span>
  <hr style="margin-bottom: 0;"/>
    <!-- BEGIN OFFCANVAS CHAT -->
    <div class="offcanvas-pane style-default-light" style="position: relative;overflow-y: auto; height:30em;">

      <div class="offcanvas-body">
        <ul class="list-chats">
          <?php foreach ($chat as $k): ?>
            <?php if ($k->from==$this->session->userdata('level')."-".$this->session->userdata('id')): ?>
              <?php $cls="";$foto= tampil_foto_user($k->from)?>
            <?php else: ?>
              <?php $cls="chat-left";$foto= tampil_foto_user($k->from)?>
            <?php endif; ?>
            <li class="<?php echo $cls ?>">
            <div class="chat">
              <div class="chat-avatar"><img class="img-circle" src="<?php echo base_url();?>assets/uploads/<?php echo $foto ?>" alt="" /></div>
              <div class="chat-body">
                <?php echo $k->message ?>
                <small><?php echo waktu_lalu2($k->sent) ?></small>
              </div>
            </div><!--end .chat -->
          </li>
        <?php endforeach; ?>

        </ul>
      </div><!--end .offcanvas-body -->
    </div><!--end .offcanvas-pane -->
    <form class="form" id="form_chat">
      <div class="row">
        <div class="col-sm-11">
          <div class="form-group floating-label">
            <input type="hidden" name="to" value="<?php echo tampil_user_id_chat($room_id) ?>">
            <input type="hidden" name="room_id" value="<?php echo $room_id ?>">
            <textarea name="message" class="form-control autosize" rows="1" data-rule-badWords="true" required></textarea>
            <label>Tinggalkan Pesan</label>
          </div>
        </div>
        <div class="col-sm-1">
          <button type="button" onclick="send()" style="margin-top:15px"class="btn btn-sm ink-reaction btn-floating-action btn-primary"> <i class="md md-send"></i></button>
        </div>
      </div>
    </form>
