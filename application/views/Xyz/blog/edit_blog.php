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
          <form class="form form-validate" novalidate="novalidate" id="formCompose" method="post" action="<?php echo base_url()?>Xyz/update_blog" enctype="multipart/form-data">
            <div class="form-group floating-label">
              <input type="hidden" name="id_news" value="<?php echo $blog->id_news ?>">
              <input type="hidden" name="img_lama" value="<?php echo $blog->gambar ?>">

              <input type="text" class="form-control" name="judul" required value="<?php echo $blog->judul ?>" data-rule-badWords="true">
              <label>Judul</label>
            </div><!--end .form-group -->
            <div class="form-group">
              <textarea id="simple-summernote" name="isi" class="form-control control-6-rows" spellcheck="false" required data-rule-badWords="true"><?php echo $blog->isi ?></textarea>
            </div><!--end .form-group -->
            <div class="form-group">
              <select class="form-control select2-list" data-placeholder="Select an item" name="kategori[]" multiple required>
                  <option <?php
                  $k=pecahkan_kategori_news($blog->bidang);
                  if (!empty($k)) {
              			for ($i=0; $i < count($k) ; $i++) {
                      if ($k[$i]==1) {
                        echo "selected";
                      }
              			}
              		} ?> value="1">Pertanian</option>
                  <option <?php
                  $k=pecahkan_kategori_news($blog->bidang);
                  if (!empty($k)) {
              			for ($i=0; $i < count($k) ; $i++) {
                      if ($k[$i]==2) {
                        echo "selected";
                      }
              			}
              		} ?> value="2">Perikanan</option>
                  <option <?php
                  $k=pecahkan_kategori_news($blog->bidang);
                  if (!empty($k)) {
              			for ($i=0; $i < count($k) ; $i++) {
                      if ($k[$i]==3) {
                        echo "selected";
                      }
              			}
              		} ?> value="3">Peternakan</option>
              </select>
              <label >Kategori</label>
            </div>
            <div class="form-group floating-label">
              <input type="text" class="form-control" name="pesan" required value="<?php echo $blog->pesan_author ?>" data-rule-badWords="true">
              <label for="Subject1">Pesan Author</label>
            </div><!--end .form-group -->
            <div id="divImg" class="form-group">
              <div class="btn ink-reaction btn-raised btn-primary pull-right">
                <center>
                <i class="fa fa-paperclip fa-lg"></i> <span id="filename">Gambar</span>
                <input type="file" id="img" name="img" value="" style=" position: absolute;top: 0;right: 0;left: 0;bottom: 0;width: 100%;margin: 0;padding: 0;font-size: 20px;cursor: pointer;opacity: 0;filter: alpha" onchange="inputChange();">
              </center>
             </div>
             <span id="s" class="text-danger"></span>

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
        <a class="btn ink-reaction btn-icon-toggle" href="<?php echo base_url('Xyz/myblog'); ?>"><i class="fa fa-chevron-left"></i></a>
      </div>
      <div class="section-floating-action-row">
        <a class="btn ink-reaction btn-floating-action btn-lg btn-accent" href="#formCompose" data-submit="form"><i class="md md-send"></i></a>
      </div>
    </div>
    <!-- END SECTION ACTION -->

  </section>
</div><!--end #content-->
<!-- END CONTENT -->
<div id="viewcanvas"></div>
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
      $('#divImg').removeClass('card card-outlined style-danger');
      $('#s').text('');

    }else {
      $('#parm').val('');
    }
  };

</script>
