<!-- BEGIN CONTENT-->
<div id="content">
  <section class="has-actions style-default-bright">

    <!-- BEGIN INBOX -->
    <div class="section-body">
      <div class="row row-centered">
        <div class="col-md-2">

        </div>

        <!-- BEGIN MAIL COMPOSE -->
        <div class="col-md-8">
          <h3>Compose</h3>
          <form class="form form-validate" novalidate="novalidate" id="formCompose" method="post" action="<?php echo base_url()?>Xyz/send_mail" enctype="multipart/form-data">
            <div class="form-group">
              <select class="form-control select2-list" data-placeholder="Select an item" name="to[]" multiple>
                <optgroup label="Admin">
                  <?php foreach ($admin as $a): ?>
                    <option value="<?php echo $a->email?>"><?php echo $a->nama ?></option>
                  <?php endforeach; ?>
                </optgroup>
                <optgroup label="Pengguna">
                  <?php foreach ($pengguna as $p): ?>
                    <option value="<?php echo $p->email?>"><?php echo $p->nama ?></option>
                  <?php endforeach; ?>
                </optgroup>
              </select>
              <label>To</label>
              <a class="link-default pull-right" href="#emailOptions" data-toggle="collapse"> <i class="md md-add"></i> </a>
            </div><!--end .form-group -->
            <div id="emailOptions" class="collapse">
              <div class="form-group">
                <select class="form-control select2-list" data-placeholder="Select an item" name="cc[]" multiple>
                  <optgroup label="Admin">
                    <?php foreach ($admin as $a): ?>
                      <option value="<?php echo $a->email?>"><?php echo $a->nama ?></option>
                    <?php endforeach; ?>
                  </optgroup>
                  <optgroup label="Pengguna">
                    <?php foreach ($pengguna as $p): ?>
                      <option value="<?php echo $p->email?>"><?php echo $p->nama ?></option>
                    <?php endforeach; ?>
                  </optgroup>
                </select>
                <label>CC</label>
              </div><!--end .form-group -->
              <div class="form-group">
                <select class="form-control select2-list" data-placeholder="Select an item" name="bcc[]" multiple>
                  <optgroup label="Admin">
                    <?php foreach ($admin as $a): ?>
                      <option value="<?php echo $a->email?>"><?php echo $a->nama ?></option>
                    <?php endforeach; ?>
                  </optgroup>
                  <optgroup label="Pengguna">
                    <?php foreach ($pengguna as $p): ?>
                      <option value="<?php echo $p->email?>"><?php echo $p->nama ?></option>
                    <?php endforeach; ?>
                  </optgroup>
                </select>
                <label >BCC</label>
              </div><!--end .form-group -->
            </div><!--end #emailOptions -->
            <div class="form-group floating-label">
              <input type="text" class="form-control" name="subjek" required>
              <label for="Subject1">Subject</label>
            </div><!--end .form-group -->
            <div class="form-group">
              <textarea id="simple-summernote" name="isi" class="form-control control-6-rows" spellcheck="false" required></textarea>
            </div><!--end .form-group -->
            <div class="form-group">
              <div class="btn ink-reaction btn-raised btn-primary pull-right">
                <center>
                <i class="fa fa-paperclip fa-lg"></i> <span id="filename">FILE</span>
                <input type="file" id="img" name="img" value="" style=" position: absolute;top: 0;right: 0;left: 0;bottom: 0;width: 100%;margin: 0;padding: 0;font-size: 20px;cursor: pointer;opacity: 0;filter: alpha" onchange="inputChange();">
              </center>
             </div>
             <input type="hidden" id="parm" name="parm">
            </div>
          </form>
        </div><!--end .col -->
        <!-- END MAIL COMPOSE -->

      </div><!--end .row -->
    </div><!--end .section-body -->
    <!-- END INBOX -->

    <!-- BEGIN SECTION ACTION -->
    <div class="section-action style-primary">
      <div class="section-action-row">
        <a class="btn ink-reaction btn-icon-toggle" href="<?php echo base_url('Xyz/email'); ?>"><i class="fa fa-chevron-left"></i></a>
      </div>
      <div class="section-floating-action-row">
        <a class="btn ink-reaction btn-floating-action btn-lg btn-accent" href="#formCompose" data-submit="form"><i class="md md-send"></i></a>
      </div>
    </div>
    <!-- END SECTION ACTION -->

  </section>
</div><!--end #content-->
<!-- END CONTENT -->
<?php $this->load->view('Xyz/canvas'); ?>
<script type="text/javascript">
  $(function() {
    $('select').select2();
    // Simple toolbar
  $('#simple-summernote').summernote({
    height: $('#simple-summernote').height(),
    toolbar: [
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['fontsize', ['fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']]
    ]
  });
  toastr.options.positionClass = 'toast-bottom-left';
  <?php if ($this->session->flashdata('alert')==true) {
    echo $this->session->flashdata('alert');
  } ?>
  })
  function inputChange() {
    var filename = $('#img').val().replace(/.*(\/|\\)/, '');
    $('#filename').text(filename);
    if (filename!="") {
      $('#parm').val('1');
    }else {
      $('#parm').val('');
    }
  };
</script>
