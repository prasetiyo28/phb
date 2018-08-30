<div id="modal_icon" class="modal fade" role="dialog">
  <div class="modal-dialog ">
    <!-- Modal content-->
				<div class="card">
					<div class="card-head">
						<header>Pilih Icon</header>
					</div>
					<div class="card-body">
            <?php
            $no=0;
            for ($i=1; $i <= 3 ; $i++) {
              $no++;
            ?>
            <div class="col-sm-12">

            <?php if ($i=='1'): ?>
                <h4 class="text-caption text-lg text-success" style="margin-bottom: 1px;">Pertanian</h4>
                <hr style="margin-top: 0px;">
            <?php elseif ($i=='2'): ?>
                <h4 class="text-caption text-lg text-info" style="margin-bottom: 1px;">Perikanan</h4>
                <hr style="margin-top: 0px;">
            <?php else: ?>
                <h4 class="text-caption text-lg text-warning" style="margin-bottom: 1px;">Peternakan</h4>
                <hr style="margin-top: 0px;">
            <?php endif; ?>
            </div>
              <?php foreach ($icon as $ic): ?>
              <?php if ($ic->kategori==$i): ?>
                <div class="col-sm-2">
                  <button type="button" class="btn btn-lg ink-reaction btn-icon-toggle btn-primary"> <img src="<?php echo base_url('assets/uploads/icon/'.$ic->icon) ?>" alt=""></button>
                  <em class="text-caption"><?php echo $ic->nama ?> </em>
                </div>
              <?php endif;?>
              <?php endforeach; }?>
  				</div><!--end .card-body -->
        </div><!--end .card -->
  </div>
</div>
