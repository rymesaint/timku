<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logged_in')):
			redirect('login');
		endif;
		
		// $this->load->model('Projek_model');
		$this->load->model('Anggota_model');
	}

	public function showAnggota(){
		if(!$this->input->is_ajax_request()):
			die("Cannot request with this method.");
		endif;

		$idtim = $this->input->post('idtim');

		$getAnggota = $this->Anggota_model->getAnggotaTim($idtim)->result();
		$data = '';
		if($getAnggota):
			$data .= '<select name="timleader" id="idleader" class="form-control">';
			foreach ($getAnggota as $anggota):
				$data .= '<option value="'.$anggota->id_anggota.'">'.$anggota->nama_anggota.'</option>';
			endforeach;
			$data .= '</select>';
		endif;

		echo $data;
	}
}