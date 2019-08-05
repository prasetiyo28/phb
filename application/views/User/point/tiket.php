<!-- BEGIN CONTENT-->
<div id="content">
  <section>
    <div class="section-header">
      <ol class="breadcrumb">
        <li class="active">Invoice</li>
      </ol>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-printable style-default-light">
            <div class="card-head">
              <div class="tools">
                <div class="btn-group">
                  <a class="btn btn-floating-action btn-primary" href="javascript:void(0);" onclick="cetak();"><i class="md md-print"></i></a>
                </div>
              </div>
            </div><!--end .card-head -->
            <div id="cetak" class="card-body style-default-bright">

              <!-- BEGIN INVOICE HEADER -->
              <div class="row">
                <div class="col-xs-8">
                  <h1 class="text-light">Aplikasi <strong class="text-accent-dark">Pemetaan Hasil Bumi</strong></h1>
                </div>
                <div class="col-xs-4 text-right">
                  <h1 class="text-light text-default-light">Invoice</h1>
                </div>
              </div><!--end .row -->
              <!-- END INVOICE HEADER -->

              <br/>

              <!-- BEGIN INVOICE DESCRIPTION -->
              <div class="row">
                <div class="col-xs-4">
                  <h4 class="text-light">Dari</h4>
                  <address>
                    <strong>Admin Dinas <?php echo bidang($admin->bidang) ?> wilayah <?php echo tampil_kab($admin->id_kab) ?>.</strong><br>
                    (<?php echo $admin->nama ?>)<br>
                    <abbr title="Phone">P:</abbr> <?php echo $admin->telp ?>
                  </address>
                </div><!--end .col -->
                <div class="col-xs-4">
                  <h4 class="text-light">Kepada</h4>
                  <address>
                    <strong>Bapak/Ibu <?php echo $user->nama ?></strong><br>
                    <?php echo $user->nik ?><br>
                    <abbr title="Phone">P:</abbr>  <?php echo $user->telp ?>
                  </address>
                </div><!--end .col -->
                <div class="col-xs-4">
                  <div class="well">
                    <div class="clearfix">
                      <div class="pull-left"> INVOICE NO : </div>
                      <div class="pull-right"> <?php echo $tiket->kode ?> </div>
                    </div>
                    <div class="clearfix">
                      <div class="pull-left"> INVOICE DATE : </div>
                      <div class="pull-right"> <?php echo $tiket->cdate ?> </div>
                    </div>
                  </div>
                </div><!--end .col -->
              </div><!--end .row -->
              <!-- END INVOICE DESCRIPTION -->

              <br/>

              <!-- BEGIN INVOICE PRODUCTS -->
              <div class="row">
                <div class="col-md-12">
                  <table class="table">
                    <thead>
                      <tr>
                        <th style="width:60px" class="text-center">QTY</th>
                        <th class="text-left">HADIAH</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-center">1</td>
                        <td><?php echo $tiket->hadiah ?></td>
                      </tr>
                      <tr>
                        <td colspan="2" rowspan="4">
                          <h3 class="text-light opacity-50">Invoice notes</h3>
                          <p><small>Tiket ini merupakan bukti yang sah untuk mengambil klaim hadiah yang di tukarkan.</small></p>
                          <p><strong><em>Admin Pemetaan Hasil Bumi.</em></strong></p>
                        </td>

                      </tr>

                    </tbody>
                  </table>
                </div><!--end .col -->
              </div><!--end .row -->
              <!-- END INVOICE PRODUCTS -->

            </div><!--end .card-body -->
          </div><!--end .card -->
        </div><!--end .col -->
      </div><!--end .row -->
    </div><!--end .section-body -->
  </section>
</div><!--end #content-->
<!-- END CONTENT -->


<div id="viewcanvas"></div>

<script type="text/javascript">
function cetak() {
  var printContents = document.getElementById('cetak').innerHTML;
  var originalContents = document.body.innerHTML;
  document.body.innerHTML = printContents;

  window.print();

  document.body.innerHTML = originalContents;

}
</script>
