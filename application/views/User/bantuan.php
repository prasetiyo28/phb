<div id="content">
  <section>
    <div class="section-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('User'); ?>">home</a></li>
        <li class="active">Pengaturan</li>
      </ol>
    </div><!--end .section-header -->
    <div class="section-body contain-lg">
      <!-- BEGIN INTRO -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="text-primary">Bantuan</h1>
        </div><!--end .col -->
        <div class="col-lg-8">
          <article class="margin-bottom-xxl">
            <p class="lead">
              Mengulas bagaimana cara menggunakan aplikasi.
            </p>
          </article>
        </div><!--end .col -->
      </div><!--end .row -->
      <!-- END INTRO -->

      <!-- BEGIN BASIC ELEMENTS -->
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <h4>Cara menambahkan produksi baru</h4>
          <div class="card">
            <div class="card-body">


            </div><!--end .card-body -->
            <div class="card-actionbar">
              <div class="card-actionbar-row">
              </div>
            </div>
          </div>
        </div><!--end .col -->
        <div class="col-md-6 col-sm-6">
          <h4>Cara mengedit produksi baru</h4>

          <div class="card">
            <div class="card-body">


            </div><!--end .card-body -->
            <div class="card-actionbar">
              <div class="card-actionbar-row">
              </div>
            </div>
          </div><!--end .card -->
        </div><!--end .col -->
      </div><!--end .row -->
      <!-- END BASIC ELEMENTS -->

    </div><!--end .section-body -->
  </section>
</div>


<div id="viewcanvas"></div>

<script type="text/javascript">

$(function() {
  toastr.options.positionClass = 'toast-bottom-left';
  <?php if ($this->session->flashdata('alert')==true) {
    echo $this->session->flashdata('alert');
  } ?>

})

</script>
