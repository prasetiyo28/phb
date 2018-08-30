<div class="margin-bottom-xxl">
  <span class="text-light text-lg">Total Admin <strong><?php echo total_admin() ?></strong></span>
  <div class="btn-group btn-group-sm pull-right">
    <button type="button" class="btn btn-default-light dropdown-toggle" data-toggle="dropdown">
      <span class="glyphicon glyphicon-arrow-down"></span> Sortir
    </button>
    <ul class="dropdown-menu dropdown-menu-right animation-dock" role="menu">
      <li><a href="#" id="sort_nama">Nama</a></li>
      <li><a href="#" id="sort_wilayah">Wilayah</a></li>
      <li><a href="#" id="sort_email">Email</a></li>
      <li><a href="#" id="sort_login">Log In</a></li>
    </ul>
  </div>
</div><!--end .margin-bottom-xxl -->

<div id="list">

</div>


<!-- BEGIN SEARCH RESULTS LIST -->

<!-- BEGIN SEARCH RESULTS PAGING -->
<div class="text-center" id="test-list">

</div><!--end .text-center -->
<script src="<?php echo base_url();?>assets/plugin/paginationJs/jquery.twbsPagination.js"></script>
<script type="text/javascript">

$(function () {


  loadData(sort,find,find_value);
  $('#sort_nama').click(function() {
    $("#viewdata").hide();
    loadAdmin(2);
  });
  $('#sort_wilayah').click(function() {
    $("#viewdata").hide();
    loadAdmin(3);
  });
  $('#sort_email').click(function() {
    $("#viewdata").hide();
    loadAdmin(4);
  });
  $('#sort_login').click(function() {
    $("#viewdata").hide();
    loadAdmin(5);
  });

  $('#value_cari2').keyup(function() {
    $("#viewdata").hide();
    loadAdmin(1,1,$('#value_cari2').val());

  });
  $('#btn_add_admin').click(function() {
    //$('#modal_add_admin').modal('show');
  });

    });

  function loadData(sort,find,find_value) {
    //console.info(find+"/"+find_value+"/"+sort);
      $('.preload').show();
    window.pagObj = $('#test-list').twbsPagination({
        totalPages: "<?php echo total_page_admin() ?>",
        visiblePages: 5,
        first:'<i class="fa fa-angle-double-left"></i>',
        prev:'<i class="fa fa-angle-left"></i>',
        next:'<i class="fa fa-angle-right"></i>',
        last:'<i class="fa fa-angle-double-right"></i>',
        onPageClick: function (event, page) {
            //console.info(page + ' (from options)');
            var id = page ;
            if (id==1) {
              id = null;
            }

            $.ajax(
              {
                type: "GET",
                url: "<?php echo base_url('Xyz/admin_data'); ?>/"+find+"/"+find_value+"/"+sort+"/"+id,
              }
            ).done(function( data )
            {
              $('#list').html(data);
                $('.preload').hide();
            });
        }
    }).on('page', function (event, page) {

    });
  }

</script>
