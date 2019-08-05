<?php foreach ($email as $k): ?>
<input type="hidden" id="id_email" value="<?php echo $k->id_email ?>">
<div class="col-md-8 col-lg-8">
  <div class="card-body contain-sm">
      <div class="text-divider hidden-md hidden-lg"><span>Email</span></div>
      <h1 class="no-margin"><?php echo $k->subjek ?></h1>
      <div class="btn-group stick-top-right">
        <a href="javascript:void(0)" onclick="deleteEmail()" class="btn btn-icon-toggle btn-default"><i class="md md-delete"></i></a>
        <a href="javascript:void(0)" onclick="closeEmail()" class="btn btn-icon-toggle btn-default"><i class="md md-clear"></i></a>
      </div>
      <span class="pull-right text-default-light"><?php echo tgl_indo(date('Y-m-d',strtotime($k->cdate))) ?> <br> <?php echo date('H:i:sa',strtotime($k->cdate)) ?></span>
      <a class="link-default pull-right" href="#emailOptions" data-toggle="collapse"> <i class="md md-keyboard-arrow-down"></i> </a>

      <strong>Kepada :
        <?php foreach ($to as $t): ?>
          <?php echo $t->to.", "; ?>
        <?php endforeach; ?>
      </strong>
      <div id="emailOptions" class="collapse">
        <span class="text-default-light"> CC :
          <?php foreach ($cc as $t): ?>
          <?php echo $t->cc.", "; ?>
        <?php endforeach; ?>
      </span>
      <br>
      <span class="text-default-light"> BCC :
        <?php foreach ($bcc as $t): ?>
        <?php echo $t->bcc.", "; ?>
      <?php endforeach; ?>
    </span>

      </div><!--end #emailOptions -->
      <hr/>
      <p>
        <?php echo $k->isi;
        $file = substr($k->file,-4); ?>
        </p>
        <p>
         <?php if ($file==".png"|$file==".jpg"|$file=="jpeg"): ?>
           <img class="img-responsive" src="<?php echo base_url() ?>assets/uploads/email/<?php echo $k->file ?>" alt="" style="max-width: 30em;"/>
         <?php elseif ($file==".pdf"|$file=="docx"): ?>
           <a href="<?php echo base_url() ?>assets/uploads/email/<?php echo $k->file ?>" class="btn btn-primary"> <i class="fa fa-download"></i> FILE</a>
         <?php endif; ?>
        </p>

  </div>
</div><!--end .col -->
<?php endforeach; ?>
