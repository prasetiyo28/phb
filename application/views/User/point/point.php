<div id="content">
  <section>
    <div class="section-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Admin'); ?>">home</a></li>
        <li class="active">Point</li>
      </ol>
    </div><!--end .section-header -->
    <div class="section-body contain-lg">
      <!-- BEGIN INTRO -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="text-primary">Point</h1>
        </div><!--end .col -->
        <div class="col-lg-8">
          <article class="margin-bottom-xxl">
            <p class="lead">
              Laman Penukaran Point.
            </p>
          </article>
        </div><!--end .col -->
      </div><!--end .row -->

      <div class="row text-center">
        <div class="col-lg-offset-5 col-lg-3 ">
          <div class="card">
            <div class="card-body style-info">

              <h3 >Point Anda saat ini</h3>
              <h1>
                <img src="<?php echo base_url('assets/img/point.png') ?>" alt="point" style="height:30px;"> <?php echo point_saya($this->session->userdata('id')) ?>
              </h1>
            </div>
          </div>
        </div><!--end .col -->
      </div><!--end .row -->
      <!-- END INTRO -->
      <br><br>
      <!-- BEGIN BASIC ELEMENTS -->
      <div class="row">
        <div class="col-lg-12">
          <h4>Hadiah Point</h4>
        </div><!--end .col -->
        <div class="col-lg-2 col-md-3">
          <article class="margin-bottom-xxl">
            <ul class="list-divided">
              <li>
                Pilih hadiah yang akan di tukarkan.
              </li>
            </ul>
          </article>
        </div><!--end .col -->
        <div class="col-lg-offset-1 col-md-9 col-sm-6">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table id="datatable3" class="table table-striped table-hover no-margin">
                  <thead>
                    <tr>
                      <th class="sort-numeric">No</th>
                      <th>Hadiah</th>
                      <th>Point</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach ($hadiah as $g): $no++;?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $g->hadiah ?></td>
                      <td><?php echo $g->point ?></td>
                      <td>
                        <button type="button" class="btn ink-reaction btn-raised btn-primary" onclick="tukar_hadiah(<?php echo $g->id_hadiah_point; ?>)" > Tukarkan</button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>

            </div>
          </div><!--end .card-body -->
        </div><!--end .card -->
      </div><!--end .col -->
    </div><!--end .row -->
    <!-- END BASIC ELEMENTS -->



    <!-- BEGIN BASIC ELEMENTS -->
    <div class="row">
      <div class="col-lg-12">
        <h4>Transaksi Tukar Point</h4>
      </div><!--end .col -->
      <div class="col-lg-2 col-md-3">
        <article class="margin-bottom-xxl">
          <ul class="list-divided">
            <li>
              Penukaran Point
            </li>
          </ul>
        </article>
      </div><!--end .col -->
      <div class="col-lg-offset-1 col-md-9 col-sm-6">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table id="datatable1" class="table table-striped table-hover no-margin">
                <thead>
                  <tr>
                    <th class="sort-numeric">No</th>
                    <th>Kode</th>
                    <th>Hadiah</th>
                    <th>Point Awal</th>
                    <th>Point Sisa</th>
                    <th>Status Transaksi</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=0; foreach ($tukar_point as $g): $no++;?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $g->kode ?></td>
                    <td><?php echo $g->hadiah ?> br (<?php echo $g->point_tukar ?>)</td>
                    <td><?php echo $g->point_awal ?></td>
                    <td><?php echo $g->point_sisa ?></td>
                    <td>
                      <?php if ($g->flag_status=='0'): ?>
                        Menunggu Persetujuan
                        <?php elseif ($g->flag_status=='1'): ?>
                          Penukaran Disetujui.
                          <?php elseif ($g->flag_status=='2'): ?>
                            Telah Diklaim
                            <?php else: ?>
                              Penukaran Dibatalkan
                            <?php endif; ?>
                          </td>
                          <td><?php echo $g->cdate ?></td>
                          <td>
                            <?php if ($g->flag_status=='0'): ?>
                              <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-danger" onclick="batal(<?php echo $g->id_tukar_point; ?>)"><i class="fa fa-close"></i></button>
                              <?php elseif ($g->flag_status=='1'): ?>
                                <a href="<?php echo base_url('User/tiket/'.$g->id_tukar_point) ?>" class="btn ink-reaction btn-raised btn-sm btn-info">Tiket <i class="fa fa-download"></i></a>
                                <?php else: ?>
                                <?php endif; ?>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>

                    </div>
                  </div><!--end .card-body -->
                </div><!--end .card -->
              </div><!--end .col -->
            </div><!--end .row -->
            <!-- END BASIC ELEMENTS -->

          </div><!--end .section-body -->
        </section>
      </div>


      <div id="viewcanvas"></div>

      <script type="text/javascript">

        $(function() {
          toastr.options.positionClass = 'toast-bottom-left';
          <?php if ($this->session->flashdata('alert')==true) {
            echo $this->session->flashdata('alert');
          } ?>
          <?php if ($this->session->flashdata('gagal_icon')==true) {
            echo $this->session->flashdata('gagal_icon');
          } ?>

          $('#datatable1').DataTable({
            "language": {
              "lengthMenu": '_MENU_ entries per page',
              "search": '<i class="fa fa-search"></i>',
              "paginate": {
                "previous": '<i class="fa fa-angle-left"></i>',
                "next": '<i class="fa fa-angle-right"></i>'
              }
            }
          });

          $('#datatable3').DataTable({
            "language": {
              "lengthMenu": '_MENU_ entries per page',
              "search": '<i class="fa fa-search"></i>',
              "paginate": {
                "previous": '<i class="fa fa-angle-left"></i>',
                "next": '<i class="fa fa-angle-right"></i>'
              }
            }
          });



        })


        function tukar_hadiah(id) {
          NewToastStyle();
          var message = 'Anda akan menukar dengan hadiah ini?. <button type="button" onclick="tukarAct('+id+',1)" class="btn btn-flat btn-primary toastr-action">YA</button>';
          toastr.info(message, '');
        }
        function batal(id) {
          NewToastStyle();
          var message = 'Anda akan membatalkan penukaran ini?. <button type="button" onclick="tukarAct('+id+',2)" class="btn btn-flat btn-primary toastr-action">YA</button>';
          toastr.info(message, '');
        }
        function tukarAct(id,str) {
          var data = new FormData();
          if (str=='1') {
            data.append('id', id);
            var url = "<?php echo base_url('User/tukar_hadiah/'); ?>";
          }else {
            data.append('id', id);
            var url = "<?php echo base_url('User/batal_tukar/'); ?>";
          }
          $.ajax(
          {
            type: "POST",
            url: url,
            data: data,
            processData: false,
            contentType: false,
            success: function(data)
            {
              if (data=='sukses')
              {

                toastr.clear();
                toastr.options.progressBar = false;
                toastr.options.timeOut = 2000;
                toastr.success('Berhasil', '');
                setTimeout(function () {
                  window.location.reload();
                }, 2000);
              }
              else if(data=='gagal')
              {
                toastr.clear();
                toastr.options.progressBar = false;
                toastr.options.timeOut = 2000;
                toastr.error('Gagal. Coba lagi.', '');
              }
              else if(data=='minus')
              {
                toastr.clear();
                toastr.options.progressBar = false;
                toastr.options.timeOut = 2000;
                toastr.error('Sisa point anda tidak cukup.', '');
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
