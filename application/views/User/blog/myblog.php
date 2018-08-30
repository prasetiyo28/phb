<div id="content">

  <section>
  <div class="section-header">
    <ol class="breadcrumb">
      <?php echo $liblog ?>
    </ol>
  </div>
  <div class="section-body">
    <div class="row">
      <div class="col-lg-8">

        <!-- BEGIN BLOG MASONRY -->
        <div class="card card-type-blog-masonry style-default-bright">
          <div class="row">
            <?php $no=0; foreach ($blog as $b): $no++;?>
              <?php $w = shuffle($warna); ?>

                <?php if ($no % 2==0  ): ?>
                  <div class="col-md-4">
                    <article>
                      <div class="card-body <?php echo $warna[0] ?> blog-text" style="height: 35em;">
                        <div class="opacity-50">Dibagikan pada <?php echo tgl_indo(date('Y-m-d', strtotime($b->cdate))) ?> oleh <?php if ($b->id_prov==0): ?>
                          Superadmin
                          <?php else: ?>
                            <a href="#">Admin <?php echo dinas($b->bidang) ?> daerah <?php echo tampil_kab($b->id_kab) ?>, <?php echo tampil_prov($b->id_prov) ?> </a>
                        <?php endif; ?> | <a href="#"><?php echo ttl_komentar($b->id_news) ?> komentar <i class="fa fa-comment-o"></i></a></div>
                        <h3><a class="link-default" href="<?php echo base_url('User/detail_post/'.$b->id_news) ?>"><?php echo $b->id_news ?> <?php echo $b->judul ?></a></h3>
                        <?php echo  substr($b->isi,0,270)  ?>...
                        </div>
                      <div class="blog-image">
                        <img class="img-responsive" src="<?php echo base_url('assets/uploads/'.$b->gambar) ?>" alt="" style="width: 272px;height:204px;"/>
                      </div>
                    </article><!-- end /article -->
                  </div>
                  <?php else: ?>
                    <div class="col-md-4">
                      <article>
                        <div class="blog-image">
                          <img class="img-responsive" src="<?php echo base_url('assets/uploads/'.$b->gambar) ?>" alt="" style="width: 272px;height:204px;"/>
                        </div>
                        <div class="card-body blog-text <?php echo $warna[0] ?>" style="height: 35em;">
                          <div class="opacity-50">Dibagikan pada <?php echo tgl_indo(date('Y-m-d', strtotime($b->cdate))) ?> oleh <?php if ($b->id_prov==0): ?>
                            Superadmin
                            <?php else: ?>
                              <a href="#">Admin <?php echo dinas($b->bidang) ?> daerah <?php echo tampil_kab($b->id_kab) ?>,<?php echo tampil_kab($b->id_prov) ?> </a>
                          <?php endif; ?> | <a href="#"><?php echo ttl_komentar($b->id_news) ?> komentar <i class="fa fa-comment-o"></i></a></div>
                          <h3><a class="link-default" href="<?php echo base_url('User/detail_post/'.$b->id_news) ?>"><?php echo $b->judul ?></a></h3>
                          <?php echo  substr($b->isi,0,270)  ?>...
                        </div>
                      </article><!-- end /article -->
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

          </div><!--end .row -->
        </div><!--end .card -->
        <!-- END BLOG MASONRY -->

      </div><!--end .col -->

      <div class="col-lg-offset-1 col-lg-3 col-md-2">

        <div class="card card-underline style-default-bright">
          <div class="card-head">
            <header class="opacity-75"><small>Kategori</small></header>
          </div><!--end .card-head -->
          <div class="card-body no-padding">
            <ul class="list">
              <li class="tile">
                <a href="<?php echo base_url('User/blogtags/0') ?>" class="tile-content ink-reaction">
                  <div class="tile-icon">
                  </div>
                  <div class="tile-text">
                    <span class="badge pull-right"><?php echo ttl_blog_bybidang('0') ?></span>
                    <span>Terbaru</span>
                  </div>
                </a>
              </li>

              <li class="tile">
                <a href="<?php echo base_url('User/blogtags/1') ?>" class="tile-content ink-reaction">
                  <div class="tile-icon">
                  </div>
                  <div class="tile-text">
                    <span class="badge pull-right"><?php echo ttl_blog_bybidang('1') ?></span>
                    <span>Pertanian</span>
                  </div>
                </a>
              </li>
              <li class="tile">
                <a href="<?php echo base_url('User/blogtags/2') ?>" class="tile-content ink-reaction">
                  <div class="tile-icon">
                  </div>
                  <div class="tile-text">
                    <span class="badge pull-right"><?php echo ttl_blog_bybidang('2') ?></span>
                    <span>Perikanan</span>
                  </div>
                </a>
              </li>
              <li class="tile">
                <a href="<?php echo base_url('User/blogtags/3') ?>" class="tile-content ink-reaction">
                  <div class="tile-icon">
                  </div>
                  <div class="tile-text">
                    <span class="badge pull-right"><?php echo ttl_blog_bybidang('3') ?></span>
                    <span>Peternakan</span>
                  </div>
                </a>
              </li>
            </ul>
          </div><!--end .card-body -->
        </div><!--end .card -->
      </div>

    </div><!--end .row -->

    <!-- BEGIN PAGINATION -->
    <div class="row">
      <div class="col-lg-8 text-center">
        <?php foreach ($halaman as $link): ?>
                    <?php echo $link ?>
        <?php endforeach; ?>
      </div><!--end .col -->
    </div><!--end .row -->
    <!-- END PAGINATION -->


  </div><!--end .section-body -->
</section>

</div>


<div id="viewcanvas"></div>
