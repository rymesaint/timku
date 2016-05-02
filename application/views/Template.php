<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view('header');
$this->load->view('sidebar');
$this->load->view('templates/'.$page);
$this->load->view('footer');