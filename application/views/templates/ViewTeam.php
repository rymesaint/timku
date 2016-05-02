<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Tim <?php echo $nama_tim ?></h1>
  <div class="pull-left">
    <div class="meta">
      <?php echo (empty($deskripsi_tim)? "Tidak ada deskripsi tim." : $deskripsi_tim) ?>
    </div>
  </div>
  <?php if($this->session->userdata('group_level') == 8): ?>
  <div class="pull-right">
    <a class="btn btn-success" href="<?php echo site_url('team/edit/'.$id_tim) ?>">Ubah Tim</a>
  </div>
<?php endif; ?>
  <div class="clearfix"></div>
  <h2 class="deskripsi">Anggota Tim</h2>
  <table class="table table-horizontal">
    <tr>
      <th>#</th>
      <th>Nama Anggota</th>
      <th>E-mail</th>
    </tr>
    <?php echo $listtim ?>
  </table>
</div>