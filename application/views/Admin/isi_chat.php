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
