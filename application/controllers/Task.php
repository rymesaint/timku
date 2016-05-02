<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logged_in')):
			redirect('login');
		endif;
		
		$this->load->model('Tugas_model');
		$this->load->model('Projek_model');
		$this->load->helper('text');
		$this->load->library('form_validation');
		$this->load->library('verifystatus');

	}

	public function index(){
		$data['page'] = 'TaskView';

		$task = $this->Tugas_model->selectTugasJoinTim()->result();
		$data['listtugas'] = '';
		foreach ($task as $t):
			$data['listtugas'] .= '<tr>
          <td>'.$t->id_tugas.'</td>
          <td><a href="'.site_url('task/view/'.$t->id_tugas).'">'.$t->nama_tugas.'</a></td>
          <td><a href="'.site_url('project/view/'.$t->id_projek).'">'.$t->nama_projek.'</td>
          <td>'.character_limiter($t->deskripsi, 50, '...').'</td>
          <td>'.$t->tgl_dibuat.'</td>
          <td>'.$t->tgl_deadline.'</td>
          <td>'.$this->verifystatus->TaskStatus($t->status_pengerjaan).'</td>';
          if($this->session->userdata('group_level') == 8):
        	  $data['listtugas'] .= '<td><a href="'.site_url('task/edit/'.$t->id_tugas).'">Ubah</a> | <a href="'.site_url('task/delete/'.$t->id_tugas).'">Hapus</a></td>';
          endif;
        $data['listtugas'] .= '</tr>';
		endforeach;

		$this->load->view('template', $data);
	}

	public function add(){
		$data['page'] = 'TaskAdd';

		$projectlist = $this->Projek_model->selectAllProjek()->result();
		$data['projects'] = '';
		foreach ($projectlist as $pl):
			$data['projects'] .= '<option value="'.$pl->id_projek.'">'.$pl->nama_projek.'</option>';
		endforeach;

		$this->form_validation->set_error_delimiters('<div class="alert alert-warning">', '</div>');
		$this->form_validation->set_rules('pilihprojek', 'Projek harus dipilih.', 'trim|required');
		$this->form_validation->set_rules('namatugas', 'Nama Tugas', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Tugas', 'trim|required');
		$this->form_validation->set_rules('deadline', 'Tanggal Deadline', 'trim|required');

		if ($this->form_validation->run() == FALSE):
			$this->load->view('template', $data);
		else:
			$task['id_projek'] = $this->input->post('pilihprojek');
			$task['nama_tugas'] = $this->input->post('namatugas');
			$task['deskripsi'] = $this->input->post('deskripsi');
			$task['tgl_deadline'] = $this->input->post('deadline');
			$task['tgl_dibuat'] = date('Y-m-d H:i:s');
			$task['tgl_diubah'] = date('Y-m-d H:i:s');

			$this->Tugas_model->insertTugas($task);
			redirect(current_url());
		endif;
	}

	public function view($id){
		$data['page'] = 'ViewTask';

		$id = 'id_tugas = '.$id;
		$row = $this->Tugas_model->selectTugasJoinTim($id)->row();

		if($row):
			$data['id_tugas'] = $row->id_tugas;
			$data['nama_projek'] = $row->nama_projek;
			$data['nama_tugas'] = $row->nama_tugas;
			$data['tgl_dibuat'] = $row->tgl_dibuat;
			$data['deskripsi'] = $row->deskripsi;
			$data['tgl_deadline'] = $row->tgl_deadline;
			$data['status_pengerjaan'] = $row->status_pengerjaan;
		else:
			$this->load->view('template', '404');
		endif;

		$this->load->view('template', $data);
	}

	public function edit($id){
		$data['page'] = 'EditTask';

		$id = 'id_tugas = '.$id;
		$row = $this->Tugas_model->selectTugasJoinTim($id)->row();


		$projectlist = $this->Projek_model->selectAllProjek()->result();
		$data['projects'] = '';
		foreach ($projectlist as $pl):
			if($row->id_projek == $pl->id_projek):
				$data['projects'] .= '<option selected value="'.$pl->id_projek.'">'.$pl->nama_projek.'</option>';
			else:
				$data['projects'] .= '<option value="'.$pl->id_projek.'">'.$pl->nama_projek.'</option>';
			endif;
		endforeach;

		if($row):
			$data['id_tugas'] = $row->id_tugas;
			$data['nama_projek'] = $row->nama_projek;
			$data['nama_tugas'] = $row->nama_tugas;
			$data['tgl_dibuat'] = $row->tgl_dibuat;
			$data['deskripsi'] = $row->deskripsi;
			$data['tgl_deadline'] = $row->tgl_deadline;
			$data['status_pengerjaan'] = $row->status_pengerjaan;
		else:
			$this->load->view('template', '404');
		endif;

		$this->load->view('template', $data);
	}

}