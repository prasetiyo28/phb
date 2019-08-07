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
          <h1 class="text-primary">Pengaturan Akun</h1>
        </div><!--end .col -->
        <div class="col-lg-8">
          <article class="margin-bottom-xxl">
            <p class="lead">
              Ganti Password.
            </p>
          </article>
        </div><!--end .col -->
      </div><!--end .row -->
      <!-- END INTRO -->

      <!-- BEGIN BASIC ELEMENTS -->
      <div class="row">
        <div class="col-lg-12">
          <h4>Ganti Password</h4>
        </div><!--end .col -->
        <div class="col-lg-2 col-md-3">
          <article class="margin-bottom-xxl">
            <ul class="list-divided">
              <li>Mengatur password login
              </li>
            </ul>
          </article>
        </div><!--end .col -->
        <div class="col-lg-offset-1 col-md-3 col-sm-6">
          <form class="form form-validate" novalidate="novalidate" method="post" id="form_realtime" action="<?php echo base_url('Wirausahawan/ganti_password/') ?>">
            <div class="card">
              <div class="card-body">
               <div class="form-group">
                <input type="password"  name="password" class="form-control" placeholder="masukan password baru" required>
                <label for="password1">Password Baru</label>
              </div>
            </div><!--end .card-body -->
            <div class="card-actionbar">
              <div class="card-actionbar-row">
                <button type="submit" id="btn_realtime" class="btn btn-flat btn-primary ink-reaction">Simpan</button>
              </div>
            </div>
          </div><!--end .card -->
        </form>
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
