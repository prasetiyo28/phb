
<script type="text/javascript">
function open_chat(id_user) {
  $.ajax(
    {
      type: "GET",
      url: "<?php echo base_url('User/openSideChat/'); ?>"+id_user
    }
  ).done(function( data )
  {
    $('#open_chat').html(data);
     $('#btn_canvas_chat').trigger('click');
  });
}
  function back_canvas(room_id) {
    $('#btn_exe_canvas').trigger('click');
    if (room_id!=false) {
      viewchatReal(room_id);
    }
    // $("#open_chat").empty();
  }
  function close_canvas(room_id) {
    $('#btn_close_canvas').trigger('click');
    if (room_id!=false) {
      viewchatReal(room_id);
    }
    // $("#open_chat").empty();

  }
</script>
<!-- BEGIN OFFCANVAS RIGHT -->
<div class="offcanvas">

  <!-- BEGIN OFFCANVAS SEARCH -->
  <div id="offcanvas-search" class="offcanvas-pane width-8">
    <a class="tile-content ink-reaction" style="display:none;"  id="btn_canvas_chat" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">ssass</a>

    <div class="offcanvas-head">
      <header class="text-primary">Search</header>
      <div class="offcanvas-tools">
        <a class="btn btn-icon-toggle btn-default-light pull-right" id="btn_close_canvas" data-dismiss="offcanvas">
          <i class="md md-close"></i>
        </a>
      </div>
    </div>
    <div class="offcanvas-body no-padding">
      <ul class="list ">
        <?php $get_userA = get_user_foradmin('A') ?>
        <?php if (count($get_userA)!=0): ?>
        <li class="tile divider-full-bleed">
          <div class="tile-content">
            <div class="tile-text"><strong>A</strong></div>
          </div>
        </li>
        <?php foreach ($get_userA as $a): ?>
        <li class="tile">
          <a class="tile-content ink-reaction" href="javascript:void(0)" onclick="open_chat(<?php echo $a->id_user;?>)">
            <div class="tile-icon">
              <img src="<?php echo base_url();?>assets/uploads/<?php echo $a->foto?>" alt="" />
            </div>
            <div class="tile-text">
              <?php echo $a->nama ?>
              <small><?php echo $a->telp ?></small>
            </div>
          </a>
        </li>
        <?php endforeach; ?>
      <?php endif; ?>


      <?php $get_userA = get_user_foradmin('B') ?>
      <?php if (count($get_userA)!=0): ?>
      <li class="tile divider-full-bleed">
        <div class="tile-content">
          <div class="tile-text"><strong>B</strong></div>
        </div>
      </li>
      <?php foreach ($get_userA as $a): ?>
      <li class="tile">
        <a class="tile-content ink-reaction" href="javascript:void(0)" onclick="open_chat(<?php echo $a->id_user;?>)">
          <div class="tile-icon">
            <img src="<?php echo base_url();?>assets/uploads/<?php echo $a->foto?>" alt="" />
          </div>
          <div class="tile-text">
            <?php echo $a->nama ?>
            <small><?php echo $a->telp ?></small>
          </div>
        </a>
      </li>
      <?php endforeach; ?>
    <?php endif; ?>


    <?php $get_userA = get_user_foradmin('C') ?>
    <?php if (count($get_userA)!=0): ?>
    <li class="tile divider-full-bleed">
      <div class="tile-content">
        <div class="tile-text"><strong>C</strong></div>
      </div>
    </li>
    <?php foreach ($get_userA as $a): ?>
    <li class="tile">
      <a class="tile-content ink-reaction" href="javascript:void(0)" onclick="open_chat(<?php echo $a->id_user;?>)">
        <div class="tile-icon">
          <img src="<?php echo base_url();?>assets/uploads/<?php echo $a->foto?>" alt="" />
        </div>
        <div class="tile-text">
          <?php echo $a->nama ?>
          <small><?php echo $a->telp ?></small>
        </div>
      </a>
    </li>
    <?php endforeach; ?>
  <?php endif; ?>

  <?php $get_userA = get_user_foradmin('D') ?>
  <?php if (count($get_userA)!=0): ?>
  <li class="tile divider-full-bleed">
    <div class="tile-content">
      <div class="tile-text"><strong>D</strong></div>
    </div>
  </li>
  <?php foreach ($get_userA as $a): ?>
  <li class="tile">
    <a class="tile-content ink-reaction" href="javascript:void(0)" onclick="open_chat(<?php echo $a->id_user;?>)">
      <div class="tile-icon">
        <img src="<?php echo base_url();?>assets/uploads/<?php echo $a->foto?>" alt="" />
      </div>
      <div class="tile-text">
        <?php echo $a->nama ?>
        <small><?php echo $a->telp ?></small>
      </div>
    </a>
  </li>
  <?php endforeach; ?>
  <?php endif; ?>

  <?php $get_userA = get_user_foradmin('E') ?>
  <?php if (count($get_userA)!=0): ?>
  <li class="tile divider-full-bleed">
    <div class="tile-content">
      <div class="tile-text"><strong>E</strong></div>
    </div>
  </li>
  <?php foreach ($get_userA as $a): ?>
  <li class="tile">
    <a class="tile-content ink-reaction" href="javascript:void(0)" onclick="open_chat(<?php echo $a->id_user;?>)">
      <div class="tile-icon">
        <img src="<?php echo base_url();?>assets/uploads/<?php echo $a->foto?>" alt="" />
      </div>
      <div class="tile-text">
        <?php echo $a->nama ?>
        <small><?php echo $a->telp ?></small>
      </div>
    </a>
  </li>
  <?php endforeach; ?>
  <?php endif; ?>

  <?php $get_userA = get_user_foradmin('F') ?>
  <?php if (count($get_userA)!=0): ?>
  <li class="tile divider-full-bleed">
    <div class="tile-content">
      <div class="tile-text"><strong>F</strong></div>
    </div>
  </li>
  <?php foreach ($get_userA as $a): ?>
  <li class="tile">
    <a class="tile-content ink-reaction" href="javascript:void(0)" onclick="open_chat(<?php echo $a->id_user;?>)">
      <div class="tile-icon">
        <img src="<?php echo base_url();?>assets/uploads/<?php echo $a->foto?>" alt="" />
      </div>
      <div class="tile-text">
        <?php echo $a->nama ?>
        <small><?php echo $a->telp ?></small>
      </div>
    </a>
  </li>
  <?php endforeach; ?>
  <?php endif; ?>


  <?php $get_userA = get_user_foradmin('G') ?>
  <?php if (count($get_userA)!=0): ?>
  <li class="tile divider-full-bleed">
    <div class="tile-content">
      <div class="tile-text"><strong>G</strong></div>
    </div>
  </li>
  <?php foreach ($get_userA as $a): ?>
  <li class="tile">
    <a class="tile-content ink-reaction" href="javascript:void(0)" onclick="open_chat(<?php echo $a->id_user;?>)">
      <div class="tile-icon">
        <img src="<?php echo base_url();?>assets/uploads/<?php echo $a->foto?>" alt="" />
      </div>
      <div class="tile-text">
        <?php echo $a->nama ?>
        <small><?php echo $a->telp ?></small>
      </div>
    </a>
  </li>
  <?php endforeach; ?>
  <?php endif; ?>

  <?php $get_userA = get_user_foradmin('H') ?>
  <?php if (count($get_userA)!=0): ?>
  <li class="tile divider-full-bleed">
    <div class="tile-content">
      <div class="tile-text"><strong>H</strong></div>
    </div>
  </li>
  <?php foreach ($get_userA as $a): ?>
  <li class="tile">
    <a class="tile-content ink-reaction" href="javascript:void(0)" onclick="open_chat(<?php echo $a->id_user;?>)">
      <div class="tile-icon">
        <img src="<?php echo base_url();?>assets/uploads/<?php echo $a->foto?>" alt="" />
      </div>
      <div class="tile-text">
        <?php echo $a->nama ?>
        <small><?php echo $a->telp ?></small>
      </div>
    </a>
  </li>
  <?php endforeach; ?>
  <?php endif; ?>

  <?php $get_userA = get_user_foradmin('I') ?>
  <?php if (count($get_userA)!=0): ?>
  <li class="tile divider-full-bleed">
    <div class="tile-content">
      <div class="tile-text"><strong>I</strong></div>
    </div>
  </li>
  <?php foreach ($get_userA as $a): ?>
  <li class="tile">
    <a class="tile-content ink-reaction" href="javascript:void(0)" onclick="open_chat(<?php echo $a->id_user;?>)">
      <div class="tile-icon">
        <img src="<?php echo base_url();?>assets/uploads/<?php echo $a->foto?>" alt="" />
      </div>
      <div class="tile-text">
        <?php echo $a->nama ?>
        <small><?php echo $a->telp ?></small>
      </div>
    </a>
  </li>
  <?php endforeach; ?>
  <?php endif; ?>

  <?php $get_userA = get_user_foradmin('J') ?>
  <?php if (count($get_userA)!=0): ?>
  <li class="tile divider-full-bleed">
    <div class="tile-content">
      <div class="tile-text"><strong>J</strong></div>
    </div>
  </li>
  <?php foreach ($get_userA as $a): ?>
  <li class="tile">
    <a class="tile-content ink-reaction" href="javascript:void(0)" onclick="open_chat(<?php echo $a->id_user;?>)">
      <div class="tile-icon">
        <img src="<?php echo base_url();?>assets/uploads/<?php echo $a->foto?>" alt="" />
      </div>
      <div class="tile-text">
        <?php echo $a->nama ?>
        <small><?php echo $a->telp ?></small>
      </div>
    </a>
  </li>
  <?php endforeach; ?>
  <?php endif; ?>

  <?php $get_userA = get_user_foradmin('K') ?>
  <?php if (count($get_userA)!=0): ?>
  <li class="tile divider-full-bleed">
    <div class="tile-content">
      <div class="tile-text"><strong>K</strong></div>
    </div>
  </li>
  <?php foreach ($get_userA as $a): ?>
  <li class="tile">
    <a class="tile-content ink-reaction" href="javascript:void(0)" onclick="open_chat(<?php echo $a->id_user;?>)">
      <div class="tile-icon">
        <img src="<?php echo base_url();?>assets/uploads/<?php echo $a->foto?>" alt="" />
      </div>
      <div class="tile-text">
        <?php echo $a->nama ?>
        <small><?php echo $a->telp ?></small>
      </div>
    </a>
  </li>
  <?php endforeach; ?>
  <?php endif; ?>

  <?php $get_userA = get_user_foradmin('L') ?>
  <?php if (count($get_userA)!=0): ?>
  <li class="tile divider-full-bleed">
    <div class="tile-content">
      <div class="tile-text"><strong>L</strong></div>
    </div>
  </li>
  <?php foreach ($get_userA as $a): ?>
  <li class="tile">
    <a class="tile-content ink-reaction" href="javascript:void(0)" onclick="open_chat(<?php echo $a->id_user;?>)">
      <div class="tile-icon">
        <img src="<?php echo base_url();?>assets/uploads/<?php echo $a->foto?>" alt="" />
      </div>
      <div class="tile-text">
        <?php echo $a->nama ?>
        <small><?php echo $a->telp ?></small>
      </div>
    </a>
  </li>
  <?php endforeach; ?>
  <?php endif; ?>

  <?php $get_userA = get_user_foradmin('M') ?>
  <?php if (count($get_userA)!=0): ?>
  <li class="tile divider-full-bleed">
    <div class="tile-content">
      <div class="tile-text"><strong>M</strong></div>
    </div>
  </li>
  <?php foreach ($get_userA as $a): ?>
  <li class="tile">
    <a class="tile-content ink-reaction" href="javascript:void(0)" onclick="open_chat(<?php echo $a->id_user;?>)">
      <div class="tile-icon">
        <img src="<?php echo base_url();?>assets/uploads/<?php echo $a->foto?>" alt="" />
      </div>
      <div class="tile-text">
        <?php echo $a->nama ?>
        <small><?php echo $a->telp ?></small>
      </div>
    </a>
  </li>
  <?php endforeach; ?>
  <?php endif; ?>

  <?php $get_userA = get_user_foradmin('N') ?>
  <?php if (count($get_userA)!=0): ?>
  <li class="tile divider-full-bleed">
    <div class="tile-content">
      <div class="tile-text"><strong>N</strong></div>
    </div>
  </li>
  <?php foreach ($get_userA as $a): ?>
  <li class="tile">
    <a class="tile-content ink-reaction" href="javascript:void(0)" onclick="open_chat(<?php echo $a->id_user;?>)">
      <div class="tile-icon">
        <img src="<?php echo base_url();?>assets/uploads/<?php echo $a->foto?>" alt="" />
      </div>
      <div class="tile-text">
        <?php echo $a->nama ?>
        <small><?php echo $a->telp ?></small>
      </div>
    </a>
  </li>
  <?php endforeach; ?>
  <?php endif; ?>

  <?php $get_userA = get_user_foradmin('O') ?>
  <?php if (count($get_userA)!=0): ?>
  <li class="tile divider-full-bleed">
    <div class="tile-content">
      <div class="tile-text"><strong>O</strong></div>
    </div>
  </li>
  <?php foreach ($get_userA as $a): ?>
  <li class="tile">
    <a class="tile-content ink-reaction" href="javascript:void(0)" onclick="open_chat(<?php echo $a->id_user;?>)">
      <div class="tile-icon">
        <img src="<?php echo base_url();?>assets/uploads/<?php echo $a->foto?>" alt="" />
      </div>
      <div class="tile-text">
        <?php echo $a->nama ?>
        <small><?php echo $a->telp ?></small>
      </div>
    </a>
  </li>
  <?php endforeach; ?>
  <?php endif; ?>

  <?php $get_userA = get_user_foradmin('P') ?>
  <?php if (count($get_userA)!=0): ?>
  <li class="tile divider-full-bleed">
    <div class="tile-content">
      <div class="tile-text"><strong>P</strong></div>
    </div>
  </li>
  <?php foreach ($get_userA as $a): ?>
  <li class="tile">
    <a class="tile-content ink-reaction" href="javascript:void(0)" onclick="open_chat(<?php echo $a->id_user;?>)">
      <div class="tile-icon">
        <img src="<?php echo base_url();?>assets/uploads/<?php echo $a->foto?>" alt="" />
      </div>
      <div class="tile-text">
        <?php echo $a->nama ?>
        <small><?php echo $a->telp ?></small>
      </div>
    </a>
  </li>
  <?php endforeach; ?>
  <?php endif; ?>

  <?php $get_userA = get_user_foradmin('Q') ?>
  <?php if (count($get_userA)!=0): ?>
  <li class="tile divider-full-bleed">
    <div class="tile-content">
      <div class="tile-text"><strong>Q</strong></div>
    </div>
  </li>
  <?php foreach ($get_userA as $a): ?>
  <li class="tile">
    <a class="tile-content ink-reaction" href="javascript:void(0)" onclick="open_chat(<?php echo $a->id_user;?>)">
      <div class="tile-icon">
        <img src="<?php echo base_url();?>assets/uploads/<?php echo $a->foto?>" alt="" />
      </div>
      <div class="tile-text">
        <?php echo $a->nama ?>
        <small><?php echo $a->telp ?></small>
      </div>
    </a>
  </li>
  <?php endforeach; ?>
  <?php endif; ?>

  <?php $get_userA = get_user_foradmin('R') ?>
  <?php if (count($get_userA)!=0): ?>
  <li class="tile divider-full-bleed">
    <div class="tile-content">
      <div class="tile-text"><strong>R</strong></div>
    </div>
  </li>
  <?php foreach ($get_userA as $a): ?>
  <li class="tile">
    <a class="tile-content ink-reaction" href="javascript:void(0)" onclick="open_chat(<?php echo $a->id_user;?>)">
      <div class="tile-icon">
        <img src="<?php echo base_url();?>assets/uploads/<?php echo $a->foto?>" alt="" />
      </div>
      <div class="tile-text">
        <?php echo $a->nama ?>
        <small><?php echo $a->telp ?></small>
      </div>
    </a>
  </li>
  <?php endforeach; ?>
  <?php endif; ?>

  <?php $get_userA = get_user_foradmin('S') ?>
  <?php if (count($get_userA)!=0): ?>
  <li class="tile divider-full-bleed">
    <div class="tile-content">
      <div class="tile-text"><strong>S</strong></div>
    </div>
  </li>
  <?php foreach ($get_userA as $a): ?>
  <li class="tile">
    <a class="tile-content ink-reaction" href="javascript:void(0)" onclick="open_chat(<?php echo $a->id_user;?>)">
      <div class="tile-icon">
        <img src="<?php echo base_url();?>assets/uploads/<?php echo $a->foto?>" alt="" />
      </div>
      <div class="tile-text">
        <?php echo $a->nama ?>
        <small><?php echo $a->telp ?></small>
      </div>
    </a>
  </li>
  <?php endforeach; ?>
  <?php endif; ?>

  <?php $get_userA = get_user_foradmin('T') ?>
  <?php if (count($get_userA)!=0): ?>
  <li class="tile divider-full-bleed">
    <div class="tile-content">
      <div class="tile-text"><strong>T</strong></div>
    </div>
  </li>
  <?php foreach ($get_userA as $a): ?>
  <li class="tile">
    <a class="tile-content ink-reaction" href="javascript:void(0)" onclick="open_chat(<?php echo $a->id_user;?>)">
      <div class="tile-icon">
        <img src="<?php echo base_url();?>assets/uploads/<?php echo $a->foto?>" alt="" />
      </div>
      <div class="tile-text">
        <?php echo $a->nama ?>
        <small><?php echo $a->telp ?></small>
      </div>
    </a>
  </li>
  <?php endforeach; ?>
  <?php endif; ?>

  <?php $get_userA = get_user_foradmin('U') ?>
  <?php if (count($get_userA)!=0): ?>
  <li class="tile divider-full-bleed">
    <div class="tile-content">
      <div class="tile-text"><strong>U</strong></div>
    </div>
  </li>
  <?php foreach ($get_userA as $a): ?>
  <li class="tile">
    <a class="tile-content ink-reaction" href="javascript:void(0)" onclick="open_chat(<?php echo $a->id_user;?>)">
      <div class="tile-icon">
        <img src="<?php echo base_url();?>assets/uploads/<?php echo $a->foto?>" alt="" />
      </div>
      <div class="tile-text">
        <?php echo $a->nama ?>
        <small><?php echo $a->telp ?></small>
      </div>
    </a>
  </li>
  <?php endforeach; ?>
  <?php endif; ?>

  <?php $get_userA = get_user_foradmin('V') ?>
  <?php if (count($get_userA)!=0): ?>
  <li class="tile divider-full-bleed">
    <div class="tile-content">
      <div class="tile-text"><strong>V</strong></div>
    </div>
  </li>
  <?php foreach ($get_userA as $a): ?>
  <li class="tile">
    <a class="tile-content ink-reaction" href="javascript:void(0)" onclick="open_chat(<?php echo $a->id_user;?>)">
      <div class="tile-icon">
        <img src="<?php echo base_url();?>assets/uploads/<?php echo $a->foto?>" alt="" />
      </div>
      <div class="tile-text">
        <?php echo $a->nama ?>
        <small><?php echo $a->telp ?></small>
      </div>
    </a>
  </li>
  <?php endforeach; ?>
  <?php endif; ?>

  <?php $get_userA = get_user_foradmin('W') ?>
  <?php if (count($get_userA)!=0): ?>
  <li class="tile divider-full-bleed">
    <div class="tile-content">
      <div class="tile-text"><strong>W</strong></div>
    </div>
  </li>
  <?php foreach ($get_userA as $a): ?>
  <li class="tile">
    <a class="tile-content ink-reaction" href="javascript:void(0)" onclick="open_chat(<?php echo $a->id_user;?>)">
      <div class="tile-icon">
        <img src="<?php echo base_url();?>assets/uploads/<?php echo $a->foto?>" alt="" />
      </div>
      <div class="tile-text">
        <?php echo $a->nama ?>
        <small><?php echo $a->telp ?></small>
      </div>
    </a>
  </li>
  <?php endforeach; ?>
  <?php endif; ?>

  <?php $get_userA = get_user_foradmin('X') ?>
  <?php if (count($get_userA)!=0): ?>
  <li class="tile divider-full-bleed">
    <div class="tile-content">
      <div class="tile-text"><strong>X</strong></div>
    </div>
  </li>
  <?php foreach ($get_userA as $a): ?>
  <li class="tile">
    <a class="tile-content ink-reaction" href="javascript:void(0)" onclick="open_chat(<?php echo $a->id_user;?>)">
      <div class="tile-icon">
        <img src="<?php echo base_url();?>assets/uploads/<?php echo $a->foto?>" alt="" />
      </div>
      <div class="tile-text">
        <?php echo $a->nama ?>
        <small><?php echo $a->telp ?></small>
      </div>
    </a>
  </li>
  <?php endforeach; ?>
  <?php endif; ?>

  <?php $get_userA = get_user_foradmin('Y') ?>
  <?php if (count($get_userA)!=0): ?>
  <li class="tile divider-full-bleed">
    <div class="tile-content">
      <div class="tile-text"><strong>Y</strong></div>
    </div>
  </li>
  <?php foreach ($get_userA as $a): ?>
  <li class="tile">
    <a class="tile-content ink-reaction" href="javascript:void(0)" onclick="open_chat(<?php echo $a->id_user;?>)">
      <div class="tile-icon">
        <img src="<?php echo base_url();?>assets/uploads/<?php echo $a->foto?>" alt="" />
      </div>
      <div class="tile-text">
        <?php echo $a->nama ?>
        <small><?php echo $a->telp ?></small>
      </div>
    </a>
  </li>
  <?php endforeach; ?>
  <?php endif; ?>

  <?php $get_userA = get_user_foradmin('Z') ?>
  <?php if (count($get_userA)!=0): ?>
  <li class="tile divider-full-bleed">
    <div class="tile-content">
      <div class="tile-text"><strong>Z</strong></div>
    </div>
  </li>
  <?php foreach ($get_userA as $a): ?>
  <li class="tile">
    <a class="tile-content ink-reaction" href="javascript:void(0)" onclick="open_chat(<?php echo $a->id_user;?>)">
      <div class="tile-icon">
        <img src="<?php echo base_url();?>assets/uploads/<?php echo $a->foto?>" alt="" />
      </div>
      <div class="tile-text">
        <?php echo $a->nama ?>
        <small><?php echo $a->telp ?></small>
      </div>
    </a>
  </li>
  <?php endforeach; ?>
  <?php endif; ?>

      </ul>
    </div><!--end .offcanvas-body -->
  </div><!--end .offcanvas-pane -->
  <!-- END OFFCANVAS SEARCH -->

  <!-- BEGIN OFFCANVAS CHAT -->
  <div id="open_chat">

  </div>
  <!-- END OFFCANVAS CHAT -->

</div><!--end .offcanvas-->
<!-- END OFFCANVAS RIGHT -->
<script src="<?php echo base_url();?>assets/js/core/source/AppOffcanvas.js"></script>
