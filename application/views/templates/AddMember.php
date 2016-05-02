<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Anggota Manajemen</h1>

  <form class="form-horizontal" method="POST">
	<fieldset>

	<!-- Form Name -->
	<legend>Tambah Anggota</legend>
	<?php echo validation_errors(); ?>
	<div class="form-group">
	  <label class="col-md-4 control-label" for="username">Username</label>  
	  <div class="col-md-4">
	  <input id="username" name="username" type="text" placeholder="Harus diisi" minlength="5" maxlength="16" class="form-control input-md" required>
	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="namalengkap">Nama Lengkap Anggota</label>  
	  <div class="col-md-4">
	  <input id="namalengkap" name="namalengkap" type="text" placeholder="(Optional)" class="form-control input-md">
	  </div>
	</div>

	<!-- Textarea -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="email">E-mail</label>
	  <div class="col-md-4">                     
	     <input id="email" name="email" type="email" placeholder="Harus diisi" class="form-control input-md" required>
	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="katasandi">Set Password</label>
	  <div class="col-md-4">                     
	     <input id="katasandi" name="sandi" type="password" placeholder="Harus diisi" class="form-control input-md" required>
	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="katasandi2">Ketik Ulang Password</label>
	  <div class="col-md-4">                     
	     <input id="katasandi2" name="sandi2" type="password" placeholder="Harus diisi" class="form-control input-md" required>
	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="namatim">Nama Tim</label>  
	  <div class="col-md-4">
	  <select id="namatim" name="namatim" class="form-control input-md" required>
	  <?php echo $namatim; ?>
	  </select>
	  </div>
	</div>

	<!-- Button -->
	<div class="form-group">
	  <div class="col-md-4">
	    <button type="submit" id="create" name="create" class="btn btn-info">Tambah Anggota</button>
	  </div>
	</div>

	</fieldset>
	</form>
</div>