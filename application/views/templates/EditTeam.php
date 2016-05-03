<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Tim Manajemen</h1>
  <div class="pull-left">
    <a class="btn btn-warning" href="<?php echo site_url('team/view/'.$id_tim) ?>">Kembali</a>
  </div>
  <div class="clearfix"></div>
  <form class="form-horizontal" method="POST">
	<fieldset>

	<!-- Form Name -->
	<legend>Ubah Tim</legend>
	<?php echo validation_errors(); ?>
	<div class="form-group">
	  <label class="col-md-4 control-label" for="pilihleader">Pilih Tim Leader</label>  
	  <div class="col-md-4">
	  <input type="hidden" name="idprojek" value="<?php 	echo $id_projek ?>">
	  <input type="hidden" name="idpenugasan" value="<?php 	echo $id_penugasan ?>">
	  <input type="hidden" name="idtim" value="<?php 	echo $id_tim ?>">
	  <select class="form-control" id="pilihleader" name="pilihleader" required>
	  	<?php echo $anggota; ?>
	  </select>
	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="namatim">Nama Tim</label>  
	  <div class="col-md-4">
	  <input id="namatim" name="namatim" value="<?php echo $nama_tim ?>" type="text" class="form-control input-md" required maxlength="50">
	  </div>
	</div>

	<!-- Textarea -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="deskripsi">Deskripsi Tim</label>
	  <div class="col-md-4">                     
	     <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Isi deskripsi dari tim."><?php echo $deskripsi ?></textarea>
	  </div>
	</div>

	<!-- Button -->
	<div class="form-group">
	  <div class="col-md-4">
	    <button type="submit" id="edit" name="edit" class="btn btn-info">Ubah Tim</button>
	  </div>
	</div>

	</fieldset>
	</form>
</div>