<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logged_in')):
			redirect('login');
		endif;
		$this->load->model('Projek_model');
		$this->load->library('form_validation');
		$this->load->library('VerifyStatus');
	}

	public function create(){
		$data['page'] = 'CreateProject';

		$this->form_validation->set_error_delimiters('<div class="alert alert-warning">', '</div>');
		$this->form_validation->set_rules('namaprojek', 'Nama Projek', 'trim|required');
		$this->form_validation->set_rules('awalprojek', 'Tanggal Awal Projek', 'trim|required');
		$this->form_validation->set_rules('akhirprojek', 'Tanggal Akhir Projek', 'trim|required');
		if ($this->form_validation->run() == FALSE):
			$this->load->view('template', $data);
		else:
			$this->form_validation->set_message('namaprojek', '%s anda telah dibuat.');
			$insert['nama_projek'] = $this->input->post('namaprojek');
			$insert['deskripsi'] = $this->input->post('deskripsi');
			$insert['tgl_projek_mulai'] = $this->input->post('awalprojek');
			$insert['tgl_projek_selesai'] = $this->input->post('akhirprojek');
			$this->Projek_model->insertProjek($insert);
			$this->load->view('template', $data);
		endif;
	}

	public function edit($id){
		$data['page'] = 'EditProject';
		$row = $this->Projek_model->getSelectedProjek($id)->row();

		$data['idprojek'] = $row->id_projek;
		$data['nama_projek'] = $row->nama_projek;
		$data['deskripsi'] = $row->deskripsi;
		$data['tgl_deadline'] = $row->tgl_projek_selesai;

		$this->form_validation->set_error_delimiters('<div class="alert alert-warning">', '</div>');
		$this->form_validation->set_rules('namaprojek', 'Nama Tugas', 'trim|required');
		$this->form_validation->set_rules('akhirprojek', 'Tanggal Deadline', 'trim|required');

		if ($this->form_validation->run() == FALSE):
			$this->load->view('template', $data);
		else:
			$idprojek = $this->input->post('idprojek');

			$update['nama_projek'] = $this->input->post('namaprojek');
			$update['deskripsi'] = $this->input->post('deskripsi');
			$update['tgl_projek_selesai'] = $this->input->post('akhirprojek');

			$this->Projek_model->updateProjek($update, $idprojek);
			redirect(current_url());
		endif;
	}

	public function delete($id){
		$this->Projek_model->deleteProjek($id);
		redirect(base_url());
	}

	public function view($id){
		$data['page'] = 'ViewProject';

		$row = $this->Projek_model->getSelectedProjek($id)->row();
		if($row):
			$data['id_projek'] = $row->id_projek;
			$data['nama_projek'] = $row->nama_projek;
			$data['tgl_dibuat'] = $row->tgl_projek_mulai;
			$data['deskripsi'] = $row->deskripsi;
			$data['tgl_deadline'] = $row->tgl_projek_selesai;
			$data['status_pengerjaan'] = $row->status_pengerjaan;
		else:
			$this->load->view('template', '404');
		endif;

		$this->load->view('template', $data);
	}
}