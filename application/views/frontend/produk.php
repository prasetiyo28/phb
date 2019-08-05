<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pemetaan Hasil Bumi</title>
  <?php $this->load->view('frontend/header') ?>
</head>
<body class="menubar-hoverable header-fixed">

  <!-- BEGIN HEADER-->
  <?php $this->load->view('frontend/navbar') ?>
  <!-- END HEADER-->

  <!-- BEGIN BASE-->
  <div id="base" style="padding-left: unset;">

   <!-- BEGIN OFFCANVAS LEFT -->
   <div id="viewcanvas-kiri">
    <div class="offcanvas">

    </div><!--end .offcanvas-->

  </div>
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

            <div class="card card-bordered style-primary">
              <div class="card-head">
                <header><i class="md md-store"></i> <?php echo $toko->toko ?></header>
              </div><!--end .card-head -->
              <div class="card-body style-default-bright">
                <p>
                  <b>Alamat</b><br><?php echo $toko->alamat ?>.<br>
                  <b>Pemilik</b><br><?php echo $toko->nama ?>.
                </p>
              </div><!--end .card-body -->
            </div>

            <div class="section-header">
              <h4>
                
                Produk
              </h4>
              
            </div>

            <!-- BEGIN BLOG MASONRY -->
            <?php $no=0; foreach ($produk as $b): $no++;?>

            <div class="col-md-3" >
              <article>
                <div class="card card-bordered style-primary">
                  <div class="card-head">
                    <center>
                      <img style="height: 250px" src="<?php echo base_url() ?>/assets/uploads/produk/<?php echo $b->foto ?>">
                    </center>
                  </div><!--end .card-head -->
                  <div class="card-body style-default-bright">
                    <p>
                      <b>Nama</b><br><?php echo $b->nama ?><br>
                      <b>Produsen </b><br><?php echo $b->produsen ?><br>
                      <b>Berat/volume</b><br><?php echo $b->jumlah.$b->satuan ?><br>
                      <b>Harga </b><br><?php echo $b->harga ?><br>
                    </p>
                    
                  </div><!--end .card-body -->
                </div>
              </article><!-- end /article -->
            </div>

          <?php endforeach; ?>

          <!-- END BLOG MASONRY -->

        </div><!--end .col -->



      </div><!--end .row -->


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
