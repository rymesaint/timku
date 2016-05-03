<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logged_in')):
			redirect('login');
		endif;
		
		$this->load->model('Penugasan_model');
		$this->load->model('Tugas_model');
	}
	public function index()
	{
		$data['page'] = 'Dashboard';
		$penugasan = '';
		if($this->session->userdata('group_level') == 8):
			$penugasan = $this->Penugasan_model->joinAllPenugasan()->result();
		else:
			$idteam = 'tk_penugasan.id_team = '.$this->session->userdata('team_id');

			$penugasan = $this->Penugasan_model->joinAllPenugasan($idteam)->result();
		endif;

		

		$data['penugasan'] = '';
		if($penugasan):
			foreach ($penugasan as $tugas):
				$params = 'id_projek = '.$tugas->id_projek;
				$countTugas = $this->Tugas_model->countTugas($params);
				$pr = 'status_pengerjaan = 1';
				$progress = $this->Tugas_model->countTugas($pr);

				$data['penugasan'] .= '<tr>
		          <td>'.$tugas->id_penugasan.'</td>
		          <td><a href="'.site_url('project/view/'.$tugas->id_projek).'" data-toggle="tooltip" title="Lihat Projek">'.$tugas->nama_projek.'</a></td>
		          <td><a href="'.site_url('team/view/'.$tugas->id_tim).'">'.$tugas->nama_tim.'</a></td>
		          <td><a href="#" data-toggle="tooltip" title="Kontak Tim Leader">'.$tugas->nama_anggota.'</a></td>
		          <td>'.$tugas->tgl_dibuat.'</td>
		          <td><progress value="'.$progress.'" max="'.$countTugas.'" title="Diselesaikan '.$progress.' dari '.$countTugas.' tugas."></td>
		        </tr>';
	        endforeach;
	    else:
	    	$data['penugasan'] = '<tr><td colspan="6"><center>Maaf, tim anda belum ditugaskan untuk sebuah projek.</center></td></tr>';
	    endif;

 		$this->load->view('template', $data);
	}
}
