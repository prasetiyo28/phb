<header id="header" >
  <div class="headerbar">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="headerbar-left">
      <ul class="header-nav header-nav-options">
        <li class="header-nav-brand" >
          <div class="brand-holder">
            <a href="<?php echo base_url() ?>">
              <span class="text-lg text-bold text-primary">PEMETAAN HASIL BUMI</span>
            </a>
          </div>
        </li>
      </ul>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="headerbar-right" style="position: fixed;left: unset;right: 10px;min-height: 64px;top: 0px;z-index: 1500;float: none !important;background: unset;-webkit-box-shadow: unset;box-shadow: unset;">
      <ul class="header-nav header-nav-options">
        <li>
          <a href="<?php echo base_url('Frontend') ?>" class="btn btn-icon-toggle btn-default" title="Peta Produksi">
            <i class="md md-map"></i>
          </a>
        </li><!--end .dropdown -->
        <li>
          <a href="<?php echo base_url('Frontend/toko') ?>" class="btn btn-icon-toggle btn-default" title="Toko">
            <i class="md md-store"></i>
          </a>
        </li><!--end .dropdown -->
        <li>
          <a href="<?php echo base_url('Frontend/blog') ?>" class="btn btn-icon-toggle btn-default" title="Berita">
            <i class="fa fa-newspaper-o"></i>
            <?php if (ttl_blog_bybidang('0')!=0 ): ?>
              <sup class="badge style-danger"><?php echo ttl_blog_bybidang('0') ?></sup>
            <?php endif; ?>
          </a>
        </li><!--end .dropdown -->
        <li>
          <a href="<?php echo base_url('Auth') ?>" class="btn btn-icon-toggle btn-default" title="Login">
            <i class="md md-lock"></i>
          </a>
        </li><!--end .dropdown -->
      </ul><!--end .header-nav-options -->
    </div><!--end #header-navbar-collapse -->
  </div>
</header>
