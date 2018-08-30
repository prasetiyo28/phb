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
          <h1 class="text-primary">Pengaturan Master Data</h1>
        </div><!--end .col -->
        <div class="col-lg-8">
          <article class="margin-bottom-xxl">
            <p class="lead">
              Mengatur Realtime chat.
            </p>
          </article>
        </div><!--end .col -->
      </div><!--end .row -->
      <!-- END INTRO -->

      <!-- BEGIN BASIC ELEMENTS -->
      <div class="row">
        <div class="col-lg-12">
          <h4>Realtime chat</h4>
        </div><!--end .col -->
        <div class="col-lg-2 col-md-3">
          <article class="margin-bottom-xxl">
            <ul class="list-divided">
              <li>
                 Mengatur realtime chat aktif dan durasi realtime.
              </li>
            </ul>
          </article>
        </div><!--end .col -->
        <div class="col-lg-offset-1 col-md-3 col-sm-6">
          <form class="form form-validate" novalidate="novalidate" method="post" id="form_realtime" action="<?php echo base_url('User/update_realtime_chat/') ?>">
          <div class="card">
            <div class="card-body">
                <div class="form-group">
                  <input type="hidden" name="id" value="<?php echo chatRealtime()[2] ?>">
                  <br>
                  <?php if (chatRealtime()[0]=='true'): ?>
                  <div class="radio radio-styled">
										<label>
											<input type="radio" name="value1[]" value="true" checked>
											<span>On</span>
										</label>
									</div>
                  <div class="radio radio-styled">
										<label>
											<input type="radio" name="value1[]" value="false" >
											<span>Off</span>
										</label>
									</div>
                  <?php else: ?>
                    <div class="radio radio-styled">
  										<label>
  											<input type="radio" name="value1[]" value="true" >
  											<span>On</span>
  										</label>
  									</div>
                    <div class="radio radio-styled">
  										<label>
  											<input type="radio" name="value1[]" value="false" checked>
  											<span>Off</span>
  										</label>
  									</div>
                  <?php endif; ?>
                  <label for="value1">Realtime chat</label>
                </div>
                <div class="form-group">
                  <input type="text"  name="value2" class="form-control" value="<?php echo chatRealtime()[1] ?>" required>
                  <label for="password1">Durasi realtime (detik)</label>
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
