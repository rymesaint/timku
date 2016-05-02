<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Ikhtisar</h1>

  <h2 class="sub-header">Projek Saya</h2>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Projek</th>
          <th>Nama Tim</th>
          <th>Tim Leader</th>
          <th>Tanggal Mulai</th>
          <th>Status Pengerjaan</th>
        </tr>
      </thead>
      <tbody>
      <?php echo $penugasan; ?>
        <!-- <tr>
          <td>1</td>
          <td><a href="#" data-toggle="tooltip" title="Lihat Projek">Pembuatan Website MSP</a></td>
          <td><a href="#" data-toggle="tooltip" title="Kontak Tim Leader">Muhamad Ridwan Fauzan</a></td>
          <td>13 April 2016 07:00 AM</td>
          <td>15 hari</td>
          <td><progress value="10" max="100" title="In Progress 10%"></td>
        </tr> -->
      </tbody>
    </table>
  </div>

</div>