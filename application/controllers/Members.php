<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logged_in')):
			redirect('login');
		endif;
		$this->load->model('Tim_model');
		$this->load->model('Anggota_model');
		$this->load->library('form_validation');
		$this->load->library('VerifyStatus');
	}

	public function index(){
		$data['page'] = 'ListMember';
		
		$condition = 'tk_anggota.id_tim = '.$this->session->userdata('team_id');

		if($this->session->userdata('group_level') == 8):
			$members = $this->Anggota_model->AnggotaJoinTim(null, $order_by = 'DESC')->result();
		else:
			$members = $this->Anggota_model->AnggotaJoinTim($condition, $order_by = 'DESC')->result();
		endif;

		$data['listanggota'] = '';
		foreach ($members as $m):
			$data['listanggota'] .= '<tr>
          <td>'.$m->id_anggota.'</td>';
          if($this->session->userdata('group_level') == 8):
          $data['listanggota'] .= '<td><a href="'.site_url('members/view/'.$m->id_anggota).'" data-toggle="tooltip" title="Lihat Profil">'.($m->nama_anggota != null? $m->nama_anggota : $m->username).'</a></td>';
      	  else:
      	  $data['listanggota'] .= '<td><a href="'.site_url('profile/'.$m->username).'">'.($m->nama_anggota != null? $m->nama_anggota : $m->username).'</a></td>';
      	  endif;
      	  $data['listanggota'] .= '
      	  <td>'.$m->nama_tim.'</td>
          <td>'.$m->tgl_bergabung.'</td>
          <td>'.$m->tgl_diubah.'</td>
          <td>'.$this->verifystatus->MemberStatus($m->id_grup).'</td>
        </tr>';
		endforeach;

		$this->load->view('template', $data);
	}

	public function profile($username){
		$data['page'] = 'ViewProfile';

		$this->load->view('template', $data);
	}

	public function add(){
		/* Template halaman penambahan anggota */
		$data['page'] = 'AddMember';

		/* Perulangan untuk pemilihan tim */
		$teams = $this->Tim_model->selectAllTim()->result();
		$data['namatim'] = '';

		foreach ($teams as $value):
			$data['namatim'] .= '<option value="'.$value->id_tim.'">'.$value->nama_tim.'</option>';
		endforeach;

		/* Validasi Untuk Form Pendaftaran */
		$this->form_validation->set_rules('username', 'Username', 'trim|min_length[5]|max_length[16]|required|alpha_numeric|is_unique[tk_anggota.username]');
		$this->form_validation->set_rules('email', 'E-mail', 'trim|required|is_unique[tk_anggota.email]|valid_email');
		$this->form_validation->set_rules('sandi', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('sandi2', 'Ketik Ulang Password', 'trim|required|matches[sandi]');

		/* Pengecekan validasi form */
		if ($this->form_validation->run() == FALSE):
			$this->load->view('template', $data);

		else:
			$anggota['username'] = $this->input->post('username');
			$anggota['email'] = $this->input->post('email');
			$anggota['password'] = password_hash($this->input->post('sandi'), PASSWORD_DEFAULT, array( 'cost' => 12));
			$anggota['nama_anggota'] = $this->input->post('namalengkap');
			$anggota['website_profil'] = $this->input->post('website');
			$anggota['id_tim'] = $this->input->post('namatim');
			$anggota['tgl_bergabung'] = date('Y-m-d H:i:s');
			$anggota['tgl_diubah'] = date('Y-m-d H:i:s');
			$this->Anggota_model->insertAnggota($anggota);
			redirect(current_url());
		endif;
	}

	public function view($iduser){
		$data['page'] = 'ViewMember';

		$this->form_validation->set_error_delimiters('<div class="alert alert-warning">', '</div>');
		$this->form_validation->set_rules('pilihtim', 'Pilih Tim', 'trim|required');

		$data['anggota'] = $this->Anggota_model->getSelectedAnggota($iduser)->row();

		$teams = $this->Tim_model->selectAllTim()->result();
		$data['listtim'] = '';
		foreach ($teams as $t):
			if($data['anggota']->id_tim == $t->id_tim):
				$data['listtim'] .= '<option value="'.$t->id_tim.'" selected>'.$t->nama_tim.'</option>';
			else:
				$data['listtim'] .= '<option value="'.$t->id_tim.'">'.$t->nama_tim.'</option>';
			endif;
		endforeach;

		if ($this->form_validation->run() == FALSE):
			$this->load->view('template', $data);

		else:
			$this->form_validation->set_message('pilihtim', 'Tim anda telah diubah ke %s.');

			$username = $this->input->post('username');
			$anggota['nama_anggota'] = $this->input->post('namalengkap');
			$anggota['website_profil'] = $this->input->post('website');
			$anggota['id_tim'] = $this->input->post('pilihtim');
			$anggota['tgl_diubah'] = date('Y-m-d H:i:s');
			$this->Anggota_model->updateAnggota($anggota, $username);
			redirect(current_url());
		endif;
		
	}

}