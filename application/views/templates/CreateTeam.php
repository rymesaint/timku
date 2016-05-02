<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Tim Manajemen</h1>

  <form class="form-horizontal" method="POST">
	<fieldset>

	<!-- Form Name -->
	<legend>Buat Tim</legend>
	<?php echo validation_errors(); ?>
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="namatim">Nama Tim</label>  
	  <div class="col-md-4">
	  <input id="namatim" name="namatim" type="text" placeholder="Nama Tim" class="form-control input-md" required>
	    
	  </div>
	</div>

	<!-- Textarea -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="deskripsi">Deskripsi</label>
	  <div class="col-md-4">                     
	    <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukan deskripsi tentang tim ini."></textarea>
	  </div>
	</div>

	<!-- File Button --> 
	<div class="form-group">
	  <label class="col-md-4 control-label" for="filebutton">Logo Tim</label>
	  <div class="col-md-4">
	    <input id="logofile" name="logofile" class="input-file" type="file">
	  </div>
	</div>

	<!-- Button -->
	<div class="form-group">
	  <div class="col-md-4">
	    <button type="submit" id="create" name="create" class="btn btn-info">Buat Tim</button>
	  </div>
	</div>

	</fieldset>
	</form>
</div>