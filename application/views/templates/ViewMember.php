<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Ubah Profil <?php echo $anggota->username ?></h1>

  <div class="pull-left">
    <a class="btn btn-warning" href="<?php echo site_url('members') ?>">Kembali</a>
  </div>
  <div class="clearfix"></div>
  <form class="form-horizontal" method="POST">
  <fieldset>

  <!-- Form Name -->

  <legend>Ubah Profil</legend>
  <?php echo validation_errors(); ?>
  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="username">Username</label>  
    <div class="col-md-4">
    <input id="username" name="username" type="text" value="<?php echo $anggota->username ?>" class="form-control input-md" required readonly>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="displayname">Nama Anggota</label>  
    <div class="col-md-4">
    <input id="displayname" name="namalengkap" type="text" value="<?php echo $anggota->nama_anggota ?>" placeholder="(Optional)" class="form-control input-md">
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="pilihtim">Pilih Tim</label>  
    <div class="col-md-4">
    <select name="pilihtim" class="form-control input-md" id="pilihtim">
    <?php echo $listtim; ?>
    </select>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="website">Website</label>  
    <div class="col-md-4">
    <input id="website" name="website" type="text" value="<?php echo $anggota->website_profil ?>" placeholder="(Optional)" class="form-control input-md">
    </div>
  </div>

  <!-- Button -->
  <div class="form-group">
    <div class="col-md-4">
      <button id="edit" name="edit" class="btn btn-info">Ubah Profil</button>
    </div>
  </div>

  </fieldset>
  </form>
</div>