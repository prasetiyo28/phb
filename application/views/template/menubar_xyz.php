<div id="menubar" class="menubar-inverse ">
  <div class="menubar-fixed-panel">
    <div>
      <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
        <i class="fa fa-bars"></i>
      </a>
    </div>
    <div class="expanded">
      <a href="<?php echo base_url('Xyz'); ?>">
        <span class="text-lg text-bold text-primary ">SUPER ADMIN</span>
      </a>
    </div>
  </div>
  <div class="menubar-scroll-panel">

    <!-- BEGIN MAIN MENU -->
    <ul id="main-menu" class="gui-controls">

      <!-- BEGIN DASHBOARD -->
      <li>
        <a href= "<?php echo base_url('Xyz'); ?>" >
          <div class="gui-icon"><i class="md md-home"></i></div>
          <span class="title">Dashboard</span>
        </a>
      </li><!--end /menu-li -->
      <!-- END DASHBOARD -->

      <!-- BEGIN MAPS -->
      <li>
        <a href="<?php echo base_url('Xyz/peta'); ?>" >
          <div class="gui-icon"><i class="md md-map"></i></div>
          <span class="title">Peta</span>
        </a>
      </li><!--end /menu-li -->
      <!-- END MAPS -->

      <!-- BEGIN USER -->
      <li>
        <a href="<?php echo base_url('Xyz/pengguna'); ?>" >
          <div class="gui-icon"><i class="md md-group"></i></div>
          <span class="title">Pengguna</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url('Xyz/wirausahawan'); ?>" >
          <div class="gui-icon"><i class="md md-store"></i></div>
          <span class="title">Wirausahawan</span>
        </a>
      </li>
      <!--end /menu-li -->
      <!-- END USER -->

      <!-- BEGIN EMAIL -->
      <li class="gui-folder">
        <a>
          <div class="gui-icon"><i class="md md-email"></i></div>
          <span class="title">Pesan</span>
        </a>
        <!--start submenu -->
        <ul>
          <li><a href="<?php echo base_url('Xyz/email'); ?>" ><span class="title">Email</span></a></li>
          <li><a href="<?php echo base_url('Xyz/chat'); ?>" ><span class="title">Chat</span></a></li>
          <li><a href="<?php echo base_url('Xyz/sms'); ?>" ><span class="title">SMS</span></a></li>
        </ul><!--end /submenu -->
      </li><!--end /menu-li -->
      <!-- END EMAIL -->

      <!-- BEGIN REPORT -->
      <li>
        <a href="<?php echo base_url('Xyz/laporan'); ?>" >
          <div class="gui-icon"><i class="md md-poll"></i></div>
          <span class="title">Laporan</span>
        </a>
      </li><!--end /menu-li -->
      <!-- END REPORT -->

      <!-- BEGIN REPORT -->
      <li>
        <a href="<?php echo base_url('Xyz/pengaturan'); ?>" >
          <div class="gui-icon"><i class="md md-settings"></i></div>
          <span class="title">Pengaturan</span>
        </a>
      </li><!--end /menu-li -->
      <!-- END REPORT -->

    </ul><!--end .main-menu -->
    <!-- END MAIN MENU -->

    <div class="menubar-foot-panel">
      <small class="no-linebreak hidden-folded">
        <span class="opacity-75">Copyright &copy; 2018</span> <strong>Kota Tegal</strong>
      </small>
    </div>
  </div><!--end .menubar-scroll-panel-->
</div><!--end #menubar-->
