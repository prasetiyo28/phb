
      <div class="card">
        <div class="card-body">
          <div style="overflow-x:auto;">
            <table id="tbl1" class="table table-striped table-hover dataTable no-footer" >
              <thead>
                <tr>
                  <th>No</th>
                  <th>Produksi</th>
                  <th>Jumlah bibit</th>
                  <th>Jumlah perkiraan panen</th>
                  <th>Jumlah panen</th>
                  <th>Tanggal tanam</th>
                  <th>Tanggal perkiraan panen</th>
                  <th>Tanggal panen</th>
                  <th>Harga Perkiraan perkilo/ekor</th>
                  <th>Nilai panen</th>
                  <th>Jumlah pupuk</th>
                  <th>Lokasi</th>
                  <th>Luas lahan</th>
                  <th>Status lahan</th>
                  <th>Keterangan</th>
                  <th>Status panen</th>
                  <th>Pemilik</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=0; foreach ($produksi as $p): $no++;?>
                  <?php if ($p->del_flag=='0'): ?>
                    <tr style="background-color:#f44336;">
                    <?php else: ?>
                    <tr>
                  <?php endif; ?>

                  <td><?php echo $no ?></td>
                  <td><?php echo $p->jenis_produksi ?></td>
                  <td><?php echo $p->jml_bibit ?></td>
                  <td><?php echo $p->jml_kira_panen ?></td>
                  <td><?php echo $p->jml_panen ?></td>
                  <td><?php echo $p->tgl_tanam ?> </td>
                  <td><?php echo $p->tgl_kira_panen ?> </td>
                  <td><?php echo $p->tgl_panen ?> </td>
                  <td><?php echo $p->harga_kira_perkilo ?></td>
                  <td><?php echo $p->nilai_panen ?> </td>
                  <td><?php echo $p->jml_pupuk ?> </td>
                  <td><?php echo $p->lokasi ?></td>
                  <td><?php echo $p->luas ?></td>
                  <td>
                    <?php if ($p->jenis_tambak==1) {
                      $jt='Air Tawar';
                    }elseif ($p->jenis_tambak==2) {
                      $jt='Air Payau';
                    }else {
                      $jt='';
                    }
                    ?>
                    <?php if ($p->status_lahan==1): ?>
                      Milik Sendiri
                      <?php echo $jt ?>
                      <?php else: ?>
                        Sewa
                        <?php echo $jt ?>
                    <?php endif; ?>
                  </td>
                  <td><?php echo $p->ket ?></td>
                  <td>
                    <?php if ($p->panen_flag==1): ?>
                      Panen
                    <?php elseif ($p->panen_flag==2): ?>
                        Gagal Panen
                      <?php else: ?>
                        Belum Panen
                    <?php endif; ?>
                  </td>
                  <td>
                    <?php echo $p->nama ?> <br> <?php echo $p->nik ?>
                  </td>
                </tr>
              <?php endforeach; ?>

              </tbody>
            </table>

          </div>
        </div>
      </div>
      <em class="text-caption"> Tabel produksi | </em>


<script type="text/javascript">
$( document ).ready(function() {
$('#tbl1').dataTable({
  "dom": 'T<"clear">lfrtip',
     "tableTools": {
         "sSwfPath": " <?php echo base_url('assets/js/libs/DataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf') ?> "
     }
});
});

</script>
