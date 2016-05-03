<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logged_in')):
			redirect('login');
		endif;
		$this->load->model('Tim_model');
		$this->load->model('Anggota_model');
		$this->load->model('Projek_model');
		$this->load->model('Penugasan_model');
		$this->load->library('form_validation');
	}

	public function create(){
		$data['page'] = 'CreateTeam';
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning">', '</div>');
		$this->form_validation->set_rules('namatim', 'Nama Tim', 'trim|min_length[3]|max_length[10]|required|alpha_numeric_spaces|callback_tim_check');
		if ($this->form_validation->run() == FALSE):
			$this->load->view('template', $data);
		else:
			$this->form_validation->set_message('namatim', '%s anda telah dibuat.');
			$insert['nama_tim'] = $this->input->post('namatim');
			$insert['deskripsi_tim'] = $this->input->post('deskripsi');
			$insert['tgl_dibuat'] = date('Y-m-d H:i:s');
			$insert['tgl_dirubah'] = date('Y-m-d H:i:s');
			$this->Tim_model->insertTim($insert);
			$this->load->view('template', $data);
		endif;
	}

	public function edit($id){
		$data['page'] = 'EditTeam';

		$team = $this->Anggota_model->getAnggotaTim($id)->result();
		$project = $this->Penugasan_model->getPenugasan($id)->row();
		$tim = $this->Tim_model->getSelectedTim($id)->row();
		
		$data['id_projek'] = $project->id_projek;
		$data['id_tim'] = $tim->id_tim;
		$data['id_penugasan'] = $project->id_penugasan;
		$data['nama_tim'] = $tim->nama_tim;
		$data['deskripsi'] = $tim->deskripsi_tim;
		$data['anggota'] = null;
		foreach ($team as $anggota):
			if($project->id_anggota == $anggota->id_anggota):
				$data['anggota'] .= '<option selected value="'.$anggota->id_anggota.'">'.$anggota->nama_anggota.'</option>';
			else:
				$data['anggota'] .= '<option value="'.$anggota->id_anggota.'">'.$anggota->nama_anggota.'</option>';
			endif;
		endforeach;


		$this->form_validation->set_error_delimiters('<div class="alert alert-warning">', '</div>');
		$this->form_validation->set_rules('namatim', 'Nama Tim', 'trim|required');

		if ($this->form_validation->run() == FALSE):
			$this->load->view('template', $data);
		else:
			$penugasan['id_anggota'] = $this->input->post('pilihleader');
			$id_penugasan = $this->input->post('idpenugasan');
			$this->Penugasan_model->updatePenugasan($penugasan, $id_penugasan);

			$teams['nama_tim'] = $this->input->post('namatim');
			$teams['deskripsi_tim'] = $this->input->post('deskripsi');
			$teams['tgl_dirubah'] = date('Y-m-d H:i:s');
			$id_tim = $this->input->post('idtim');

			$this->Tim_model->updateTim($teams, $id_tim);
			redirect(current_url());
		endif;
	}

	public function tim_check($str){
		$rows = $this->Tim_model->getSelectedTim($str)->num_rows();
		if($rows >= 1):			
			$this->form_validation->set_message('tim_check', '%s telah ditemukan di database kami.');
			return false;
		else:
			return true;
		endif;
	}

	public function assign(){
		$data['page'] = 'AssignTeam';

		$teams = $this->Tim_model->selectAllTim()->result();
		$data['namatim'] = '';
		foreach ($teams as $value):
			$data['namatim'] .= '<option value="'.$value->id_tim.'">'.$value->nama_tim.'</option>';
		endforeach;

		$projects = $this->Projek_model->selectAllProjek()->result();
		$data['namaprojek'] = '';
		foreach ($projects as $p):
			$data['namaprojek'] .= '<option value="'.$p->id_projek.'">'.$p->nama_projek.'</option>';
		endforeach;

		$this->form_validation->set_error_delimiters('<div class="alert alert-warning">', '</div>');
		$this->form_validation->set_rules('namaprojek', 'Nama Projek', 'trim|required|callback_cek_penugasan');

		if ($this->form_validation->run() == FALSE):
			$this->load->view('template', $data);
		else:
			$assign['id_team'] = $this->input->post('namatim');
			$assign['id_anggota'] = $this->input->post('timleader');
			$assign['id_projek'] = $this->input->post('namaprojek');
			$assign['tgl_dibuat'] = date('Y-m-d H:i:s');
			$assign['tgl_diubah'] = date('Y-m-d H:i:s');
			$this->Penugasan_model->insertPenugasan($assign);
			$this->load->view('template', $data);
		endif;
	}

	public function cek_penugasan($projek){
		$row = $this->Penugasan_model->getPenugasan($projek)->num_rows();
		if($row >= 1 ):
			$this->form_validation->set_message('cek_penugasan', 'Maaf projek %s ini telah diambil oleh tim lain.');
			return false;
		else:
			return true;
		endif;
	}

	public function view($id){
		$data['page'] = 'ViewTeam';

		$row = $this->Tim_model->getSelectedTim($id)->row();
		if($row):
			$data['id_tim'] = $row->id_tim;
			$data['nama_tim'] = $row->nama_tim;
			$data['deskripsi_tim'] = $row->deskripsi_tim;

			$idteam = 'tk_anggota.id_tim = '.$row->id_tim;
			$res = $this->Tim_model->joinTimAnggota($idteam)->result();
			$data['listtim'] = null;
			if($res):
				foreach ($res as $r):
					$data['listtim'] .= '<tr><td>'.$r->id_anggota.'</td>
				<td>'.$r->nama_anggota.'</td><td>'.$r->email.'</td></tr>';
				endforeach;
			endif;
		else:
			$this->load->view('template', '404');
		endif;

		$this->load->view('template', $data);
	}
}