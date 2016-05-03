<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Profile <?php echo $username ?></h1>

  <?php if($this->session->userdata('username') == $username): ?>
  <div class="pull-right">
  	<a class="btn btn-success" href="<?php echo site_url('members/edit') ?>">Ubah Profil</a>
  </div>
  <?php endif; ?>
  <div class="clearfix"></div>
  <table class="table table-horizontal">
    <tr>
      <td>Nama</td>
      <td>: <?php echo (empty($namalegkap)? $username : $namalegkap) ?></td>
    </tr>
    <tr>
      <td>Kontak E-mail</td>
      <td>: <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></td>
    </tr>
    <tr>
      <td>Website Profil</td>
      <td>: <?php echo (empty($website)? "Belum ada website." : $website) ?></td>
    </tr>
    <tr>
      <td>Tanggal Bergabung</td>
      <td>: <?php echo $tgl_bergabung ?></td>
    </tr>
  </table>
</div>