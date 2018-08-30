<!-- BEGIN CONTENT-->
<div id="content">
  <section>
    <div class="section-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Admin/blog/') ?>">Blog</a></li>
        <li class="active">Blog post</li>
      </ol>
    </div>
    <div class="section-body contain-lg">
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-tiles style-default-light">

            <!-- BEGIN BLOG POST HEADER -->
            <div class="row style-primary">
              <div class="col-sm-9">
                <div class="card-body style-default-dark">
                  <h2><?php echo $blog->judul ?></h2>
                  <div class="text-default-light">Diterbitkan oleh <?php if ($blog->id_prov==0): ?>
                    Superadmin
                    <?php else: ?>
                      <a href="#">Admin <?php echo dinas($blog->bidang) ?> daerah <?php echo tampil_kab($blog->id_kab) ?>, <?php echo tampil_prov($blog->id_prov) ?> </a>
                  <?php endif; ?></div>
                </div>
              </div><!--end .col -->
              <div class="col-sm-3">
                <div class="card-body">
                  <div class="hidden-xs">
                    <h3 class="text-light"><strong><?php echo tgl_indo(date('Y-m-d', strtotime($blog->cdate))) ?></strong></h3>
                    <a href="#"><?php echo ttl_komentar($blog->id_news) ?> komentar  <i class="fa fa-comment-o"></i></a>
                    <?php if ($blog->id_admin==$this->session->userdata('id')): ?>
                      <div class="stick-top-right">
                        <a href="<?php echo base_url('Admin/edit_post/'.$blog->id_news) ?>" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a><br/>
                        <a onclick="hapus_post('<?php echo $blog->id_news ?>')" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Hapus"><i class="fa fa-trash"></i></a><br/>
                      </div>
                    <?php endif; ?>


                  </div>
                  <div class="visible-xs">
                    <strong><?php echo tgl_indo(date('Y-m-d', strtotime($blog->cdate))) ?></strong> <a href="#"><?php echo ttl_komentar($blog->id_news) ?> komentar <i class="fa fa-comment-o"></i></a>
                  </div>
                </div>
              </div><!--end .col -->
            </div><!--end .row -->
            <!-- END BLOG POST HEADER -->

            <div class="row">

              <!-- BEGIN BLOG POST TEXT -->
              <div class="col-md-9">
                <article class="style-default-bright">
                  <div>
                    <img class="img-responsive" src="<?php echo base_url() ?>/assets/uploads/<?php echo $blog->gambar ?>" alt="" style="height: 458px;width:900px;"/>
                  </div>
                  <div class="card-body">
                    <?php echo $blog->isi ?>
                    <br/>
                    <div class="well clearfix">
                      <h4>Tentang Penulis: <?php echo $blog->id_admin ?></h4>
                      <img class="height-3 pull-right img-circle" src="<?php echo base_url() ?>/assets/uploads/<?php echo $blog->gambar ?>" alt="" style="height: 120px;width:120px;" />
                      <?php echo $blog->pesan_author ?>
                    </div>
                  </div><!--end .card-body -->
                </article>
              </div><!--end .col -->
              <!-- END BLOG POST TEXT -->

              <!-- BEGIN BLOG POST MENUBAR -->
              <div class="col-md-3">
                <div class="card-body">
                  <h3 class="text-light">Kategori</h3>
                  <ul class="nav nav-pills nav-stacked nav-transparent">
                    <li><a href="<?php echo base_url('Admin/blogtags/0') ?>"><span class="badge pull-right"><?php echo ttl_blog_bybidang('0') ?></span>Pertanian</a></li>
                    <li><a href="<?php echo base_url('Admin/blogtags/1') ?>"><span class="badge pull-right"><?php echo ttl_blog_bybidang('1') ?></span>Pertanian</a></li>
                    <li><a href="<?php echo base_url('Admin/blogtags/2') ?>"><span class="badge pull-right"><?php echo ttl_blog_bybidang('2') ?></span>Perikanan</a></li>
                    <li><a href="<?php echo base_url('Admin/blogtags/3') ?>"><span class="badge pull-right"><?php echo ttl_blog_bybidang('3') ?></span>Peternakan</a></li>
                  </ul>
                </div><!--end .card-body -->
              </div><!--end .col -->
              <!-- END BLOG POST MENUBAR -->

            </div><!--end .row -->
          </div><!--end .card -->
        </div><!--end .col -->
      </div><!--end .row -->

      <!-- BEGIN COMMENTS -->
      <div class="row">
        <div class="col-md-9">
          <h4><?php echo ttl_komentar($blog->id_news) ?> Komentar</h4>
          <ul class="list-comments">
            <?php foreach ($komentar as $k): ?>

            <li>
              <div class="card">
                <div class="comment-avatar"><img class="img-responsive img-circle" src="<?php echo base_url() ?>/assets/uploads/<?php echo tampil_foto_user($k->c_by) ?>" alt="" style="height: 60px;width:60px;"/></div>
                <div class="card-body">
                  <h4 class="comment-title"><?php echo tampil_nama_user($k->c_by) ?> <small><?php echo tgl_indo(date('Y-m-d', strtotime($k->cdate))) ?> | <?php echo date('H:i:sa', strtotime($k->cdate)) ?></small></h4>
                  <?php if ($blog->id_admin==$this->session->userdata('id') || tampil_id_level_user($k->c_by)[0]==$this->session->userdata('level') && tampil_id_level_user($k->c_by)[1]==$this->session->userdata('id')) : ?>
                  <a class="btn btn-sm btn-default-dark stick-top-right" onclick="hapus_komentar('<?php echo $k->id_komentar ?>')" data-toggle="tooltip" data-placement="top" data-original-title="Hapus"><i class="fa fa-trash"></i></a>
                <?php endif; ?>
                  <p><?php echo $k->isi ?></p>
                </div>
              </div><!--end .card -->
            </li><!-- end comment -->
          <?php endforeach; ?>

          </ul>
        </div><!--end .col -->
      </div><!--end .row -->
      <!-- END COMMENTS -->

      <!-- BEGIN LEAVE COMMENT -->
      <div class="row">
        <div class="col-md-9">
          <h4>Tinggalkan komentar</h4>
          <form class="form form-validate form-horizontal " novalidate="novalidate" role="form" action="<?php echo base_url('Admin/send_kometar') ?>" method="post">
            <div class="form-group">
              <div class="col-md-2">
                <label for="textarea1" class="control-label">Komentar</label>
              </div>
              <div class="col-md-10">
                <input type="hidden" name="id_news" value="<?php echo $blog->id_news ?>">
                <textarea name="isi" id="textarea1" class="form-control autosize" rows="1" placeholder="Berikan tanggapan" required></textarea>
              </div>
            </div>
            <div class="form-footer col-md-offset-2">
              <button type="submit" class="btn btn-primary">Kirim Komentar</button>
            </div>
          </form>
        </div><!--end .col -->
      </div><!--end .row -->
      <!-- END LEAVE COMMENT -->

    </div><!--end .section-body -->
  </section>
