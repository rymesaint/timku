<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas_model extends CI_Model {
	private $tbl;

	public function __construct(){
		parent::__construct();
		$this->tbl = 'tk_tugas';
	}

	public function insertTugas($data){
		$this->db->insert($this->tbl, $data);
	}

	public function selectAllTugas(){
		$this->db->select('*');
		$this->db->from($this->tbl);

		return $this->db->get();
	}

	public function getSelectedTugas($id){
		$this->db->select('*');
		$this->db->from($this->tbl);
		$this->db->where('id_tugas', $id);

		return $this->db->get();
	}

	public function selectTugasJoinTim($id = null){
		$this->db->select('id_tugas, nama_tugas, tk_tugas.deskripsi, tgl_deadline, tk_tugas.status_pengerjaan, tgl_dibuat, tk_projek.nama_projek, tk_projek.id_projek');
		$this->db->from($this->tbl);
		$this->db->join('tk_projek', 'tk_projek.id_projek='.$this->tbl.'.id_projek');

		if($id != null):
			$this->db->where($id);
		endif;

		return $this->db->get();
	}

}