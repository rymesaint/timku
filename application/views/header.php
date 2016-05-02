<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - TimKu Projek</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/dasbor.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  </head>

  <body>

  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">TimKu Projek</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li <?php if(current_url() == base_url()): echo 'class="active"';  endif;?>><a href="<?php echo base_url() ?>">Dashboard</a></li>
          <?php if($this->session->userdata('group_level') == 8): ?>
          <li <?php if(current_url() == site_url('project/create')): echo 'class="active"';  endif;?>><a href="<?php echo site_url('project/create') ?>">Buat Projek</a></li>
          <li <?php if(current_url() == site_url('team/create')): echo 'class="active"';  endif;?>><a href="<?php echo site_url('team/create') ?>">Buat Tim</a></li>
          <?php endif; ?>
          <li <?php if(current_url() == site_url('help')): echo 'class="active"';  endif;?>><a href="#">Bantuan</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
      <div class="row">