</div><!--end #content-->
<!-- END CONTENT -->
<div id="viewcanvas"></div>
<script type="text/javascript">
  $(function() {
  toastr.options.positionClass = 'toast-bottom-left';
  <?php if ($this->session->flashdata('alert')==true) {
    echo $this->session->flashdata('alert');
  } ?>
  })

  function hapus_komentar(id) {
    NewToastStyle();

    			var message = 'Anda akan menghapus data ini?. <button type="button" onclick="aksi_hapus_komentar('+id+')" class="btn btn-flat btn-primary toastr-action">YA</button>';
    			toastr.info(message, '');
  }

  function aksi_hapus_komentar(id) {
    var data = new FormData();

      data.append('id_komentar', id);
      var url = "<?php echo base_url('Admin/deleteKomentar/'); ?>";

    $.ajax(
      {
        type: "POST",
        url: url,
        data: data,
        processData: false,
        contentType: false,
        success: function(data)
          {
            if (data=='1')
            {

              toastr.clear();
              toastr.options.progressBar = false;
              toastr.options.timeOut = 2000;
              toastr.success('Berhasil menghapus data', '');
              setTimeout(function () {
                window.location.reload();
              }, 2000);
            }
            else if(data=='0')
            {
              toastr.clear();
              toastr.options.progressBar = false;
              toastr.options.timeOut = 2000;
              toastr.error('Gagal menghapus data. Coba lagi.', '');
            }
            else{alert(data);}
          },
        error:function(data)
          {
            toastr.clear();
            toastr.options.progressBar = false;
            toastr.options.timeOut = 2000;
            toastr.warning('Terjadi kesalahan!!! Coba lagi.', '');
          }
        });
  }

  function hapus_post(id) {
    NewToastStyle();

    			var message = 'Anda akan menghapus data ini?. <button type="button" onclick="aksi_hapus_post('+id+')" class="btn btn-flat btn-primary toastr-action">YA</button>';
    			toastr.info(message, '');
  }

  function aksi_hapus_post(id) {
    var data = new FormData();

      data.append('id_news', id);
      var url = "<?php echo base_url('Admin/deletePost/'); ?>";

    $.ajax(
      {
        type: "POST",
        url: url,
        data: data,
        processData: false,
        contentType: false,
        success: function(data)
          {
            if (data=='1')
            {

              toastr.clear();
              toastr.options.progressBar = false;
              toastr.options.timeOut = 2000;
              toastr.success('Berhasil menghapus data', '');
              setTimeout(function () {
                window.location.href="<?php echo base_url('Admin/blog') ?>";
              }, 2000);
            }
            else if(data=='0')
            {
              toastr.clear();
              toastr.options.progressBar = false;
              toastr.options.timeOut = 2000;
              toastr.error('Gagal menghapus data. Coba lagi.', '');
            }
            else{alert(data);}
          },
        error:function(data)
          {
            toastr.clear();
            toastr.options.progressBar = false;
            toastr.options.timeOut = 2000;
            toastr.warning('Terjadi kesalahan!!! Coba lagi.', '');
          }
        });
  }


</script>
