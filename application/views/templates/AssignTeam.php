<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Tim Manajemen</h1>

  <form class="form-horizontal" method="POST">
	<fieldset>

	<!-- Form Name -->
	<legend>Pilih Projek Untuk Team</legend>
	<?php echo validation_errors(); ?>
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="namatim">Nama Tim</label>  
	  <div class="col-md-4">
	  <select id="namatim" name="namatim" class="form-control input-md" required>
	  <?php echo $namatim; ?>
	  </select>
	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="idleader">Pilih Leader</label>  
	  <div class="col-md-4">
	  		<div id="anggota"></div>
	  </div>
	</div>
	
	<div class="form-group">
	  <label class="col-md-4 control-label" for="namatim">Nama Projek</label>  
	  <div class="col-md-4">
	  <select id="namaprojek" name="namaprojek" class="form-control input-md" required>
	  <?php echo $namaprojek; ?>
	  </select>
	  </div>
	</div>
	
	<!-- Button -->
	<div class="form-group">
	  <div class="col-md-4">
	    <button type="submit" id="create" name="create" class="btn btn-info">Pilih Tim Untuk Projek Ini</button>
	  </div>
	</div>

	</fieldset>
	</form>
</div>

<script>
	$(function(){
		$("#namatim").change(function (e) {
			e.preventDefault();
			var idtim = $(this).val(),
				dat = "idtim="+idtim;
	        $.ajax({
	            method: 'POST',
	            url: '<?php echo base_url() ?>ajax/showAnggota',
	            data: dat,
	            success:function(data){
	            	$("#anggota").html(data);
	            },
	            error:function(data){
	            	$("#anggota").html("Failed to request data.");
	            }
	        });
	    });
	});
</script>