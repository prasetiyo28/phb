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
              <li><a href="<?php echo base_url('Frontend/blog/') ?>">Blog</a></li>
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
                          <li><a href="<?php echo base_url('Frontend/blogtags/0') ?>"><span class="badge pull-right"><?php echo ttl_blog_bybidang('0') ?></span>Terbaru</a></li>
                          <li><a href="<?php echo base_url('Frontend/blogtags/1') ?>"><span class="badge pull-right"><?php echo ttl_blog_bybidang('1') ?></span>Pertanian</a></li>
                          <li><a href="<?php echo base_url('Frontend/blogtags/2') ?>"><span class="badge pull-right"><?php echo ttl_blog_bybidang('2') ?></span>Perikanan</a></li>
                          <li><a href="<?php echo base_url('Frontend/blogtags/3') ?>"><span class="badge pull-right"><?php echo ttl_blog_bybidang('3') ?></span>Peternakan</a></li>
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
            <!-- END LEAVE COMMENT -->

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
