<div class="list-results" >

<?php foreach ($pengguna as $p): ?>
  <?php if ($p->level=='1'): ?>
    <div class="col-xs-12 col-lg-6 hbox-xs">
      <div class="hbox-column width-2">
        <img class="img-circle img-responsive pull-left" src="<?php echo base_url() ?>/assets/uploads/<?php echo $p->foto ?>" alt="" style="height:80px;width:80px;"/>
      </div><!--end .hbox-column -->
      <div class="hbox-column v-top">
        <div class="clearfix">
          <div class="col-lg-12 margin-bottom-lg">
            <a class="text-lg text-medium nama" onclick="profil('<?php echo $p->id_admin ?>')" href="javascript:void(0)"><?php echo $p->nama ?></a>
          </div>
        </div>
        <div class="clearfix opacity-75">
          <div class="col-md-5">
            <span class="glyphicon glyphicon-phone text-sm"></span> &nbsp;<?php echo $p->telp ?>
          </div>
          <div class="col-md-7">
            <span class="glyphicon glyphicon-envelope text-sm"></span> &nbsp;<?php echo $p->email ?>
          </div>
        </div>
        <div class="clearfix">
          <div class="col-lg-12">
            <span class="opacity-75"><span class="glyphicon glyphicon-map-marker text-sm"></span> &nbsp;<?php echo tampil_kab($p->id_kab)?>, <?php echo tampil_prov($p->id_prov)?></span>
          </div>
        </div>
        <div class="stick-top-right small-padding">
          <?php if ($p->blokir=="1"): ?>
            <i class="fa fa-dot-circle-o fa-fw text-danger"></i>
          <?php endif; ?>
          <?php if (date('Y-m-d',strtotime($p->cdate)) == date('Y-m-d')): ?>
            <i class="fa fa-dot-circle-o fa-fw text-info"></i>
          <?php endif; ?>
        </div>
      </div><!--end .hbox-column -->
    </div><!--end .hbox-xs -->

  <?php endif; ?>
<?php endforeach; ?>
</div><!--end .list-results -->
<script type="text/javascript">
  function profil(id) {
    var data = new FormData();
        data.append('id', id);
        data.append('level', 'admin');
    $.ajax({
              type: "POST",
              data: data,
              processData: false,
              contentType: false,
              url:"<?php echo base_url('Xyz/makesesion/') ?>",
              success: function(data)
              {
                if (data=='1') {
                  window.location.href="<?php echo base_url('Xyz/profile_admin/') ?>";
                }else {
                  toastr.info("Gagal membuka halaman, coba lagi.", "");
                }

              },
              error:function(data)
              {toastr.info("Terjadi kesalahan, coba lagi.", "");}
          });
  }
</script>
