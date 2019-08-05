<header id="header" >
  <div class="headerbar">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="headerbar-left">
      <ul class="header-nav header-nav-options">
        <li class="header-nav-brand" >
          <div class="brand-holder">
            <a href="<?php echo base_url('User'); ?>">
              <span class="text-lg text-bold text-primary">Wirausahawan</span>
            </a>
          </div>
        </li>
        <li>
          <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
            <i class="fa fa-bars"></i>
          </a>
        </li>
      </ul>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="headerbar-right">
      <ul class="header-nav header-nav-options">
        <?php if ($this->session->userdata('blokir')=='1'): ?>
          <li class="dropdown">
            <a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
              <i class="md md-info" ></i><sup class="badge style-danger" id="chatNotifheader">1</sup>
            </a>
            <ul class="dropdown-menu animation-expand" id="viewchatRealtime">
              <li class="dropdown-header">Info</li>
              <li>
                <a class="alert alert-callout alert-success" href="<?php echo base_url('User/profile')?>">
                  <img class="pull-right img-circle dropdown-avatar" src="<?php echo base_url('assets/img/masa.gif') ?>" alt="">
                  <strong>Akun ini diblokir!</strong><br>
                  <small>Hubungi admin untuk mengaktifkan akun.</small>
                </a>
              </li>
            </ul><!--end .dropdown-menu -->
          </li>
        <?php endif; ?>
        <li class="dropdown">
         <a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown" aria-expanded="false">
          <?php $ntfx = array();foreach ( notif_user()->result() as $notif):
          $awal  = date_create(date('Y-m-d',strtotime($notif->tgl_kira_panen)));
                  $akhir = date_create(); // waktu sekarang
                  $diff  = date_diff( $awal, $akhir );
                  $tgl_agenda = strtotime($notif->tgl_kira_panen);
                  $tgl_today = strtotime(date ("Y-m-d"));
                  ?>
                  <?php if ($diff->days <=7 ): ?>
                    <?php if ($tgl_today < $tgl_agenda):
                      array_push($ntfx,$notif->jenis_produksi);
                      ?>
                    <?php endif; ?>
                  <?php endif; ?>
                  <?php if ($tgl_today > $tgl_agenda): ?>
                    <?php array_push($ntfx,$notif->jenis_produksi); ?>
                  <?php endif; ?>
                <?php endforeach; ?>
                <i class="fa fa-bell"></i><sup class="badge style-danger"><?php if (count($ntfx)!=0) {
                  echo count($ntfx);
                }?></sup>
              </a>
              <ul class="dropdown-menu animation-expand">
                <li class="dropdown-header">Notifikasi Panen</li>
                <?php foreach ( notif_user()->result() as $notif):
                $awal  = date_create(date('Y-m-d',strtotime($notif->tgl_kira_panen)));
                  $akhir = date_create(); // waktu sekarang
                  $diff  = date_diff( $awal, $akhir );
                  $tgl_agenda = strtotime($notif->tgl_kira_panen);
                  $tgl_today = strtotime(date ("Y-m-d"));
                  ?>
                  <?php if ($tgl_today > $tgl_agenda): ?>
                    <li>
                      <a class="alert alert-callout alert-success" href="<?php echo base_url('User/profile')?>">
                        <img class="pull-right img-circle dropdown-avatar" src="<?php echo base_url('assets/uploads/icon/').tampil_icon($notif->id_icon,'1') ?>" alt="">
                        <strong><?php echo $notif->jenis_produksi ?></strong><br>
                        <small>Sesuai perkiraan produksi anda telah panen. Ayo lakukan panen!</small>
                      </a>
                    </li>
                  <?php endif; ?>
                  <?php if ($diff->days <=7 ): ?>
                    <?php if ($tgl_today < $tgl_agenda): ?>
                      <li>
                        <a class="alert alert-callout alert-warning" href="javascript:void(0);">
                          <img class="pull-right img-circle dropdown-avatar" src="<?php echo base_url('assets/uploads/icon/').tampil_icon($notif->id_icon,'1') ?>" alt="">
                          <strong><?php echo $notif->jenis_produksi ?></strong><br>
                          <small><?php echo $diff->days ?> hari <?php echo $diff->h ?> jam lagi perkiraan panen</small>
                        </a>
                      </li>
                    <?php endif; ?>
                  <?php endif; ?>

                <?php endforeach; ?>

              </ul><!--end .dropdown-menu -->
            </li>
            <li class="dropdown">
              <a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
                <i class="md md-chat" ></i><sup class="badge style-danger" id="chatNotifheader"></sup>
              </a>
              <ul class="dropdown-menu animation-expand" id="viewchatRealtime">
                <li class="dropdown-header">Chatting</li>
              </ul><!--end .dropdown-menu -->
            </li><!--end .dropdown -->
            <li class="dropdown hidden-xs">
              <a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
                <i class="fa fa-area-chart"></i>
              </a>
              <ul class="dropdown-menu animation-expand">
                <li class="dropdown-header">Server load</li>
                <li class="dropdown-progress">
                  <a href="javascript:void(0);">
                    <div class="dropdown-label">
                      <span class="text-light">Kunjungan <strong>Hari ini</strong></span>
                      <strong class="pull-right"><?php echo $kunjungan/100 ?>%</strong>
                    </div>
                    <div class="progress"><div class="progress-bar progress-bar-danger" style="width: <?php echo $kunjungan/100 ?>%"></div></div>
                  </a>
                </li><!--end .dropdown-progress -->
                <li class="dropdown-progress">
                  <a href="javascript:void(0);">
                    <div class="dropdown-label">
                      <span class="text-light">Pengguna Login <strong>Hari ini</strong></span>
                      <strong class="pull-right"><?php echo $login_user/100 ?>%</strong>
                    </div>
                    <div class="progress"><div class="progress-bar progress-bar-success" style="width: <?php echo $login_user/100 ?>%"></div></div>
                  </a>
                </li><!--end .dropdown-progress -->
                <li class="dropdown-progress">
                  <a href="javascript:void(0);">
                    <div class="dropdown-label">
                      <span class="text-light">Admin Login <strong>Hari ini</strong></span>
                      <strong class="pull-right"><?php echo $login_admin/100 ?>%</strong>
                    </div>
                    <div class="progress"><div class="progress-bar progress-bar-warning" style="width: <?php echo $login_admin/100 ?>%"></div></div>
                  </a>
                </li><!--end .dropdown-progress -->
              </ul><!--end .dropdown-menu -->
            </li><!--end .dropdown -->
          </ul><!--end .header-nav-options -->
          <ul class="header-nav header-nav-profile">
            <li class="dropdown">
              <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                <img src="<?php echo base_url('assets/uploads').'/'.$this->session->userdata('foto') ?>" alt="" />
                <span class="profile-info">
                  <?php echo $this->session->userdata('nama') ?>
                  <small>Wirausahawan</small>
                </span>
              </a>
              <ul class="dropdown-menu animation-dock">
                <li><a href="<?php echo base_url('Auth/logout');?>"><i class="fa fa-fw fa-power-off text-danger"></i> Logout</a></li>
              </ul><!--end .dropdown-menu -->
            </li><!--end .dropdown -->
          </ul><!--end .header-nav-profile -->
          <ul class="header-nav header-nav-toggle">
            <li>
              <a class="btn btn-icon-toggle btn-default" id="btn_canvas">

                <i class="fa fa-ellipsis-v"></i>
              </a>
              <a style="display:none" id="btn_exe_canvas" href="#offcanvas-search" data-toggle="offcanvas" data-backdrop="false">dddd</a>

              <script type="text/javascript">

                $(function() {
                  var canvas=false;

                  $('#btn_canvas').click(function() {

                    if (canvas==false) {
                      $.ajax(
                      {
                        type: "GET",
                        url: "<?php echo base_url('User/get_canvas'); ?>",
                      }
                      ).done(function( data )
                      {
                        $('#viewcanvas').html(data);
                        $('#btn_exe_canvas').trigger('click');
                        canvas = true;
                      });
                    }else {
                      $('#btn_exe_canvas').trigger('click');
                    }

                  });
                })

                <?php if (chatRealtime()[0]=='true'): ?>
                  setInterval(function(){
                    $.ajax(
                    {
                      type: "GET",
                      url: "<?php echo base_url('User/notifChat/'); ?>"
                    }
                    ).done(function( data )
                    {
                      var datachatReal='<li class="dropdown-header">Chatting</li>';
                      var htmlchat='';
                      var level;
                      var a;
                      var jsonObj = JSON.parse(data);
                      var count = Object.keys(jsonObj).length;
                      if (count!=0) {
                        for (var i = 0; i < count; i++) {
                          if (a!=jsonObj[i].nama) {
                            if (jsonObj[i].level=='user') {
                              level=1;
                            }else {
                              level=2;
                            }
                            toastr.info(count+" Pesan baru dari "+jsonObj[i].nama, "");
                            htmlchat = '<li><a onclick="open_chatReal('+jsonObj[i].id+','+jsonObj[i].room_id+','+level+')" class="alert alert-callout alert-warning" href="javascript:void(0);">'+
                            '<img class="pull-right img-circle dropdown-avatar" src="<?php echo base_url();?>assets/uploads/"'+jsonObj[i].foto+' alt="" />'+
                            '<strong>'+jsonObj[i].nama+'</strong><br/>'+
                            '<small>'+jsonObj[i].pesan.substring(0,20)+'...</small></a></li>';
                            datachatReal = datachatReal+=htmlchat;
                          }
                          a=jsonObj[i].nama;
                        }
                        $('#chatNotifheader').text(count);
                        $('#viewchatRealtime').html(datachatReal);
                      }else {
                        $('#chatNotifheader').text('');
                        $('#viewchatRealtime').html('<li class="dropdown-header">Chatting</li>');
                      }
                    });
                  }, <?php echo chatRealtime()[1]*1000 ?>);
                <?php endif; ?>

                function open_chatReal(id_user,room_id,level) {
                  var read =false;
                  $('#btn_canvas').trigger('click');


                  $.ajax(
                  {
                    type: "GET",
                    url: "<?php echo base_url('User/openSideChatReal/'); ?>"+id_user+"/"+room_id+"/"+level
                  }
                  ).done(function( data )
                  {
                    console.log(data);

                    $('#open_chat').html(data);
                    $('#btn_canvas_chat').trigger('click');
                    viewchatReal(room_id)


                  });
                }
                function viewchatReal(room_id) {
                  $.ajax(
                  {
                    type: "GET",
                    url: "<?php echo base_url('User/readChatReal/'); ?>"+room_id
                  }
                  ).done(function( data )
                  {

                  });
                }
              </script>
            </li>
          </ul><!--end .header-nav-toggle -->
        </div><!--end #header-navbar-collapse -->
      </div>
    </header>
