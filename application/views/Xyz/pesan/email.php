<div id="content" style="background:#fff;">
  <section class="has-actions style-default-bright">

					<!-- BEGIN INBOX -->
					<div class="section-body">
						<div class="row">

							<div class="col-sm-12 col-md-12 col-lg-12">
								<div class="text-divider visible-xs"><span>Email list</span></div>
								<div class="row">

									<!-- BEGIN INBOX EMAIL LIST -->
									<div class="container" id="divTabel">
										<div class="list-group list-email list-gray">
                      <table id="datatable1" class="table">
                        <thead>
                          <th>
                            Pesan Email Keluar
                          </th>
                        </thead>
    										<tbody>
                          <?php foreach ($email as $e): ?>
    											<tr>
    												<td style="padding:0px;">
                              <a href="javascript:void(0)" onclick="readEmail(<?php echo $e->id_email ?>)" class="list-group-item">
        												<!-- <div class="stick-top-left small-padding"><i class="fa fa-dot-circle-o text-info"></i></div> -->
        												<h5>
        												  <?php echo email_to($e->id_email); ?>
        												</h5>
        												<h4><?php echo $e->subjek ?></h4>
        												<div class="stick-top-right small-padding text-default-light text-sm">Jul 12</div>
        												<p class="hidden-xs hidden-sm"><?php echo substr($e->isi,0,50) ?>...</p>
        												<div class="stick-bottom-right small-padding"><?php if (!empty($e->file)): ?>
        												  <span class="glyphicon glyphicon-paperclip"></span>
        												<?php endif; ?></div>
        											</a>
                            </td>
    											</tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
										</div><!--end .list-group -->
									</div><!--end .col -->
									<!-- END INBOX EMAIL LIST -->

									<!-- BEGIN EMAIL CONTENT -->
									<div id="readEmail">

									</div>
									<!-- END EMAIL CONTENT -->

								</div><!--end .row -->
							</div><!--end .col -->
						</div><!--end .row -->
					</div><!--end .section-body -->
					<!-- END INBOX -->

					<!-- BEGIN SECTION ACTION -->
					<div class="section-action style-primary">
						<div class="section-floating-action-row">
							<a class="btn ink-reaction btn-floating-action btn-lg btn-accent" href="<?php echo base_url('Xyz/buat_email'); ?>" data-toggle="tooltip" data-placement="top" data-original-title="Compose">
								<i class="md md-add"></i>
							</a>
						</div>
					</div><!--end .section-action -->
					<!-- END SECTION ACTION -->

				</section>
</div>

<div id="viewcanvas"></div>

<script type="text/javascript">
$(document).ready(function() {
    $('#datatable1').DataTable( {
         "button": false,
         "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]]

    } );
    toastr.options.positionClass = 'toast-bottom-left';
    <?php if ($this->session->flashdata('alert')==true) {
      echo $this->session->flashdata('alert');
    } ?>

  });

function readEmail(id) {
  $.ajax(
    {
      type: "GET",
      url: "<?php echo base_url('Xyz/readEmail/'); ?>"+id
    }
  ).done(function( data )
  {
    $('#readEmail').html(data);
    $("#divTabel").removeClass('container');
    $("#divTabel").addClass('col-md-4 col-lg-4 height-6 scroll-sm');
    $("#readEmail").show('slow');

  });
}
function deleteEmail() {
  toastr.clear();

  			toastr.options.closeButton = false;
  			toastr.options.progressBar = true;
  			toastr.options.debug = false;
  			toastr.options.positionClass = 'toast-top-right';
  			toastr.options.showDuration = 333;
  			toastr.options.hideDuration = 333;
  			toastr.options.timeOut = 5000;
  			toastr.options.extendedTimeOut = 1000;
  			toastr.options.showEasing = 'swing';
  			toastr.options.hideEasing = 'swing';
  			toastr.options.showMethod = 'slideDown';
  			toastr.options.hideMethod = 'slideUp';

  			var message = 'Anda akan menghapus ini?. <button type="button" onclick="deleteAct()" class="btn btn-flat btn-primary toastr-action">YA</button>';
  			toastr.info(message, '');
}
function deleteAct() {
  var data = new FormData();
  data.append('id_email', $("#id_email").val());
  $.ajax(
    {
      type: "POST",
      url: "<?php echo base_url('Xyz/deleteEmail/'); ?>",
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
            toastr.success('Berhasil menghapus pesan email', '');
            setTimeout(function () {
              window.location.reload();
            }, 2000);
          }
          else if(data=='gagal')
          {
            toastr.clear();
            toastr.options.progressBar = false;
            toastr.options.timeOut = 2000;
            toastr.error('Gagal menghapus pesan email. Coba lagi.', '');
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
function closeEmail() {
  $("#readEmail").hide();
  $("#divTabel").removeClass('col-md-4 col-lg-4 height-6 scroll-sm');
  $("#divTabel").addClass('container');
}
</script>
