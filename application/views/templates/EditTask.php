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
	<legend>Ubah Tugas</legend>
	<?php echo validation_errors(); ?>
	<div class="form-group">
	  <label class="col-md-4 control-label" for="pilihprojek">Pilih Projek</label>  
	  <div class="col-md-4">
	  <input type="hidden" name="idtugas" value="<?php 	echo $id_tugas ?>">
	  <select class="form-control" id="pilihprojek" name="pilihprojek" required>
	  	<?php echo $projects; ?>
	  </select>
	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="namatugas">Nama Tugas</label>  
	  <div class="col-md-4">
	  <input id="namatugas" name="namatugas" value="<?php echo $nama_tugas ?>" type="text" class="form-control input-md" required maxlength="50">
	  </div>
	</div>

	<!-- Textarea -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="deskripsi">Deskripsi Tugas</label>
	  <div class="col-md-4">                     
	     <textarea class="form-control" id="deskripsi" name="deskripsi" required placeholder="Isi deskripsi dari tugas."><?php echo $deskripsi ?></textarea>
	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="deadline">Tanggal Deadline</label>
	  <div class="col-md-4">                     
	     <input id="deadline" name="deadline" type="date" class="form-control input-md" value="<?php echo date("Y-m-d", strtotime($tgl_deadline)) ?>" required>
	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="statustugas">Status Tugas</label>
	  <div class="col-md-4">
	  	<select id="statustugas" class="form-control" name="statustugas" required>
	  			<option <?php 	echo ($status == 1? "selected" : "") ?> value="1">Selesai</option>
	  			<option <?php 	echo ($status == 0? "selected" : "") ?> value="0">Belum Selesai</option>
	  	</select>                     
	  </div>
	</div>

	<!-- Button -->
	<div class="form-group">
	  <div class="col-md-4">
	    <button type="submit" id="edit" name="edit" class="btn btn-info">Ubah Tugas</button>
	  </div>
	</div>

	</fieldset>
	</form>
</div>