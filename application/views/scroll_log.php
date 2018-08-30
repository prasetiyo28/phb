<?php foreach ($log as $l): ?>
  <li class="li">
    <div class="timeline-circ circ-xl style-primary-dark"><i class="md md-access-time"></i></div>
    <div class="timeline-entry">
      <div class="card style-default-light">
        <div class="card-body small-padding">
          <p>
            <span class="text-medium"><?php echo $l->keterangan ?> pada <span class="text-primary"><?php echo date('H:i:sa', strtotime($l->date)); ?></span></span><br/>
            <span class="opacity-50">
              <?php echo tgl_indo(date('Y-m-d', strtotime($l->date))) ?>
            </span>
          </p>
        </div>
      </div>
    </div><!--end .timeline-entry -->
  </li>
<?php endforeach; ?>
