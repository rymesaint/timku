<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->model('Anggota_model');
		$this->load->library('form_validation');
	}

	public function logout(){
		if($this->session->userdata('logged_in')):
			$this->session->sess_destroy();
			redirect('login');
		else:
			redirect('login');
		endif;
	}

	public function index(){

		if($this->session->userdata('logged_in')):
			redirect('dashboard');
		endif;
		
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning">', '</div>');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_check');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_pass_check['.$this->input->post("email").']');

		if ($this->form_validation->run() == FALSE):
			$this->load->view('login');
		else:
			$user = $this->Anggota_model->getSelectedAnggota($this->input->post('email'))->row();
			$login_data = array(
				'username' => $user->username,
				'group_level' => $user->id_grup,
				'team_id' => $user->id_tim,
				'logged_in' => true
			);

			$this->session->set_userdata($login_data);
			$this->load->view('aredirect'); 
		endif;
	}

	public function email_check($str){
		$rows = $this->Anggota_model->getSelectedAnggota($str)->num_rows();
		if($rows >= 1):
			return true;
		else:
			$this->form_validation->set_message('email_check', '%s tidak ditemukan di database kami.');
			return false;
		endif;
	}

	public function pass_check($str, $email){
		$check_pass = $this->Anggota_model->getSelectedAnggota($email)->row();

		if(password_verify($str, $check_pass->password)):
		else:
			$this->form_validation->set_message('pass_check', 'Sepertinya %s anda salah, silahkan coba lagi.');
			return false;
		endif;
	} 
}
