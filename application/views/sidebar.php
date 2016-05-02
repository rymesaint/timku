<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
		<div class="col-sm-3 col-md-2 sidebar">
      <ul class="nav nav-sidebar">
        <li <?php if(current_url() == base_url()): echo 'class="active"';  endif;?>><a href="<?php echo base_url() ?>">Ikhtisar</a></li>
        <?php if($this->session->userdata('group_level') == 8): ?>
        <li <?php if(current_url() == site_url('team/assign')): echo 'class="active"';  endif;?>><a href="<?php echo site_url('team/assign') ?>">Pilih Penugasan Projek</a></li>
       	<?php endif; ?>
        <li <?php if(current_url() == site_url('members')): echo 'class="active"';  endif;?>><a href="<?php echo site_url('members') ?>">Daftar Anggota</a></li>
        <li <?php if(current_url() == site_url('task')): echo 'class="active"';  endif;?>><a href="<?php echo site_url('task') ?>"><?php echo ($this->session->userdata('group_level') == 8? "Buat Tugas" : "Lihat Tugas") ?></a></li>
      </ul>

      <ul class="nav nav-sidebar">
        <li><a href="<?php echo site_url('profile/'.$this->session->userdata('username')) ?>">Profil Saya</a></li>
        <li><a href="<?php echo site_url('logout') ?>">Keluar</a></li>
      </ul>
    </div>