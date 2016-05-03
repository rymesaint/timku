<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Tugas <?php echo $nama_tugas ?></h1>
  <div class="pull-left">
    <div class="meta">
      Tugas dibuat pada  <?php echo date("d-m-Y H:i A", strtotime($tgl_dibuat)) ?>
    </div>
  </div>
  <?php if($this->session->userdata('group_level') == 8): ?>
  <div class="pull-right">
    <a class="btn btn-success" href="<?php echo site_url('task/edit/'.$id_tugas) ?>">Ubah Tugas</a>
  </div>
  <?php endif; ?>
  <div class="clearfix"></div>
  <h2 class="deskripsi">Deskripsi Tugas</h2>
  <article>
    <p><?php echo $deskripsi; ?></p>
    <table class="table">
      <tr>
        <td>Durasi</td>
        <td>: <?php if($this->verifystatus->dateDiff('d', date('Y-m-d H:i:s'), $tgl_deadline) <= 0): ?>
          Waktu sudah melebihi waktu masa deadline.
        <?php else: ?>
          <?php echo $this->verifystatus->dateDiff('d', date('Y-m-d H:i:s'), $tgl_deadline) ?> hari/<?php echo $this->verifystatus->dateDiff('h', date('Y-m-d H:i:s'), $tgl_deadline) ?> jam.</td>
        <?php endif; ?>
        </td>
      </tr>
      <tr>
        <td>Tanggal Deadline</td>
        <td>: <?php echo date("d-m-Y H:i A", strtotime($tgl_deadline)) ?></td>
      </tr>
    </table>
  </article>
</div>