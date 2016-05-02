<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Daftar Tugas</h1>

  <?php if($this->session->userdata('group_level') == 8): ?>
  <div class="pull-right">
  	<a class="btn btn-success" href="<?php echo site_url('task/add') ?>">Tambah Tugas</a>
  </div>
  <?php endif; ?>
  <div class="clearfix"></div>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Tugas</th>
          <th>Projek</th>
          <th>Deskripsi Singkat</th>
          <th>Dibuat Tanggal</th>
          <th>Deadline</th>
          <th>Status Tugas</th>
          <?php if($this->session->userdata('group_level') == 8): ?>
          <th>Aksi</th>
          <?php endif; ?>
        </tr>
      </thead>
      <tbody>
      <?php echo $listtugas; ?>
      </tbody>
    </table>
  </div>
</div>