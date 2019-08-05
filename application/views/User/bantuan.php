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
            <div class="card-body ">
            <video width='100%'height="100%" controls>
              <source src="<?php echo base_url()?>assets/tutorial/user_add_produksi.mp4" type="video/mp4">
              <!-- <source src="mov_bbb.ogg" type="video/ogg">
              Your browser does not support HTML5 video. -->
            </video>

            </div><!--end .card-body -->
          </div>
        </div><!--end .col -->

        <div class="col-md-6 col-sm-6">
          <h4>Cara mengedit produksi baru</h4>

          <div class="card">
            <div class="card-body">
            <video width='100%'height="100%" controls>
            <source src="<?php echo base_url()?>assets/tutorial/user_edit_produksi.mp4" type="video/mp4">
              <!-- <source src="mov_bbb.ogg" type="video/ogg">
              Your browser does not support HTML5 video. -->
            </video>

            </div><!--end .card-body -->
          </div><!--end .card -->
        </div><!--end .col -->

        <div class="col-md-6 col-sm-6">
          <h4>Cara menghapus produksi baru</h4>

          <div class="card">
            <div class="card-body">
            <video width='100%'height="100%" controls>
            <source src="<?php echo base_url()?>assets/tutorial/user_hapus_produksi.mp4" type="video/mp4">
              <!-- <source src="mov_bbb.ogg" type="video/ogg">
              Your browser does not support HTML5 video. -->
            </video>

            </div><!--end .card-body -->
          </div><!--end .card -->
        </div><!--end .col -->

        <div class="col-md-6 col-sm-6">
          <h4>Cara menambah data panen</h4>

          <div class="card">
            <div class="card-body">
            <video width='100%'height="100%" controls>
            <source src="<?php echo base_url()?>assets/tutorial/user_panen.mp4" type="video/mp4">
              <!-- <source src="mov_bbb.ogg" type="video/ogg">
              Your browser does not support HTML5 video. -->
            </video>

            </div><!--end .card-body -->
          </div><!--end .card -->
        </div><!--end .col -->

        <div class="col-md-6 col-sm-6">
          <h4>Cara Konfirmasi Akun</h4>

          <div class="card">
            <div class="card-body">
            <video width='100%'height="100%" controls>
            <source src="<?php echo base_url()?>assets/tutorial/user_konfirmasi.mp4" type="video/mp4">
              <!-- <source src="mov_bbb.ogg" type="video/ogg">
              Your browser does not support HTML5 video. -->
            </video>

            </div><!--end .card-body -->
          </div><!--end .card -->
        </div><!--end .col -->

      <div class="col-md-6 col-sm-6">
          <h4>Cara mengedit profil</h4>

          <div class="card">
            <div class="card-body">
            <video width='100%'height="100%" controls>
            <source src="<?php echo base_url()?>assets/tutorial/user_edit_produksi.mp4" type="video/mp4">
              <!-- <source src="mov_bbb.ogg" type="video/ogg">
              Your browser does not support HTML5 video. -->
            </video>

            </div><!--end .card-body -->
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
