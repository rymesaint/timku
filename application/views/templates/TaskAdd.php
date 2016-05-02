<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Tugas Manajemen</h1>

  <div class="pull-left">
    <a class="btn btn-warning" href="<?php echo site_url('task') ?>">Kembali</a>
  </div>
  <div class="clearfix"></div>
  <form class="form-horizontal" method="POST">
	<fieldset>

	<!-- Form Name -->
	<legend>Tambah Tugas</legend>
	<?php echo validation_errors(); ?>
	<div class="form-group">
	  <label class="col-md-4 control-label" for="pilihprojek">Pilih Projek</label>  
	  <div class="col-md-4">
	  <select class="form-control" id="pilihprojek" name="pilihprojek" required>
	  	<?php echo $projects; ?>
	  </select>
	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="namatugas">Nama Tugas</label>  
	  <div class="col-md-4">
	  <input id="namatugas" name="namatugas" type="text" class="form-control input-md" required maxlength="50">
	  </div>
	</div>

	<!-- Textarea -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="deskripsi">Deskripsi Tugas</label>
	  <div class="col-md-4">                     
	     <textarea class="form-control" id="deskripsi" name="deskripsi" required placeholder="Isi deskripsi dari tugas."></textarea>
	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="deadline">Tanggal Deadline</label>
	  <div class="col-md-4">                     
	     <input id="deadline" name="deadline" type="date" class="form-control input-md" required>
	  </div>
	</div>

	<!-- Button -->
	<div class="form-group">
	  <div class="col-md-4">
	    <button type="submit" id="create" name="create" class="btn btn-info">Tambah Tugas</button>
	  </div>
	</div>

	</fieldset>
	</form>
</div>