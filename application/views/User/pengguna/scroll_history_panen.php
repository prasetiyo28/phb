<?php $no=0; foreach ($panen as $pn): ?>
  <?php if ($pn->panen_flag!='0'): $no++;?>
    <li class="li-history">
        <div class="timeline-circ circ-xl <?php  if ($pn->panen_flag=='1') {echo 'style-primary';$p='Panen';$t='text-primary';}else {echo 'style-danger';$p='Gagal Panen';$t='text-danger';} ?>"><i class="md md-event"></i></div>
        <div class="timeline-entry">
          <div class="panel-group" id="accordion3">
          <div class="card style-default-light panel">

              <div class="card-body small-padding">
                <div class="collapsed" data-toggle="collapse" data-parent="#accordion3" data-target="#accordion3-<?php echo $no ?>">
                  <p>
                    <img src="<?php echo base_url('assets/uploads/icon/'.$pn->icon) ?>" class="img-circle img-responsive pull-left">
                    <span class="text-medium"><span class="<?php echo $t ?>"><?php echo $p ?></span> </span>
                    <a class="btn btn-icon-toggle pull-right"><i class="fa fa-angle-down"></i></a>
                    <br/>
                    <span class="opacity-50">
                      <?php echo tgl_indo($pn->tgl_panen) ?> <br>
                    </span>
                    Milik <?php echo tampil_nama_user_by_id($pn->id_user) ?>
                  </p>
                </div>
                <div id="accordion3-<?php echo $no ?>" class="collapse">
                <table class="a table table-responsive table-banded">
                  <tbody>
                    <tr>
                      <td>Produksi</td>
                      <td><?php echo $pn->jenis_produksi ?></td>
                    </tr>
                    <tr>
                      <td>Tanggal Tanam</td>
                      <td><?php echo tgl_indo($pn->tgl_tanam) ?></td>
                    </tr>
                    <tr>
                      <td>Perkiraan Tanggal Panen</td>
                      <td><?php echo tgl_indo($pn->tgl_kira_panen) ?></td>
                    </tr>
                    <tr>
                      <td>Tanggal Panen</td>
                      <td><?php echo tgl_indo($pn->tgl_panen) ?></td>
                    </tr>
                    <tr>
                      <td>Jumlah Bibit</td>
                      <td><?php echo $pn->jml_bibit ?> kg/ekor</td>
                    </tr>
                    <tr>
                      <td>Perkiraan Jumlah Panen</td>
                      <td><?php echo $pn->jml_kira_panen ?> kg/ekor</td>
                    </tr>
                    <tr>
                      <td>Jumlah Panen</td>
                      <td><?php echo $pn->jml_panen ?> kg/ekor</td>
                    </tr>
                    <tr>
                      <td>Jumlah Pupuk</td>
                      <td><?php echo $pn->jml_pupuk ?> kg/ekor</td>
                    </tr>
                    <tr>
                      <td>Harga Perkilo/ekor</td>
                      <td><?php echo $pn->harga_kira_perkilo ?></td>
                    </tr>
                    <tr>
                      <td>Nilai Panen</td>
                      <td><?php echo $pn->nilai_panen?></td>
                    </tr>
                    <tr>
                      <td>Luas Lahan</td>
                      <td><?php echo $pn->luas ?> m<sup>2</sup></td>
                    </tr>
                    <tr>
                      <td>Status Lahan</td>
                      <td><?php if ($pn->status_lahan=='1'): ?>
                        Milik Sendiri
                        <?php else: ?>
                          Sewa
                      <?php endif; ?></td>
                    </tr>
                    <tr>
                      <td>Lokasi</td>
                      <td><?php echo $pn->lokasi ?></td>
                    </tr>
                    <?php if ($pn->bidang=='2'): ?>
                      <tr>
                        <td>Jenis Tambak</td>
                        <td><?php if ($pn->jenis_tambak=='1'): ?>
                            Air Tawar
                          <?php else: ?>
                            Air Payau
                        <?php endif; ?></td>
                      </tr>
                    <?php endif; ?>
                    <tr>
                      <td>Keterangan</td>
                      <td><?php echo $pn->ket ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div><!--end .timeline-entry -->
    </li>
  <?php endif; ?>
<?php endforeach; ?>
