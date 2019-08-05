<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pemataan Hasil Bumi</title>
  <?php $this->load->view('frontend/header') ?>
</head>
<body class="menubar-hoverable header-fixed">

  <!-- BEGIN HEADER-->
  <?php $this->load->view('frontend/navbar') ?>
  <!-- END HEADER-->

  <!-- BEGIN BASE-->
  <div id="base" style="padding-left: unset;">

   <!-- BEGIN OFFCANVAS LEFT -->

   <!-- END OFFCANVAS LEFT -->

   <!-- BEGIN CONTENT-->
   <div id="content" style="padding-top:unset" >
    <div class="hidden-xs" style="padding-top:64px"></div>

    <section>
      <div class="section-header">
        <ol class="breadcrumb">
          <?php echo $liblog ?>
        </ol>
      </div>
      <div class="section-body">
        <div class="row">
          <div class="col-lg-12">
            


            <!-- BEGIN BLOG MASONRY -->
            <?php $no=0; foreach ($toko as $b): $no++;?>

            <div class="col-md-3" >
              <article>
                <div class="card card-bordered style-primary">
                  <div class="card-head">
                    <header><i class="md md-store"></i> <?php echo $b->toko ?></header>
                  </div><!--end .card-head -->
                  <div class="card-body style-default-bright">
                    <p><b>Alamat : </b><br><?php echo $b->alamat ?>.</p>
                    <a href="<?php echo base_url() ?>Frontend/kunjungi_toko/<?php echo $b->id_wirausahawan ?>" class="btn ink-reaction btn-raised btn-primary">kunjungi</a>
                  </div><!--end .card-body -->
                </div>
              </article><!-- end /article -->
            </div>

          <?php endforeach; ?>

          <!-- END BLOG MASONRY -->

        </div><!--end .col -->



      </div><!--end .row -->

      <!-- BEGIN PAGINATION -->
      <div class="row">
        <div class="col-lg-12 text-center">
          <?php foreach ($halaman as $link): ?>
            <?php echo $link ?>
          <?php endforeach; ?>
        </div><!--end .col -->
      </div><!--end .row -->
      <!-- END PAGINATION -->


    </div><!--end .section-body -->
  </section>
</div><!--end #content-->
<!-- END CONTENT -->

<!-- BEGIN MENUBAR-->
<!-- END MENUBAR -->

<!-- BEGIN OFFCANVAS RIGHT -->
<div class="offcanvas">

  <!-- BEGIN OFFCANVAS SEARCH -->
  <div id="offcanvas-search" class="offcanvas-pane width-8">
  </div><!--end .offcanvas-pane -->
  <!-- END OFFCANVAS SEARCH -->

  <!-- BEGIN OFFCANVAS CHAT -->
  <div id="offcanvas-chat" class="offcanvas-pane style-default-light width-12">
  </div><!--end .offcanvas-pane -->
  <!-- END OFFCANVAS CHAT -->

</div><!--end .offcanvas-->
<!-- END OFFCANVAS RIGHT -->

</div><!--end #base-->
<!-- END BASE -->

<!-- BEGIN JAVASCRIPT -->
<?php $this->load->view('frontend/footer') ?>

</body>
</html>
