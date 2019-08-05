<div id="menubar" class="menubar-inverse ">
  <div class="menubar-fixed-panel">
    <div>
      <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
        <i class="fa fa-bars"></i>
      </a>
    </div>
    <div class="expanded">
      <a href="<?php echo base_url('Wirausahawan'); ?>">
        <span class="text-lg text-bold text-primary ">Wirausahawan</span>
      </a>
    </div>
  </div>
  <div class="menubar-scroll-panel">

    <!-- BEGIN MAIN MENU -->
    <ul id="main-menu" class="gui-controls">

      <!-- BEGIN DASHBOARD -->
      <li>
        <a href= "<?php echo base_url('Wirausahawan'); ?>" >
          <div class="gui-icon"><i class="md md-home"></i></div>
          <span class="title">Dashboard</span>
        </a>
      </li><!--end /menu-li -->
      <!-- END DASHBOARD -->


      <!-- END REPORT -->

      <!-- BEGIN REPORT -->
      <li>
        <a href="<?php echo base_url('Wirausahawan/pengaturan'); ?>" >
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
