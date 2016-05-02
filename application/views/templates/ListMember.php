<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Daftar Anggota Tim</h1>

  <?php if($this->session->userdata('group_level') == 8): ?>
  <div class="pull-right">
  	<a class="btn btn-success" href="<?php echo site_url('members/add') ?>">Tambah Anggota</a>
  </div>
  <?php endif; ?>
  <div class="clearfix"></div>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Anggota</th>
          <th>Nama Tim</th>
          <th>Tanggal Terdaftar</th>
          <th>Diubah Tanggal</th>
          <th>Status Keanggotaan</th>
        </tr>
      </thead>
      <tbody>
        <?php echo $listanggota; ?>
      </tbody>
    </table>
  </div>
</div>