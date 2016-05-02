<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Projek Manajemen</h1>

  <form class="form-horizontal" method="POST">
	<fieldset>

	<!-- Form Name -->
	<legend>Buat Projek</legend>

	<?php echo validation_errors(); ?>
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="namaprojek">Nama Projek</label>  
	  <div class="col-md-4">
	  <input id="namaprojek" name="namaprojek" type="text" placeholder="Nama Projek" class="form-control input-md" required>
	  </div>
	</div>

	<!-- Textarea -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="deskripsi">Deskripsi</label>
	  <div class="col-md-4">                     
	    <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukan deskripsi tentang projek ini."></textarea>
	  </div>
	</div>

	<div class="form-group">
	  	<label class="col-md-4 control-label" for="awalprojek">Awal Projek Mulai</label>
		<div class="col-md-4">                     
			<input type="datetime-local" class="form-control" id="awalprojek" name="awalprojek">
		</div>
	</div>

	<div class="form-group">
	  	<label class="col-md-4 control-label" for="akhirprojek">Akhir Projek</label>
		<div class="col-md-4">                     
			<input type="datetime-local" class="form-control" id="akhirprojek" name="akhirprojek">
		</div>
	</div>


	<!-- Button -->
	<div class="form-group">
	  <div class="col-md-4">
	    <button id="create" name="create" class="btn btn-info">Buat Projek</button>
	  </div>
	</div>

	</fieldset>
	</form>
</div>