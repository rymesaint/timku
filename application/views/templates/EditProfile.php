<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Anggota Manajemen</h1>

  <form class="form-horizontal" method="POST">
	<fieldset>

	<!-- Form Name -->
	<legend>Ubah Profil</legend>
	<?php echo validation_errors(); ?>
	<div class="form-group">
	  <label class="col-md-4 control-label" for="namalengkap">Nama Lengkap Anggota</label>  
	  <div class="col-md-4">
	  <input id="namalengkap" name="namalengkap" type="text" placeholder="(Optional)" value="<?php echo $namalengkap ?>" class="form-control input-md">
	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="email">E-mail</label>
	  <div class="col-md-4">                     
	     <input id="email" name="email" type="email" placeholder="Harus diisi" value="<?php echo $email ?>" class="form-control input-md" required>
	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="website">Website</label>  
	  <div class="col-md-4">
	  <input id="website" name="website" type="url" placeholder="(Optional)" value="<?php echo $website ?>" class="form-control input-md">
	  </div>
	</div>

	<!-- Button -->
	<div class="form-group">
	  <div class="col-md-4">
	    <button type="submit" id="edit" name="edit" class="btn btn-info">Ubah Profil</button>
	  </div>
	</div>

	</fieldset>
	</form>
</div>